<?php

declare(strict_types=1);

require_once("Student.php");
require_once("Operations.php");

try {
    $conn = new Operations();
} catch (PDOException $e) {
    echo "Aconteceu un erro: " . $e->getMessage();
} catch (Exception $e) {
    echo "Aconteceu un erro: " . $e->getMessage();
}

$id = $dni = $firstname = $surname = $age = "";

$continuar = true;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["form"])) {

    if (empty($_POST["dni"])) {
        $continuar = false;
    } else {
        $dni = $_POST["dni"];
    }

    if (empty($_POST["firstname"])) {
        $continuar = false;
    } else {
        $firstname = $_POST["firstname"];
    }
    if (empty($_POST["surname"])) {
        $continuar = false;
    } else {
        $surname = $_POST["surname"];
    }
    if (empty($_POST["age"])) {
        $continuar = false;
    } else {
        $age = $_POST["age"];
    }

    if ($continuar) {
        try {
            $rows = $conn->addStudent($dni, $firstname, $surname, $age);
            if ($rows > 0) {
                header("Location: index.php");
                exit();
            }
        } catch (PDOException $e) {
            echo "Aconteceu un erro: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Aconteceu un erro: " . $e->getMessage();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
</head>

<body>
    <h1>Add Student</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="dni">DNI:</label>
        <input type="text" name="dni" id="dni" require>
        <br>
        <label for="firstname">Firstname: </label>
        <input type="text" name="firstname" id="firstname" require>
        <br>
        <label for="surname">Surname: </label>
        <input type="text" name="surname" id="surname" require>
        <br>
        <label for="age">Age: </label>
        <input type="number" name="age" id="age" min=0 require>
        <input type="hidden" name="id">
        <br>
        <input type="submit" name="form" value="Add Student">
    </form>
</body>

</html>