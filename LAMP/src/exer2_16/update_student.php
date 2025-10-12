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
    echo "<br> <p style='color:green'>Connection Created</p>";
    $student = null;
    if (!empty($_POST['id'])) {
        $student = $oper->getStudent($_POST['id']);
        echo $_POST["id"];
        
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
        $error = "There is a problem!";
    } else {
        $dni = test_input($_POST["vDni"]);
    }

    //
    if (empty($_POST["vName"])) {
        $error = "There is a problem!";
    } else {
        $name = test_input($_POST["vName"]);
    }

    if (empty($_POST["vSurname"])) {
        $error = "There is a problem!";
    } else {
        $surname = test_input($_POST["vSurname"]);
    }

    if (!isset($_POST["vAge"])) {
        $error = "There is a problem!";
    } else {
        $age = test_input($_POST["vAge"]);
    }

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
        $oper->modifyStudent($student);
        if ($rows > 0) {
            echo "<p>Estudiante modificado con éxito!</p>";
        } else {
            echo "<p>No se modificó ningún estudiante.</p>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System </title>
</head>

<body>
    <h1>Student Management System</h1>

    <span class="error" style="color: red;"><?= $error ?></span>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <table border="2">
            <tr>
                <td>DNI:</td>
                <td>
                    <input type="text" name="vDni" value="<?= $student->getDni()?>" />
                </td>
            </tr>
            <tr>
                <td>Name:</td>
                <td>
                    <input type="text" name="vName" value="<?= $student->getName() ?>" />
                </td>
            </tr>
            <tr>
                <td>Surname:</td>
                <td><input type="text" name="vSurname" value="<?= $student->getSurname() ?>"></td>
            </tr>
            <tr>
                <td>Age:</td>
                <td><input type="text" name="vAge" value="<?= $student->getAge() ?>"></td>
            </tr>
            <tr>
                <input type="hidden" name="vId" value="<?= $student->getId() ?>" />
                <td colspan="2"><input type="submit" value="Update"></td>
            </tr>
        </table>
    </form>


</body>

</html>