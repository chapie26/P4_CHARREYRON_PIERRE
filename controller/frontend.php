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
    $commentManager = new Chapie\Blog\model\CommentManager();
    $postManager = new Chapie\Blog\model\PostManager();
    if (isAdmin()) {
        $flags = $commentManager->flagedComments();
        $posts = $postManager->getPosts();

        require('view/frontend/administration.php');
    }
    else {
        throw new Exception('Vous n\'avez pas les droits admin pour accéder à cette page');
    }
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

function newPost() {
    $postManager = new Chapie\Blog\model\PostManager();
    if (!empty($_POST['mytextarea']) && !empty($_POST['title'])) {
        $addPost = $postManager->addPost(htmlspecialchars($_POST['mytextarea']), $_POST['title']);
        header('Location: index.php');
    }
    else {
        throw new Exception('Tous les champs ne sont pas rempli');
    }
}

function updatePost() {
    $postManager = new Chapie\Blog\model\PostManager();

    if (isAdmin() && isset($_GET['id']) && $_GET['id'] > 0) {
        $post = $postManager->getPost($_GET['id']);

        require('view/frontend/update.php');
    }
    else {
        throw new Exception('Impossible de modifier le chapitre');
    }
}

function postUpdated() {
    $postManager = new Chapie\Blog\model\PostManager();

    if (!empty($_POST['mytextarea']) && !empty($_POST['title']) && isset($_GET['id']) && $_GET['id'] > 0) {
        $updatePost = $postManager->updatePost(htmlspecialchars($_POST['mytextarea']), $_POST['title'], $_GET['id']);
        header('Location: index.php');
    }
    else {
        throw new Exception ('Tous les champs ne sont pas remplis');
    }
}

function noPost() {
    $postManager = new Chapie\Blog\model\PostManager();
    if (isAdmin() && isset($_GET['id']) && $_GET['id'] > 0) {
        $deletePost = $postManager->deletePost($_GET['id']);

        header('Location: index.php');
    }
    else {
        throw new Exception ('Impossible de supprimer le chapitre');
    }
}

function getMessage() {
    require('view/frontend/errorView.php');
}