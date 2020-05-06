<?php

namespace Chapie\Blog\model;

require_once('model/Manager.php');

class PostManager extends Manager {
    public function getPosts() {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    public function getPost($postId) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function addPost($content, $title) {
        $db = $this->dbConnect();
        $addPost = $db->prepare('INSERT INTO posts (content, title, creation_date) VALUES (?,?, NOW())');
        $newPost = $addPost->execute(array($content, $title));

        return $newPost;
    }

    public function updatePost() {
        $db = $this->dbConnect();
        $refreshPost = $db->prepare('UPDATE posts SET content = ?, title = ? WHERE id = ?');
        $refreshPost->execute(array($id));

        return $refreshPost;
    }

    public function deletePost($id) {
        $db = $this->dbConnect();
        $noPost = $db->prepare('DELETE FROM posts WHERE id = ?');
        $noPost->execute(array($id));
        $delete = $noPost->fetch();

        return $delete;
        error_log($delete, 0);
    }
}