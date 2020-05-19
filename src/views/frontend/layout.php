<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Blog de Jean Dore</title>
    <meta charset=utf-8>
    <meta name="description" content="Blog de Mark">
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="../blog/assets/css/style.css" type="text/css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-fixed-top navbar-dark bg-dark main-nav">
            <div class="container">
                <ul class="nav navbar-nav text-nowrap flex-row mx-md-auto order-1 order-md-2">

                    <li class="nav-item"><a class="nav-link" href="#web">
                <?php
                if(isset($_SESSION['username'])){

                    echo($_SESSION['username']);
                    echo 'Bonjour ' .$_SESSION['username']. ',
                    tu portes le numero ' .$_SESSION['ID']. ' dans les id';
                }
                ?>
                </a>
                </li>

                    <button class="navbar-toggler ml-2" type="button" data-toggle="collapse" data-target=".nav-content"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </ul>
                <div class="ml-auto navbar-collapse collapse nav-content order-3 order-md-3">
                    <ul class="ml-auto nav navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#presentation"><i class="fas fa-home"></i></i> ACCEUIL</a> 
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#s1-container"><i class="fas fa-newspaper"></i> ACTUALITES</a>
                        </li>

                        <?php  
                   if(isset($_SESSION['username'])){
                         ?>
                            <li>
                            <a href="index.php?p=logout" class="btn  btn-danger">DECONNEXION</a>
                           </li>     
                            
                           <?php 
                           if ($_SESSION['isAdmin'] ===1){

                                    ?>
                                                            <li class="nav-item">
                                 
                                 <a class="nav-link" href="index.php?p=login"><i class="fas fa-user-plus"></i> ADMINISTRATEUR</a>
                             </li>
                           <?php } 

                           }
                           
                           else  { ?>


                            <li class="nav-item">
                                <a class="nav-link" href="index.php?p=register"><i class="fas fa-user-plus"></i> INSCRIPTION</a>
                            </li>
                            <li class="nav-item">
                                 
                                <a class="nav-link" href="index.php?p=login"><i class="fas fa-user-plus"></i> CONNEXION</a>
                            </li>
                          <?php    }  ?>

                          
                        

     
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
<?php echo $content ?>

<main>
</main>
    <footer>
    </footer>

                           <script src="https://kit.fontawesome.com/85949c255d.js"></script>
