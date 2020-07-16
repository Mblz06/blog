
<?php ob_start(); ?>
<div class="container register-form">

    <div class="note">
        <p>Inscription.</p>
    </div>

    <form action="index.php?p=afterregister" method="POST">
        <div class="form-content">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Votre Nom de Compte *"
                            value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="email *" value="" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Ton mot de passe *"
                            value="" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="confirm_password" placeholder="Confirmer mot de passe *" value="" />
                    </div>
                </div>
            </div>
            <p><i>*Votre nom de compte et mot de passe doivent au moins comporter une majuscule et plus de 5 caractères.</i></p>
            <p><i>*Votre mot de passe doit au moins comporter un caractère spécial et un numéro.</i></p>
            <input type="submit" class="btnSubmit" value="enregistrer" />
        </div>
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('layout.php'); ?>


