<?php

declare(strict_types=1);
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

$firstName = $surname = $email = $password = "";
$error = $errorFirstName = $errorSurname = $errorEmail = $errorPassword = "";
$continue = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //check variables
    if (empty($_POST["firstName"])) {
        $errorFirstName = "You must introduce your first name";
        $continue = false;
    } else {
        $firstName = test_input(($_POST["firstName"]));
    }

    if (empty($_POST["surname"])) {
        $errorSurname = "You must introduce your surname";
        $continue = false;
    } else {
        $surname = test_input(($_POST["surname"]));
    }

    if (empty($_POST["email"])) {
        $errorEmail = "You must introduce your email";
        $continue = false;
    } else {
        $email = test_input(($_POST["email"]));
    }

    if (empty($_POST["password"])) {
        $errorPassword = "You must introduce a password";
        $continue = false;
    } else {
        $password = test_input(($_POST["password"]));
    }

    if ($continue) {
        try {
            $user = new Users();
            $user->setFirstName($firstName);
            $user->setSurname($surname);
            $user->setPassword($password);
            $user->setEmail($email);
            $rows = $oper->addUser($user);
            if ($rows > 0) {
                header('Location success.php');
                exit;
            }
        } catch (PDOException $e) {
            if ($e->getCode() === '23000') {
                $error = "This email is already in use!";
            } else {
                echo "<br> <p style='color:red'> DB Error: " . $e->getMessage() . "</p><br>";
            }
        } catch (Exception $e) {
            echo "<br> <p style='color:red'> DB Error: "  . $e->getMessage() . "</p>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Note Management Web</title>
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

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #ff6b6b;
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
            <div class=" form-group">
                <label for="firstName">First name:</label>
                <input type="text" id="firstName" name="firstName" required>
            </div>
            <div class="form-group">
                <label for="surname">Surname:</label>
                <input type="text" id="surname" name="surname" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <?php if (!empty($error)): ?>
                <span class="erro"><?php echo $error ?></span>
            <?php endif; ?>
            <button type="submit" class="btn">Register</button>
        </form>
    </div>
</body>

</html>