@component('mail::message')
# Hello {{ auth()->user()->name }},

You've recently booked a movie via our website, Kindly be at theatre 10 minutes earlier!

Thanks,<br>
{{ config('app.name') }}
@endcomponent
