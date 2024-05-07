<!DOCTYPE html>
<html>
<head>
    <title>Farm House Owner Sign UP</title>
</head>
<body>
    <h1>Farm House Owner Sign UP</h1>
    <p>Dear {{ $details['first_name'] }} {{ $details['last_name'] }},</p>
    <p>I hope this email finds you well. Thank you for registering with us.</p>
    <p>To proceed further, please complete the first step verification process by clicking on the <a href="{{ $details['link'] }}">link</a> provided below. Once verified, we will need you to complete your business profile and upload the necessary documents for final approval.
      If you have any queries or need assistance, please do not hesitate to contact us at support@way2village.in.</p>
    <br><br>
    <p>Thank you for your cooperation.</p>
    <p>Best regards,</p>
</body>
</html>