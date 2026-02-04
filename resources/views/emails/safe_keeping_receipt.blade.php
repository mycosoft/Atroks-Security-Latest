<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Safe Keeping Record - {{ $record->reference_number }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f6f9;
        }
        .receipt-container {
            max-width: 800px;
            margin: auto;
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 0;
            position: relative;
            background-image: radial-gradient(#e0e0e0 1px, transparent 1px);
            background-size: 10px 10px;
        }
        .header {
            padding: 20px;
            border-bottom: 2px solid #000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo-section {
            width: 20%;
            text-align: center;
        }
        .logo-text {
            color: #1a237e;
            font-weight: bold;
            font-size: 24px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .logo-sub {
            font-size: 8px;
            color: #666;
        }
        .title-section {
            width: 60%;
            text-align: center;
        }
        .title-main {
            font-weight: 900;
            font-size: 22px;
            text-transform: uppercase;
        }
        .title-sub {
            font-weight: bold;
            font-size: 18px;
        }
        .date-section {
            width: 20%;
            text-align: right;
            font-weight: bold;
            font-size: 14px;
        }

        .client-info {
            padding: 15px 20px;
            background-color: #e0e0e0;
            display: flex;
            font-size: 14px;
            font-weight: bold;
        }
        .client-label {
            width: 25%;
        }
        .client-details {
            width: 75%;
            font-family: 'Courier New', Courier, monospace;
            text-transform: uppercase;
        }

        .details_section {
            padding: 20px;
            border: 2px solid #000;
            margin: 20px;
            font-weight: bold;
            background-color: rgba(255, 255, 255, 0.8);
        }
        .details-text {
            font-size: 16px;
            line-height: 1.5;
        }
        .details-note {
            margin-top: 10px;
            font-size: 14px;
            border-top: 1px solid #000;
            padding-top: 5px;
        }

        .footer {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }
        .ref-section {
            font-weight: bold;
            font-size: 16px;
        }
        .qr-section {
            margin-top: 10px;
        }
        .sign-section {
            text-align: center;
        }
        .sign-line {
            border-bottom: 1px solid #000;
            width: 200px;
            margin-bottom: 5px;
        }
        .sign-label {
            font-weight: bold;
            font-size: 12px;
        }
    </style>
</head>
<body>

<div class="receipt-container">
    <div class="header">
        <div class="logo-section">
            <div class="logo-text">ATROKS</div>
            <div class="logo-sub">>> SECURITY SERVICES LIMITED <<</div>
        </div>
        <div class="title-section">
            <div class="title-main">SKR - SAFE KEEPING RECORD</div>
            <div class="title-sub">(SKR)</div>
        </div>
        <div class="date-section">
            Date: {{ optional($record->stored_at)->format('d/m/Y') ?? 'N/A' }}
        </div>
    </div>

    <div class="client-info">
        <div class="client-label">
            Customer / Client:<br><br>
            {{ $record->shipper_name }}
        </div>
        <div class="client-details">
            @if($record->client)
                {{ $record->client->name }}<br>
                {!! nl2br(e($record->client->address)) !!}
                @if($record->client->phone_number)
                    <br>Phone: {{ $record->client->phone_number }}
                @endif
                @if($record->client->email)
                    <br>Email: {{ $record->client->email }}
                @endif
            @else
                <em>No client information available</em>
            @endif
        </div>
    </div>
    
    <div style="padding: 5px 20px; font-weight:bold;">Details:</div>

    <div class="details_section">
        <div class="details-text">
            Atroks Security Services Confirms receipt of {{ $record->weight }} of {{ $record->item_description }} from the above mentioned shipper for safe custody
        </div>
        <div class="details-note">
            The consignment will be released upon payment of taxes and other dues.
        </div>
    </div>

    <div class="footer">
        <div class="left-col">
            <div class="ref-section">
                Ref No. {{ $record->reference_number }}
            </div>
            <div class="qr-section">
                {!! $qrCode !!}
            </div>
        </div>
        <div class="sign-section">
            <div style="font-family: 'Brush Script MT', cursive; font-size: 24px; color: blue;">Signed</div>
            <div class="sign-line"></div>
            <div class="sign-label">SIGN:</div>
            <div class="sign-label" style="font-size: 10px;">FOR: Atroks Security Services Limited</div>
        </div>
    </div>
</div>

<p style="text-align: center; margin-top: 20px; color: #666;">
    This is an automated email from Atroks Security Services. Please do not reply to this email.
</p>

</body>
</html>
