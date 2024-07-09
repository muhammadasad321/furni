
@extends('layout')
<title>forgot Password</title>
@section('forgotpassword')

    <div class="container-login">
    @if(session('error'))
<div class="alert" role="alert" style="background-color:rgb(247, 96, 96);border-color:red;color:red;">
{{session('error')}}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="border-color:red"><i class='bx bx-x' style="color:red;"></i></button>
              </div>
              @endif
              @if(session('success'))
<div class="alert" role="alert" style="background-color:lightgreen;border-color:green;color:green;">
{{session('success')}}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="border-color:green"><i class='bx bx-x' style="color:green;"></i></button>
              </div>
              @endif
        <h1>Forgot Password</h1>
        <form id="forgotPasswordForm" action="{{url('forgotpassword/')}}" method="POST">
            @csrf
            <div class="control-group">
                            <input type="email" class="form-control"name="email" id="email" placeholder="Your Email"
                                required="required" data-validation-required-message="Please enter your email" />
                            <p class="help-block text-danger"></p>
                        </div>
            <button type="submit" class="btn btn-primary btn-submit">Submit</button>
        </form>
        <a href="{{url('login/')}}" class="btn btn-primary py-2 px-4">Login</a>
    </div>

    @endsection
