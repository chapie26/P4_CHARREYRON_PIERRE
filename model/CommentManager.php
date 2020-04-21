<?php

namespace Chapie\Blog\model;

require_once('model/Manager.php');

class CommentManager extends Manager {
    public function getComments($postId) {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT comments.id ,comments.author_id, comments.comment, member.login_mail AS login_mail, DATE_FORMAT(comments.comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments INNER JOIN member ON author_id = member.id WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment) {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments (post_id, author_id, comment, comment_date) VALUES (?,?,?, NOW())');
        $affectedLines = $comments->execute(array(intval($postId), intval($author), $comment));
        return $affectedLines;
    }

    // public function flagComment() {
    //     $db = $this->dbConnect();
    //     $flag = $db->prepare('UPDATE')
    // }
}