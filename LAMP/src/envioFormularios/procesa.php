<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process the form</title>
</head>
<body>
    <h1>SHOWING THE INFO FROM THE PREVIOUS FORM<h1>
    <?php
        echo "<br>The name is: ".$_POST["vName"];
        echo "<br>The email is: ".$_POST["vEmail"];
    ?>
    <br><a href="nextPage.php?vName=<?php echo $_POST["vName"]?>&vEmail=<?php echo $_POST["vEmail"]?>">Next page</a>

    <form action="nextPage.php" method="get">
        <input type="hidden" name="vName" value="<?php echo $_POST["vName"]?>"><br>
        <input type="hidden" name="vEmail" value="<?php echo $_POST["vEmail"]?>"><br>
        <input type="submit">
    </form>
</body>
</html>