<?php 

namespace App\Controller;
use App\Model\PostsManager;
use App\Model\CommentManager;
use App\Model\CommentUser;
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

    public function newcomment ($article){
  
        if ((isset($_SESSION['ID']) && filter_has_var(INPUT_POST, 'content'))) {
        $commentmanager = new CommentManager();
        $commentuser = new CommentUser();

        $commentuser->setUserID($_SESSION['ID']);
        $commentuser->setContent(filter_input(INPUT_POST, 'content'));
        $commentuser->setArticle_ID($article);
        $commentmanager->addComment($commentuser);
        }

        else {
           
            throw new Exception('Erreur lors du commentaire.');
        }


        

        header('location: index.php?p=post.show&id='.$article);

  
    }
    public function afterregister (){


    }

    public function admin (){
        $PostsManager = new PostsManager();
        $comment = $PostsManager->allComment();
        $donneesadmin = $PostsManager->lastPosts();
    require ("src/views/frontend/admin.php"); 
    }

    public function allsignalcomment (){
        $PostsManager = new PostsManager();
        $signal = $PostsManager->allSignalComment();

        header('location: index.php?post.allsignalcomment');
    }


    public function removesignal ($id){
        $PostsManager = new PostsManager();
        $post = $PostsManager->removeSignalComment($id);

        header('location: index.php?p=admin');
    }

    public function deletecomment ($id){
        $PostsManager = new PostsManager();
        $post = $PostsManager->deleteComment($id);

        header('location: index.php?p=admin');
    }


    public function editchapter ($id){
        $PostsManager = new PostsManager();
        $post = $PostsManager->getPost($id);
       
    
    require ("src/views/frontend/edition.php"); 
    }
    

}




/*    public function categories(){


    }


    public function singlePost (){  */