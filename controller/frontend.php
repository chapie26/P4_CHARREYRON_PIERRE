<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/User.php');

function addComment() {
    $commentManager = new Chapie\Blog\model\CommentManager();
    if (isset($_GET['id']) && $_GET['id'] > 0) {
        if (!empty($_POST['author_id']) && !empty($_POST['comment'])) {
            $affectedLines = $commentManager->postComment($_GET['id'], $_POST['author_id'], $_POST['comment']);

            if (!$affectedLines) {
                throw new Exception('Impossible d\'ajouter le commentaire !');
            }
            else {
                header('Location: index.php?action=post&id=' . $_GET['id']);
            }
        }
        else {
            throw new Exception( 'Tous les champs ne sont pas remplis !');
        }
    }
    else {
        throw new Exception('Aucun identifiant de billet envoyé');
    }
}

function listPosts() {
    $postManager = new Chapie\Blog\model\PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/listPostsView.php');
}

function post() {
    $postManager = new Chapie\Blog\model\PostManager();
    $commentManager = new Chapie\Blog\model\CommentManager();

    if (isset($_GET['id']) && $_GET['id'] > 0) {
        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);

        require('view/frontend/postView.php');
    }
    else {
        throw new Exception('Aucun identifiant de billet envoyé');
    }
}

function addUser() {
    $user = new Chapie\Blog\model\User();
    if (!empty($_POST['pseudo']) && !empty($_POST['pass'])) {
        $newMember = $user->register($_POST['pseudo'], $_POST['pass']);
        if ($newMember === null || !$newMember) {
            throw new Exception('Login déjà utilisé');
        }
        else {
            require('view/frontend/connection.php');
        }
    }
    else {
        throw new Exception('Impossible d\'ajouter le membre');
    }
}

function connectUser() {
    $member = new Chapie\Blog\model\User();

    $connectMember = $member->signin($_POST['pseudo'], $_POST['pass']);
    if (!$connectMember){
        throw new Exception('Connexion impossible');
    }
    else {
        $_SESSION['admin'] = $connectMember['admin'];
        $_SESSION['pseudo'] = $connectMember['login_mail'];
        $_SESSION['user_id'] = $connectMember['id'];
        header('Location: index.php');
    }
}

function newUser() {
    require('view/frontend/registration.php');
}

function connect() {
    require('view/frontend/connection.php');
}

function disconnectUser() {
    $_SESSION = array();
    session_destroy();
    header('Location: index.php');
}

function administration() {
    require('view/frontend/administration.php');
}

function isAuthentication() {
    if (isset($_SESSION['pseudo'])) {
        return true;
    }
    else {
        return false;
    }
}

function isAdmin() {
    if (isset($_SESSION['admin']) && $_SESSION['admin'] === '1') {
        return true;
    }
    else {
        return false;
    }
}

function isFlag() {
    $commentManager = new Chapie\Blog\model\CommentManager();
    $flag = $commentManager->flagComment($_GET["post_id"], $_GET["id"]);
    header('Location: index.php');
}