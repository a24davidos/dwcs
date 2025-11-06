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
    echo "<td class='titleText'>" . $note->getTitle() . "</td>";
    echo "<td>" . $note->getDescription() . "</td>";
    echo "<td>" . $note->getDate() . "</td>";

    //Actions
    echo
    "<td>

        <form action='update.php' method='POST'>
            <input type='hidden' name='noteId' value='" . $note->getId() . "'>
            <input type='submit' value='Update' name='update' class='btn edit-btn' />
        </form>
        <form action='notes.php' method='POST'>
            <input type='hidden' name='noteId' value='" . $note->getId() . "'>
            <input type='submit' value='Delete' name='delete' class='btn delete-btn'/>
        </form>
    </td>";
    echo "</tr>";
}

if (isset($_POST['delete']) && isset($_POST['noteId'])) {
    $noteId = $_POST['noteId'];
    try {
        $deleted = $oper->deleteNote($noteId);
        if ($deleted > 0) {
            header("Location: notes.php");
            exit;
        }
    } catch (PDOException $e) {
        echo "<br> <p style='color:red'> DB Error: " . $e->getMessage() . "</p><br>";
    }
}




//Cojo referencia del user 
$user = $oper->getUser($_SESSION['user_email']);
$userID = $user->getId();
$mensaje = "";

$notes = $oper->getUserNotes($userID);

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
            max-width: 900px;
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

        td {
            max-width: 250px;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        td form {
            display: inline-block;
            margin: 0px 2px;
        }

        th {
            background-color: #f2f2f2;
        }

        .titleText {
            font-weight: bold;
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

        a.add-note-btn {
            text-decoration: none;
            display: inline-block;
            padding: 8px 12px;
            background-color: #4ecdc4;
            color: white;
            border-radius: 4px;
            text-align: center;
            height: fit-content;
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
        <h1> <?= $user->getFirstName() ?>'s Notes Manager</h1>
        <div class="button-container">
            <a href="addNote.php" class="btn add-note-btn">Add New Note</a>
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
                <?php if (empty($notes)) : ?>
                    <tr>
                        <td colspan="4" style="text-align:center;border:0;  ">There isn't notes to show!</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($notes as $note) : ?>
                        <?php printNotes($note); ?>
                    <?php endforeach; ?>
                <?php endif; ?>

            </tbody>
        </table>
    </div>
</body>

</html>