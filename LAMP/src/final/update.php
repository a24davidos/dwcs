<?php

declare(strict_types=1);

session_start();  //Inicio la sesión

// COmmpruebo que el user esté loggeado
if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit;
}

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


//Cojo referencia del user 
$user = $oper->getUser($_SESSION['user_email']);
$userID = $user->getId();;
//Cojo referencia de la nota
$nota = $oper->getNotebyID($_POST['noteId']);


$title = $description = "";
$error = $errorTitle = $errorDescription = "";
$continue = true;

if ($_SERVER["REQUEST_METHOD"] == "POST" && (!empty($_POST['title']) && (!empty($_POST['description'])))) {

    //check variables
    if (empty($_POST["title"])) {
        $errorTitle = "You must introduce a title";
        $continue = false;
    } else {
        $title = test_input(($_POST["title"]));
    }

    if (empty($_POST["description"])) {
        $errorDescription = "You must introduce your description";
        $continue = false;
    } else {
        $description = test_input(($_POST["description"]));
    }

    if ($continue) {

        //Llamo a la función que modifica
        $rows = $oper->updateNote($title, $description, $nota->getId());

        header('Location: notes.php');
        exit;

    }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Note - Note Management Web</title>
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

        #description {
            width: 100%;
            height: 200px;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
            resize: vertical;
            font-family: inherit;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1> <?=$user->getFirstName() ?>'s Notes Manager</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            <input type="hidden" name="noteId" value="<?= $nota->getId(); ?>">

            <div class=" form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="<?= $nota->getTitle() ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" required> <?= htmlspecialchars($nota->getDescription()); ?></textarea>
            </div>

            <?php if (!empty($error)): ?>
                <span class="erro"><?php echo $error ?></span>
            <?php endif; ?>
            <button type="submit" class="btn">Update Note</button>
        </form>
    </div>
</body>

</html>