<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
</head>
<body>
مرحباً مدير موقع {{ config('app.name') }}
<hr>
وصلتك رسالة من موقعك،
<br>
المرسل: {{ $name }} <br>
بريده الإلكتروني: {{ $email }} <br>
الهاتف: {{ $phone }} <hr>
الرسالة: <br>
{{ $description }}
</body>
</html>