<?php
declare(strict_types=1);

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
            <th>DNI</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Age</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <tr>
            <td>48110559X</td>
            <td>David</td>
            <td>Otero</td>
            <td>27</td>
            <td><input type="button" value="Update" name="vUpdate" ></td>
            <td><input type="button" value="Delete" name="vDelete" ></td>
        </tr>
    </table>
</body>

</html>