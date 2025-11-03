<?php
require_once("Car.php");
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
    } //openConnection
    public function closeConnection()
    {
        $this->conn = null;
    }

    public function getCars()
    {
        $sqlString = "select * from car";
        $query = $this->conn->prepare($sqlString);
        $query->execute();
        $cars = array();
        while ($car = $query->fetchObject("Car")) {
            $cars[] = $car;
        }
        return $cars;
    }

    public function getCar($id)
    {
        $sqlString = "select id, model, fuel, price from car where id=?";
        $query = $this->conn->prepare($sqlString);
        $query->execute([$id]);
        $ref = $query->fetch();
        $car = new Car();
        $car->setId($ref["id"])
            ->setModel($ref["model"])
            ->setFuel($ref["fuel"])
            ->setPrice($ref["price"]);
        return $car;
    }

    public function updateCar($model, $fuel, $price, $id)
    {
        try {
            $this->conn->beginTransaction();
            $sqlString = "update car set model=?, fuel=?, price=? where id=?";
            $query = $this->conn->prepare($sqlString);
            $query->execute([$model, $fuel, $price, $id]);
            $numberOfRows = $query->rowcount();
            $this->conn->commit();
            return $numberOfRows;
        } catch (PDOException $e) {
            $this->conn->rollback();
            throw $e;
        }
    }

    public function deleteCar($id)
    {
        try {
            $this->conn->beginTransaction();
            $sqlString = "delete from car where id=?";
            $query = $this->conn->prepare($sqlString);
            $query->execute([$id]);
            $numberOfRows = $query->rowcount();
            $this->conn->commit();
            return $numberOfRows;
        } catch (PDOException $e) {
            $this->conn->rollback();
            throw $e;
        }
    }

    public function addCar($model, $fuel, $price)
    {
        try {
            $this->conn->beginTransaction();
            $sqlString = "insert into car (model, fuel, price) values (?,?,?)";
            $query = $this->conn->prepare($sqlString);
            $query->execute([$model, $fuel, $price]);
            $numberOfRows = $query->rowcount();
            $this->conn->commit();
            return $numberOfRows;
        } catch (PDOException $e) {
            $this->conn->rollback();
            throw $e;
        }
    }
}
