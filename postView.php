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

        <div>
            <h3>
                <?php  echo htmlspecialchars($post['title']); ?>
                <em>le <?php echo $post['creation_date_fr']; ?></em>
            </h3>
            <p>
                <?php echo htmlspecialchars($post['content']); ?>
            </p>
        </div>

        <h2>Commentaires</h2>

        <?php
        While ($comment = $comments->fetch())
        {
        ?>
            <p><strong><?php echo htmlspecialchars($comment['author']); ?></strong> le <?php echo $comment['comment_date_fr']; ?></p>
            <p><?php echo htmlspecialchars($comment['comment']); ?></p>
        <?php
        }
        ?>
    </body>
</html>