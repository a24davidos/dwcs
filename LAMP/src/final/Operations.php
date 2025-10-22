<?php

require_once("Classes/Users.php");
require_once("Classes/Notes.php");

class Operations
{

    private $conn;


    public function __construct()
    {
        $this->openConnection();
    }

    public function openConnection()
    {
        // Database configuration (match your docker-compose.yml)
        $host = 'db';          // The service name in docker-compose (not 'localhost')
        $db   = 'mydb';        // Database name
        $user = 'user';        // MySQL username
        $pass = 'userpass';    // MySQL password
        $charset = 'utf8mb4';

        // DSN (Data Source Name)
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        // PDO options for better error handling and performance
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Throw exceptions on errors
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Fetch results as associative arrays
            PDO::ATTR_EMULATE_PREPARES   => false,                  // Use real prepared statements
        ];

        //Creamos una instancia PDO para conectarlos con la base de datos 
        $this->conn = new PDO($dsn, $user, $pass, $options);
    }

    //Función que cierra la conexión
    public function closeConnection()
    {
        $this->conn = null;
    }

    function addUser($user)
    {
        try {
            $this->conn->beginTransaction();
            $newUser = $this->conn->prepare("insert into Users (first_name, surname, password, email) values(?, ?, ?, ?)");
            $first_name = $user->getFirstName();
            $surname = $user->getSurname();
            $password = $user->getPassword();
            $email = $user->getEmail();
            $newUser->execute([$first_name, $surname, $password, $email]);
            $numberOfRows = $newUser->rowCount();
            $this->conn->commit();
            return $numberOfRows;
        } catch (PDOException $e) {
            $this->conn->rollback();
            throw $e;
        }
    }

    function getUser($email)
    {
        $sqlString = "select id, first_name, surname, password, email from Users where email = ?";
        $query = $this->conn->prepare($sqlString);
        $query->execute([$email]);
        $user = $query->fetchObject("Users");
        // If it's empty, will return false
        return $user;
    }

    function getUserNotes($id)
    {
        $sqlString = "select id, title, description, date, user_id from Notes where user_id = ? order by date desc";
        $query = $this->conn->prepare($sqlString);
        $query->execute([$id]);
        $notes = array();
        //Recorro cada fila de la respuesta y devuelvo un objeto y lo meto dentro del array
        while ($row = $query->fetchObject("Notes")) {
            $notes[] = $row;
        }
        return $notes;
    }

    function usersList()
    {
        $sqlString = "select id, first_name, surname, password, email from Users";
        $query = $this->conn->prepare($sqlString);
        $query->execute();
        //Create a new array
        $users = array();
        //Recorro cada fila de la respuesta y devuelvo un objeto y lo meto al array
        while ($row = $query->fetchObject("Users")) {
            $users[] = $row;
        }
        return $users;
    }
}
