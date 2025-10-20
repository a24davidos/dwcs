<?php

class Users
{
    private $id;
    private $first_name;
    private $surname;
    private $password;
    private $email;

    public function getId(){
        return $this->id;
    }

    public function getFirstName(){
        return $this->first_name;
    }

    public function getSurname(){
        return $this->surname;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function setFirstName($first_name){
        $this->first_name = $first_name;
        return $this;
    }

    public function setSurname($surname){
        $this->surname = $surname;
        return $this;
    }

    public function setPassword($password){
        $this->password = $password;
        return $this;
    }

    public function setEmail($email){
        $this->email = $email;
        return $this;
    }
}

?>