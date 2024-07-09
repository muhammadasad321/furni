@extends('layout')
<title>Register Page</title>
@section('register')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    @if(session('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{session('message')}}
</button>
              </div>
              @endif
              <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px;background:#3b5d50" >
            <h1 class="font-weight-semi-bold text-uppercase mb-3 text-white">Registration</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="" class="text-white">Home</a></p>
                <p class="m-0 px-2 text-white">-</p>
                <p class="m-0 text-white">Register</p>
            </div>
        </div>
    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Registration Form</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form name="sentMessage" action="{{url('/register-submit')}}" method="post" id="contactForm" novalidate="novalidate">
                    @csrf   
                    <div class="control-group">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Your Name"
                                required="required" data-validation-required-message="Please enter your name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control"name="email" id="email" placeholder="Your Email"
                                required="required" data-validation-required-message="Please enter your email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control"name="mobile" id="subject" placeholder="Your Mobile"
                                required="required" data-validation-required-message="Please enter a mobile" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                        <input type="password" class="form-control"name="password" id="subject" placeholder="Your Password"
                                required="required" data-validation-required-message="Please enter a password" />
                           
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Register
                                </button>
                        </div>
                    </form>
                </div>
            </div>

</div>
@endsection