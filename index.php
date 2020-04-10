<?php
require('controller/frontend.php');
try{
    error_log($_GET['action'],0);
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
        case ($_GET['action'] == 'newUser');
            newUser();
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