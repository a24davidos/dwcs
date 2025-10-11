<?php
class Student
{
    private $id;
    private $dni;
    private $name;
    private $surname;
    private $age;


    public function getId()
    {
        return $this->id;
    }


    public function getDni()
    {
        return $this->dni;
    }


    public function getName()
    {
        return $this->name;
    }


    public function getSurname()
    {
        return $this->surname;
    }


    public function getAge()
    {
        return $this->age;
    }
}
?>