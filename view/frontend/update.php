<?php $title = 'Blog de Mr Jean FORTEROCHE'; ?>

<?php ob_start(); ?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://cdn.tiny.cloud/1/ixuygdvn8dxxs0e5sl10ihp8bk79mm50lr20kondefxlz84e/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>tinymce.init({ selector:'#mytextarea', language: 'fr_FR'});</script>
    </head>

    <body>
        <p><a href="index.php">Retour à la liste des billets</a></p>
        <form action="index.php?action=postUpdated&amp;id=<?= $post['id'] ?>" method="post">
            <div class="saisi">
                <label for="title">Titre du chapitre:</label>
                <input type="text" id="title" name="title" value="<?php  echo htmlspecialchars($post['title']); ?>">
            </div>
            <textarea id="mytextarea" name="mytextarea"><?php echo htmlspecialchars_decode($post['content']); ?></textarea>
            <div>
                <input type="submit" />
            </div>
        </form>
    </body>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>