<?php

namespace App\Model;

use App\Model\Manager;
use App\Model\User;
use \PDO;

class login {

    public function getlogin() {

    if(isset($_REQUEST[‘username’]) && isset($_REQUEST[‘password’])){
    if($_REQUEST[‘username’]==’admin’ && $_REQUEST[‘password’]==’admin’){
    return true;
    }
    else{
        return false;
        }
    }
}


/* public function login () { 

    if(!isset($_POST['submit'])){

        echo"Merci de vous connecter pour continuer";
        die("<br /><a href='register.php'>Log In</a>");
        
    }

    $username = $_POST['username'];
    $passwordAttempt = $_POST['password'];
    $hashPasswordAttempt = md5($passwordAttempt);


    if($username == "" or $username == NULL){

        echo"Merci d'entrer un nom d'utilisateur";
        die("<br /><a href='register.php'>Retourner</a>");

    }

        if($passwordAttempt == "" or $passwordAttempt == NULL){

        echo"Veuillez entrer un mot de passe";
        die("<br /><a href='register.php'>Retourner</a>");

    }


    include ('connect.php');

    $query = ("SELECT * FROM users WHERE username ='$username'");
    $result = mysqli_query($connect, $query);
    $hits = mysqli_affected_rows($connect);

    if($hits < 1){

        echo"Combinaison nom d'utilisateur / mot de passe incorrecte, veuillez réessayer";
        die("<br /><a href='register.php'>Retourner</a>");


    }


    while ($row = mysqli_fetch_assoc($result)) {
        $password = $row['password'];

        if ($password != $hashPasswordAttempt) {
            echo"Combinaison nom d'utilisateur / mot de passe incorrecte, veuillez réessayer.";
            die("<br /><a href='index.php'>register</a>");
        } else {
            $_SESSION['username'] = $username;

            header("location: UserLoged.php");

            die("");
        }
    }  */


?>