<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <style>
        /* Reset styles */
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        /* Container */
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            color: #333;
        }

        /* Content */
        .content {
            margin-bottom: 20px;
            color: #555;
        }

        /* Footer */
        .footer {
            text-align: center;
            color: #888;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Ваша заявка по получению рассрочки/кредита по Freedom Credit на сайте remaster.kz</h1>
    </div>
    <div class="content">
        <p>Ваша заявка {{$freedomRequest->uuid}} успешно оформлена</p>
        <p>Детали заявки доступны по следующему адресу</p>
        <a class="btn btn-info" href="https://remaster.kz/freedom-payment-info/{{$freedomRequest->uuid}}">Детали</a><br/>
        <small>https://remaster.kz/freedom-payment-info/{{$freedomRequest->uuid}}</small>
        <p>Если это не вы просим посетить remaster.kz или позвонить по телефону +7 775 060 80 77</p>
    </div>
    <div class="footer">
        <p>&copy; 2024 Remaster.kz. Все права защищены.</p>
    </div>
</div>
</body>
</html>
