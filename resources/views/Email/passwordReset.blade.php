@component('mail::message')
# Introduction

The body of your message.
{{-- I put that address ,I wanna user after click on it log to framework --}}

@component('mail::button', ['url' => 'http://localhost:8000/ResetPasswordForm/'.$token])
Reset Password Link
@endcomponent



Thanks,<br>
{{ config('app.name') }}
@endcomponent