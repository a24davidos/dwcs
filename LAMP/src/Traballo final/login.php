´<?php

declare(strict_types=1);

session_start();

require_once("Classes/Users.php");
require_once("Operations.php");

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

try {
    //Crear conexión con la base de datos
    $oper = new Operations();
} catch (PDOException $e) {
    echo "<br> <p style='color:red'> DB Error: " . $e->getMessage() . "</p><br>";
} catch (Exception $e) {
    echo "<br> <p style='color:red'> DB Error: "  . $e->getMessage() . "</p>";
}

$email = $password = "";
$errorEmail = $errorPassword = $errorLogin = "";

//LOGIN
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Check variables
    if (empty($_POST["email"])) {
        $errorEmail = "You must introduce an email!";
    } else {
        $email = test_input(($_POST["email"]));
    }

    if (empty($_POST["password"])) {
        $errorPassword = "You must introduce a password!";
    } else {
        $password = $_POST["password"];
    }

    //Si no estan vacias, podemos continuar
    if (!empty($errorEmail) || !empty($errorPassword)) {
        $errorLogin = "Invalid email or password";
    } else {
        $referenciaUser = $oper->getUser($email);
        //Check if the user exists, and if exists I check the password, if all its true, I move to the next page
        if ($referenciaUser && $referenciaUser->checkPassword($password)) {

            //Guardo los datos del usuario en la sesión
            $_SESSION["user_email"] = $email;
            header('Location: notes.php');
            exit;
        } else {
            $errorLogin = "Invalid email or password";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Note Management Web</title>
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
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h1 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #4ecdc4;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .erro {
            color: red;
            font-size: 0.9em;
            display: block;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>NOTE MANAGEMENT WEB</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <?php if (!empty($errorLogin)): ?>
                <span class="erro"><?php echo $errorLogin ?></span>
            <?php endif; ?>
            <button type="submit" class="btn">Log in</button>
        </form>
    </div>
</body>

</html>