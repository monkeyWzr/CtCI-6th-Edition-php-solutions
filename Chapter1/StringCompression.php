<?php

class StringCompression {
    public static function compress($str) {
        $count = 0;
        $ret = '';
        for ($i = 0, $length = strlen($str); $i < $length; $i++) {
            $count++;
            if ($i == $length - 1 || $str[$i] != $str[$i + 1]){
                $ret .= $str[$i];
                if ($count > 1)
                    $ret .= $count;
                $count = 0;
            }
        }
        return $ret;
    }

    // String concatenation operates in quadratic time, so the function below use array to store
    // string block and implode the array back to string
    // I'm not sure which is better
    public static function compress2($str) {
        $count = 0;
        $ret = [];
        for ($i = 0, $length = strlen($str); $i < $length; $i++) {
            $count++;
            if ($i == $length - 1 || $str[$i] != $str[$i + 1]){
                if ($count > 1)
                    $ret[] = $str[$i] . $count;
                else
                    $ret[] = $str[$i];
                $count = 0;
            }
        }
        return implode($ret);
    }
}
