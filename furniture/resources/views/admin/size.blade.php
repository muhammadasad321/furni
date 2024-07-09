@extends('admin.layout')

@section('admin.size')
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
          
              <h5 class="card-title">Add Sizes</h5>

              <!-- Vertical Form -->
              <form class="row g-3" action="{{url('admin/sizestore')}}" method="post">
                @csrf
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">size Name</label>
                  <input type="text" placeholder="size name" name="name" class="form-control" id="inputNanme4" required>
                </div>
             
                 
                <div class="text-left">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>
</div>
          @endsection