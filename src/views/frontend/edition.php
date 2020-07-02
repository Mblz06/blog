<?php ob_start(); ?>

<script src="https://cdn.tiny.cloud/1/bnxrd7197pvu73hf0aul449bmk7rmy8adlchun9andablvpz/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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
                <?php echo ($data['titre']); 
                ?>
            </h2>

            
<form action="index.php?p=admin.posteditedchap&idchapitre=<?= $_GET['id']?>" method="POST">   
            <textarea id="story" name="story"
          rows="5" cols="33">

                <?php
                echo nl2br(($data['content']));
                ?>    
      
            </textarea>
            
            <p>
            <button class="btn btn-secondary" type="submit">Editer le Chapitre </button>

          
        </p>
            </div>

    <?php
        }
        ?>



<script>
    tinymce.init({
      selector: 'textarea',
      toolbar_mode: 'floating',
      language : 'fr_FR',
    });
  </script>



<?php $content = ob_get_clean(); ?>
<?php require('layout.php'); ?>