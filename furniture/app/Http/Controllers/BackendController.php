<?php

namespace App\Http\Controllers;
use App\Models\Contact;

use App\Models\User;
use App\Models\Size;
use App\Models\Color;
use App\Models\Order;
use App\Models\Customer;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Crypt;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage; 

class BackendController extends Controller

    {
       
    
    //Backend functions
    
    public function dashboard()
    {
        // Count orders
        $totalOrders = Order::count();

        // Count categories
        $totalCategories = Category::count();

        // Count products
        $totalProducts = Product::count();

        // Pass the counts to the view
        return view('admin.index', compact('totalOrders', 'totalCategories', 'totalProducts'));
    }
    function login(){
        return view('admin.login');
    
    }
    
    function logout()
    {
        session()->forget('username');
        return redirect('admin/login'); // Redirect to the login page
    }
    
    function loggedIn(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $user = User::where('username', $credentials['username'])->first();
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->with('failed', 'Username or Password in incorrect');
        }
    
        // Authentication successful
        // You can set a session variable to indicate that the user is logged in.
        session(['username' => $user->username]);
    
        return redirect('admin/dashboard'); // Redirect to a dashboard or any other route
    }

    function Category(){
        return view('admin.categories');
    }
    function CategoryStore(Request $request){
        $store = new Category;
        $store->name = $request->input('name');

        $store->status = '1';
        $store->save();
          
        return redirect()->back()->with('success', 'Category added successfully');
  
  
      }
  
      function CategoryList(){
          $CategoryList = Category::all();
         

          return view('admin.categorylist',compact('CategoryList'));
      }
  
      function CategoryEdit($id){
          $data = Category::find($id);
          return view('admin.categoryedit',['data'=>$data]);
          
      }
  
      function CategoryUpdate(Request $request){
          $update = Category::find($request->input('id'));
          $update->name = $request->input('name');

          $update->status = '1';
          $update->save();
            
          return redirect('admin/categorylist')->with('update', 'Category updated successfully');
    
    
      }
  
      function CategoryStatus($id){
           $data = Category::find($id);
  
          if($data){
              if($data->status){
                  $data->status = 0;
              }else{
                  $data->status =1;
              }
  
              $data->save();
          }
          
          return back();
      }
  
      function CategoryDelete($id){
          Category::find($id)->delete();
          return redirect('admin/categorylist')->with('delete', 'Category deleted successfully');
  
  
      }
      function Color(){
        return view('admin.color');
    }
    function ColorStore(Request $request){
        $store = new Color;
        $store->name = $request->input('name');

        $store->status = '1';
        $store->save();
          
        return redirect()->back()->with('success', 'Color added successfully');
  
  
      }
  
      function ColorList(){
          $ColorList = Color::all();
         

          return view('admin.colorlist',compact('ColorList'));
      }
  
      function ColorEdit($id){
          $data = Color::find($id);
          return view('admin.coloredit',['data'=>$data]);
          
      }
  
      function ColorUpdate(Request $request){
          $update = Color::find($request->input('id'));
          $update->name = $request->input('name');

          $update->status = '1';
          $update->save();
            
          return redirect('admin/colorlist')->with('update', 'Color updated successfully');
    
    
      }
  
      function ColorStatus($id){
           $data = Color::find($id);
  
          if($data){
              if($data->status){
                  $data->status = 0;
              }else{
                  $data->status = 1;
              }
  
              $data->save();
          }
          
          return back();
      }
  
      function ColorDelete($id){
          Color::find($id)->delete();
          return redirect('admin/colorlist')->with('delete', 'Color deleted successfully');
  
  
      }
      function Size(){
        return view('admin.size');
    }
    function SizeStore(Request $request){
        $store = new Size;
        $store->name = $request->input('name');

        $store->status = '1';
        $store->save();
          
        return redirect()->back()->with('success', 'Size added successfully');
  
  
      }
  
      function SizeList(){
          $SizeList = Size::all();
         

          return view('admin.sizelist',compact('SizeList'));
      }
  
      function SizeEdit($id){
          $data = Size::find($id);
          return view('admin.sizeedit',['data'=>$data]);
          
      }
  
      function SizeUpdate(Request $request){
          $update = Size::find($request->input('id'));
          $update->name = $request->input('name');

          $update->status = '1';
          $update->save();
            
          return redirect('admin/sizelist')->with('update', 'Size updated successfully');
    
    
      }
  
      function SizeStatus($id){
           $data = Size::find($id);
  
          if($data){ 
              if($data->status){
                  $data->status = 0;
              }else{
                  $data->status =1;
              }
  
              $data->save();
          }
          
          return back();
      }
  
      function SizeDelete($id){
          Size::find($id)->delete();
          return redirect('admin/sizelist')->with('delete', 'Size deleted successfully');
  
  
      }
    function AddProduct(){
        $CategoryList = Category::all();
        $SizeList = Size::all();
        $ColorList = Color::all();
        return view('admin.addproduct',compact('CategoryList','SizeList','ColorList'));
    }

    function ProductList(){
        $ProductList = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.*', 'categories.name as category_name')
        ->get();
      
        return view('admin.productlist',compact('ProductList'));
    
    }

    function ProductStore(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'size_ids' => 'required|array',
            'size_ids.*' => 'exists:sizes,id',
            'color_ids' => 'array', // Remove 'required'
            'color_ids.*' => 'exists:colors,id',
            // Other validation rules...
        ]);

        $store = new Product;
        $store->category_id = $request->input('category_id'); 
        $store->name = $request->input('name');
        $slug = Str::slug($request->input('name'));
        $store->slug = $slug;
    
        $store->price = $request->input('price');
        $store->quantity = $request->input('quantity');


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '_' . $extension;
            $file->move('upload/images/', $filename);
            $store->image = $filename;
        }
    
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalName();
            $filename = time() . '_' . $extension;
            $file->move('upload/files/', $filename);
            $store->file = $filename;
        }

    
        $store->description = $request->input('description');
        $store->meta_title = $request->input('meta_title');
        $store->meta_desc = $request->input('meta_desc');
        $store->meta_keyword = $request->input('meta_keyword');
        $store->status = '1';
        $store->save();
        $store->sizes()->attach($request->size_ids);
        if ($request->has('color_ids')) {
            $store->colors()->attach($request->color_ids);
        }
       
        if ($request->hasFile('image_path')) {
            foreach ($request->file('image_path') as $image) {
                $filename = Str::random(8) . '_' . $image->getClientOriginalName();
                $destination = 'upload/gallery/' . $store->image;
    
                if (File::exists($destination)) {
                    File::delete($destination);
                }

                $success = $image->move('upload/gallery', $filename);
                if (!$success) {
                    Log::error('Failed to move file: ' . $filename);
                }
               
    
                $productgallery = new ProductGallery();
                $productgallery->image_path = $filename;
                $productgallery->product_id = $store->id;
                $productgallery->save();
            }
        }
        return redirect('admin/productlist')->with('add', 'product added successfully');
    }
    
    function ProductEdit($id){



        $productdata = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->leftJoin('color_product', 'products.id', '=', 'color_product.product_id')
        ->leftJoin('colors', 'color_product.color_id', '=', 'colors.id')
        ->leftJoin('product_size', 'products.id', '=', 'product_size.product_id')
        ->leftJoin('sizes', 'product_size.size_id', '=', 'sizes.id')
        ->select('products.id', 'products.name', 'products.price', 'products.quantity', 'products.image', 'products.description', 'products.meta_title', 'products.meta_desc', 'products.meta_keyword', 'categories.id as category_id', 'categories.name as category_name', 'colors.name as color_name', 'sizes.name as size_name')
        ->where('products.id', '=', $id)
        ->groupBy('products.id', 'products.name', 'products.price', 'products.quantity', 'products.image', 'products.description', 'products.meta_title', 'products.meta_desc', 'products.meta_keyword', 'categories.id', 'categories.name', 'colors.name', 'sizes.name')
        ->get();
    $groupedData = [];
    foreach ($productdata as $product) {
        $groupedData[$product->id] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $product->quantity,
            'image' => $product->image,
            'description' => $product->description,
            'meta_title' => $product->meta_title,
            'meta_desc' => $product->meta_desc,
            'meta_keyword' => $product->meta_keyword,
            'category_id' => $product->category_id,
            'category_name' => $product->category_name,
            'colors' => [],
            'sizes' => [],
        ];
    }
    
    foreach ($productdata as $product) {
        $groupedData[$product->id]['colors'][] = $product->color_name;
        $groupedData[$product->id]['sizes'][] = $product->size_name;
    }
    
    $productdata = array_values($groupedData);
    

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

        $productgalleryexisting = productGallery::where('product_id', $id)->get();

        $productgalleryimages = productGallery::where('product_id', $id)->get();

        $CategoryList = Category::where('status','1')->get();
        $ColorList = Color::where('status','1')->get();
        $SizeList = Size::where('status','1')->get();

        return view('admin.productedit',['selectedSizes'=>$selectedSizes,'selectedColors'=>$selectedColors,'productdata'=>$productdata,'CategoryList'=>$CategoryList,'SizeList'=>$SizeList,'ColorList'=>$ColorList, 'productgalleryimages'=>$productgalleryimages,'productgalleryexisting'=>$productgalleryexisting]);

    }
    function ProductUpdate(Request $request){
      

        $update = Product::find($request->input('id'));
        $update->category_id = $request->input('category_id'); 

      $update->name = $request->input('name');
      $slug = Str::slug($request->input('name'));
      $update->slug =$slug;
      $update->price = $request->input('price');
      $update->quantity = $request->input('quantity');

     

      if ($request->hasFile('image'))
      
      {
    $destination = 'upload/images/' . $update->image;
    
    if (File::exists($destination)) {
        File::delete($destination);
    }

    $file = $request->file('image');
    $extension = $file->getClientOriginalExtension(); // Get the file extension
    $filename = time() . '_' . $extension;
    $file->move('upload/images/', $filename);
    $update->image = $filename;
}

      $update->description = $request->input('description');
      $update->meta_title = $request->input('meta_title');
      $update->meta_desc = $request->input('meta_desc');
      $update->meta_keyword = $request->input('meta_keyword');
      $update->status = '1';
      $update->save();
        
 // Sync sizes
 if ($request->has('size_ids')) {
    $update->sizes()->sync($request->size_ids);
} else {
    $update->sizes()->detach(); // Remove all sizes if none provided
}

// Sync colors
if ($request->has('color_ids')) {
    $update->colors()->sync($request->color_ids);
} else {
    $update->colors()->detach(); // Remove all colors if none provided
}

      if ($request->hasFile('image_path')) {
        foreach ($request->file('image_path') as $image) {
            // Generate a unique filename
            $filename = Str::random(8) . '_' . $image->getClientOriginalName();
            // Store the image in the "public/upload/gallery" directory
            $success = $image->move('upload/gallery', $filename);
            if (!$success) {
                // Log error
                Log::error('Failed to move file: ' . $filename);
            }

            // Create a new productGallery instance
            $productgallery = new ProductGallery();
            // Assign the filename to the image_path attribute
            $productgallery->image_path = $filename;
            // Associate the productGallery with the product
            $productgallery->product_id = $update->id;
            // Save the productGallery instance
            $productgallery->save();
        }
    }


      return redirect('admin/productlist')->with('app-update', 'product updated successfully');

    }

    function ProductDelete($id){
        Product::find($id)->delete();
        return redirect()->back()->with('app-delete','product deleted successfully');
    }
    function ProductStatus($id){
        $data = Product::find($id);

       if($data){
           if($data->status){
               $data->status = 0;
           }else{
               $data->status =1;
           }

           $data->save();
       }
       
       return back();
   }

    function ImageDelete($id)
   {
       // Find the image by ID
       $image = ProductGallery::find($id);

       // Delete the image from storage
       if ($image) {
           Storage::delete('upload/gallery/' . $image->image_path);
           $image->delete();
       }

       // Redirect back or to any appropriate page
       return redirect()->back()->with('success', 'Image deleted successfully');
   }
    function ContactData(){
        $ContactData = Contact::orderby('created_at','desc')->get();
        return view('admin/contact',compact('ContactData'));
    }
    
    public function ContactDelete($id) {
        // Find the contact by ID
        $contact = Contact::find($id);
    
        if ($contact) {
            // If the contact exists, delete it
            $contact->delete();
    
            // Optionally, you can redirect back to the contact list page or return a success message
            return back()->with('delete', 'Contact deleted successfully');
        } else {
            // Handle the case when the contact does not exist
            return back()->with('error', 'Contact not found');
        }
    }

    function Orders(){

$orders = Order::all();
return view('admin.orders',compact('orders'));

    }

    function OrderDetail($id)
    {
        $orderDetail = Order::find($id);
        
        // Check if the order detail exists
        if ($orderDetail) {
            // Decode the JSON string into an array
            $productIds = json_decode($orderDetail->product_ids, true);
          
            return view('admin.orderdetail', compact('orderDetail', 'productIds'));

            }
        }
     function updateOrderStatus(Request $request, $id)
        {
            $order = Order::findOrFail($id);
            $order->status = $request->input('status');
            $order->save();
    
            return redirect()->back()->with('message', 'Order status updated successfully.');
        }
        function UserData(){
            $UserData = Customer::orderby('created_at','desc')->get();
            return view('admin.users',compact('UserData'));
    
        }
        function UserDelete($id){
                Customer::find($id)->delete();
                return redirect()->back()->with('app-delete','User deleted successfully');
            
        }
        function UserStatus($id){
            $data = Customer::find($id);

            if($data){
                if($data->status){
                    $data->status = 0;
                }else{
                    $data->status =1;
                }
     
                $data->save();
            }
            
            return back();
        }
}

 
