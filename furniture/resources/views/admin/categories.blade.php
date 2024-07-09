@extends('admin.layout')

@section('admin.categories')
<div class="col-lg-12">
<div class="card">
            <div class="card-body">
              <br>
              @if(session('success'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
{{ session('success') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
          
              <h5 class="card-title">Add Categories</h5>

              <!-- Vertical Form -->
              <form class="row g-3" action="{{url('admin/categorystore')}}" method="post">
                @csrf
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Category Name</label>
                  <input type="text" placeholder="category name" name="name" class="form-control" id="inputNanme4" required>
                </div>
             
                 
                <div class="text-left">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>
</div>
          @endsection