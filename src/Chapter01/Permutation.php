<?php

class Permutation {
    public static function checkPermutation($str1, $str2) {
        $charArray1 = str_split($str1);
        $charArray2 = str_split($str2);
        sort($charArray1);
        sort($charArray2);
        if ($charArray1 === $charArray2)
            return true;
        else
            return false;
    }
}
