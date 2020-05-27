<?php $title = 'Blog de Mr Jean FORTEROCHE'; ?>

<?php ob_start(); ?>
<h1>
    <?php
        echo 'Erreur : ' . $errorMessage
    ?>
</h1>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>