<?php 

require 'vendor/autoload.php';

use App\Controller\SecurityController;
use App\Controller\PostsController;


const BASE_PATH=__DIR__;

// Routing 

$page = 'home';

if (isset($_GET['p'])) {

    $page = $_GET['p'];

}


try {
    if ($page === 'home') {
        $controller = new PostsController();
        $controller -> index();
    } elseif ($page === 'erreur') {
        $controller = new PostsController();
        $controller -> category();
    } elseif ($page === 'post.category') {
        $controller = new PostsController();
        $controller -> category();
    } elseif ($page === 'post.show') {
        if (isset($_GET['id'])) {
            $controller = new PostsController();
            $controller -> show($_GET['id']);
        }

        else {
            throw new Exception('pas id chapitre.');
        }

    } elseif ($page === 'login') {
        $controller = new SecurityController();
        $controller -> login();
    } elseif ($page === 'afterlogin') {
        $controller = new SecurityController();
        $controller -> afterlogin();
    } elseif ($page === 'register') {
        $controller = new SecurityController();
        $controller -> register();
    }
     elseif ($page === 'afterregister') {
        $controller = new SecurityController();
        $controller -> afterregister();
    }
    elseif ($page === 'commentaires') {
        $controller = new SecurityController();
        $controller -> commentaires();
    }

    elseif ($page === 'post.signalcomment') {
        if (isset($_GET['id']) && isset($_GET['idchapitre'])) {
            $controller = new PostsController();
            $controller -> signalcomment($_GET['id'], $_GET['idchapitre']);
        }


        else {
            throw new Exception('pas id commentaire.');
            }
    }

}

catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}


/*

switch ($page) {

    case 'home':
        echo $twig->render('home.html');
        break;
    case 'register':
        echo $twig->render('register.html');
        break;

        default :
         header ('HTTP/1.0 404 Not Found');
         echo $twig->render('404.html');
         break;
}
*/


/*

<?php

$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$db = "blog";

$connect = mysqli_connect($dbhost, $dbusername, $dbpassword, $db) or die("Could not connect to database");


?>

*/