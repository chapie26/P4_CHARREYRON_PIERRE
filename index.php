<?php
require('controller/frontend.php');
try{
    if(isset($_GET['action'])) {
        if($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
                post();
        }
        elseif ($_GET['action'] == 'addComment') {
            addComment();
        }
        elseif ($_GET['action'] == 'addUser') {
            addUser();
        }
        elseif ($_GET['action'] == 'connectUser') {
            connectUser();
        }
    }
    else {
        listPosts();
    }
}
catch(Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/frontend/errorView.php');
}