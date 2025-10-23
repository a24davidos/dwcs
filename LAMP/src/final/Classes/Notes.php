<?php

class Notes
{
    private $id;
    private $title;
    private $description;
    private $date;
    private $user_id;


    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    // Setters (encadenables)
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function __toString()
    {
        return "ID: $this->id, Title: $this->title, Description: $this->description";
    }
}
