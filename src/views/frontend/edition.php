<?php ob_start(); ?>

<h3>Edition de l'Article</h3>

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
            <textarea id="story" name="story"
          rows="5" cols="33">

                <?php
                echo nl2br(htmlspecialchars($data['content']));
                ?>    
      
            </textarea>
            </div>
    <?php
        }
        ?>


<?php $content = ob_get_clean(); ?>
<?php require('layout.php'); ?>