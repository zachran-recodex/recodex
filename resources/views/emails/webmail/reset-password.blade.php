<x-mail::message>
# Reset Your Password

Hello,

You are receiving this email because a password reset request was made for your email account.

<x-mail::button :url="route('webmail.reset-password', ['token' => $resetToken])">
Reset Password
</x-mail::button>

If you did not request a password reset, no further action is required.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>