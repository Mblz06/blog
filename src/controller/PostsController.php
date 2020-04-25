<?php 

namespace App\Controller;
use App\Model\PostsManager;
use \Exception;

$home = "t";


class PostsController {


    public function index () {
 // recuperer liste article bdd ex $article
        /// $donnees =$req->fetch();
        $PostsManager = new PostsManager();
        $donnees = $PostsManager->lastPosts();
        require ("src/views/frontend/home.php"); 
    }


    public function category(){


    }


    public function show ($id){
        $PostsManager = new PostsManager();
        $post = $PostsManager->getPost($id);
        $commentaire = $PostsManager->getCommentpost($id);
       
    echo 'Affichage du chapitre'.$id;
    require ("src/views/frontend/article.php"); 
    }


    public function signalcomment ($id, $idchapitre){
        $PostsManager = new PostsManager();
        $post = $PostsManager->updateCommentSignal($id);

        header('location: index.php?p=post.show&id='.$idchapitre);
    }

    public function afterlogin (){


    }

    public function register (){


    }

    public function newcomment ($idchapitre){
        $PostsManager = new PostsManager();
        $donnees = $PostsManager->addcommentaire($idchapitre);

        header('location: index.php?p=post.show&id='.$idchapitre);

    }

    public function afterregister (){


    }

}




/*    public function categories(){


    }


    public function singlePost (){  */