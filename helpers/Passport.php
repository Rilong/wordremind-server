<?php

namespace helpers;

abstract class Passport {

    public static function hash($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public static function verify($password, $hash_password) {
        return password_verify($password, $hash_password);
    }
}