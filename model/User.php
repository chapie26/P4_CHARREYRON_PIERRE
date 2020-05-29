<?php

namespace Chapie\Blog\model;

require_once('model/Manager.php');

class User extends Manager {
    public function register($login_mail, $pass) {
        // Ajouter controle pas de doublon
        $db = $this->dbConnect();
        $regist = $db->prepare('SELECT * FROM member WHERE login_mail = ?');
        $regist->execute(array($login_mail));
        $member = $regist->fetch();

        if ($member) {
            return null;
        }
        else {
            $pass_hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            $regist = $db->prepare('INSERT INTO member (login_mail, pass, admin) VALUES (?,?,0)');
            $newMember = $regist->execute(array($login_mail, $pass_hash));
            return $newMember;
        }
    }
    public function signin($login_mail, $pass) {
        $db = $this->dbConnect();
        $login = $db->prepare('SELECT * FROM member WHERE login_mail = ?');
        $login->execute(array($login_mail));
        $member = $login->fetch();
        if (password_verify($_POST['pass'], $member['pass'])){
            return $member;
        }
        return false;
    }
}