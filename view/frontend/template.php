<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8" />
        <title><?= $title ?></title>
        <link href="public/stylesheet/style.css" rel="stylesheet" />
    </head>

    <body>
        <nav class="navbar">
            <ol>
                <?php
                if(isAuthentication()) {
                ?>
                    <li><a href="index.php?action=disconnectUser">Déconnexion</a></li>
                <?php
                    if(isAdmin()) {
                        ?>
                            <li><a href="index.php?action=admin">Administration</a></li>
                        <?php
                    }
                }
                else {
                ?>
                    <li><a href="index.php?action=newUser">Inscription</a></li>
                    <li><a href="index.php?action=connect">Connexion</a></li>
                <?php
                }
                ?>
            </ol>
        </nav>
        <?= $content ?>
    </body>
</html>