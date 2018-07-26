<?php

namespace helpers;

abstract class Date {
    public static function now() {
        return time();
    }

    public static function second($seconds) {
        return self::now() + $seconds;
    }
    public static function minute($minutes) {
        return self::second(60 * $minutes);
    }

    public static function hour($hours) {
        return self::minute(60 * $hours);
    }

    public static function day($days) {
        return self::hour(24 * $days);
    }

    public static function month($months) {
        return self::day(30 * $months);
    }

    public static function year($years) {
        return self::month(12 * $years);
    }
}