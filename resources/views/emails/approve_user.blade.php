<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Congratulations! Your Account has been Approved</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #FE6800;
            color: #ffffff;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .container {
            width: 80%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            color: #ffffff;
        }

        p {
            margin: 20px 0;
            font-size: 16px;
        }

        strong {
            color: #FE6800;
        }

        .login-btnn {
            display: inline-block;
            padding: 15px;
            background-color: #FE6800;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }

        a:hover {
            background-color: #D45C00;
        }

        .logo {
            width: 80px;
            height: auto;
            margin-bottom: 20px;
        }

        .attribution {
            margin-top: 20px;
            font-size: 12px;
            color: #ffffff;
        }

        .attribution a {
            color: #ffffff;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <img class="logo" src="{{ asset('public/assets/img/logo/logo.jpg') }}" alt="GetClout">

        <h1>Congratulations! Your Account has been Approved</h1>

        <p>Dear {{ $user->name }},</p>

        <p>We are pleased to inform you that your account has been approved.</p>
        <p>Your new password is: <strong>{{ $password }}</strong></p>

        <p>
            <a class="login-btnn" href="{{ url('/') }}">
                Login to Your Account
            </a>
        </p>

        <p>Thank you for choosing our service.</p>

        <p class="attribution">Template by <a href="https://apnadevs.com/" target="_blank">ADevs</a></p>
    </div>
</body>

</html>
