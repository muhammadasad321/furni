@extends('admin.layout')

@section('admin.coloredit')
<div class="col-lg-12">
<div class="card">
            <div class="card-body">
              <br>
              @if(session('update'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
{{ session('update') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
          
              <h5 class="card-title">Edit Colors</h5>

              <!-- Vertical Form -->
              <form class="row g-3" action="{{url('admin/ColorUpdate')}}" method="post">
                @csrf

                <input type="hidden" name="id" value="{{$data->id}}" >
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Color Name</label>
                  <input type="text" placeholder="Color Name" name="name" value="{{$data->name}}" class="form-control" id="inputNanme4" required>
                </div>
           
       
                <div class="text-left">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>
</div>

@endsection