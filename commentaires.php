<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Blog de Mr Jean Forteroche</title>
        <link href="style.css" rel="stylesheet" />
    </head>

    <body>
        <h1>Mon super blog!</h1>
        <p><a href="index.php">Retour à la liste des billets</a></p>

        <?php
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }

        $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = ?');
        $req->execute(array($_GET['billet']));
        $donnees = $req->fetch();
        ?>

        <div>
            <h3>
                <?php  echo htmlspecialchars($donnees['titre']); ?>
                <em>le <?php echo $donnees['date_creation_fr']; ?></em>
            </h3>
            <p>
                <?php echo htmlspecialchars($donnees['contenu']); ?>
            </p>
        </div>

        <h2>Commentaires</h2>
        <?php
        $req->closeCursor();

        $req = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
        $req->execute(array($_GET['billet']));

        While ($donnees = $req->fetch())
        {
        ?>
            <p><strong><?php echo htmlspecialchars($donnees['auteur']); ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?></p>
            <p><?php echo htmlspecialchars($donnees['commentaire']); ?></p>
        <?php
        }
        $req->closeCursor();
        ?>
    </body>
</html>