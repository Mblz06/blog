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
        while ($data = $donnees->fetch())
        {
            ?>
            <div class="col-lg-6">
            <h2> 
                <?php echo htmlspecialchars($data['titre']); 
                ?>
                <em>le <?php echo $data['date_fr']; ?></em>
            </h2>

            <p>
                <?php
                echo nl2br(htmlspecialchars($data['content']));
                ?>    
            </p>
            <p><a class="btn btn-primary" href="index.php?p=post.show&id=<?= $data['id']?>" role="button">Voir la suite &raquo;</a></p>
            </div>
    <?php
        }
        ?>


<?php $content = ob_get_clean(); ?>
<?php require('layout.php'); ?>
