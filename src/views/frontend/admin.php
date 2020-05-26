<?php ob_start(); ?>

<h3>Commentaires Signalés</h3>

<ul class="list-group listcomment">
<?php

        while ($data = $comment->fetch()) {
            ?>
            
            <li class="list-group-item">
              
            <a href="index.php?p=admin.removesignal&id=<?= $data['id']?>" class="btn  btn-danger" type="submit">Retirer Signalement</a>
 
                <?php echo htmlspecialchars($data['content']);
  
        } ?>
         
            </li>
    </ul>

    <h3>Editer un Chapitre</h3>

    <?php 
        while ($data = $donneesadmin->fetch())
        {
            ?>
            <div class="col-lg-6">
            <h2> 
                <?php echo htmlspecialchars($data['titre']); 
                ?>
                <em>le <?php echo $data['date_fr']; ?></em>
            </h2>
           
            </div>
    <?php
        }
        ?>


<?php $content = ob_get_clean(); ?>
<?php require('layout.php'); ?>