<?php

namespace App\Controller;

use App\Controller\Controller;
use App\Model\User;
use App\Model\UserManager;
use \Exception;

class SecurityController
{
    public function afterregister()
    {
        if (filter_has_var(INPUT_POST, 'email') && filter_has_var(INPUT_POST, 'username') && filter_has_var(INPUT_POST, 'password')) {
            $UserManager = new UserManager();
            $user = new User();
            
            $user->setUserName(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
            $user->setEmail(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
            $user->setPassword(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

            if ($this->verifUsername($user->getUserName())) {
            } else {
  
                throw new Exception('username non valide ...');
            }

            if ($this->verifMail($user->getEmail())) {
                } else {
                    if ($UserManager->verifEmail($user->getEmail())) {
                        throw new Exception('email déjà existant');
                    }
                }

            if ($this->verifPassword($user->getPassword())) {
                throw new Exception('password invalide');
            }
            else {
                //si y'as aucune erreur on ajoute l'utilisateur
                $user->setPassword(password_hash($user->getPassword(), PASSWORD_DEFAULT));
                $user->setIsAdmin(false);

                $UserManager->addUser($user);
            }
        }
            
        header("Location: index.php?p=login");
    }

    public function register()
    {
        require ("src/views/frontend/register.php");
    }



    public function login()
    {

        if (filter_has_var(INPUT_POST, 'login') && filter_has_var(INPUT_POST, 'password'))  {

            $UserManager = new UserManager();
            $user = new User();


            $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);

            if ($this->verifMail($login)) {
                $user->setEmail($login);
            } else {
                $user->setUserName($login);
            }

            $user->setPassword(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

            if ($UserManager->authentification($user)) {
                $_SESSION['username'] = $user->getUserName();
                $_SESSION['isAdmin'] = $user->getIsAdmin(); 
                $_SESSION['ID'] = $user->getID();
            } else {
  
                throw new Exception('Mot de passe ou identifiant non valide ...');
            }
        }
       /* $this->twig->display("frontend/home.html"); */
       
    header("Location: index.php?p=home");
    }



 public function logout()
    {
        session_start();

        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
            session_destroy();
    }

    public function commentaires()
    {
        require ("src/views/frontend/commentaires.php");
    }

    private function verifUsername($username)
    { $retour = false;
        if (preg_match("/^[a-z\d_]{5,20}$/i", $username)) { 
            $retour = true;
        }

        return $retour;
    }

    private function verifPassword($password)
    {  $retour = false;
        if (preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/", $password)) {
            $retour = true;
        }

        return $retour;
    }

    public function verifMail($email)
    { $retour = false;
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $retour = true;
        }

        return $retour;
    }

}


/* public function verifMail($email)
{ $retour = false;
    if (filter_var('test@test.com', FILTER_VALIDATE_EMAIL)) {
        $retour = true;
    }

    return $retour;
}

} */