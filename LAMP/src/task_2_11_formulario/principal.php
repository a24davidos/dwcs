<?php
declare(strict_types=1);

// Función de seguridad
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Array de subjects
$subjects = [
    0 => "Java Programming",
    1 => "Web Design",
    2 => "Dockers administration",
    3 => "Django framework",
    4 => "Mongo database"
];

$subject = $name = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Guardamos las variables limpias
    $name = test_input($_POST['name']);
    $subject = test_input($_POST['subject']);

    // Guardamos las cookies
    setcookie("name", $name, time() + (7 * 24 * 60 * 60), "/");
    setcookie("subject", $subject, time() + (7 * 24 * 60 * 60), "/");

    header("Location: manage.php");
    exit;

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario PHP</title>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>
<body>

<h2>First practice using forms.</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
    Name and surnames: 
    <input type="text" name="name" required value="<?= $name ?>"> 
    <br><br>

    <label for="subject">Subject to enroll: </label>
    <select id="subject" name="subject" required>
        <option value="" disabled selected>-- Select option --</option>
        <?php foreach($subjects as $key => $value): ?>
            <option value="<?= $value ?>"><?= $value ?></option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <input type="submit" value="Send Data">
</form>

</body>
</html>
