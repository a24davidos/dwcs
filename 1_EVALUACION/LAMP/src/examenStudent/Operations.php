<?php
require_once("Student.php");
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

        // Create a PDO instance (connect to the database)
        $this->conn = new PDO($dsn, $user, $pass, $options);
    }
    public function closeConnection()
    {
        $this->conn = null;
    }

    public function getStudents()
    {
        $sqlString = "select * from Students";
        $query = $this->conn->prepare($sqlString);
        $query->execute();
        $students = array();
        while ($student = $query->fetchObject("Student")) {
            $students[] = $student;
        }
        return $students;
    }

    public function getStudent($id)
    {
        $sqlString = "select id, dni, firstname, surname, age from Students where id=?";
        $query = $this->conn->prepare($sqlString);
        $query->execute([$id]);
        $ref = $query->fetch();
        $student = new Student();
        $student->setId($ref["id"])
            ->setDni($ref["dni"])
            ->setFirstname($ref["firstname"])
            ->setSurname($ref["surname"])
            ->setAge($ref["age"]);
        return $student;
    }

    public function updateStudent($dni, $firstname, $surname, $age, $id)
    {
        try {
            $this->conn->beginTransaction();
            $sqlString = "update Students set dni=?, firstname=?, surname=?, age=? where id=?";
            $query = $this->conn->prepare($sqlString);
            $query->execute([$dni, $firstname, $surname, $age, $id]);
            $numberOfRows = $query->rowcount();
            $this->conn->commit();
            return $numberOfRows;
        } catch (PDOException $e) {
            $this->conn->rollback();
            throw $e;
        }
    }

    public function deleteStudent($id)
    {
        try {
            $this->conn->beginTransaction();
            $sqlQuery = "delete from Students where id=?";
            $query = $this->conn->prepare($sqlQuery);
            $query->execute([$id]);
            $numberOfRows = $query->rowcount();
            $this->conn->commit();
            return $numberOfRows;
        } catch (PDOException $e) {
            $this->conn->rollback();
            throw $e;
        }
    }

    public function addStudent($dni, $firstname, $surname, $age)
    {
        try {
            $this->conn->beginTransaction();
            $sqlQuery = "insert into Students (id, dni,firstname, surname, age) values(null, ?, ?, ? , ?)";
            $query = $this->conn->prepare($sqlQuery);
            $query->execute([$dni, $firstname, $surname, $age]);
            $numberOfRows = $query->rowcount();
            $this->conn->commit();
            return $numberOfRows;
        } catch (PDOException $e) {
            $this->conn->rollback();
            throw $e;
        }
    }

    public function getStudentBy($dni, $name)
    {
        // Si ambos están vacíos, devolvemos todos los estudiantes
        if (empty($dni) && empty($name)) {
            return $this->getStudents();
        }

        // Si no se ha introducido DNI, buscamos por nombre
        if (empty($dni)) {
            $sqlQuery = "SELECT * FROM Students WHERE firstname LIKE ?";
            $param = $name . '%';
        }
        // Si no se ha introducido nombre, buscamos por DNI
        else {
            $sqlQuery = "SELECT * FROM Students WHERE dni LIKE ?";
            $param = $dni . '%';
        }

        $query = $this->conn->prepare($sqlQuery);
        $query->execute([$param]);

        $students = [];
        while ($student = $query->fetchObject("Student")) {
            $students[] = $student;
        }

        return $students;
    }
}
