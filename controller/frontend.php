<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/User.php');

function addComment($postId, $author, $comment) {
    $commentManager = new Chapie\Blog\model\CommentManager();
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

    $post = $postManager-> getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addUser() {
    $user = new Chapie/Blog/model/User();
    $newMember = $user->register();

    if ($newMember === false) {
        throw new Exception('Impossible d\'ajouter le membre');
    }
    else {
        
    }
}