<?php

require 'vendor/autoload.php';

use App\Controller\SecurityController;
use App\Controller\PostsController;


const BASE_PATH = __DIR__;

// Routing 
session_start();


$page = 'home';

if (isset($_GET['p'])) {

    $page = $_GET['p'];
}

try {
    if ($page === 'home') {
        $controller = new PostsController();
        $controller->index();
    } elseif ($page === 'erreur') {
        $controller = new PostsController();
        $controller->category();
    } elseif ($page === 'post.category') {
        $controller = new PostsController();
        $controller->category();
    } elseif ($page === 'admin') {
        if (isset($_SESSION['isAdmin'])) {

            if ($_SESSION['isAdmin'] == 1) {
                $controller = new PostsController();
                $controller->admin();
            } else {
                header('location: index.php');
            }
        } else {
            header('location: index.php');
        }
    } elseif ($page === 'admin.editchapter') {
        if (isset($_GET['id'])) {
            $controller = new PostsController();
            $controller->editchapter($_GET['id']);
        }
    } elseif ($page === 'admin.addchapter') {
        $controller = new PostsController();
        $controller->addchapter();
    } elseif ($page === 'admin.removesignal') {
        if (isset($_GET['id'])) {
            $controller = new PostsController();
            $controller->removesignal($_GET['id']);
        } else {
            throw new Exception('pas id commentaire.');
        }
    } elseif ($page === 'admin.deletecomment') {
        if (isset($_GET['id'])) {
            $controller = new PostsController();
            $controller->deletecomment($_GET['id']);
        } else {
            throw new Exception('pas id commentaire.');
        }
    } elseif ($page === 'admin.deletechapter') {
        if (isset($_GET['id'])) {
            $controller = new PostsController();
            $controller->deletechapter($_GET['id']);
        } else {
            throw new Exception('pas id article.');
        }
    } elseif ($page === 'logout') {
        $controller = new SecurityController();
        $controller->logout();
    } elseif ($page === 'post.show') {
        if (isset($_GET['id'])) {
            $controller = new PostsController();
            $controller->show($_GET['id']);
        } else {
            throw new Exception('pas id chapitre.');
        }
    } elseif ($page === 'login') {
        $controller = new SecurityController();
        $controller->login();
    } elseif ($page === 'signaled') {
        $controller = new PostsController();
        $controller->signaled();
    } elseif ($page === 'admin.posteditedchap') {
        if (isset($_GET['idchapitre']) && isset($_POST['story'])) {
            $controller = new PostsController();
            $controller->posteditedchap($_GET['idchapitre'], $_POST['story']);
        }
    } elseif ($page === 'afterlogin') {
        $controller = new SecurityController();
        $controller->afterlogin();
    } elseif ($page === 'register') {
        $controller = new SecurityController();
        $controller->register();
    } elseif ($page === 'afterregister') {
        $controller = new SecurityController();
        $controller->afterregister();
    } elseif ($page === 'post.newcomment') {
        if (isset($_GET['idchapitre']) && isset($_POST['content'])) {
            $controller = new PostsController();
            $controller->newcomment($_GET['idchapitre'], $_POST['content']);
        } else {
            throw new Exception('problème survenu.');
        }
    } elseif ($page === 'admin.newchapter') {

        if (isset($_POST['content_title']) && isset($_POST['content_desc'])) {
            $controller = new PostsController();
            $controller->newchapter($_POST['content_title'], $_POST['content_desc']);
        } else {
            throw new Exception('problème survenu.');
        }
    } elseif ($page === 'post.signalcomment') {
        if (isset($_GET['id']) && isset($_GET['idchapitre'])) {
            $controller = new PostsController();
            $controller->signalcomment($_GET['id'], $_GET['idchapitre']);
        } else {
            throw new Exception('pas id commentaire.');
        }
    }
} catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}
