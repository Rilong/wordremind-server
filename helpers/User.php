<?php
/**
 * Created by PhpStorm.
 * User: rom_g
 * Date: 31.07.2018
 * Time: 10:32
 */

namespace helpers;


use RedBeanPHP\R;

class User {
    public static function checkSession($token, $agent, $ip) {
        $session = R::findOne('sessions', '`token` = ?', array($token));

        if ($session) {
            if ($session->agent == sha1($agent) && $session->ip == $ip) {
                return true;
            }
        }
        return false;
    }
}