<?php ob_start(); ?>

<h3>Commentaires Signalés</h3>


<ul class="list-group listcomment">
<?php

        while ($data = $comment->fetch()) {
            ?>
            
            <li class="list-group-item">
                <?php echo htmlspecialchars($data['content']);
        } ?>
            </li>
    </ul>
 <div class="d-flex justify-content-center" >
     <ul>
            <li>
                            <a href="index.php?post.allsignalcomment" class="btn  btn-danger" type="submit">Commentaires Signalés</a>

                            <a href="" class="btn  btn-success" type="submit">Liste commentaires</a>
            </li>  
    </ul>

    </div>


<?php $content = ob_get_clean(); ?>
<?php require('layout.php'); ?>