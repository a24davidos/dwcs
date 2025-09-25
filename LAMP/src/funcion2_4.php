<?php 
declare(strict_types=1);

function funcion (?String $nome, int $idade, String $apelido = 'Apelido') : String {
    return "$nome $apelido is $idade years old";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcion 2_4</title>
</head>
<body>
    <?php 
        $stringResultado = funcion(null, 4, "López");
        echo "<p><strong>$stringResultado </strong><p>"
    ?>    
</body>
</html>