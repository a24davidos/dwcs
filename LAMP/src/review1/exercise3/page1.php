<?php

declare(strict_types=1);

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$name = "";
$nameErr = "";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 1 </title>
    <style>
        .error{color: red}
    </style>
</head>

<body>

    <h1>Page 1: Introduce your name</h1>
    <?php if (!(empty($nameErr))) echo " <p><span class='error'>* required field</span></p>";    
    ?>
    <form action="page2.php" method="post">
        <label for="name">Name: </label>
        <input type="text" id="name" name="name">
        <button type="submit">Enviar</button>
    </form>


</body>

</html>