<?php $title = 'Blog de Mr Jean FORTEROCHE'; ?>

<?php ob_start(); ?>
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
            <em><a href="index.php?action=post&amp;id=<?= $data['id']; ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = obj_get_clean(); ?>

<?php require('template.php'); ?>