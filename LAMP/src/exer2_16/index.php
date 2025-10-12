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

function printRow($student)
{
    //Aqui hacer una función que me imprima cada row 
    echo "<tr>";
    echo "<td>" . $student->getId() . "</td>";
    echo "<td>" . $student->getDni() . "</td>";
    echo "<td>" . $student->getName() . "</td>";
    echo "<td>" . $student->getSurname() . "</td>";
    echo "<td>" . $student->getAge() . "</td>";

    //Formulario update 
    echo "<td>
        <form action='update_student.php' method='POST'>
            <input type='hidden' name='id' value=".$student->getId().">
            <input type='submit' value='Update' name='vUpdate'>
        </form>
    </td>";

    echo "<td><input type='button' value='Delete' name='vDelete'></td>";
    echo "</tr>";
}

    

try {
    //Crear conexión con la base de datos
    $oper = new OperationsDB();
    echo "<br> <p style='color:green'>Connection Created</p>";
    $students = $oper->studentsList();
} catch (PDOException $e) {
    echo "<br> <p style='color:red'> DB Error: " . $e->getMessage() . "</p><br>";
} catch (Exception $e) {
    echo "<br> <p style='color:red'> DB Error: "  . $e->getMessage() . "</p>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Management System</title>
</head>

<body>
    <h1>Student Management System</h1>
    <table border="2px">
        <tr>
            <td><label for="vDNI"> DNI: </label></td>
            <td><input type="text" id="vDNI" name="vDNI" /></td>
            <td><label for="vName"> Name:</td>
            <td><input type="text" id="vName" name="vName" /></td>
        </tr>
        <tr>
            <td colspan="4" align="center">
                <input type="button" value="Buscar">
                <input type="button" value="Añadir Estudiante">
            </td>
        </tr>
    </table>
    <br>
    <table border="1px">
        <tr>
            <th>ID</th>
            <th>DNI</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Age</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <tr>
            <td>0</td>
            <td>48110559X</td>
            <td>David</td>
            <td>Otero</td>
            <td>27</td>
            <td><input type="button" value="Update" name="vUpdate"></td>
            <td><input type="button" value="Delete" name="vDelete"></td>
        </tr>
        <?php 
        foreach($students as $student){
            printRow($student);
        }
        ?>
    </table>
</body>

</html>