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
$subjectErr = $nameErr = "";

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

<form method="post" action="manage.php">
    Name and surnames: 
    <input type="text" name="name" required value="<?= $name ?>"> 
    <span class="error"><?= $nameErr ? "* ".$nameErr : "" ?></span>
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
