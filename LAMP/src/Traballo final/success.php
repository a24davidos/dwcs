<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro exitoso</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .success {
            color: #4ecdc4;
            font-size: 1.2em;
            margin-bottom: 20px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #4ecdc4;
            color: white;
            cursor: pointer;
            font-size: 1em;
        }
    </style>
</head>
<body>
    <div class="container">
        <p class="success">
            User added successfully!
        </p>
        <a href="login.php"><button class="btn">Go Login</button></a>
    </div>
</body>
</html>
