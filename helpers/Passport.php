<?php

namespace helpers;


abstract class Passport {

    public static function hash($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public static function verify($password, $hash_password) {
        return password_verify($password, $hash_password);
    }

    public static final function generateString($length) {
        $string = '';
        $letters = range('a', 'z');
        $digits = range(0, 9);

        for ($i = 0; $i < count($letters); $i++) {
            if (rand(0, 100) > 65) {
                $letters[$i] = strtoupper($letters[$i]);
            }
        }

        $lettersAndDigits = array_merge($letters, $digits);

        for ($i = 0; $i < $length; $i++) {
            $string .= $lettersAndDigits[rand(0, count($lettersAndDigits) - 1)];
        }
        return $string;
    }
}