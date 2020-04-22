<!DOCTYPE html>
<html>
<head>
  <script src="https://cdn.tiny.cloud/1/ixuygdvn8dxxs0e5sl10ihp8bk79mm50lr20kondefxlz84e/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
    <form method="post">
        <textarea>
            Welcome to TinyMCE!
        </textarea>
    </form>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
            toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name'
    });
    </script>
</body>
</html>