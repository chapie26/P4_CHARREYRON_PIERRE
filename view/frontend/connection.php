<?php $title = 'Blog de Mr Jean FORTEROCHE'; ?>

<?php ob_start(); ?>
<h2>CONNEXION</h2>
<p>Veuillez indiquez votre pseudo/email ainsi que votre mot de passe pour vous connecter. Si vous n'avez pas encore de compte vous pouvez vous <a href="" >INSCRIRE</a></p>

<form action="index.php?action=connectUser" method="post">
    <div>
        <label for="pseudo">Pseudo/Email</label><br />
        <input type="text" id="pseudo" name="pseudo" />
    </div>
    <div>
        <label for="mdp">Commentaire</label><br />
        <input type="password" id="mdp" name="mdp" />
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>