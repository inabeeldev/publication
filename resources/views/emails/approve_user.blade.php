<!-- resources/views/emails/approve_user.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Congratulations! Your Account has been Approved</title>
</head>
<body>
    <h1>Congratulations! Your Account has been Approved</h1>

    <p>Dear {{ $user->name }},</p>

    <p>We are pleased to inform you that your account has been approved.</p>
    <p>Your new password is: <strong>{{ $password }}</strong></p>

    <p>
        <a href="{{ url('/login') }}" style="display:inline-block;padding:10px;background-color:#3490dc;color:#ffffff;text-decoration:none;">
            Login to Your Account
        </a>
    </p>

    <p>Thank you for choosing our service.</p>

    <p>Best regards,<br>GetClout</p>
</body>
</html>
