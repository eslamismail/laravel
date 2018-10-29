@component('mail::message')
Welcome to Mine blog

The body of your message.

- one
- two 
- three
@component('mail::button', ['url' => 'http://127.0.0.1:8000/posts/create'])
Publish your first post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
