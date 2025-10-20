<?php

class Notes
{
    private $id;
    private $title;
    private $description;
    private $date;
    private $user_id;

    // Constructor opcional
    public function __construct($title = null, $description = null, $user_id = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->user_id = $user_id;
        $this->date = date('Y-m-d H:i:s'); // Fecha y hora actual automáticamente
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getDate() {
        return $this->date;
    }

    public function getUserId() {
        return $this->user_id;
    }

    // Setters (encadenables)
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function setDate($date) {
        $this->date = $date;
        return $this;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
        return $this;
    }
}

?>