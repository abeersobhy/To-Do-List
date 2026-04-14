<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Maintenance</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .container {
            max-width: 400px;
            padding: 30px;
            background-color: #fff;
            border: 2px solid #ffc107;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(255, 193, 7, 0.4);
        }
        .icon {
            font-size: 60px;
            color: #ffc107;
            margin-bottom: 20px;
        }
        h1 {
            font-size: 28px;
            margin-bottom: 15px;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container" role="alert" aria-live="assertive">
        <div class="icon">&#9888;</div>
        <h1>We'll be back soon!</h1>
        <p>Our system is currently undergoing maintenance.<br />
        We're working hard to fix the issue and will be back online shortly.<br />
        Thank you for your patience.</p>
    </div>
</body>
</html>
