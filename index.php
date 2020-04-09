<?php
require('controller/frontend.php');
try{
    switch(isset($_GET['action'])) {
        case($_GET['action'] == 'listPosts'):
            listPosts();
        break;
        case ($_GET['action'] == 'post'):
                post();
        break;
        case ($_GET['action'] == 'addComment'):
            addComment();
        break;
        case ($_GET['action'] == 'addUser'):
            addUser();
        break;
        case ($_GET['action'] == 'connectUser'):
            connectUser();
        break;
        default:
        listPosts();
        break;
    }
}
catch(Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/frontend/errorView.php');
}