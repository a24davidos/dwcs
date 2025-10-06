<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB Example</title>
</head>
<body>
    <h1>DATABASE EXAMPLE</h1>
    <?php 
        require_once "Operations.php";
        try {
            $oper = new Operations();
            $oper->openConnection();
            echo "Funciona la conexión!";
        } catch (PDOException $e) {
            echo $e->getMessage();
        } catch (Exception $e){
            echo $e->getMessage();
        } finally{
            // Close connection
            $oper->closeConnection();
        }
    ?>
</body>
</html>