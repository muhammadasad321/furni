@extends('admin.layout')

@section('admin.orders')
<table class="table">

  
           
              @if(session('message'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
{{session('message')}}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
                <thead>
                  <tr>
                    <th scope="col">ID No.</th>
                    <th scope="col">Date</th>
                    <th scope="col">Total</th>

                    <th scope="col">Payment Method</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>

                    

                  </tr>
                </thead>
                <tbody>
                @foreach($orders as $data)

                  <tr>
                    <th scope="row">{{$data->id}}</th>
                    <td>{{$data->created_at}}</td>
                    <td >{{$data->subtotal}}</td>
                    <td>{{$data->payment}}</td>
                    <td>{{$data->status}}</td>

          

                 

         
<td>              <a href="{{url('admin/orderdetail',$data->id)}}"><button type="button" class="btn btn-success">View</button></a>
</td>
                  </tr>
                  @endforeach
                 
                </tbody>
              </table>
@endsection