<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://cdn.tiny.cloud/1/ixuygdvn8dxxs0e5sl10ihp8bk79mm50lr20kondefxlz84e/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>tinymce.init({ selector:'#mytextarea', language: 'fr_FR'});</script>
    </head>

    <body>
        <p><a href="index.php">Retour à la liste des billets</a></p>
        <form action="index.php?action=newPost" method="post">
            <label for="title">Titre du chapitre</label>
            <input type="text" id="title" name="title">
            <textarea id="mytextarea" name="mytextarea" placeholder="Ajouter votre contenu ici"></textarea>
            <div>
                <input type="submit" />
            </div>
        </form>

        <?php
        while ($data = $posts->fetch())
        {
        ?>
            <div>
                <p>
                    <strong>
                        <?= htmlspecialchars($data['title']); ?>
                    </strong>
                    (<a href="index.php?action=update&amp;id=<?= $data['id']; ?>">Modifier</a> /
                    <a href="index.php?action=delete&amp;id=<?= $data['id']; ?>">Supprimer</a>)
                </p>
            </div>
        <?php
        }
        $posts->closeCursor();
        ?>

        <h3>Commentaires signalés</h3>
        <?php
        While ($flag = $flags->fetch()) {
        ?>
            <p><strong><?php echo htmlspecialchars($flag['login_mail']); ?></strong> le <?php echo $flag['comment_date_fr']; ?></p>
            <p><?php echo htmlspecialchars($flag['comment']); ?></p>
        <?php
        }
        $flags->closeCursor();
        ?>
    </body>
</html>