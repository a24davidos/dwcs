<?php
declare(strict_types=1);

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>
<body>

<h1>FORMS II</h1>
 
<?php
$datos = ["apache" => "Apache", "nginx" => "Nginx", "microsoft" =>"Microsoft IIS"];

$webServer = $city = $password = $name = $role = "";
$singon1 = $singon2 = $singon3 = "";

$nameErr = $passwordErr = $cidadeErr = $webServerErr = $roleErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(empty($_POST["name"])){
        $nameErr = "Esto é requerido";
    } else {
        $name = test_input($_POST["name"]);
    }

    if(empty($_POST["password"])){
        $passwordErr = "Esto é requerido";
    } else {
        $password = test_input($_POST["password"]);
    }

    if(empty($_POST["city"])){
        $cidadeErr = "Esto é requerido";
    } else {
        $city = test_input($_POST["city"]);
    }

    if(empty($_POST["webServer"]) || !array_key_exists($_POST["webServer"], $datos)){
        $webServerErr = "Selecciona un servidor válido";
    } else {
        $webServer = test_input($_POST["webServer"]);
    }

    // Role
    if(empty($_POST["role"])){
        $roleErr = "Debes seleccionar un rol";
    } else {
        $role = test_input($_POST["role"]);
    }

    // Sing-on 
    $singon1 = isset($_POST["singon1"]) ? test_input($_POST["singon1"]) : "";
    $singon2 = isset($_POST["singon2"]) ? test_input($_POST["singon2"]) : "";
    $singon3 = isset($_POST["singon3"]) ? test_input($_POST["singon3"]) : "";

}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    Name: <input type="text" name="name" value="<?php echo test_input($name);?>">
    <span class="error"> <?php if($nameErr) echo "* ".$nameErr; ?></span>
    <br>

    Password: <input type="password" id="pass" name="password">
    <span class="error"> <?php if($passwordErr) echo "* ".$passwordErr; ?></span>
    <br>

    City of employment: <input type="text" name="city" value="<?php echo $city;?>"> 
    <span class="error"> <?php if($cidadeErr) echo "* ".$cidadeErr; ?></span>
    <br>

    <label for="idServer"> Web Server: </label>
    <select name="webServer">
        <?php 
        foreach($datos as $key => $value){
            $selected = ($webServer === $key) ? "selected" : "";
            echo "<option value=\"" . $key . "\" " . $selected . ">" . $value . "</option>";        }
        ?>
    </select>
    <span class="error"><?php if($webServerErr) echo "* ".$webServerErr; ?></span>
    <br><br>

    <p>Please specify your role:</p>
    <input type="radio" name="role" value="admin" <?php if ($role=="admin") echo "checked"; ?>> Admin<br>
    <input type="radio" name="role" value="engineer" <?php if ($role=="engineer") echo "checked"; ?>> Engineer<br>
    <input type="radio" name="role" value="manager" <?php if ($role=="manager") echo "checked"; ?>> Manager<br>
    <input type="radio" name="role" value="guest" <?php if ($role=="guest") echo "checked"; ?>> Guest
    <span class="error"> <?php if($roleErr) echo "* ".$roleErr; ?></span>
    <br><br>

    <p>Single Sign-on the following:</p>
    <input type="checkbox" name="singon1" value="Mail" <?php if ($singon1) echo "checked"; ?>> Mail <br>
    <input type="checkbox" name="singon2" value="Payroll" <?php if ($singon2) echo "checked"; ?>> Payroll <br>
    <input type="checkbox" name="singon3" value="Self-service" <?php if ($singon3) echo "checked"; ?>> Self-service <br>
    
    <input type="submit" value="Send">
</form>

<?php
echo "<h3>Os teus datos:</h3>";

    echo $name."<br>";
    echo $password."<br>";
    echo $city."<br>";

    //WEBSERVER
    if (isset($datos[$webServer])) {
        echo $datos[$webServer]."<br>";
    } else {
        echo "<br>";
    }

    //rOLE
    if ($role != "") {
        echo $role."<br>";
    } else {
        echo "<br>";
    }

    //  sing on
    if ($singon1 != "") {
        echo $singon1."<br>";
    }
    if ($singon2 != "") {
        echo $singon2."<br>";
    }
    if ($singon3 != "") {
        echo $singon3."<br>";
    }

     

?>



</body>
</html>