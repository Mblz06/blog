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
        $query = $this->pdo->query('SELECT id, title, content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_fr FROM articles ORDER BY id DESC');
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
        $query = $this->pdo->query('SELECT id, userid, content, article_id, reporting, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS comments_fr FROM commentaire ORDER BY id DESC LIMIT 0, 500'); 
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
        $query = $this->pdo->prepare('SELECT ID, title, content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS post FROM articles  WHERE ID = :ID ORDER BY ID DESC LIMIT 0, 500'); 
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
        $query = $this->pdo->prepare('SELECT id, userid, content, article_id, reporting, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_post FROM commentaire  WHERE article_id = :ID ORDER BY id DESC LIMIT 0, 500');
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
        $query = $this->pdo->prepare('Update commentaire SET reporting=1 WHERE id= :ID'); 
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
        $query = $this->pdo->prepare('SELECT ID, title, content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS post FROM commentaire  WHERE ID = :ID ORDER BY ID DESC LIMIT 0, 500'); 
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
        $query = $this->pdo->query('SELECT id, userid, content, article_id, reporting, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS allcomments FROM commentaire WHERE reporting = 1 ORDER BY id DESC LIMIT 0, 500'); 
        if ( $query === false)
        {
            throw new Exception('problème recuperation des commentaires signalés.');
        }
        else {
            return $query;
        }
    }

 

        public function allComment()
        {
            $query = $this->pdo->query('SELECT id, userid, content, article_id, reporting, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS comments_fr FROM commentaire WHERE reporting = 1 ORDER BY id DESC LIMIT 0, 500'); 
            if ( $query === false)
            {
                throw new Exception('problème recuperation des commentaires.');
            }
            else {
                return $query;
            }
        }
    
        public function allSignalComment()
        {
            $query = $this->pdo->query('SELECT id, userid, content, article_id, reporting, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS comments_fr FROM commentaire  WHERE reporting = 1 ORDER BY id DESC LIMIT 0, 500'); 
            if ( $query === false)
            {
                throw new Exception('problème recuperation des commentaires signalés.');
            }
            else {
                return $query;
            }
        }
    

        public function removeSignalComment($ID)
        {
            $query = $this->pdo->prepare('Update commentaire SET reporting=0 WHERE id= :ID'); 
            $query->bindParam(':ID', $ID);
            $result=$query->execute();
            if ( $result === false)
            {
                throw new Exception('problème lors de la suppression du signalement.');
            }
            else {
                return $query;
            }
        }
        
        public function deleteComment($ID)
        {
            $query = $this->pdo->prepare('DELETE FROM `commentaire` WHERE id= :ID'); 
            $query->bindParam(':ID', $ID);
            $result=$query->execute();
            if ( $result === false)
            {
                throw new Exception('problème lors de la suppression du commentaire.');
            }
            else {
                return $query;
            }
        }

    
        public function editChapitre($ID, $story, $edititle)  
        {
          
            $query = $this->pdo->prepare("Update articles SET content=:content, title=:title WHERE id= :ID");  
    
            $query->bindParam(':ID', $ID);
            $query->bindParam(':content', $story);
            $query->bindParam(':title', $edititle);
            $result=$query->execute();
            if ( $result === false)
            {
                throw new Exception('problème lors de l edition du commentaire.');
            }
            else {
                return $query;
            }
        }





        public function addChapitre($content_title, $content_content)
        {
            $query = $this->pdo->prepare("INSERT INTO articles (title, content) VALUES (:title, :content)");

            $query->bindParam(':title', $content_title);
            $query->bindParam(':content', $content_content);
            $result=$query->execute();
            if ( $result === false)
            {
                throw new Exception('problème lors de l ajout de l article.');
            }
            else {
                return $query;
            }
        }
    
                
        public function deleteChapter($ID)
        {
            $query = $this->pdo->prepare('DELETE FROM `articles` WHERE id= :ID'); 
            $query->bindParam(':ID', $ID);
            $result=$query->execute();
            if ( $result === false)
            {
                throw new Exception('problème lors de la suppression de l article.');
            }
            else {
                return $query;
            }
        }






}


