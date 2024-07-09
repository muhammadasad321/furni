@extends('layout')

<title>Verify Email</title>
@section('verifymain')


@extends('layout')
<title>verify your email</title>
@section('verifymail')
<div class="container-login "style="width:30em;margin:2em auto">
@if(session('error'))
<div class="alert" role="alert" style="background-color:rgb(247, 96, 96);border-color:red;color:red;">
{{session('error')}}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="border-color:red"><i class='bx bx-x' style="color:red;"></i></button>
              </div>
              @endif

              @if(session('success'))
<div class="alert" role="alert" style="background-color:lightgreen;border-color:green;color:green;">
{{session('success')}}
              </div>
              @endif
        <h1>Verify Email</h1>
        <form id="loginForm" action="{{url('verifytoken/')}}" method="post">
            @csrf
            <div class="control-group">
                            <input type="email" class="form-control"name="email" id="email" placeholder="Your Email"
                                required="required" data-validation-required-message="Please enter your email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control"name="token" id="token" placeholder="Enter Your Token"
                                required="required" data-validation-required-message="Please enter your token" />
                            <p class="help-block text-danger"></p>
                        </div>
            <button type="submit" class="btn btn-primary btn-login">Verify</button>
        </form>
</div>
@endsection


@endsection