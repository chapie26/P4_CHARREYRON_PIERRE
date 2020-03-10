<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Blog de Mr Jean Forteroche</title>
        <link href="style.css" rel="stylesheet" />
    </head>

    <body>
        <h1>Mon super blog!</h1>
        <h2>Derniers billets du blog!</h2>

        <?php
        while ($donnees = $req->fetch())
        {
        ?>
            <div>
                <h3>
                    <?php  echo htmlspecialchars($donnees['titre']); ?>
                    <em>le <?php echo $donnees['date_creation_fr']; ?></em>
                </h3>
                <p>
                    <?php echo htmlspecialchars($donnees['contenu']); ?><br />
                    <em><a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a></em>
                </p>
            </div>
        <?php
        }
        $req->closeCursor();
        ?>
    </body>
</html>