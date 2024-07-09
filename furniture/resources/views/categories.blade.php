@extends('layout')
<title>{{$category->name}}</title>
@section('categories')


    <!-- Page Header Start -->
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px;background:#3b5d50">
            <h1 class="font-weight-semi-bold text-uppercase mb-3 text-white">{{$category->name}}</h1>
            <div class="d-inline-flex">
                <p class="m-0  text-white"><a href="" class="text-white">Home</a></p>
                <p class="m-0 px-2 text-white">-</p>
                <p class="m-0 text-white">{{$category->name}} Page</p>
            </div>
        </div>
    <!-- Page Header End -->


    <!-- Shop Start -->
    <div class="product-section">
			<div class="container">
                <div class="row">
					<!-- Start Column 2 -->
                    @foreach($products as $data)

					<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
						<a class="product-item" href="{{ url('product/' . $data->id . '/' . $data->slug) }}">
                        <div class="product-image">
							<img src="{{asset('upload/images/'.$data->image)}}" class="img-fluid product-thumbnail">
							</div>							<h3 class="product-title">{{$data->name}}</h3>
							<strong class="product-price">{{$data->price}}</strong>

							<span class="icon-cross">
								<img src="{{asset('frontendassets/images/cross.svg')}}" class="img-fluid">
							</span>
						</a>
					</div> 
                    @endforeach
			

                    </div>

				
			</div>
		</div>
    <!-- Shop End -->




@endsection