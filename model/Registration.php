<?php

namespace Chapie\Blog\model;

require_once('model/Manager.php');

class User extends Manager {
    public function register() {
        $db = $this->dbConnect();
        $regist = $db->prepare('INSERT INTO member(login_mail, pass, right) VALUES(?,?,0)');
        $newMember = $user->execute(array($login_mail, $pass));

        return $newMember;
    }
    public function getMember() {
        $db = $this->dbConnect();
        $req = $db->query('SELECT login_mail FROM member');

        return $req;
    }
}