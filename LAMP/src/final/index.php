<? 

declare(strict_types=1);
require_once("Classes/Users.php");
require_once("Classes/Notes.php");
require_once("Operations.php");

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

try{
    //Create connexion with the database
    $oper = new Operations();
    $users = [];
    echo "Conexión creada";

/*     $user = new Users();
    $user->setFirstName("David");
    $user->setSurname("Wapo");
    $user->setPassword("Paloma");
    $user->setEmail("davicetotero@gmail.com");

    $rows = $oper->addUser($user);
    if ($rows>0){
        echo "<p>Se añadio<p><br>";
    }
 */
}catch (PDOException $e) {
    echo "<br> <p style='color:red'> DB Error: " . $e->getMessage() . "</p><br>";
} catch (Exception $e) {
    echo "<br> <p style='color:red'> DB Error: "  . $e->getMessage() . "</p>";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note Management Web</title>
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
            text-align: center;
            width: 300px;
        }
        h1 {
            margin-bottom: 20px;
            color: #333;
        }
        .btn {
            padding: 10px 20px;
            margin: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .register-btn {
            background-color: #ff6b6b;
            color: white;
        }
        .login-btn {
            background-color: #4ecdc4;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>NOTE MANAGEMENT WEB</h1>
        <a href="register.html"><button class="btn register-btn">Register</button></a>
        <a href="login.html"><button class="btn login-btn">Log in</button></a>
    </div>



</body>
</html>
