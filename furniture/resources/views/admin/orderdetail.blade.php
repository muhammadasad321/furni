@extends('admin.layout')

@section('admin.orderdetail')
<section class="section">
  
@if(session('message'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
{{session('message')}}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Order Detail of order id #</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">item id</th>
                    <th scope="col">Item</th>
                    <th scope="col">Size & Color</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($productIds as $productIdArray)
                            <tr>
                                <td>{{ $productIdArray['id'] }}</td>
                                <td width="30%">{{ $productIdArray['name'] }}</td>
                                <td>{{ $productIdArray['size'] }} & {{ $productIdArray['color'] }}</td>

                                <td>{{ $productIdArray['quantity'] }}</td>
                                <td>{{ $productIdArray['price'] }}</td>
                                <td>{{ number_format($productIdArray['quantity'] * $productIdArray['price'], 2) }}</td>


                            </tr>

                            @endforeach
                </tbody>
              </table>
             
          <!-- Default Card -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Shipping Detail</h5>
              <p>Payment Method: <strong>{{$orderDetail->payment}}</strong></p>

              <p>Name: <strong>{{$orderDetail->name}}</strong></p>
              <p>Mobile: <strong>{{$orderDetail->mobile}}</strong></p>
              <p>Address: <strong>{{$orderDetail->address}},{{$orderDetail->city}},{{$orderDetail->zipcode}},{{$orderDetail->state}},{{$orderDetail->country}}</strong></p>
              <form action="{{ url('admin/orderstatus', $orderDetail->id) }}" method="post">
    @csrf
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-4">
            <select class="form-select" aria-label="Default select example" name="status">
              <option value="" selected>{{$orderDetail->status}}</option>
                <option value="Pending" {{ $orderDetail->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Processing" {{ $orderDetail->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                <option value="Shipped" {{ $orderDetail->status == 'Shipped' ? 'selected' : '' }}>Shipped</option>
                <option value="Delivered" {{ $orderDetail->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
            </select>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Update Status</button>
</form>

            </div>
          </div><!-- End Default Card -->


              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>


@endsection