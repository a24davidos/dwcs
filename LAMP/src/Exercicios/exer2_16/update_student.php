<?php

declare(strict_types=1);
require_once "Student.php";
require_once "OperationsDB.php";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

try {
    //Crear conexión con la base de datos
    $oper = new OperationsDB();
    $student = null;
    if (!empty($_POST['id'])) {
        $student = $oper->getStudent($_POST['id']);
    }
} catch (PDOException $e) {
    echo "<br> <p style='color:red'> DB Error: " . $e->getMessage() . "</p><br>";
} catch (Exception $e) {
    echo "<br> <p style='color:red'> DB Error: "  . $e->getMessage() . "</p>";
}


//Definimos las variables y los errors

$dni = $name = $surname = $age = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['vId'], $_POST['vDni'], $_POST['vName'], $_POST['vSurname'], $_POST['vAge'])) {

    $id = (int)$_POST["vId"];

    //Comprobamos DNI
    if (empty($_POST["vDni"])) {
        $error = "You must introduce a DNI!";
    } else {
        $dni = test_input($_POST["vDni"]);
    }

    // Comprobamos o Name
    if (empty($_POST["vName"])) {
        $error = "You must introduce a Name";
    } else {
        $name = test_input($_POST["vName"]);
    }

    // Comprobamos o Surname
    if (empty($_POST["vSurname"])) {
        $error = "You must introduce a surname!";
    } else {
        $surname = test_input($_POST["vSurname"]);
    }

    // Comprobamos a idade
    if (!isset($_POST["vAge"])) {
        $error = "You must introduce an age!";
    } else {
        $age = test_input($_POST["vAge"]);
    }

    //Se o erro está vacío entramos no if
    if (empty($error)) {
        // Crear un objeto Student vacío
        $student = new Student();
        // Asigno los valores con setters
        $student->setId($id);
        $student->setDni($dni);
        $student->setName($name);
        $student->setSurname($surname);
        $student->setAge((int)$age);

        //Llamo a la función que modifica el esutdiante
        $rows = $oper->modifyStudent($student);
        //Si se modifica alguna row, es que funciono y nos movemos a studentManager.php
        if ($rows > 0) {
            header('Location: studentManager.php');
            // Se non se modifica mandamos mensaxe, e collemos o ID do student para mandar o estudiante sen modificar
        } else {
            echo "<p>No se modificó ningún estudiante.</p>";
            $student = $oper->getStudent($id);
        }
    } else {
        //Co $id podemos traernos os datos antigos do student para poder encher o formulario. Ademais mostraremos a mensaxe de erro.
        $student = $oper->getStudent($id);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Student Management System</h1>

    <span class="error" style="color: red;"><?= $error ?></span>


    <!-- Formulario para modificar el usuario -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <table border="2">
            <tr>
                <td>DNI:</td>
                <td>
                    <input type="text" name="vDni" value="<?= $student->getDni() ?>" required />
                </td>
            </tr>
            <tr>
                <td>Name:</td>
                <td>
                    <input type="text" name="vName" value="<?= $student->getName() ?>" required />
                </td>
            </tr>
            <tr>
                <td>Surname:</td>
                <td><input type="text" name="vSurname" value="<?= $student->getSurname() ?>" required></td>
            </tr>
            <tr>
                <td>Age:</td>
                <td><input type="number" name="vAge" value="<?= $student->getAge() ?>" required></td>
            </tr>
            <tr>
                <input type="hidden" name="vId" value="<?= $student->getId() ?>" />
                <td colspan="2">
                    <input class="aver" type="submit" value="Update">
                    <a href="studentManager.php"><button type="button">Cancel</button></a>
                </td>
            </tr>
        </table>
    </form>


</body>

</html>