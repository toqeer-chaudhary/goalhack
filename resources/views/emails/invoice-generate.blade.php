@component('mail::message')

<h1>Invoice is generated for you</h1>
{{$subscription->subscription}}

@component('mail::button', ['url' => 'http://127.0.0.1:8000/cancel-subscription/'.$subscription->subscription])

Unsubscribe
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
