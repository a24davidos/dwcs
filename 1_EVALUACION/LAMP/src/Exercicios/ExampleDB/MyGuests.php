<?php
class MyGuests{
    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $reg_date;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id): self {
        $this->id = $id;
        return $this;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function setFirstname($firstname): self {
        $this->firstname = $firstname;
        return $this;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function setLastname($lastname): self {
        $this->lastname = $lastname;
        return $this;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email): self {
        $this->email = $email;
        return $this;
    }

    public function getRegDate() {
        return $this->reg_date;
    }

    public function setRegDate($reg_date): self {
        $this->reg_date = $reg_date;
        return $this;
    }

    public function __toString()
    {
        return "Id: " . $this->id . "<br>First Name: " . $this->firstname . "<br>
        Last Name: " . $this->lastname . "<br>Email: " . $this->email . "<br>Date: " . $this->reg_date . "<br>";
    }
}//class
?>