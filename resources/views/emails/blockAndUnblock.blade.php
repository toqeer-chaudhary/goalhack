@component('mail::message')
Dear <b>{{ ucFirst($userName) }}</b> Welcome,

<b>{{ $comment }}</b>
<br>
@component('mail::button', ['url' => 'http://127.0.0.1:8000/login'])
Login
@endcomponent

Thanks,<br>
From <b>{{ ucFirst($managerName) }}</b>
@endcomponent
