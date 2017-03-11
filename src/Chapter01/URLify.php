<?php

class URLifier {
    public static function urlify(&$url) {
        $charArray = str_split($url);
        for ($i = 0, $length = strlen($url); $i < $length; $i++) {
            if ($charArray[$i] === ' ')
                $charArray[$i] = '%20';
        }
        $url = implode("", $charArray);
    }
}

// OR
// $url = implode("%20", explode(" ", $url));

