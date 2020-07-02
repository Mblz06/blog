<?php ob_start(); ?>
<div class="container register-form">

    <div class="note">
        <p>login.</p>
    </div>


    <form action="index.php?p=afterlogin" method="POST">
        <div class="form-content">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="login" placeholder="Votre Nom de Compte *"
                            value="" />
                    </div>
                    

       
                    <div class="form-group">
                        <input type="text" class="form-control" name="password" placeholder="Your Password *"
                            value="" />
                    </div>
                    </div>
            </div>
            <input type="submit" class="btnSubmit" value="login" />
        </div>
    
</form>
<?php $content = ob_get_clean(); ?>
<?php require('layout.php'); ?>