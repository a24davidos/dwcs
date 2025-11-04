´<?php

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
    echo "<td>" . $student->getDni() . "</td>";
    echo "<td>" . $student->getName() . "</td>";
    echo "<td>" . $student->getSurname() . "</td>";
    echo "<td>" . $student->getAge() . "</td>";

    //Formulario update 
    echo "<td>
        <form action='update_student.php' method='POST'>
            <input type='hidden' name='id' value=" . $student->getId() . ">
            <input type='submit' value='Update' name='vUpdate'>
        </form>
    </td>";

    echo "<td>
    <form action='studentManager.php' method='POST'>
        <input type='hidden' name='vDeleteId' value=" . $student->getId() . ">
        <input type='submit' value='Delete' name='vDelete' />
    </form>
    </td>";
    echo "</tr>";
}



try {
    //Crear conexión con la base de datos
    $oper = new OperationsDB();
    $students = [];
    $mensaje = "";

    if (isset($_POST['vDelete']) && isset($_POST['vDeleteId'])) {
        $id = $_POST['vDeleteId'];
        try {
            $deleted = $oper->deleteStudent($id);
            if ($deleted > 0) {
                $mensaje = "Student successfully eliminated";
                $students = $oper->studentsList();
            }
        } catch (PDOException $e) {
            echo "<br> <p style='color:red'> DB Error: " . $e->getMessage() . "</p><br>";
            $students = $oper->studentsList();
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $vDNI = (!empty($_GET["vDNI"])) ? test_input($_GET["vDNI"]) : "";
        $vName = (!empty($_GET["vName"])) ? test_input($_GET["vName"]) : "";


        if ($vDNI == "" && $vName == "") {
            $students = $oper->studentsList();
        } else {
            $students = $oper->searchStudent($vDNI, $vName);

        }
    }
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
    <link rel="stylesheet" href="style.css"><br>
</head>

<body>
    <h1>Student Management System</h1>
    <table border="2px">
        <form action="studentManager.php" method="get">
            <tr>
                <td><label for="vDNI">DNI:</label></td>
                <td><input type="text" id="vDNI" name="vDNI" value="<?php echo htmlspecialchars($_GET['vDNI'] ?? ''); ?>" /></td>

                <td><label for="vName">Name:</label></td>
                <td><input type="text" id="vName" name="vName" value="<?php echo htmlspecialchars($_GET['vName'] ?? ''); ?>" /></td>
            </tr>
            <tr>
                <td colspan="4" align="center">
                    <input type="submit" value="Search">
                </td>
            </tr>
        </form>

        <tr>
            <td colspan="4" align="center">
                <form action="add_student.php" method="post">
                    <input type="submit" value="Add Student">
                </form>
            </td>
        </tr>
    </table>
    <br>
    <table border="1px" id="resultados">
        <tr>
            <th>DNI</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Age</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($students as $student) {
            printRow($student);
        }
        ?>
    </table>

    <p "></p>

    <?php
    if (!empty($mensaje)) {
        echo "<br> <p style='color:green';>" . $mensaje . "</p>";
    }
    ?>

</body>

</html>