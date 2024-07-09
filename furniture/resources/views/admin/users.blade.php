@extends('admin.layout')

@section('admin.users')
<table class="table">
@if(session('app-update'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
{{session('app-update')}}

<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
  
              @if(session('app-delete'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
{{session('app-delete')}}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
              @if(session('add'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
{{session('add')}}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
                <thead>
                  <tr>
                    <th scope="col">ID No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Status</th>

                    

                  </tr>
                </thead>
                <tbody>
                @foreach($UserData as $data)

                  <tr>
                    <th scope="row">{{$data->id}}</th>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>   
                    <td>{{$data->mobile}}</td>  
                    <td>              <a href="{{url('admin/userstatus',$data->id)}}"><button type="button" class="btn btn-{{$data->status ? 'success' : 'danger'}}">{{$data->status ? 'Active' : 'Deactive'}}</button></a>
                    <a href="{{url('admin/userdelete',$data->id)}}"><button type="button" class="btn btn-danger">Delete</button></a>

</td>
                
                  </tr>
                  @endforeach
                 
                </tbody>
              </table>
@endsection