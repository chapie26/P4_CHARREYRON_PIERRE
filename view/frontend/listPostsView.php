<?php $title = 'Blog de Mr Jean FORTEROCHE'; ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>
<?php
if(isAuthentication()) {
    echo '<p class="messagePerso">Bonjour ' . $_SESSION['pseudo'] . ' et bienvenu sur mon blog, je vous souhaite une bonne lecture</p>';
}
?>
<h2>Voici la liste des chapitres de mon livre :</h2>
<?php
while ($data = $posts->fetch())
{
?>
    <div>
        <h2 class="chapitre">
            <?= htmlspecialchars($data['title']); ?>
            <em>le <?= $data['creation_date_fr']; ?></em>
        </h2>
        <p>
            <?= htmlspecialchars_decode($data['content']); ?><br />
            <em><a href="index.php?action=post&amp;id=<?= $data['id']; ?>">Commenter</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>