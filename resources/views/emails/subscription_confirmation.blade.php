<!DOCTYPE html>
<html>
<head>
    <title>Confirm Your Subscription</title>
</head>
<body>
    <h1>Confirm Your Subscription</h1>
    <p>Thank you for subscribing! Please confirm your subscription by clicking the link below:</p>
    <a href="{{ url('/confirm/' . $token) }}">Confirm Subscription</a>
</body>
</html>
