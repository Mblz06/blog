<?php 
namespace App\Model;

use \PDO;

class Manager{

    protected $pdo;

    function __construct() {

        $this->pdo = new PDO(
            'mysql:host=localhost;dbname=blog; charset=utf8', 'root', '');
            }
        }
        
?>


