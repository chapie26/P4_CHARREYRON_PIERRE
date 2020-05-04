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
        <form method="post" action="">
            <textarea id="mytextarea">Hello, World!!</textarea>
        </form>

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