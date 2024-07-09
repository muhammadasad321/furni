@extends('layout')
@section('title', $MetaDetail->meta_title)
@section('meta_keyword', $MetaDetail->meta_keyword)
@section('meta_desc', $MetaDetail->meta_desc)
@section('product')

    <!-- Page Header Start -->
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px;background:#3b5d50" >
            <h1 class="font-weight-semi-bold text-uppercase mb-3 text-white">Products</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="" class="text-white">Home</a></p>
                <p class="m-0 px-2 text-white">-</p>
                <p class="m-0 text-white">Product Page</p>
            </div>
        </div>
    <!-- Page Header End -->
    @if(session('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{session('message')}}
              </div>
              @endif

    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">

            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner  ">
        @foreach($productimages as $key => $data)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img class="d-block w-100" src="{{ asset('upload/gallery/' . $data->image_path) }}" style="border-radius:20px" alt="Image {{ $key + 1 }}">
            </div>
        @endforeach
     </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>
@foreach($result as $data)
            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{$data->name}}</h3>
              
                <h3 class="font-weight-semi-bold mb-4">Rs. {{$data->price}}</h3>
                
                <p class="mb-4">{!! $data->description !!}</p>

<form action="{{url('addtocart')}}" method="post">
    @csrf
    <input type="hidden" name="product_id" id="product_id" value="{{$data->id}}">
    <input type="hidden" name="customer_id" id="customer_id" value="{{session('id')}}">
    <div class="col-5 d-flex">
        <label class="col-sm-6 col-form-label font-weight-bold text-dark">Select Size</label>
        <div class="col-sm-12">
            <select class="form-control" id="size_id" name="size_id" aria-label="Default select example" required>
                @foreach($selectedSizes as $sizeId)
                    @php
                        $size = App\Models\Size::find($sizeId);
                    @endphp
                    <option value="{{$size->id}}">{{$size->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-5 d-flex mt-3">
        <label class="col-sm-6 col-form-label font-weight-bold text-dark">Select Color</label>
        <div class="col-sm-12 d-flex">
                @foreach($selectedColors as $colorId)
                    @php
                        $color = App\Models\Color::find($colorId);
                    @endphp
                    <div class="form-check">
                    <input class="form-check-input"  type="radio" name="color_id" id="color_id" value="{{$color->id}}" required style="display:none;cursor:pointer">
                    <label class="form-check-label" for="color{{$color->id}}">
                        <div class="color-option" style="cursor:pointer;background-color: {{$color->name}};"></div>
                    </label>
                     </div>                @endforeach
        </div>
    </div>
    <style>
    /* Styling for color radio buttons */

</style>


    <div class="d-flex align-items-center mb-4 pt-2">
    <div class="input-group quantity mr-3" style="width: 200px;">
    <div class="input-group-btn">
        <button class="btn btn-primary btn-minus" type="button" style="
            border-top-right-radius: 0px;
            border-bottom-right-radius: 0px;
            border-top-left-radius: 5px ;
            border-bottom-left-radius: 5px;">
            <i class="fa fa-minus"></i>
        </button>
    </div>
    <input type="number" class="form-control text-center quantity-input" id="quantity" max="{{$data->quantity}}" value="1" min="1" readonly >
    <div class="input-group-btn">
        <button class="btn btn-primary btn-plus" style="
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            border-top-left-radius: 0px ;
            border-bottom-left-radius: 0px;" type="button">
            <i class="fa fa-plus"></i>
        </button>
    </div>
</div>
        @if(Session::get('name'))
            <button class="btn btn-primary px-3 add-to-cart mx-5" type="submit"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
        @else
            <a href="{{url('login')}}" class="btn btn-primary px-3 mx-5" ><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</a>
        @endif
    </div>
</form>

            </div>
        </div>
        @endforeach

    </div>
    <!-- Shop Detail End -->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
<script>
    $(document).ready(function() {
        $('.add-to-cart').on('click', function(e) {
            e.preventDefault();
            var productId = $('#product_id').val();
            var sizeId = $('#size_id').val();
            var colorId = $('#color_id').val();
            var customerId = $('#customer_id').val();
            var quantity = $('#quantity').val();
            $.ajax({
                url: '/addtocart',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    size_id: sizeId,
                    color_id: colorId,
                    customer_id: customerId,
                    quantity: quantity
                },
                success: function(response) {
                    alert(response.message);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
<script>
    document.querySelectorAll('.color-option').forEach(option => {
        option.addEventListener('click', () => {
            // Remove border from previously selected option
            document.querySelectorAll('.color-option').forEach(option => {
                option.classList.remove('selected');
            });

            // Add border to the clicked option
            option.classList.add('selected');
        });
    });
</script>
<script>
    $(document).ready(function() {
        var max = parseInt($('#quantity').attr('max'));

        $('#quantity').on('input', function() {
            var val = parseInt($(this).val());
            if (val > max) {
                $(this).val(max);
            }
        });

        $('.btn-plus').click(function() {
            var input = $('#quantity');
            var val = parseInt(input.val());
            if (val < max) {
                input.val(val + 1);
            } else {
                input.val(max);
            }
        });

        $('.btn-minus').click(function() {
            var input = $('#quantity');
            var val = parseInt(input.val());
            if (val > 1) {
                input.val(val - 1);
            }
        });
    });
</script>

@endsection