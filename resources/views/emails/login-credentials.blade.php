@component('mail::message')
# As suas credenciais para fazer login a {{ config('app.name')}}

Use estas credencias para fazer login no sistema.
@component('mail::table')
    | Username | Senha |
    |:---------|:------|
    | {{$user->email}} | {{$password}} |
@endcomponent

@component('mail::button', ['url' => url('login')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
