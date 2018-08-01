<?php
/**
 * Created by PhpStorm.
 * User: rom_g
 * Date: 31.07.2018
 * Time: 10:32
 */

namespace helpers;


use Klein\Request;
use RedBeanPHP\OODBBean;
use RedBeanPHP\R;

class User {
    /**
     * @param $token
     * @param $agent
     * @param $ip
     * @return bool
     */
    public static function checkSession($token, $agent, $ip) {
        $session = R::findOne('sessions', '`token` = ?', array($token));

        if ($session) {
            if ($session->agent == sha1(agent_remove_version($agent)) && $session->ip == $ip) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param Request $request
     * @return bool|mixed
     */
    public static function getTokenFromHeader (Request $request) {
        $token = $request->headers()->get('Authorization');
        if ($token)
            return $token;
        return false;
    }

    public static function getSession($token, Request $request) {

        $session = R::findOne('sessions', '`token` = ?', array($token));

        if ($session) {
            if ($session->agent == sha1(agent_remove_version($request->userAgent())) && $session->ip == $request->ip() && $session->date >= Date::now()) {
                return $session;
            }
        }
        return false;
    }

    public static function getUserBySession(Request $request) {
        $token = self::getTokenFromHeader($request);
        $session = self::getSession($token, $request);

        if ($session) {
            return $session->fetchAs('users')->user;
        }
        return false;
    }
}