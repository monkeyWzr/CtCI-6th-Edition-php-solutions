<?php

class OneAway {
    public static function check($str1, $str2) {
        $str1Length = strlen($str1);
        $str2Length = strlen($str2);
        if (abs($str1Length - $str2Length) > 1)
            return false;
        if ($str1Length > $str2Length)
            return self::checkInsert($str1, $str2);
        else if ($str1Length > $str2Length)
            return self::checkInsert($str2, $str1);
        else
            return self::checkReplace($str1, $str2);
    }

    private static function checkInsert($str1, $str2) {
        for ($i = 0, $j = 0; $i < strlen($str1) && $j < strlen($str2); $i++, $j++) {
            if ($str1[$i] == $str2[$j])
                $j++;
            else if ($i != $j)
                return false;
            $i++;
        }
        return true;
    }
    private static function checkReplace($str1, $str2) {
        $foundDifference = false;
        for ($i = 0, $length = strlen($str1); $i < $length; $i++) {
            if ($str1[$i] != $str2[$i]) // a difference found
                if ($foundDifference) // if difference has already benn found
                    return false;
                else
                    $foundDifference = true;
        }
        return $foundDifference;
    }
}
