<?php

namespace App\Model;

use App\Model\Manager;
use App\Model\User;
use \PDO;

class userManager extends Manager
{
    private $table="users";
    public function addUser(User $user) 
    {
        $query = $this->pdo->prepare("INSERT INTO users (username, password, email, isAdmin) VALUES (:username, :password, :email, :isAdmin)");
        $query->bindParam(':username', $username);
        $query->bindParam(':password', $password);
        $query->bindParam(':email', $email);
        $query->bindParam(':isAdmin', $isAdmin);

        $username = $user->getUserName();
        $password = $user->getPassword();
        $email = $user->getEmail();
        $isAdmin = $user->getIsAdmin();


    
        try {
            $query->execute();
            var_dump($this->pdo->errorInfo());
        } 
        catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage();
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
            echo 'Exception reçue : ',  $e->getMessage();
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
            echo 'Exception reçue : ',  $e->getMessage();
        }
    }

    public function authentification(User $user)
    {
        if(!empty($user->getUserName())) {
            $query = $this->pdo->prepare('SELECT * FROM users WHERE username = :username');
            $query->bindParam(':username', $username);
            $username = $user->getUserName();
        } elseif(!empty($user->getEmail())) {
            $query = $this->pdo->prepare('SELECT * FROM users WHERE email = :email');
            $query->bindParam(':email', $email);
            $email = $user->getEmail();
        } else {
            return false;
        }


        try {
            $query->execute();
            $result = $query->fetchAll();
            var_dump ($result);
            if(isset($result[0])) {
                return password_verify($user->getPassword(), $result[0]['password']);
            } else {
                return false;
            }
         } catch (Exception $e) {
             echo 'Exception reçue : ',  $e->getMessage();
         }
    }

}
