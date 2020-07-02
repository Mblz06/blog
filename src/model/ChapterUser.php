<?php

namespace App\Model;

class CommentUser
{

    private $content_title;
    private $content_desc;

    public function getUserID()
    {
        return $this->userid;
    }

    public function getContent()
    {
        return $this->content;
    }


    public function getArticle_ID()
    {
        return $this->article_id;
    }


    public function setUserID($userid)
    {
        $this->userid = $userid;
        return $this;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function setArticle_ID($article_id)
    {
        $this->article_id = $article_id;
        return $this;
    }

}


