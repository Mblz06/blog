<?php ob_start(); ?>


    
            <p class="signal">Le commentaire a été signalé.<p>

<?php $content = ob_get_clean(); ?>
<?php require('layout.php'); ?>
