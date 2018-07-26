<?php
/**
 * Created by PhpStorm.
 * User: rom_g
 * Date: 26.07.2018
 * Time: 18:07
 */

namespace helpers;


class Json {
    public static function encode($data) {
        $response = array(
            'response' => $data
        );
        return json_encode($response);
    }
    public static function decode($json) {
        return json_decode($json, true);
    }
}