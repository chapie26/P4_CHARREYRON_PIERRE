<?php $title = 'Blog de Mr Jean FORTEROCHE'; ?>

<?php ob_start(); ?>
<h2>CONNEXION</h2>
<p>Veuillez indiquez votre pseudo/email ainsi que votre mot de passe pour vous connecter. Si vous n'avez pas encore de compte vous pouvez vous <a href="index.php?action=newUser" >INSCRIRE</a></p>

<form action="/OCP4/P4_CHARREYRON_PIERRE/index.php?action=connectUser" method="post">
    <div>
        <label for="pseudo">Pseudo/Email</label><br />
        <input type="text" id="pseudo" name="pseudo" />
    </div>
    <div>
        <label for="pass">Commentaire</label><br />
        <input type="password" id="pass" name="pass" />
    </div>
    <div>
        <input type="submit" />
    </div>
</form>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>