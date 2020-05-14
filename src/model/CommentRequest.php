<?php

namespace App\Model;

use App\Model\Manager;
use App\Model\CommentUser;
use \PDO;

class usercomment {

    public function getcomment() {

    if(isset($_REQUEST[‘username’]) && isset($_REQUEST[‘password’])){
    if($_REQUEST[‘username’]==’admin’ && $_REQUEST[‘password’]==’admin’){
    return true;
    }
    else{
        return false;
        }
    }
}

?>