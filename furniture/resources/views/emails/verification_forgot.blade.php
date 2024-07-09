@component('mail::message')

<p>Hello {{$user->name}}</p>

@component('mail::button',['url'=> url('reset',$user->verification_token)])
Reset your password
@endcomponent

<p>In case you have issue please contact out contact us.</p>

Thank you.




@endcomponent