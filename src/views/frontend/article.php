<?php ob_start(); ?>
<div class="presentation">
    <div class="background"></div>
    <div class="container">
        <div class="text1">
            <h1>Mont Fuji, me voilà !</h1>
            <h2>“La vie humaine est une rosée passagère.”</h2>
        </div>
    </div>
<div class="articles">
    <div class="container text-center">
        <div class="row">


        <?php 
        while ($data = $post->fetch())
        {
            ?>
            <div class="col-lg-12">
            <h2> 
                <?php echo ($data['title']); 
                ?>
            </h2>
            <i>par Jean Forteroche</i>
            <p class="text-justify">
            <p>
                <?php
                echo nl2br(($data['content']));
                ?>    
            </p>
        </div>
            </div>
    <?php
        }
        ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3>Commentaires</h3>
        </div>
    </div>


    <?php

        while ($data = $commentaire->fetch())
        {
            ?>
            
            <p class="textarticle"> 
                <?php echo htmlspecialchars($data['content']); 
                ?>
            </p>

    <div>
        <a href="index.php?p=post.signalcomment&id=<?= $data['id']?>&idchapitre=<?= $_GET['id']?>"  type="submit">Signaler ce commentaire</a>
    </div>
                


            <hr class="barre"> 

            
    <?php
        }
      //  var_dump($commentaire->rowCount());
        ?>


<?php  
                   if(isset($_SESSION['username'])){
                  
                         ?>


<form action="index.php?p=post.newcomment&idchapitre=<?= $_GET['id']?>" method="POST">   
<div class="form-group">
    <label for="content">Commentaire</label>
    <textarea class="form-control" name="content" id="content" rows="3"></textarea>
        <p>
         <button>Envoyer mon commentaire</button>
        </p>
  </div>
</form>

<?php } 
                           
                           else  { ?>
        <p class="warning">
         Vous devez vous connecter pour pouvoir commenter.
        </p>
<?php    }  ?>


</div>
</div>
</div>
                         

<?php $content = ob_get_clean(); ?>
<?php require('layout.php'); ?>
