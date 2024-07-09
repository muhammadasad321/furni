@extends('layout')
<title>User Account</title>
@section('account')
<section class="section" style=" margin:2em auto;">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
        @if(session('message'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
{{session('message')}}             
    </div>

              @endif
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Order Detail of order id #</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">item id</th>
                    <th scope="col">Item</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>

                  </tr>
                </thead>
                <tbody>
                @foreach ($products as $productIdArray)
                            <tr>
                                <td>{{ $productIdArray['id'] }}</td>
                                <td width="30%">{{ $productIdArray['name'] }}</td>
                                <td>{{ $productIdArray['quantity'] }}</td>
                                <td>{{ $productIdArray['price'] }}</td>
                                <td>{{ number_format($productIdArray['quantity'] * $productIdArray['price'], 2) }}</td>
                                


                            </tr>

                            @endforeach
                </tbody>
              </table>
              <div class="card">
                <div class="card-body">
              <h5 class="card-title">Shipping Detail</h5>

              @foreach($orderDetail as $orderDetail)
              <td><button class="btn btn-danger text-white"><a href="{{url('cancelorder',$orderDetail->id)}}" class="text-white">Cancel Order</a></button></td>

              <p>Status: <strong>{{$orderDetail->status}}</strong></p>

              <p>Payment Method: <strong>{{$orderDetail->payment}}</strong></p>
              <p>Payment Status: <strong>{{$orderDetail->payment_status}}</strong></p>


              <p>Name: <strong>{{$orderDetail->name}}</strong></p>
              <p>Mobile: <strong>{{$orderDetail->mobile}}</strong></p>
              <p>Address: <strong>{{$orderDetail->address}},{{$orderDetail->city}},{{$orderDetail->zipcode}},{{$orderDetail->state}},{{$orderDetail->country}}</strong></p>
<hr>

              @endforeach
            </div>
          </div>

            

            </div>
          </div>

        </div>
      </div>
    </section>

@endsection