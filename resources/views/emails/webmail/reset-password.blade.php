<!DOCTYPE html>
<html>
<head>
    <title>Reset Your Password</title>
</head>
<body>
    <h1>Reset Your Password</h1>

    <p>Hello,</p>

    <p>You are receiving this email because a password reset request was made for your email account.</p>

    <p>
        <a href="{{ route('webmail.reset-password', ['token' => $resetToken]) }}"
           style="background-color: #4CAF50; color: white; padding: 14px 20px; text-decoration: none; border-radius: 4px;">
            Reset Password
        </a>
    </p>

    <p>If you did not request a password reset, no further action is required.</p>

    <p>
        Thanks,<br>
        {{ config('app.name') }}
    </p>
</body>
</html>