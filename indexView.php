<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Blog de Mr Jean Forteroche</title>
        <link href="style.css" rel="stylesheet" />
    </head>

    <body>
        <h1>Mon super blog!</h1>
        <h2>Derniers billets du blog :</h2>

        <?php
        while ($data = $posts->fetch())
        {
        ?>
            <div>
                <h3>
                    <?= htmlspecialchars($data['title']); ?>
                    <em>le <?= $data['creation_date_fr']; ?></em>
                </h3>
                <p>
                    <?= htmlspecialchars($data['content']); ?><br />
                    <em><a href="post.php?id=<?= $data['id']; ?>">Commentaires</a></em>
                </p>
            </div>
        <?php
        }
        $posts->closeCursor();
        ?>
    </body>
</html>