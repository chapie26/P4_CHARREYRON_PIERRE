<?php $title = 'Blog de Mr Jean FORTEROCHE'; ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="chapter">
    <h2>
        <?php  echo htmlspecialchars($post['title']); ?>
        <em>le <?php echo $post['creation_date_fr']; ?></em>
    </h2>
    <p>
        <?php echo htmlspecialchars_decode($post['content']); ?>
    </p>
</div>

<h2>Commentaires</h2>

<?php
While ($comment = $comments->fetch())
{
?>
    <p><strong><?php echo htmlspecialchars($comment['login_mail']); ?></strong> le <?php echo $comment['comment_date_fr']; ?>
    <?php
    if(isAuthentication() === true){
    ?>
    <a href="index.php?action=flag&post_id=<?= $_GET['id']?>&id=<?= $comment['id'] ?>">(Signaler)</a></p>
    <?php
    }
    ?>
    <p><?php echo htmlspecialchars($comment['comment']); ?></p>
<?php
}
$comments->closeCursor();
?>

<?php
if(isAuthentication() === true) {
?>
    <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
        <div>
            <input type="hidden" value="<?php echo $_SESSION['user_id'] ?>" name="author_id" />
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment"></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>
<?php
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>