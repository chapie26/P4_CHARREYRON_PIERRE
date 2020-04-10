<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8" />
        <title><?= $title ?></title>
        <link href="style.css" rel="stylesheet" />
    </head>

    <body>
        <nav class="navbar">
            <ol>
                <li><a href="index.php?action=newUser">Inscription</a></li>
                <li><a href="view/frontend/connection.php">Connexion</a></li>
                <li><a href="">Déconnexion</a></li>
            </ol>
        </nav>
        <?= $content ?>
    </body>
</html>