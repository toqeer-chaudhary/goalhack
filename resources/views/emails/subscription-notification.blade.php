@component('mail::message')

    <h1>Payment Successfully Recieved</h1>
    Your Liciense Key ('{{$key}}') has been created along with your subscription plan.
Please Login to process further
@component('mail::button', ['url' => 'http://127.0.0.1:8000/login'])
Login GoalHack
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
