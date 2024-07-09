@extends('admin.layout')

@section('admin.addproduct')


<div class="card">
  <div class="card-body">

    <h5 class="card-title">Add Product</h5>

    <!-- Vertical Form -->
    <form class="row g-3" id="uploadForm" enctype="multipart/form-data" action="{{ url('admin/productstore') }}"
      method="post">
      @csrf
      <div class="col-12">
        <label for="inputNanme4" class="form-label">Product Title</label>
        <input type="text" class="form-control" name="name" id="inputNanme4" placeholder="Enter Product title"
          required>
      </div>

      <div class="col-12">
        <label class="col-sm-2 col-form-label">Select Category</label>
        <div class="col-sm-12">
          <select class="form-select" name="category_id" aria-label="Default select example" required>
            <option selected>Select application category</option>
            @foreach($CategoryList as $data)
            <option value="{{$data->id}}">{{$data->name }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="col-6">
        <label for="inputNanme4" class="form-label">Product price</label>
        <input type="text" class="form-control" name="price" id="inputNanme4" placeholder="Enter Product price"
          required>
      </div>
      <div class="col-6">
        <label for="inputNanme4" class="form-label">Product quantity</label>
        <input type="text" class="form-control" name="quantity" id="inputNanme4"
          placeholder="Enter Product tags(languages used)" required>
      </div>

      <div class="col-6">
        <label class="col-sm-12 col-form-label">Select Size (Hold ctrl-key to select multiple size)</label>
        <div class="col-sm-12">
          <select class="form-select" name="size_ids[]" aria-label="Default select example" required multiple>
            <option value="">Select product size</option>

            @foreach($SizeList as $data)

            <option value="{{$data->id}}">{{$data->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-6">
        <label class="col-sm-12 col-form-label">Select Color (Hold ctrl-key to select multiple color)</label>
        <div class="col-sm-12">
          <select class="form-select" name="color_ids[]" aria-label="Default select example" required multiple>
            <option value="">Select product color</option>

            @foreach($ColorList as $data)

            <option value="{{$data->id}}" style="background-color: {{$data->name}};">{{$data->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-12">
        <label for="inputAddress" class="form-label">Main Image</label>
        <input type="file" class="form-control" id="inputAddress" name="image" required accept="image/*">
      </div>
      <div class="col-12">
        <label for="inputAddress" class="form-label">Images Gallery</label>
        <input type="file" class="form-control" id="inputAddress" name="image_path[]" required multiple
          accept="image/*">
      </div>




  
      <div class="card">
    <div class="card-body">
      <h5 class="card-title">Enter Product description</h5>

      <!-- TinyMCE Editor -->
      <textarea class="tinymce-editor" name="description" required>

              </textarea><!-- End TinyMCE Editor -->

    </div>
  </div>

  <div class="text-center">
    <h1 class="card-title">Seo Section</h1>
  </div>
  <div class="col-12">
    <label for="inputNanme4" class="form-label">Meta title</label>
    <input type="text" class="form-control" name="meta_title" id="inputNanme4" required
      placeholder="Enter application meta title">
  </div>
  <div class="col-12">
    <label for="inputNanme4" class="form-label">Meta description</label>
    <input type="text" class="form-control" id="inputNanme4" name="meta_desc" required
      placeholder="Enter application meta description">
  </div>
  <div class="col-12">
    <label for="inputNanme4" class="form-label">Meta Keyword</label>
    <input type="text" class="form-control" id="inputNanme4" name="meta_keyword" required
      placeholder="Enter application meta keyword">
  </div>
  <div class="text-left">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  </form><!-- Vertical Form -->
  </div>
</div>
</div>

@endsection