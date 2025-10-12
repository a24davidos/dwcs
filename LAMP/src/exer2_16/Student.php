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


    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }


    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }


    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }
}
?>