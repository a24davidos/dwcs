<?php
declare (strict_types=1)

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario PHP</title>
    <style>
        .error{
            color: #FF0000;
        }
    </style>
</head>
<body>

    <?php
    // Función para las medidas de seguridad
    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

    // Array asociativo con los diferentes subjects
    $subjects = [
    0 => "Java Programming",
    1 => "Web Design",
    2 => "Dockers administration",
    3 => "Django framework",
    4 => "Mongo database"
    ];

    $subject = $name = "";
    $subjectErr = $nameErr = "";

    // Validar formulario al enviar
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validar el nombre
        if (empty($_POST["name"])) {
            $nameErr = "El nombre es obligatorio";
        } else {
            $name = test_input($_POST["name"]);
        }

        // Validar selección del curso (subject)
        if (empty($_POST["subject"])) {
            $subjectErr = "Debe seleccionar un curso";
        } else {
            $selected_subject = test_input($_POST["subject"]);
        }
    }
    
    
    ?>

    <h2>First practice using forms.</h2>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Name and surnames: 
        <input type="text" name="name" required > 
        <span class="error"><?php if($nameErr) echo "* ".$nameErr; ?></span> <br><br>

        <label for="subject">Subject to enroll: </label>
        <select id="subject" name="subject" value="Select option">
            <option value="" disabled selected>-- Select option --</option>
            <?php foreach($subjects as $key => $value):?>
                <option value="<?= $key?>"><?= $value ?></option>
            <?php endforeach; ?>
        
        </select><span class="error"><?php if($subjectErr) echo " * ".$subjectErr; ?></span>
        <br><br>

        <input type="submit" value="Send Data">

    </form>

</body>
</html>