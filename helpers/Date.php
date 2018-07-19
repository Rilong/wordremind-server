<?php

namespace helpers;

use Carbon\Carbon;

abstract class Date {
    public static function now() {
        return Carbon::now()->timestamp;
    }
    // new comment
    public static function second($seconds) {
        return Carbon::now()->second($seconds)->timestamp;
    }
    public static function minute($minutes) {
        return Carbon::now()->minute($minutes)->timestamp;
    }

    public static function hour($hours) {
        return Carbon::now()->hour($hours)->timestamp;
    }

    public static function day($days) {
        return Carbon::now()->day($days)->timestamp;
    }

    public static function month($months) {
        return Carbon::now()->month($months)->timestamp;
    }

    public static function year($years) {
        return Carbon::now()->year($years)->timestamp;
    }
}