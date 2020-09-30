@component('mail::message')
# One more step before joining Bahadcasts

We need you to confirm your email

@component('mail::button', ['url' => route('confirm-email') . '?token=' .$user->confirm_token_])
Confirm Email
@endcomponent

Thanks,<br>
x.bling Consultants
@endcomponent
