<?php ob_start(); ?>
<h2>INSCRIPTION</h2>
<p>Veuillez remplir les champs suivant afin de vous inscrire. Si vous avez déjà un compte vous pouvez vous <a href="" >CONNECTER</a></p>

<form action="index.php?action=addUser" method="post">
    <div>
        <label for="pseudo">Pseudo/Email</label><br />
        <input type="text" id="pseudo" name="pseudo" />
    </div>
    <div>
        <label for="mdp">Mot de passe</label><br />
        <input type="password" id="mdp" name="mdp" />
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>