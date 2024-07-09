@extends('layout')
@section('title', 'Profile page ')

@section('profile')
<div class="account-form" style="width:30em; margin:2em auto;">
@if(session('message'))
<div class="alert alert-success" role="alert">
{{session('message')}}
              </div>
              @endif
              
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <h1>Profile</h1>
        <form id="registrationForm" action="{{url('profileupdate/')}}" method="POST">
            @csrf

            <input type="hidden" id="id" name="id" value="{{ session('id') }}"required placeholder="Enter Your Name">
<div class="profile-section">
            <div class="control-group d-flex flex-column">
                <label for="name">Name:</label>
                <input class="form-control" type="text" id="name" name="name" value="{{ session('name') }}"required placeholder="Enter Your Name">
            </div>
            <div class="control-group d-flex flex-column">
                <label for="email">Email:</label>
                <input class="form-control" type="email" id="email" name="email"value="{{ session('email') }}" required placeholder="Enter Your Email">
            </div>
            <div class="control-group d-flex flex-column">
                <label for="mobile">Mobile:</label>
                <input class="form-control" type="tel" id="mobile" name="mobile"value="{{ session('mobile') }}"  required placeholder="Enter Your Mobile">
            </div>
            <div class="control-group d-flex flex-column">
                <label for="password">Password:</label>
                <input class="form-control" type="password" id="password" name="password"value="" autocomplete="new-password"   placeholder="Leave Blank if you don't want to update password">
            </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary btn-submit">Update</button>
        </form>
    </div>
    
  @endsection