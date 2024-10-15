<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Organic Print Studio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 20px;
        }
        .content {
            padding: 20px;
        }
        .footer {
            background-color: #f1f1f1;
            text-align: center;
            padding: 10px;
            font-size: 12px;
            color: #777;
        }
        a {
            color: #4CAF50;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Welcome to Organic Print Studio!</h1>
    </div>
    <div class="content">
        <p>Hi <?= h($to_email) ?>,</p>
        <p>Thank you for registering with Organic Print Studio. We are excited to have you on board!</p>
        <p>Here is your first step towards exploring our platform:</p>
        <ul>
            <li>Log in to your account and explore our features.</li>
            <li>Check out the latest designs and prints.</li>
            <li>If you have any questions, feel free to <a href="mailto:support@organicprintstudio.com">contact us</a>.</li>
        </ul>
        <p>We look forward to working with you!</p>
        <p>Best regards,<br>Organic Print Studio Team</p>
    </div>
    <div class="footer">
        <p>&copy; <?= date('Y') ?> Organic Print Studio. All rights reserved.</p>
    </div>
</div>
</body>
</html>
