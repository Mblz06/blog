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



if($page === 'home') {

    $controller = new PostsController();
    $controller -> index();

}

elseif($page === 'post.category') {

    $controller = new PostsController();
    $controller -> category();
}

elseif($page === 'post.show') {

    $controller = new PostsController();
    $controller -> show();
}

elseif($page === 'login') {

    $controller = new SecurityController();
    $controller -> login();
}

elseif($page === 'afterlogin') {

    $controller = new SecurityController();
    $controller -> afterlogin();
}

elseif($page === 'register') {

    $controller = new SecurityController();
    $controller -> register();
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