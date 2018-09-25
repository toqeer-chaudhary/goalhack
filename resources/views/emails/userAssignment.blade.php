@component('mail::message')
Dear <b>{{ ucFirst($userName) }}</b> Welcome,

You are assigned a <b>{{ ucFirst($functionality) }}</b>  "{{ ucFirst($functionalityName) }}"
<br>
Please Login to process further
@component('mail::button', ['url' => 'http://127.0.0.1:8000/login'])
Login
@endcomponent

Thanks,<br>
From <b>{{ ucFirst($managerName) }}</b>
@endcomponent
