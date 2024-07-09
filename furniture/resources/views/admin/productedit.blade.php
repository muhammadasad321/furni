@extends('admin.layout')

@section('admin.productedit')

<div class="card">
            <div class="card-body">
         
              <h5 class="card-title">Update Product</h5>

              <!-- Vertical Form -->
              <form class="row g-3" enctype="multipart/form-data" action="{{url('admin/productupdate')}}" method="post">
    @csrf
@foreach($productdata as $data)

<input type="hidden" name="id" id="inputNanme4" value="{{$data['id']}}" class="form-control">
              <div class="col-12">
                  <label for="inputNanme4" class="form-label">Product Name</label>
                  <input type="text" class="form-control" name="name" value="{{$data['name']}}" id="inputNanme4" placeholder="Enter Product name" >
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Product Price</label>
                  <input type="text" class="form-control" name="price" value="{{$data['price']}}" id="inputNanme4" placeholder="Enter Product price" >
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Product Quantity</label>
                  <input type="text" class="form-control" name="quantity" value="{{$data['quantity']}}" id="inputNanme4" placeholder="Enter Product Quantity" >
                </div>
                <div class="col-12">
                  <label class="col-sm-2 col-form-label">Select Category</label>
                  <div class="col-sm-12">
                    <select class="form-select" name="category_id" aria-label="Default select example" required>
                      <option  value="{{$data['category_id']}}">{{$data['category_name']}}</option>

                      @foreach($CategoryList as $list)
                      <option value="{{$list->id}}">{{$list->name }}</option>
                     @endforeach
                    </select>
                  </div>
                </div>
               
               
              <div class="col-12">
    <label class="col-sm-2 col-form-label">Select Color</label>
    <div class="col-sm-12">
        <select class="form-select" name="color_ids[]" aria-label="Default select example" required multiple>
            @foreach($ColorList as $color)
            <option value="{{$color->id}}" @if(in_array($color->id, $selectedColors)) selected @endif>{{$color->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="col-12">
    <label class="col-sm-2 col-form-label">Select Size</label>
    <div class="col-sm-12">
        <select class="form-select" name="size_ids[]" aria-label="Default select example" required multiple>
            @foreach($SizeList as $size)
            <option value="{{$size->id}}" @if(in_array($size->id, $selectedSizes)) selected @endif>{{$size->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-12">
    <label for="inputAddress" class="form-label">Image</label>
    <input type="file" class="form-control" id="inputAddress" accept=".jpg,.png" name="image" value="{{$data['image']}}">
    <img src="{{asset('upload/images/'.$data['image'])}}" alt="" style="width:10%">
</div>

                 
                  <div class="col-12">
    <label for="inputAddress" class="form-label">Product gallery</label>
    <!-- Hidden input field to store the ID or file path of the existing image -->
    @foreach ($productgalleryexisting as $image)

    <input type="hidden" name="existing_image_path" value="{{ $image->image_path }}">
@endforeach
    <!-- File input field for uploading a new image -->
    <input type="file" class="form-control" id="inputAddress" name="image_path[]" multiple accept=".jpg,.png">

    <!-- Display existing Product images -->
    @foreach ($productgalleryimages as $image)
<img src="{{ asset('upload/gallery/'. $image->image_path) }}" alt="Product Image" style="width:10%; margin:12px" >

<a href="{{url('admin/imagedelete/'.$image->id)}}"><button class="btn btn-danger">delete</button></a>
@endforeach
   
</div>

        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Enter Product description</h5>

              <!-- TinyMCE Editor -->
              <textarea class="tinymce-editor" name="description"  required>
              {{$data['description']}}
              </textarea><!-- End TinyMCE Editor -->

            </div>
          </div>
          
                <div class="text-center">
                    <h1 class="card-title">Seo Section</h1>
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Meta title</label>
                  <input type="text" class="form-control" name="meta_title" id="inputNanme4" value="{{$data['meta_title']}}" required placeholder="Enter application meta title">
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Meta description</label>
                  <input type="text" class="form-control" id="inputNanme4" name="meta_desc" value="{{$data['meta_desc']}}" required placeholder="Enter application meta description">
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Meta Keyword</label>
                  <input type="text" class="form-control" id="inputNanme4" name="meta_keyword" value="{{$data['meta_keyword']}}" required placeholder="Enter application meta keyword">
                </div>
                @endforeach
                <div class="text-left">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>
@endsection


