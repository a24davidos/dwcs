<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage2 PHP</title>
</head>
<body>

<?php
    //Recojo los datos para que me sea mas facil
    $name = $_GET["name"];
    $subject = $_GET["subject"];

?>
    
    <form method="post" action="manage.php">
        <!-- Los paso en oculto aprovechando que ya utilizo el form-->
        <input type="hidden" name="name" value="<?= $name ?>">
        <input type="hidden" name="subject" value="<?= $subject ?>">

        Class type:<br>
        <input type="radio" id="inperson" name="class_type" value="In-person" required>
        <label for="inperson">In-person classes</label><br>

        <input type="radio" id="distance" name="class_type" value="Distance" required>
        <label for="distance">Distance classes</label><br><br>

        <input type="submit" value="Send Data">
    </form>

</body>
</html>