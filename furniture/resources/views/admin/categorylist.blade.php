@extends('admin.layout')

@section('admin.categorylist')
<table class="table">
  @if(session('delete'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
{{session('delete')}}

<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Action</th>
                    <th scope="col">Status</th>

                  </tr>
                </thead>
                <tbody>
                @foreach($CategoryList as $data)

                  <tr>
                    <th scope="row">{{$data->id}}</th>
                    <td><i class="{{$data->icon}}"></i> {{$data->name}}</td>
                 
                    <td>   <div class="btn-group" role="group" aria-label="Basic mixed styles example">
              <a href="{{url('admin/categorydelete',$data->id)}}"><button type="button" class="btn btn-danger">Delete</button></a>
              <a href="{{url('admin/categoryedit',$data->id)}}"><button type="button" class="btn btn-warning">Edit</button></a>
              <td>              <a href="{{url('admin/categorystatus',$data->id)}}"><button type="button" class="btn btn-{{$data->status ? 'success' : 'danger'}}">{{$data->status ? 'Active' : 'Deactive'}}</button></a>
</td> <!-- Display 'Active' for 1 and 'Inactive' for 0 -->

           
              </div>
</td>
                  </tr>
                  @endforeach
                 
                </tbody>
              </table>
@endsection