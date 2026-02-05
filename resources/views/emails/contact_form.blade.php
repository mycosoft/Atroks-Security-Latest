<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f6f9;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 30px;
        }
        .header {
            background-color: #1a237e;
            color: white;
            padding: 20px;
            text-align: center;
            margin: -30px -30px 20px -30px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .field {
            margin-bottom: 15px;
        }
        .label {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }
        .value {
            color: #555;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
        .message-box {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #ff6b00;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            text-align: center;
            color: #666;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Contact Form Message</h1>
        </div>

        <div class="field">
            <div class="label">Name:</div>
            <div class="value">{{ $data['name'] }}</div>
        </div>

        <div class="field">
            <div class="label">Email:</div>
            <div class="value">{{ $data['email'] }}</div>
        </div>

        <div class="field">
            <div class="label">Phone:</div>
            <div class="value">{{ $data['phone'] }}</div>
        </div>

        @if(!empty($data['subject']))
        <div class="field">
            <div class="label">Subject:</div>
            <div class="value">{{ $data['subject'] }}</div>
        </div>
        @endif

        <div class="field">
            <div class="label">Message:</div>
            <div class="message-box">
                {!! nl2br(e($data['message'])) !!}
            </div>
        </div>

        <div class="footer">
            <p>This email was sent from the contact form on Atroks Security Services website.</p>
            <p>Reply to: {{ $data['email'] }}</p>
        </div>
    </div>
</body>
</html>
