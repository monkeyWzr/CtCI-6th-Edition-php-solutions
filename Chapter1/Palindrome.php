<?php

class Palindrome {
    public static function isPermutationOfPalindrome($str) {
        $charCount = [];
        for ($i='a'; $i <= 'z'; $i++) {
            $charCount[$i] = 0;
        }
        for ($i = 0, $length = strlen($str); $i < $length; $i++) {
            if ($str[$i] == ' ') continue;
            $charCount[strtolower($str[$i])]++;
        }
        $odd = 0;
        foreach ($charCount as $count) {
            if ($count%2 != 0 && ++$odd > 1)
                return false;
        }
        return true;
    }
}
