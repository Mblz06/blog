<?php ob_start(); ?>


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3>Commentaires Signalés</h3>
        </div>
    </div>



    <?php
        while ($data = $commentaire->fetch())
        {
            ?>
            
            <p> 
                <?php echo htmlspecialchars($data['content']); 
                ?>
            </p>
  </div>
            <hr class="barre"> 
    <?php
        }
        ?>

</div>


<?php $content = ob_get_clean(); ?>
<?php require('layout.php'); ?>
