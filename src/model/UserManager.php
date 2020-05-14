<?php

namespace App\Model;

use App\Model\Manager;
use App\Model\User;
use \PDO;
use \Exception;

class userManager extends Manager
{
    private $table="users";
    public function addUser(User $user)
    {
        $query = $this->pdo->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)");
        $username = $user->getUserName();
        $password = $user->getPassword();
        $email = $user->getEmail();
        
        $query->bindParam(':username', $username);
        $query->bindParam(':password', $password);
        $query->bindParam(':email', $email);
        //$query->bindParam(':isAdmin', $isAdmin);
        //$isAdmin = $user->getIsAdmin();
    

        $result=$query->execute();

        if ($result==false) {
            throw new Exception('Utilisateur non ajouté, problème base de donnée.');
        }
    }
    public function checkUsernameUnicity($username)
    {
        $query = $this->pdo->prepare('SELECT COUNT(username)  FROM users WHERE username = :username');
        $query->bindParam(':username', $username);
        try {
            $query->execute();
            $result = $query->fetchAll();
            return $result[0]['COUNT(username)'];
        } catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(); //
        }
    }

    public function verifEmail($email)
    {
        $query = $this->pdo->prepare('SELECT COUNT(email) FROM users WHERE email = :email');
        $query->bindParam(':email', $email);
        try {
            $query->execute();
            $result = $query->fetchAll();
            return $result[0]['COUNT(email)'];
        } catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(); //
        }
    }

    public function authentification(User $user)
    {
        if (!empty($user->getUserName())) {
            $query = $this->pdo->prepare('SELECT * FROM users WHERE username = :username');
            $query->bindParam(':username', $username);
            $username = $user->getUserName();

        } elseif (!empty($user->getEmail())) {
            $query = $this->pdo->prepare('SELECT * FROM users WHERE email = :email');
            $query->bindParam(':email', $email);
            $email = $user->getEmail();
        } else {
            throw new Exception('Authentification invalide ...');
        }
        $query->execute();
        /* $result = $query->fetchAll();
        var_dump ($result); */
        if ($query->rowCount()==1) {
            $result = $query->fetch();
            return password_verify($user->getPassword(), $result['password']);
        } else {
            throw new Exception('Nom d utilisateur invalide ...');
        }
    }



    public function infosUser(User $user)
    {
        if (!empty($user->getUserName())) {
            $query = $this->pdo->prepare('SELECT * FROM users WHERE username = :username');
            $username = $user->getUserName();
            $query->bindParam(':username', $username);
    

        } elseif (!empty($user->getEmail())) {
            $query = $this->pdo->prepare('SELECT * FROM users WHERE email = :email');
            $email = $user->getEmail();
            $query->bindParam(':email', $email);
         
        } else {
            throw new Exception('utilisateur inconnu ...');
        }
        $query->execute();

        return $query;
    }


    
}



/* 
    public function authentification(User $user)
    {
        if (!empty($user->getUserName())) {
            $query = $this->pdo->prepare('SELECT * FROM users WHERE username = :username');
            $query->bindParam(':username', $username);
            $username = $user->getUserName();
        } elseif (!empty($user->getEmail())) {
            $query = $this->pdo->prepare('SELECT * FROM users WHERE email = :email');
            $query->bindParam(':email', $email);
            $email = $user->getEmail();
        } else {
            throw new Exception('Authentification invalide ...');
        }
        $query->execute();
        /* $result = $query->fetchAll();
        var_dump ($result); 
        if ($query->rowCount()==1) {
            $result = $query->fetch();
            return password_verify($user->getPassword(), $result['password']);
        } else {
            throw new Exception('Nom d utilisateur invalide ...');
        }
    } */