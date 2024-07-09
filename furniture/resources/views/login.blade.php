@extends('layout')
<title>Login Page</title>
@section('contact')

<script>
    // Wait for the DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        var toggleButton = document.getElementById('togglePassword');
        var passwordField = document.getElementById('password');
        var eyeIcon = document.getElementById('eyeIcon');

        // Check if all elements are present
        if (toggleButton && passwordField && eyeIcon) {
            toggleButton.addEventListener('click', function() {
                // Toggle password visibility
                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    eyeIcon.classList.remove('fa-eye-slash');
                    eyeIcon.classList.add('fa-eye');
                } else {
                    passwordField.type = 'password';
                    eyeIcon.classList.remove('fa-eye');
                    eyeIcon.classList.add('fa-eye-slash');
                }
            });
        } else {
            console.error('One or more elements not found');
        }
    });
</script>

    <!-- Page Header Start -->
    @if(session('failed'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
{{session('failed')}}
</button>
              </div>
              @endif

              @if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{session('success')}}
</button>
              </div>
              @endif
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px;background:#3b5d50">
            <h1 class="font-weight-semi-bold text-uppercase mb-3 text-white">Login</h1>
            <div class="d-inline-flex">
                <p class="m-0 text-white"><a href="{{url('/')}}" class="text-white">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0 text-white">Login</p>
            </div>
        </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Login Form</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form name="sentMessage" action="{{url('/login-submit')}}" method="post" id="contactForm" novalidate="novalidate">
                    @csrf   
                    
                        <div class="control-group">
                            <input type="email" class="form-control"name="email" id="email" placeholder="Your Email"
                                required="required" data-validation-required-message="Please enter your email" />
                            <p class="help-block text-danger"></p>
                        </div>
                       
                        <div class="control-group d-flex">
                        <input type="password" class="form-control"name="password" id="password" placeholder="Your Password"
                                required="required" data-validation-required-message="Please enter a password" />
                                <button class="btn btn-outline-secondary" style="border-radius:10px" type="button" id="togglePassword">
                        <i class="fa fa-eye-slash" id="eyeIcon"></i>
                    </button>
                            <p class="help-block text-danger"></p>
                        </div>
                        <br>    
                        <div class="control-group">
                            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Login</button>
                        </div>
                        <br>
                        <div class="control-group">
                        <a href="{{url('forgot')}}" class="btn btn-primary py-2 px-4">Forgot Password</a>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Contact End -->
  
@endsection