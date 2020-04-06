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
                <?php echo htmlspecialchars($data['titre']); 
                ?>
            </h2>

            <p>
                <?php
                echo nl2br(htmlspecialchars($data['content']));
                ?>    
            </p>
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
<!-- <div class="row"> 
  <div class="col-sm-1">
        <div class="thumbnail">
            <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
        </div>
    </div>

<div class="col-sm-5"> 
    <div class="panel panel-default">
         <div class="panel-heading">
            <strong>Anonyme</strong> <span class="text-muted">date</span>
        </div> 
    <div class="panel-body"> -->


    <?php
  //  var_dump($commentaire);
   // var_dump($commentaire->rowCount());
        while ($data = $commentaire->fetch())
        {
            ?>
            
            <p> 
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

</div>
</div>
</div>
 <!--
<div class="col-sm-1">
    <div class="thumbnail">
        <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
    </div>
</div>

<div class="col-sm-5">
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>Anonyme</strong> <span class="text-muted">date</span>
        </div>
    <div class="panel-body">
Super blog ! Mais ce text est encore en html
    </div>
 </div>
</div>
</div>

</div>
    -->

<?php $content = ob_get_clean(); ?>
<?php require('layout.php'); ?>
