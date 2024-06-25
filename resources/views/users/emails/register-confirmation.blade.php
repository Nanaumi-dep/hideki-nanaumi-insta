<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
    <style>
        body{
            padding: 50px;
        }

        .email-header{
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #dddddd;
        }

        .email-header h1{
            font-size: 24px;
            color: #333333;
            margin: 0;
        }

        .email-body{
            padding-bottom: 20px;
        }

        .email-body p{
            font-size: 16px;
            color: #2b2929;
            line-height: 1.5;
            margin: 0 0 5px;
        }

        .email-body .name{
            font-weight: bold;
        }

        .email-footer{
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #dddddd;
        }

        .email-footer p{
            font-size: 14px;
            color: #2b2929;
            margin: 0;
        }

        .button{
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            background-color: #0d6efd;
            color: #ffffff;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
        }

    </style>
</head>
<body>
    <div class="email-header">
        <h1>Welcome to Insta App!</h1>
    </div>

    <div class="email-body">

        <p class="name">Hello {{ $name }}</p>
        <p>Thank you for registering.</p>
        <p>To start, please access the website <a href="{{ $app_url }}" class="button">Confirm by Loging in here</a>.</p>
        <p>If you did not sign up for this account, you can ignore this email.</p>
        <p>Best regards, <br> The Team</p>

    </div>

    <div class="email-footer">
        <p>&copy; 2024 Kredo Insta App. All rights reserved.</p>
    </div>

</body>
</html>