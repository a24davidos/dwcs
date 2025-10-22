<?php


declare(strict_types=1);

session_start();  //Inicio la sesión

require_once("Classes/Users.php");
require_once("Classes/Notes.php");
require_once("Operations.php");


// COmmpruebo que el user esté loggeado
if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit;
}
// Compruebo si se manda el "logout", si lo manda borramos la sesión y volvemos al inicio
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit;
}

//Creo conexión con la base de datos
try {
    $oper = new Operations();
} catch (PDOException $e) {
    echo "<p style='color:red'> DB Error: " . $e->getMessage() . "</p>";
    exit;
} catch (Exception $e) {
    echo "<p style='color:red'> DB Error: "  . $e->getMessage() . "</p>";
    exit;
}

//Cojo referencia del user 
$user = $oper->getUser($_SESSION['user_email']);
$userID = $user->getId();
echo "Welcome " . $user->getFirstName();
echo "<br>" . $userID;

$notes = $oper->getUserNotes($userID);

$longitud = count($notes);
echo "<br>" . $longitud;


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function printNotes($note)
{
    //Facemos que imprima cada row

    echo "<tr>";
    echo "<td>" . $note->getTitle() . "</td>";
    echo "<td>" . $note->getDescription() . "</td>";
    echo "<td>" . $note->getDate() . "</td>";

    //Actions
    echo
    "<td>
        <button class='btn edit-btn'>Edit</button>
        <button class='btn delete-btn'>Delete</button>
    </td>";
    echo "</tr>";
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes - Note Management Web</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;

        }

        .btn {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .edit-btn {
            background-color: #4ecdc4;
            color: white;
        }

        .delete-btn {
            background-color: #ff6b6b;
            color: white;
        }

        .add-note-btn {
            background-color: #4ecdc4;
            color: white;
            margin-bottom: 20px;
        }

        .exit-btn {
            background-color: #ff6b6b;
            color: white;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>NOTE MANAGEMENT WEB</h1>
        <div class="button-container">
            <button class="btn add-note-btn">Add New Note</button>
            <form method="post">
                <button type="submit" name="logout" class="btn exit-btn">Exit</button>
            </form>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Example Note</td>
                    <td>This is an example note description.</td>
                    <td>2025-10-18</td>
                    <td>
                        <button class="btn edit-btn">Edit</button>
                        <button class="btn delete-btn">Delete</button>
                    </td>
                </tr>

                <?php
                foreach ($notes as $note) {
                    printNotes($note);
                }
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>