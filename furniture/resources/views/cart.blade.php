@extends('layout')
<title>Cart</title>
@section('cart')

    <!-- Page Header Start -->
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px;background:#3b5d50" >
            <h1 class="font-weight-semi-bold text-uppercase mb-3 text-white">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="" class="text-white">Home</a></p>
                <p class="m-0 px-2 text-white">-</p>
                <p class="m-0 text-white">Shopping cart</p>
            </div>
        </div>
    <!-- Page Header End -->

    @if(session('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{session('message')}}
              </div>
              @endif
    <!-- Cart Start -->
    <div class="untree_co-section before-footer-section">
            <div class="container">
              <div class="row mb-5">
                <form class="col-md-12" method="post">
                  <div class="site-blocks-table">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="product-thumbnail">Image</th>
                          <th class="product-name">Product</th>
                          <th class="product-specs">Size & Color</th>
                          <th class="product-price">Price</th>
                          <th class="product-quantity">Quantity</th>
                          <th class="product-total">Total</th>
                          <th class="product-remove">Remove</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($cartitems as $data)

                        <tr>
                          <td class="product-thumbnail">
                            <img src="{{asset('upload/images/'.$data->image)}}" alt="Image" class="img-fluid">
                          </td>
                          <td class="product-name">
                            <h2 class="h5 text-black">{{$data->name}}</h2>
                          </td>
                          <td class="product-specs">
                            <h2 class="h5 text-black">{{$data->size}} & {{$data->color}}</h2>
                          </td>
                          <td>Rs. {{$data->price}}</td>
                          <td>
                            <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
                              <div class="input-group-prepend">
                                  </div>
                              <input type="text" class="form-control text-center quantity-amount" readonly value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                              <div class="input-group-append">
                              </div>
                            </div>
        
                          </td>
                          <td>Rs. {{ $data->price * $data->quantity }}</td>
                          <td><a href="{{url('remove/'.$data->id)}}" class="btn btn-black btn-sm">X</a></td>
                        </tr>
        
                    @endforeach
                      </tbody>
                    </table>
                  </div>
                </form>
              </div>
        
              <div class="row">
                <div class="col-md-6">
                  <div class="row mb-5">
                    <div class="col-md-6 mb-3 mb-md-0">
                    <a href="{{url('/')}}"><button class="btn btn-outline-black btn-sm btn-block">Continue Shopping</button></a>
                    </div>
                    <div class="col-md-6">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      
                    </div>
                    <div class="col-md-8 mb-3 mb-md-0">
                      
                    </div>
                    <div class="col-md-4">
                    </div>
                  </div>
                </div>
                <div class="col-md-6 pl-5">
                  <div class="row justify-content-end">
                    <div class="col-md-7">
                      <div class="row">
                      @php
    $subtotal = $cartitems->sum(function ($item) {
        return $item->price * $item->quantity;
    });
    $total = $subtotal; // You can add additional charges or discounts to the total if needed
@endphp
                        <div class="col-md-12 text-right border-bottom mb-5">
                          <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-md-6">
                          <span class="text-black">Subtotal</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black">Rs. {{ $subtotal }}</strong>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-md-6">
                          <span class="text-black">Total</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black">Rs. {{ $total }}</strong>
                        </div>
                      </div>
        
                      <div class="row">
                        <div class="col-md-12">
                          <a href="{{url('checkout')}}"><button class="btn btn-black btn-lg py-3 btn-block" >Proceed To Checkout</button></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
		

    @endsection

