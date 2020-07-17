<?php ob_start(); ?>

<script src="https://cdn.tiny.cloud/1/bnxrd7197pvu73hf0aul449bmk7rmy8adlchun9andablvpz/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<h3>Ajout un article</h3>

<div class="articles">
    <div class="container text-center">
        <div class="row">

            <div class="col-lg-12">

            <form action="index.php?p=admin.newchapter" method="POST">   
<div class="form-group">
<label for="content_title">titre</label>
<textarea class="form-control" name="content_title" id="content_title" rows="1"></textarea>

    <label for="content_desc">description</label>
    <textarea class="form-control" name="content_desc" id="content_desc" rows="3"></textarea>
        <p>
        <button class="btn btn-secondary" type="submit">Ajouter mon article</button>
        </p>
  </div>
</form>

<script>
    tinymce.init({
      selector: 'textarea',
      toolbar_mode: 'floating',
      language : 'fr_FR',
    });
  </script>

<?php $content = ob_get_clean(); ?>
<?php require('layout.php'); ?>