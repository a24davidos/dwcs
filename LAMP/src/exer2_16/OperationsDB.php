<?php
require_once("Student.php");

class OperationsDB
{

    private $conn;

    public function __construct()
    {
        $this->openConnection();
    }

    // Esta función es la encargada de abrir la conexión
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

    //Función encargada de cerrar la conexión
    public function closeConnection()
    {
        $this->conn = null;
    }

    //Función que me devuelve una lista con todos los estudiantes
    function studentsList()
    {
        $sqlString = "select id, dni, name, surname, age from Students";
        $query = $this->conn->prepare($sqlString);
        $query->execute();
        // Creo un nuevo array
        $students = array();
        //Recorro cada fila de la respuesta, y devuelvo un objeto y lo meto dentro de array.
        while ($row = $query->fetchObject("Student")) {
            $students[] = $row;
        }
        return $students;
    }

    //Función que me permite añadir un estudiante
    function addStudent($student)
    {
        try {
            $this->conn->beginTransaction();
            $newStudent = $this->conn->prepare("insert into Students (dni, name, surname, age) VALUES (?, ?, ?, ?)");
            $dni = $student->getDni();
            $name = $student->getName();
            $surname = $student->getSurname();
            $age = $student->getAge();
            $newStudent->execute([$dni, $name, $surname, $age]);
            $numberOfRows = $newStudent->rowCount();
            $this->conn->commit();
            return $numberOfRows;
        } catch (PDOException $e) {
            $this->conn->rollback();
            throw $e;
        }
    }

    //Función que me permite conseguir un estudiante por su ID
    function getStudent($id)
    {
        $sqlString = "select id, dni, name, surname, age from Students where id = ?";
        $query = $this->conn->prepare($sqlString);
        $query->execute([$id]);
        $estudiante = $query->fetchObject("Student");
        return $estudiante; // Devuelve null si no existe
    }


    //Función para modificar un estudiante
    function modifyStudent($student)
    {
        try {
            $this->conn->beginTransaction();
            $stmt = $this->conn->prepare("update Students set dni=?, name=?, surname=?, age=? where id=?");
            $dni = $student->getDni();
            $name = $student->getName();
            $surname = $student->getSurname();
            $age = $student->getAge();
            $id = $student->getId();
            $stmt->execute([$dni, $name, $surname, $age, $id]);
            $numberOfRows = $stmt->rowCount();
            $this->conn->commit();
            return $numberOfRows;
        } catch (PDOException $e) {
            $this->conn->rollback();
            throw $e;
        }
    }

    function deleteStudent($id)
    {
        try {
            $this->conn->beginTransaction();
            $stmt = $this->conn->prepare("delete from Students where id=?");
            $stmt->execute([$id]);
            $numberOfRows = $stmt->rowCount();
            $this->conn->commit();
            return $numberOfRows;
        } catch (PDOException $e) {
            // roll back the transaction if something failed
            $this->conn->rollback();
            throw $e;
        }
    }
}
