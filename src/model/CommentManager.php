<?php

namespace App\Model;

use App\Model\Manager;
use App\Model\CommentUser;
use \PDO;
use \Exception;

class CommentManager extends Manager
{
    private $table="commentaire";
    public function addComment(CommentUser $commentuser)
    {
        $query = $this->pdo->prepare("INSERT INTO commentaire (userid, content, article_id) VALUES (:userid, :content, :article_id)");

        $userid = $commentuser->getUserID();
        $content = $commentuser->getContent();
        $article_id = $commentuser->getArticle_ID();
        
        $query->bindParam(':userid', $userid);
        $query->bindParam(':content', $content);
        $query->bindParam(':article_id', $article_id);

        $result=$query->execute();

        if ($result==false) {
            throw new Exception('Commentaire non ajouté, problème base de donnée.');
        }
    }
}