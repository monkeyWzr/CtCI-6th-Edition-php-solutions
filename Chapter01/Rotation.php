<?php
class Rotation {
    public static function isRotation($str1, $str2) {
        $length = strlen($str1);
        if ($length == strlen($str2) && $length > 0) {
            return self::isSubstring($str1 . $str1, $str2);
        }
        return false;
    }

    public static function isSubstring($heystack, $needle) {
        if (strpos($heystack, $needle) === false)
            return false;
        else return true;
    }
}
