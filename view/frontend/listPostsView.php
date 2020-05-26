<?php $title = 'Blog de Mr Jean FORTEROCHE'; ?>

<?php ob_start(); ?>
<?php
if(isAuthentication()) {
    echo '<p class="messagePerso">Bonjour ' . $_SESSION['pseudo'] . ' et bienvenu sur mon blog, je vous souhaite une bonne lecture</p>';
}
?>
<h2>Voici mon livre (n'hésitez pas à commenter au fur à mesure des chapitres afin de dire ce que vous en pensez :) )</h2>
<h1>Billet simple pour l'Alaska</h1>
<?php
while ($data = $posts->fetch())
{
?>
    <div>
        <h2 class="titreChapitre">
            <?= htmlspecialchars($data['title']); ?>
            <em>le <?= $data['creation_date_fr']; ?></em>
        </h2>
        <p>
            <p  class="textChapitre"><?= htmlspecialchars_decode($data['content']); ?></p><br />
            <em><a href="index.php?action=post&amp;id=<?= $data['id']; ?>">Commenter</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>