<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Exception;
use App\Models\Product;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage; 
use Symfony\Component\HttpFoundation\BinaryFileResponse;

use GuzzleHttp\Client;

use Illuminate\Support\Str;

class CashfreePaymentController extends Controller
{



    function StoreOrder(Request $request)
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
        $url = "https://sandbox.cashfree.com/pg/orders";
    
        $headers = array(
            "Content-Type: application/json",
            "x-api-version: 2023-08-01",
    "x-client-id: TEST430329ae80e0f32e41a393d78b923034",
     "x-client-secret: TESTaf195616268bd6202eeb3bf8dc458956e7192a85"
        );
    
        $order_id = 'order_' . rand(1111111111, 9999999999);
        $customer_id = 'customer_' . rand(111111111, 999999999);
    
        $data = json_encode([
            'order_id' => $request->input('order_id'),
            'order_amount' => $subtotal,
            'order_currency' => 'INR',
            'customer_details' => [
                'customer_id' => $customer_id,
                'customer_name' => $request->input('name'),
                'customer_email' => $request->input('email'),
                'customer_phone' => $request->input('mobile'),
            ],
            'order_meta' => [
                "return_url" => 'http://127.0.0.1:8000/success/?order_id=' . $request->input('order_id') .
                '&name=' . urlencode($request->input('name')) .
                '&email=' . urlencode($request->input('email')) .
                '&mobile=' . urlencode($request->input('mobile')) .
                '&subtotal=' . $subtotal .
                '&address=' . urlencode($request->input('address')) .
                '&country=' . urlencode($request->input('country')) .
                '&city=' . urlencode($request->input('city')) .
                '&state=' . urlencode($request->input('state')) .
                '&zipcode=' . urlencode($request->input('zipcode')) .
                '&payment=' . urlencode($request->input('payment')) ,



                    
                    
            ]
        ]);
        $curl = curl_init($url);
    
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    
        $resp = curl_exec($curl);
    
        if ($resp === false) {
            throw new Exception('Curl error: ' . curl_error($curl));
        }
    
        curl_close($curl);
    
        $responseData = json_decode($resp, true);
         if (isset($responseData['payment_session_id'])) {
            // Payment session ID is generated
            $payment_session_id = $responseData['payment_session_id'];
    
            // Get the project ID from the request
    
            // Redirect back to the checkout page with the payment session ID and project ID
            return redirect()->route('paynow')->with('payment_session_id', $payment_session_id);
        } else {
            // Handle the case where payment_session_id is not present in the response
            // For exarmple, you can log an error or return an appropriate response
            return response()->json(['error' => 'Failed to generate payment session ID'], 500);
        }
        
    }
    
    
    function PayNow()
    {
        return view('paynow');
    }
      
 
 function Success(Request $request)
{

    if (session()->has('order_saved')) {
        return redirect('thankyou');
    }
  
    $parsedUrl = parse_url($request->fullUrl());
    $query = $parsedUrl['query'] ?? '';
    parse_str($query, $queryParams);

    $order_id = $queryParams['order_id'] ?? null;
    $name = $queryParams['name'] ?? null;
    $email = $queryParams['email'] ?? null;
    $mobile = $queryParams['mobile'] ?? null;
    $subtotal = $queryParams['subtotal'] ?? null;
    $address = $queryParams['address'] ?? null;
    $country = $queryParams['country'] ?? null;
    $city = $queryParams['city'] ?? null;
    $state = $queryParams['state'] ?? null;
    $zipcode = $queryParams['zipcode'] ?? null;
    $payment = $queryParams['payment'] ?? null;

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
    $order->order_id = $order_id;
    $order->customer_Id = $userId; 
    $order->name = $name; 
    $order->email = $email; 
    $order->mobile = $mobile; 
    $order->address = $address; 
    $order->country = $country; 
    $order->city = $city; 
    $order->state = $state; 
    $order->zipcode = $zipcode; 
    $order->payment = $payment; 
    $order->payment_status = 'paid'; 

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


             
            
     }
