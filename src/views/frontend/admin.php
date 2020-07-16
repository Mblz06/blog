<?php ob_start(); ?>


<h3 class="m-title">Commentaires Signalés</h3>

    <?php

    while ($data = $comment->fetch()) {
    ?>

        <li class="list-group-item">

            <a href="index.php?p=admin.removesignal&id=<?= $data['id'] ?>" class="btn  btn-primary" type="submit">Retirer Signalement</a>
            <a href="index.php?p=admin.deletecomment&id=<?= $data['id'] ?>" class="btn  btn-danger" type="submit">Supprimer commentaire</a>
        <?php echo ($data['content']);
    } ?>

        </li>


<h3 class="m-title">Editer un Chapitre</h3>

<?php
while ($data = $donneesadmin->fetch()) {
?>
    <li class="list-group-item">
        <a href="index.php?p=admin.editchapter&id=<?= $data['id'] ?>" class="btn  btn-primary" type="submit">Editer le chapitre</a>
        <a href="index.php?p=admin.deletechapter&id=<?= $data['id'] ?>" class="btn  btn-danger" type="submit">Supprimer le chapitre</a>
        <h2>
            <?php echo ($data['title']);
            ?>
            <em>le <?php echo $data['date_fr']; ?></em>
        </h2>
    </li>

<?php
}
?>


<h3 class="m-title">Ajouter un Chapitre</h3>


<li class="list-group-item">
    <a href="index.php?p=admin.addchapter" class="btn  btn-primary" type="submit">Ajouter Chapitre</a>
</li>




<?php $content = ob_get_clean(); ?>
<?php require('layout.php'); ?>