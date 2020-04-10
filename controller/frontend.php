<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/User.php');

function addComment($postId, $author, $comment) {
    $commentManager = new Chapie\Blog\model\CommentManager();
    if (isset($_GET['id']) && $_GET['id'] > 0) {
        if (!empty($_POST['author_id']) && !empty($_POST['comment'])) {
            addComment($_GET['id'], $_POST['author_id'], $_POST['comment']);
        }
        else {
            throw new Exception( 'Tous les champs ne sont pas remplis !');
        }
    }
    else {
        throw new Exception('Aucun identifiant de billet envoyé');
    }
    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
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
        $_SESSION['pseudo'] = $login_mail;
        header('Location: index.php');
    }
}

function newUser() {
    require('view/frontend/registrationView.php');
}

function disconnectUser() {
    $_SESSION = array();
    session_destroy();
}

function isAuthentication() {
    if (isset($_SESSION['pseudo'])) {
        return true;
    }
    else {
        return false;
    }
}