<?php

namespace Chapie\Blog\model;

require_once('model/Manager.php');

class User extends Manager {
    public function register($login_mail, $pass) {
        // Ajouter controle pas de doublon
        $db = $this->dbConnect();
        $regist = $db->prepare('SELECT * FROM member WHERE login_mail = ?');
        $member = $regist->execute(array($login_mail));
        if ($member !== null) {
            return null;
        }
        else {
            $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            $regist = $db->prepare('INSERT INTO member(login_mail, pass, right) VALUES(?,?,0)');
            $newMember = $regist->execute(array($login_mail, $pass_hache));

            return $newMember;
        }
    }
    public function signin($login_mail, $pass) {
        $db = $this->dbConnect();
        $regist = $db->prepare('SELECT * FROM member WHERE login_mail = ? && pass = ?');
        $member = $regist->execute(array($login_mail, $pass));

        return $member;
    }
    public function getMember($user_id) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM member WHERE id = ?');
        $member = $req->execute(array($user_id));

        return $member;
    }
}