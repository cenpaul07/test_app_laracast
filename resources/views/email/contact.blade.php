@component('mail::message')
# Introduction

The body of your message.

- so good
- will this work

Let Us Try Numbers

1.Apple
2. Banana

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

@component('mail::button',['url' => 'https://www.laracast.com'])
    Laracast
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
