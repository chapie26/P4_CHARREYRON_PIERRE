<?php
session_start();
require('controller/frontend.php');
try{
    switch($_GET['action']) {
        case 'listPosts':
            listPosts();
            break;
        case 'post':
            post();
            break;
        case 'addComment':
            addComment();
            break;
        case 'newUser';
            newUser();
            break;
        case 'addUser':
            addUser();
            break;
        case 'connectUser':
            connectUser();
            break;
        case 'disconnectUser':
            disconnectUser();
            break;
        case 'connect':
            connect();
            break;
        case 'admin':
            administration();
            break;
        case 'flag':
            isFlag();
            break;
        case 'newPost':
            newPost();
            break;
        case 'delete';
            noPost();
            break;
        default:
            listPosts();
            break;
    }
}
catch(Exception $e) {
    $errorMessage = $e->getMessage();
}