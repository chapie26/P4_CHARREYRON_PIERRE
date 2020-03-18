<?php $title = 'Blog de Mr Jean FORTEROCHE'; ?>

<?php ob_start(); ?>
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

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php
While ($comment = $comments->fetch())
{
?>
    <p><strong><?php echo htmlspecialchars($comment['author']); ?></strong> le <?php echo $comment['comment_date_fr']; ?></p>
    <p><?php echo htmlspecialchars($comment['comment']); ?></p>
<?php
}
$comments->closeCursor();
?>

<?php $content = obj_get_clean(); ?>

<?php require('template.php'); ?>