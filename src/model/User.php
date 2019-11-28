<?php

namespace App\Model;

class User
{

    private $userName;
    private $password;
    private $email;
    private $isAdmin;

    public function getUserName()
    {
        return $this->userName;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function getIsAdmin()
    {
        return $this->isAdmin;
    }


    public function setUserName($username)
    {
        $this->userName = $username;
        return $this;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }


    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }


    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = (int) $isAdmin; 
        return $this;
    }
}


