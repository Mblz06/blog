<?php

namespace App\Controller;

use App\Controller\Controller;
use App\Model\User;
use App\Model\UserManager;
use App\Model\PostsManager;
use App\Model\CommentManager;
use App\Model\CommentUser;
use App\Model\UserComment;
use \Exception;

class SecurityController
{
    public function afterregister()
    {
        
        // On vérifie si une variable d'un type specifique
        if (filter_has_var(INPUT_POST, 'email') && filter_has_var(INPUT_POST, 'username') && filter_has_var(INPUT_POST, 'password')) {
           
            $UserManager = new UserManager();
            $user = new User();
            
            $user->setUserName(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
            $user->setEmail(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
            $user->setPassword(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

            if ($_POST ['confirm_password'] == $_POST ['password']) {
            } else {
  
                throw new Exception('Votre mot de passe doit être identique');
            }

            if ($this->verifUsername($user->getUserName())) {
            } else {
  
                throw new Exception('username non valide, il doit être composé d\'une majuscule et 5 caractère minimum...');
            }

            if ($this->verifMail($user->getEmail())) {
                } else {
                    if ($UserManager->verifEmail($user->getEmail())) {
                        throw new Exception('email déjà existant');
                    }
                }

            if ($this->verifPassword($user->getPassword())) {
                //si il y a aucune erreur on ajoute l'utilisateur
                $user->setPassword(password_hash($user->getPassword(), PASSWORD_DEFAULT));
                $user->setIsAdmin(false);

                $UserManager->addUser($user);
            } else {
                    throw new Exception('password invalide');
                }
            

        }
            
        header("Location: index.php?p=login");
    }

    public function register()
    {
        require ("src/views/frontend/register.php");
    }



  public function afterlogin()
    {

        if (filter_has_var(INPUT_POST, 'login') && filter_has_var(INPUT_POST, 'password'))  {

            $UserManager = new UserManager();
            // récuperer dans la base de donnée les informations de l'utilisateur dont on a le login

            $user = new User();

            $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
         

            if ($this->verifMail($login)) {
                $user->setEmail($login);
            } else {
                $user->setUserName($login);

            }

            $userbdd = $UserManager->infosUser($user);
            $data = $userbdd->fetch();
            $user->setID($data['ID']);
            $user->setIsAdmin($data['isAdmin']); 

            $user->setPassword(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

            if ($UserManager->authentification($user)) {
                $_SESSION['username'] = $user->getUserName();
                $_SESSION['isAdmin'] = $user->getIsAdmin(); 
                $_SESSION['ID'] = $user->getID();
                
             
            } else {
  
                throw new Exception('Mot de passe ou identifiant non valide ...');
            }
        }
       header("Location: index.php?p=home");
    }


public function login()
{
    require ("src/views/frontend/login.php");
}

 public function logout()
    {

        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
            header("location: index.php?p=home");
    }


    public function commentaires()
    {
        require ("src/views/frontend/commentaires.php");
    }

    private function verifUsername($username)
    { $retour = false;
        if (preg_match("/^(?=.*[A-Z])(?=.*[a-z]).{5,20}/", $username)) {
            $retour = true;
        }

        return $retour;
    }

    private function verifPassword($password)
    {  $retour = false;
        if (preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{5,20}/", $password)) {   
            $retour = true;
        }
// Prendre exemple : P4ssw0rd
        return $retour;
    }



    public function verifMail($email)
    { $retour = false;
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $retour = true;
        }

        return $retour;
    }


    private function verifConfirmPassword()
    {  $retour = false;
        if (filter_has_var(INPUT_POST, 'confirm_password') != filter_has_var(INPUT_POST, 'password')) {
            $retour = true;
        }

        return $retour;
    }



    public function comment()
    {
        require ("src/views/frontend/register.php");
    }

    public function newcomment ($idchapitre){


        if (filter_has_var(INPUT_POST, 'userid') && filter_has_var(INPUT_POST, 'content') && filter_has_var(INPUT_POST, 'article_id')) {
            $CommentManager = new CommentManager();
            $usercomment = new UserComment();
            $usercomment->setContent(filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING));
            if ($usercomment->getUserID()) {
            } else {
  
                throw new Exception('Userid non valide ...');
            }

            if ($usercomment->getContent()) {
                } else {
                    if ($usercomment->getContent()) {
                        throw new Exception('Commentaire Inexistant');
                    }
                }

            if ($usercomment->getArticle_ID()) {
                throw new Exception('Probleme id article');
            }
            else {
                //si il y a aucune erreur on ajoute l'utilisateur

                $CommentManager->addComment($usercomment);
            }
        }
            
        header("Location: index.php?p=home");
    }

}
