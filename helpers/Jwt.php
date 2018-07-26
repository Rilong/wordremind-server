<?php
/**
 * Created by PhpStorm.
 * User: rom_g
 * Date: 17.07.2018
 * Time: 12:08
 */

namespace helpers;

use Firebase\JWT\ExpiredException;
use Respect\Validation\Validator as v;
abstract class Jwt {
    public static function generateToken($data = array(), $exp = null) {
        $jwtConfig = new Config('jwt');
        if (v::nullType()->validate($exp))
            $exp = Date::day(15);

        $properties = array(
            'iat' => Date::now(),
            'iss' => $jwtConfig->get('domain'),
            'aud' => $jwtConfig->get('domain'),
            'exp' => $exp
        );

        $payload = array_merge($properties, $data);

        $token = \Firebase\JWT\JWT::encode($payload, $jwtConfig->get('secret'), 'HS256');
        return $token;
    }

    public static function decode($token) {
        $jwtConfig = new Config('jwt');
        return \Firebase\JWT\JWT::decode($token, $jwtConfig->get('secret'), array('HS256'));
    }
}