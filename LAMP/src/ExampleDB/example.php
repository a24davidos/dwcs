<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB Example</title>
</head>
<body>
    <h1>DATABASE EXAMPLE </h1>
    <?php
    require_once "Operations.php";
    try{
        //CREATE DATABASE CONNECTION
        $oper = new Operations();
        echo "<br>Connection Created";
        //GET A GUEST WITH AN ID
        echo "<br><h2>Query from the DB of a Guest with id=2</h2>";
        $guest = $oper->getMyGuest2(2);
        echo "<br>The guest with id=2 is: <br>".$guest;

        // ADD A GUEST
        echo "<h2>Add a guest:</h2>";
        $guest = new MyGuests();
        $guest->setFirstName("Laura");
        $guest->setLastName("Gonzalez");
        $guest->setEmail("laura@gonzalez.es");
        $guest->setRegDate("2000-11-23");
        $numberOfRows = $oper->addMyGuests($guest);
        if ($numberOfRows == 1) echo "<br>New guest added to the database";
        else echo "<br>No guest has been added";

        //GET ALL GUESTS
        echo "<h2>Get all guests:</h2>";
        $guestList = $oper->getAllMyGuests2();
        foreach($guestList as $guest)
            echo "<br>Guest: ".$guest;
    
    }
    catch (PDOException $e) {
        echo "<br><p style='color:red;'>DB Error: " . $e->getMessage() . "</p><br>";

    } catch (Exception $e) {
        echo "<br><p style='color:red;'>Error: " . $e->getMessage() . "</p><br>";
    } finally {
        //Close connection
        $oper->closeConnection();
    }
    ?>
</body>
</html>