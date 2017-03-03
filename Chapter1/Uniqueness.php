<?php

class Uniqueness {
    public static function isUnique($str) {
        $charMap = [];
        for ($i='a'; $i <= 'z'; $i++) {
            $charMap[$i] = false;
        }
        for ($i = 0, $length = strlen($str); $i < $length; $i++) {
            if ($charMap[$str[$i]])
                return false;
            else
                $charMap[$str[$i]] = true;
        }
        return true;
    }
}
