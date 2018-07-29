<?php

namespace helpers;

use RedBeanPHP\R;

abstract class Passport {

    public static function hash($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public static function verify($password, $hash_password) {
        return password_verify($password, $hash_password);
    }

    public static function signByHash($login, $password) {
        $user = R::findOne('users','`login` = ?', array($login));
        if ($user->count() != 0 && $password == $user->password) {
            return $user;
        }
        return false;
    }
}