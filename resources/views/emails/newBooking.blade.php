@component('mail::message')
Hello,

We would like you to know that a NEW booking is created for you!
Here is all the information you need to know:

<p>Booking ID</p>
<p>{{ $booking['id'] }}</p>

<p>Location</p>
<p> {{ $location['name'] }}</p>

<p>Services</p>
@foreach($services as $service)
    <p> {{ $service }} </p>
@endforeach



@component('mail::button', ['url' => ''])
Log In
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
