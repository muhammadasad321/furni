@component('mail::message')
Hello,

Thank you for registering. Please use the following verification token to verify your email:

<input type="text" id="verificationToken" value="{{$verificationToken}}" readonly>
<a href="{{url('verify-email/')}}">Verfiy Link</a>

If you did not request this verification, you can ignore this email.
@endcomponent


