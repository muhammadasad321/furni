<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="keywords" content="@yield('meta_keyword')">
    <meta name="description" content="@yield('meta_desc')">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <link href="{{asset('frontendassets/css/tiny-slider.css')}}" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
	<link href="{{asset('frontendassets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('frontendassets/css/style.css')}}" rel="stylesheet">


</head>

<body>
  
		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="{{url('/')}}">Furni<span>.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="nav-item active">
							<a class="nav-link" href="{{url('/')}}">Home</a>
						</li>
						

						<li><a class="nav-link" href="{{url('allproducts')}}">Shop</a></li>
						<li><a class="nav-link" href="{{url('about')}}">About us</a></li>
						<li><a class="nav-link" href="{{url('contact')}}">Contact us</a></li>
						<div class="dropdown show">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Shop by categories  </a>

  <div class="dropdown-menu" style="background:transparent;border:none; " aria-labelledby="dropdownMenuLink">
  @foreach($CategoryList as $data)
                        <a href="{{url('categories/'.$data->id)}}" class="nav-item nav-link" style="color:black; background:white; margin:5px 0;border-radius:10px">{{$data->name}}</a>
                        @endforeach
  </div>
</div>
					</ul>
					@if(Session::get('name'))
					<div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="color:white"><i class='bx bx-user-circle' style="color:white;font-size:30px"></i></a>
                                <div class="dropdown-menu rounded-0 m-0">
                                <a href="{{url('profile/')}}" class="dropdown-item">Profile</a>

                                <a href="{{url('account/')}}" class="dropdown-item">Account</a>
                                    <a href="{{url('cart/')}}" class="dropdown-item">Shopping Cart</a>
                                    <a href="{{url('checkout/')}}" class="dropdown-item">Checkout</a>
                                </div>
                            </div>
                        <a href="{{('/logout')}}" class="nav-item nav-link text-white"><i class='bx bx-log-out' style="font-size:30px; color:white"></i></a>
						<a class="nav-link" href="{{url('cart')}}"><i class='bx bx-cart-alt' style="font-size:30px; color:white"></i></a>
                       
            @else
					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<li style="display:flex;justify-content:center;align-items:center"><a class="nav-link" href="{{url('login')}}"><i class='bx bx-log-in' style="font-size:30px; color:white"></i></a> | <a class="nav-link" href="{{url('register')}}"><i class='bx bx-user-plus' style="font-size:30px; color:white"></i></a></li>
						<li><a class="nav-link" href="{{url('cart')}}"><i class='bx bx-cart-alt' style="font-size:30px; color:white"></i></a></li>
					</ul>
					@endif
				</div>
			</div>
				
		</nav>
		<!-- End Header/Navigation -->


@yield('index')

@yield('contact')
@yield('register')
@yield('search')
@yield('allproducts')
@yield('product')
@yield('cart')
@yield('categories')
@yield('checkout')
@yield('account')
@yield('thankyou')
@yield('verifymail')
 @yield('profile')
 @yield('forgotpassword')
 @yield('reset')
 @yield('about')
     <!-- Start Footer Section -->
		<footer class="footer-section">
			<div class="container relative">

				<div class="sofa-img">
					<img src="{{asset('frontendassets/images/sofa.png')}}" alt="Image" class="img-fluid">
				</div>

				<div class="row">
					<div class="col-lg-8">
						<div class="subscription-form">
							<h3 class="d-flex align-items-center"><span class="me-1"><img src="{{asset('frontendassets/images/envelope-outline.svg')}}" alt="Image" class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

							<form action="#" class="row g-3">
								<div class="col-auto">
									<input type="text" class="form-control" placeholder="Enter your name">
								</div>
								<div class="col-auto">
									<input type="email" class="form-control" placeholder="Enter your email">
								</div>
								<div class="col-auto">
									<button class="btn btn-primary">
										<span class="fa fa-paper-plane"></span>
									</button>
								</div>
							</form>

						</div>
					</div>
				</div>

				<div class="row g-5 mb-5">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Furni<span>.</span></a></div>
						<p class="mb-4">Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant</p>

						<ul class="list-unstyled custom-social">
							<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
						</ul>
					</div>

					<div class="col-lg-8">
						<div class="row links-wrap">
							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">About us</a></li>
									<li><a href="#">Services</a></li>
									<li><a href="#">Blog</a></li>
									<li><a href="#">Contact us</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Support</a></li>
									<li><a href="#">Knowledge base</a></li>
									<li><a href="#">Live chat</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Jobs</a></li>
									<li><a href="#">Our team</a></li>
									<li><a href="#">Leadership</a></li>
									<li><a href="#">Privacy Policy</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Nordic Chair</a></li>
									<li><a href="#">Kruzo Aero</a></li>
									<li><a href="#">Ergonomic Chair</a></li>
								</ul>
							</div>
						</div>
					</div>

				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> Distributed By <a hreff="https://themewagon.com">ThemeWagon</a>  <!-- License information: https://untree.co/license/ -->
            </p>
						</div>

						<div class="col-lg-6 text-center text-lg-end">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>

					</div>
				</div>

			</div>
		</footer>
		<!-- End Footer Section -->	



    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('frontendassets/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('frontendassets/js/tiny-slider.js')}}"></script>
		<script src="{{asset('frontendassets/js/custom.js')}}"></script>

 
</body>

</html>