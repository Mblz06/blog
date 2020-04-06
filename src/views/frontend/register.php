
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
                        <input type="text" class="form-control" name="password" placeholder="Your Password *"
                            value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Confirm Password *" value="" />
                    </div>
                </div>
            </div>
            <input type="submit" class="btnSubmit" value="enregistrer" />
        </div>
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('layout.php'); ?>

<!--  <h2>Enregistrement</h2>
    <form action="register.php" method="POST">
        <label>Identifiant :</label>
        <input type="text" name="username" required /><br /><br />
        <label>Mot de passe :</label>
        <input type="password" name="password" required /><br /><br />
        <label>Retapez mot de passe :</label>
        <input type="password" name="password2" required /><br /><br />
        <input type="submit" />
    </form>
    <br /><hr />


    
    <h2>Connexion</h2>
    <form action="login.php" method="POST">
        <label>Identifiant :</label>
        <input type="text" name="username" required /><br /><br />
        <label>Mot de passe :</label>
        <input type="password" name="password" required /><br /><br />
        <input type="submit" />
    </form>
-->

