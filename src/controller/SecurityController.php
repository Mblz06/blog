<?php

namespace App\Controller;

use App\Controller\Controller;
use App\Model\User;
use App\Model\UserManager;


class SecurityController extends Controller
{
    public function register()
    {
        if (filter_has_var(INPUT_POST, 'email') && filter_has_var(INPUT_POST, 'username') && filter_has_var(INPUT_POST, 'password')) {

            $UserManager = new UserManager();
            $errors = [];

            $user = new User();

            $user->setUserName(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
            $user->setEmail(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
            $user->setPassword(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

            if ($this->verifUsername($user->getUserName())) {
                $errors[] = "username invalide ...";
            } else {
                if ($UserManager->checkUsernameUnicity($user->getUserName())) // il existe déjà un membre avec le même login
                {
                    array_push($errors, "username déjà existant");
                }
            }

            if ($this->verifMail($user->getEmail())) {
                array_push($errors, "email invalide");
            } else {
                if ($UserManager->verifEmail($user->getEmail())) // il existe déjà un membre avec le même email
                {
                    array_push($errors, "email déjà existant");
                }
            }

            if ($this->verifPassword($user->getPassword())) {
                array_push($errors, "password invalide");
            }
            if (count($errors) > 0) {
                // y'as au moins une erreur on affiche tous $errors
                var_dump($errors);
            } else {
                //si y'as aucune erreur on ajoute l'utilisateur
                $user->setPassword(password_hash($user->getPassword(), PASSWORD_DEFAULT));
                $user->setIsAdmin(false);
                var_dump($user);
                $UserManager->addUser($user);
            }
        }
            
        $this->twig->display("frontend/register.html", ['errors' => $errors]);
    }

    public function login()
    {

        if (filter_has_var(INPUT_POST, 'login') && filter_has_var(INPUT_POST, 'password')) {

            $UserManager = new UserManager();
            $user = new User();
            $errors = [];

            $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);

            if ($this->verifMail($login)) {
                $user->setEmail($login);
            } else {
                $user->setUserName($login);
            }

            $user->setPassword(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

            if ($UserManager->authentification($user)) {
                $_SESSION['username'] = $user->getUserName();
                $_SESSION['isAdmin'] = $isadmin->getIsAdmin();
                return false;
            } else {
                array_push($errors, "Mot de passe ou identifiant invalide");
            }
        }
        $this->twig->display("frontend/login.html");
    }

    private function verifUsername($username)
    {
        if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $username)) {
            $retour = true;
        }

        return false;
    }

    private function verifPassword($password)
    {
        if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $password)) {
            $retour = true;
        }

        return false;
    }

    public function verifMail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return false;
    }

}
