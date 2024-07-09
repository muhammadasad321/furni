
@extends('layout')
<title>Reset Password</title>
@section('reset')

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
        <h1>Reset Password</h1>
        <form id="forgotPasswordForm" action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required placeholder="Enter New Password">
            </div>
            <button type="submit" class="btn btn-primary py-2 px-4">Submit</button>
        </form>
    </div>

    @endsection
