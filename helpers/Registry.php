<?php
/**
 * Created by PhpStorm.
 * User: rom_g
 * Date: 03.08.2018
 * Time: 20:06
 */

namespace helpers;


class Registry {
    private static $properties = array();

    public static function set($name, $value) {
        self::$properties[$name] = $value;
    }
    public static function get($name) {
        return self::$properties[$name];
    }
    public static function getAll() {
        return self::$properties;
    }
    public static function remove($name) {
        unset(self::$properties[$name]);
    }
    public static function clean() {
        self::$properties = array();
    }

}