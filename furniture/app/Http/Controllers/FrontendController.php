<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use App\Models\Size;
use App\Models\Color;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationEmail;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;
class FrontendController extends Controller
{

    public function itemCountInCart()
    {
        $customer_id = session('id'); // Assuming you are using authentication and the user ID is used to identify the items in the cart
        $itemCount = Cart::where('customer_id', $customer_id)->count();
        return $itemCount;
    }
    
  
    function index(){

        $RandomProduct = Product::inRandomOrder()->take(7)->get();
        $JustArrived = Product::orderBy('created_at', 'desc')->take(6)->get();

        return view('index',compact('RandomProduct','JustArrived'));
    }

    function Contact(){
        return view('contact');
    }
    function ContactForm(Request $request){
        $store = new Contact;
        $store->name = $request->input('name');
        $store->email = $request->input('email');
        $store->subject = $request->input('subject');

        $store->message = $request->input('message');
       
        $store->save();
        return back()->with('message', 'Thank you for contacting us. We will respond you very soon.');
         }

         function Register(){
            $userId = session('id'); // Retrieve user ID from the session
            if ($userId) {
                // Handle case where user ID is not found in the session
                return redirect('/');
            }
            return view('register');
         }
         function RegisterForm(Request $request){
           
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:customers', // Ensure email does not already exist
                'mobile' => 'required|string|max:255|unique:customers', // Ensure mobile does not already exist
                'password' => 'required|string|min:8',
            ]);
        
            // Check if the mobile number already exists
            $existingCustomer = Customer::where('mobile', $request->input('mobile'))->first();
        
            if ($existingCustomer) {
                // Mobile number already exists, handle accordingly (e.g., redirect back with error message)
                return back()->withErrors(['mobile' => 'Mobile number already exists.']);
            }
            $store = new Customer;
            $store->name = $request->input('name');
            $store->email = $request->input('email');
            $store->mobile = $request->input('mobile');
            $store->password = Hash::make($request->input('password'));
            $store->status='1';
            $store->is_verified ='0';
            $verificationToken = Str::random(60);
            $store->verification_token = $verificationToken;
            $store->save();
            Mail::to($store->email)->send(new VerificationEmail($verificationToken));



            return back()->with('message', 'Check email for verification');
             }

             function VerifyEmail(){
                return view('verify-email');
             }

            function VerifyToken(Request $request) {
                $email = $request->input('email');
                $token = $request->input('token');
        
                // Retrieve verification token for the provided email
                $user = Customer::where('email', $email)->first();
        
                if (!$user) {
                    return redirect()->back()->with('error', 'Invalid email.');
                }

               
        
                // Compare tokens
                if ($user->verification_token === $token) {
                    // Update is_verified column to 1
                    $user->update(['is_verified' => 1]);
                    return redirect()->back()->with('success', 'Email verified successfully.');
                } else {
                    return redirect()->back()->with('error', 'Invalid token.');
                }
            }

            function Forgot(){
                return view('forgot');
             }

             function Forgotpassword(Request $request) {
             

                $user = Customer::where('email', $request->email)->first();
                
              
           if(!empty($user)){
            $user->verification_token = Str::random(60);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect()->back()->with('success','Please check your email and reset your password');


           }else{
            return redirect()->back()->with('error','Email not found');
           }
             }

             function Reset($token){
                $user = Customer::where('verification_token', '=', $token)->first();
                if(!empty($user)){
                    $data['user']= $user;
                    return view('reset');
                }else{
                    abort(404);
                }


             }

             function ResetPassword($token, Request $request){
                $user = Customer::where('verification_token','=', $token)->first();
                if(!empty($user)){

                    $user->password = Hash::make($request->password);
                    $user->verification_token = Str::random(60);
                    $user->save();
                    return redirect('login')->with('success','Password Reset Successfull. Please Login Now');

             }else {
                return redirect('login')->with('failed','Something Went Wrong');

             }

            
            }


             function Login(){
                $userId = session('id'); // Retrieve user ID from the session
                if ($userId) {
                    // Handle case where user ID is not found in the session
                    return redirect('/');
                }

                return view('login');
             }
             function LoggedIn(Request $request)
             {
                 $credentials = $request->only('email', 'password');
                 $user = Customer::where('email', $credentials['email'])->first();

             
                 if (!$user || !Hash::check($credentials['password'], $user->password)) {
                     return back()->with('failed', 'Email or Password in incorrect');
                 }
                 if ($user->status != 1) {
                    return back()->with('failed', 'Your account is not active. Please contact support.');
                }
                if (!$user->is_verified) {
                    return back()->with('failed', 'Email is not verified');
                }
                 // Authentication successful
                 // You can set a session variable to indicate that the user is logged in.
                 session([
                    'name' => $user->name,
                    'email' => $user->email,
                    'id' => $user->id,
                    'password' => $user->password,
                    'mobile' => $user->mobile

                ]);
             
                 return redirect('/'); // Redirect to a dashboard or any other route
             }
             function Logout()
             {
                 session()->forget('name');
                 session()->forget('id');
                 session()->forget('email');
                 session()->forget('mobile');
                 session()->forget('password');

                 return redirect('login'); // Redirect to the login page
             }

             function Search(Request $request){
                $searchTerm = $request->input('search');
        
        
                $title = "Search Results for '{$searchTerm}'";
                $results = Product::where(function ($query) use ($searchTerm) {
                  $query->where('name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('meta_keyword', 'like', '%' . $searchTerm . '%');
              })->paginate(10);
                    return view('search', compact('results','title'));
             }

             function AllProducts(){
                $AllProduct = Product::where('status', '1')->paginate(10);

                return view('allproducts',compact('AllProduct'));
             }

             function Product($id, $slug){
                $product = Product::find($slug);
                $MetaDetail = Product::where('slug',$slug)->first();
                $selectedSizes = DB::table('product_size')
                ->select('size_id')
                ->where('product_size.product_id', '=', $id)
                ->pluck('size_id')
                ->toArray();
                $selectedColors = DB::table('color_product')
                ->select('color_id')
                ->where('color_product.product_id', '=', $id)
                ->pluck('color_id')
                ->toArray();
                $result = Product::where('slug',$slug)->get();
                $productimages = ProductGallery::where('product_id', $id)->get();
            
                return view('product',compact('selectedColors','selectedSizes','result','productimages','MetaDetail'));
             }
    
             function CategoryData($id){
                $category = Category::find($id);

    if (!$category) {
        abort(404); // Handle category not found error
    }

    $products = Product::where('category_id', $category->id)->get();

    // You can use eager loading to load category information for each product if needed
    // $products = Product::where('category_id', $category->id)->with('category')->get();

    return view('categories', compact('category', 'products'));
             }
function AddToCart(Request $request){
    $cart = new Cart;
   $cart->product_id = $request->input('product_id'); 
   $cart->size_id = $request->input('size_id'); 
   $cart->color_id = $request->input('color_id'); 
   $cart->customer_id = $request->input('customer_id');
   $cart->quantity = $request->input('quantity');
   $cart->save();

   return response()->json(['message' => 'Item added to cart']);
    

}

public function Cart(){
    $userId = session('id'); // Retrieve user ID from the session
    if (!$userId) {
        // Handle case where user ID is not found in the session
        return redirect('login')->with('error', 'Please log in first');
    }

    $customerId = session('id');
    $cartitems = DB::table('carts')
        ->join('products', 'carts.product_id', '=', 'products.id')
        ->join('colors', 'carts.color_id', '=', 'colors.id')
        ->join('sizes', 'carts.size_id', '=', 'sizes.id')
        ->select('products.*', 'carts.quantity', 'colors.name as color', 'sizes.name as size')
        ->where('carts.customer_id', $customerId)
        ->get();

    return view('cart', compact('cartitems'));
}


public function Remove($product_id)
{
    $customer_id = session('id');
    
    // Assuming your Cart model has a `customer_id` column
    Cart::where('customer_id', $customer_id)
        ->where('product_id', $product_id)
        ->delete();

    return redirect()->back()->with('message', 'Product removed from cart.');
}

function Account(){
    $userId = session('id'); // Retrieve user ID from the session
    if (!$userId) {
        // Handle case where user ID is not found in the session
        return redirect('login')->with('error', 'Please log in first');
    }
    
    $orderDetail = Order::where('customer_id', $userId)->get();
    $products = [];

    foreach ($orderDetail as $order) {
        // Decode the JSON string into an array for each order
        $productIds = json_decode($order->product_ids, true);
        
        // Merge product IDs from each order into the products array
        $products = array_merge($products, $productIds);
    }
    return view('account', compact('orderDetail', 'products'));
}

function OrderCancel($id) {
    // Find the order by its ID
    $order = Order::find($id);

    // If the order exists
    if ($order) {
        // Update the status to 'cancel'
        $order->status = 'cancelled';
        $order->save();

        // Optionally, you can return a message or do other actions
        return redirect()->back()->with('message','Order has been cancelled');
    } 
}

function Checkout(){
    $userId = session('id'); // Retrieve user ID from the session
    if (!$userId) {
        // Handle case where user ID is not found in the session
        return redirect('login')->with('error', 'Please log in first');
    }
    $cartitems = DB::table('carts')
    ->join('products', 'carts.product_id', '=', 'products.id')
   
    ->join('colors', 'carts.color_id', '=', 'colors.id')
    ->join('sizes', 'carts.size_id', '=', 'sizes.id')
    ->select('products.*', 'carts.quantity', 'colors.name as color', 'sizes.name as size')
    ->where('carts.customer_id', $userId)
    ->get();   

    
    return view('checkout',compact('cartitems'));

}

function OrderPlace(Request $request)
{
    $userId = session('id');
    
    // Retrieve cart items
    $cartItems = DB::table('carts')
        ->join('products', 'carts.product_id', '=', 'products.id')

        ->join('colors', 'carts.color_id', '=', 'colors.id')
        ->join('sizes', 'carts.size_id', '=', 'sizes.id')
        ->select('products.*', 'carts.quantity', 'colors.name as color', 'sizes.name as size')        ->where('carts.customer_id', $userId)
        ->get();   

    // Serialize cart items
    $cartItemsSerialized = $cartItems->toJson(); // Convert to JSON format

    // Calculate subtotal
    $subtotal = $cartItems->sum(function ($item) {
        return $item->price * $item->quantity;
    });

    // Create a new order
    $order = new Order();
    $order->order_id = $request->input('order_id'); 
    $order->customer_Id = $userId; 
    $order->name = $request->input('name'); 
    $order->email = $request->input('email'); 
    $order->mobile = $request->input('mobile'); 
    $order->address = $request->input('address'); 
    $order->country = $request->input('country'); 
    $order->city = $request->input('city'); 
    $order->state = $request->input('state'); 
    $order->zipcode = $request->input('zipcode'); 
    $order->payment = $request->input('payment'); 
    $order->payment_status = 'Unpaid'; 

    $order->product_ids = $cartItemsSerialized; // Store cart items in orders table
    $order->subtotal = $subtotal; // Store subtotal in orders table
    $order->save();
    
    foreach ($cartItems as $item) {
        $product = Product::find($item->id);
        if ($product) {
            $product->quantity -= $item->quantity;
            $product->save();
        }
    }
    DB::table('carts')->where('customer_id', session('id'))->delete();

return redirect('thankyou');

}

function Thankyou(){
    $userId = session('id'); // Retrieve user ID from the session
    if (!$userId) {
        // Handle case where user ID is not found in the session
        return redirect('login')->with('error', 'Please log in first');
    }
    return view('thankyou');
}

function Profile(){
    $userId = session('id'); // Retrieve user ID from the session
    if (!$userId) {
        // Handle case where user ID is not found in the session
        return redirect('login')->with('error', 'Please log in first');
    }else { 
    return view('profile');
    }
 }



 function ProfileUpdate(Request $request){
    $update = new Customer;
    $update = Customer::find($request->input('id'));
    $update->name = $request->input('name');
    $update->email = $request->input('email');
    $update->mobile = $request->input('mobile');
if ($request->filled('password')) {
// Hash and update the new password
$update->password = Hash::make($request->input('password'));
}                $update->save();

    return redirect()->back()->with('message','Profile Updated Successfully. Please login again for changes');
 }

function About(){

    return view('about');
}

}
