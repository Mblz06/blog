<?php

namespace App\Model;

use App\Model\Manager;
use App\Model\User;
use \PDO;
use \Exception;

class PostsManager extends Manager
{
    public function lastPosts()
    {
        $query = $this->pdo->query('SELECT id, titre, content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_fr FROM articles ORDER BY id DESC');
        if ( $query === false)
        {
            throw new Exception('problème recuperation derniers articles.');
        }
        else {
            return $query;
        }
    }


    public function comments()
    {
        $query = $this->pdo->query('SELECT id, userid, content, article_id, signalement, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS comments_fr FROM commentaire ORDER BY id DESC LIMIT 0, 500'); 
        if ( $query === false)
        {
            throw new Exception('problème recuperation des commentaires.');
        }
        else {
            return $query;
        }
    }

    // getPost en fonction d'un ID 

    public function getPost($ID)
    {
        $query = $this->pdo->prepare('SELECT ID, titre, content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS post FROM articles  WHERE ID = :ID ORDER BY ID DESC LIMIT 0, 500'); 
        $query->bindParam(':ID', $ID);
        $result=$query->execute();
        if ( $result === false)
        {
            throw new Exception('problème recuperation de l article.');
        }
        else {
            return $query;
        }
    }

    public function getCommentpost($ID)
    {
        $query = $this->pdo->prepare('SELECT id, userid, content, article_id, signalement, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_post FROM commentaire  WHERE article_id = :ID ORDER BY id DESC LIMIT 0, 500');
        $query->bindParam(':ID', $ID);
        $result=$query->execute();
        if ($result === false) {
            throw new Exception('problème recuperation du commentaire.');
        } else {
            return $query;
        }
    }

    // getCommentpost en fonction d'un id de chaptire
    
    public function updateCommentSignal($ID)
    {
        $query = $this->pdo->prepare('Update commentaire SET signalement=1 WHERE id= :ID'); 
        $query->bindParam(':ID', $ID);
        $result=$query->execute();
        if ( $result === false)
        {
            throw new Exception('problème signalement commentaire.');
        }
        else {
            return $query;
        }
    }


    // Signaler un commentaire 
    public function signal($ID)
    {
        $query = $this->pdo->prepare('SELECT ID, titre, content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS post FROM commentaire  WHERE ID = :ID ORDER BY ID DESC LIMIT 0, 500'); 
        $query->bindParam(':ID', $ID);
        $result=$query->execute();
        if ( $result === false)
        {
            throw new Exception('problème envoi signal.');
        }
        else {
            $query = $this->pdo->prepare('UPDATE '); 
        }
    }
    // Recuperer commentaires Signalés
    public function signalcomments()
    {
        $query = $this->pdo->query('SELECT id, userid, content, article_id, signalement, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS allcomments FROM commentaire WHERE signalement = 1 ORDER BY id DESC LIMIT 0, 500'); 
        if ( $query === false)
        {
            throw new Exception('problème recuperation des commentaires signalés.');
        }
        else {
            return $query;
        }
    }


        /* Ajouter commentaire

        public function addcommentaire($ID)
        {
            $query = $this->pdo->prepare("INSERT INTO commentaire (userid, content, article_id) VALUES (:userid, :content, :article_id)");
            $query->bindParam(':ID', $ID);
            $result=$query->execute();
    
            if ($result==false) {
                throw new Exception('Commentaire non ajouté.');
            }
        } */
 



}


