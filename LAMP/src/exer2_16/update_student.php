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
    $student = $oper->getStudent($_POST["dni"]);
} catch (PDOException $e) {
    echo "<br> <p style='color:red'> DB Error: " . $e->getMessage() . "</p><br>";
} catch (Exception $e) {
    echo "<br> <p style='color:red'> DB Error: "  . $e->getMessage() . "</p>";
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System<</title>
</head>
<body>
    <h1>Student Management System</h1>    

    <table>
        <tr>
            <td>DNI:</td>
            <td><input type="text" name="vDni" value="<?=$_POST['dni'] ?>" /></td>
        </tr>
        <tr>
            <td>Name:</td>
            <td><input type="text" name="vName" value ="<?=$student->getName()?>" /></td>
        </tr>
        <tr>
            <td>Surname:</td>
            <td><input type="text" name="vSurname" value="<?=$student->getSurname()?>"></td>
        </tr>
        <tr>
            <td>Age:</td>
            <td><input type="text" name="vAge" value="<?=$student->getAge()?>" ></td>
        </tr>
    </table>



</body>
</html>