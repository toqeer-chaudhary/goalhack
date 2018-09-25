@component('mail::message')
Dear <b>{{ ucFirst($userName) }}</b> Welcome,

It is to inform you that the data you entered on <b>"{{ $actualDate }} "</b>  is "{{ ucFirst($status) }}"
<br>
Comments By The Manager : <b> {{ $comment }}</b>
@component('mail::button', ['url' => 'http://127.0.0.1:8000/login'])
Login
@endcomponent

Thanks,<br>
From <b>{{ ucFirst($managerName) }}</b>
@endcomponent
