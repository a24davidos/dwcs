<?php

declare(strict_types=1);
require_once("Student.php");
require_once("Operations.php");

try {
    $conn = new Operations();
    $students = $conn->getStudents();
} catch (PDOException $e) {
    echo "Aconteceu un erro: " . $e->getMessage();
} catch (Exception $e) {
    echo "Aconteceu un erro: " . $e->getMessage();
}


$dni = $name = "";
$continuar = true;

$resultadoBusqueda = "";
$busqueda = false;

if ($_SERVER["REQUEST_METHOD"] == "GET" && (isset($_GET["dni"]) || isset($_GET["name"]))) {
    $dni = $_GET["dni"] ?? "";
    $name = $_GET["name"] ?? "";

    if (!empty($dni) || !empty($name)) {
        $resultadoBusqueda = $conn->getStudentBy($dni, $name);
        $busqueda = true;
    }
}



function printStudents($array)
{

    foreach ($array as $student) {
        echo
        "<tr>
            <td>{$student->getDni()}</td>
            <td>{$student->getFirstname()}</td>
            <td>{$student->getSurname()}</td>
            <td>{$student->getAge()}</td>
            <td>
                <form action='update.php' method='post'>
                    <input type='hidden' name='id' value='{$student->getId()}'>
                    <input type='submit' value='Update'>
                </form>
            </td>
            <td>
                <form action='index.php' method='post'>
                    <input type='hidden' name='id' value='{$student->getId()}'>
                    <input type='submit' name='delete' value='Delete'>
                </form>
            </td>
        </tr>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Students</title>
    <style>
        body {
            text-align: center;
        }

        table {
            margin: auto;
        }

        a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>

<body>
    <h1>List of Students</h1>
    <table border="1">
        <form action="index.php" method="get">
            <tr>
                <td><label for="name">Name: </label></td>
                <td><input type="text" name="name" id="name"></td>
                <td><label for="dni">DNI: </label></td>
                <td><input type="text" name="dni" id="dni"></td>
            </tr>
            <tr>
                <td colspan="4"><input type="submit" name="buscar" value="Buscar"></td>
            </tr>
        </form>
    </table>
    <br>
    <table border="1">
        <tr>
            <th>DNI</th>
            <th>FIRSTNAME</th>
            <th>SURNAME</th>
            <th>AGE</th>
            <th colspan=2>FUNCIÓNS</th>
        </tr>

        <?php
        if ($busqueda) {
            printStudents($resultadoBusqueda);
        } else {
            printStudents($students);
        }
        ?>

        <tr>
            <td colspan=6><button><a href="addstudent.php">Add Student</a></button></td>
        </tr>

    </table>
</body>

</html>