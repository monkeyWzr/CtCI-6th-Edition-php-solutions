<?php

class SearchInRotatedArray
{
    public static function search($array, $x)
    {
        if (!is_array($array))
            throw new InvalidArgumentException('The first argument should be array.');
        return self::binarySearch($array, $x, 0, count($array) - 1);
    }

    private static function binarySearch($array, $x, $lo, $hi)
    {
        if ($lo > $hi)
            return false;
        $mid = floor(($lo + $hi) / 2);
        if ($x == $array[$mid])
            return $mid;

        if ($array[$lo] < $array[$mid]) {
            if ($x >= $array[$lo] && $x < $array[$mid])
                return self::binarySearch($array, $x, $lo, $mid - 1);
            else
                return self::binarySearch($array, $x, $mid + 1, $hi);
        }
        elseif ($array[$lo] > $array[$mid]) {
            if ($x > $array[$mid] && $x <= $array[$hi])
                return self::binarySearch($array, $x, $mid + 1, $hi);
            else
                return self::binarySearch($array, $x, $lo, $mid - 1);
        }
        else {
            if ($array[$lo] != $array[$hi])
                return self::binarySearch($array, $x, $mid + 1, $hi);
            else {
                $serachLeft = self::binarySearch($array, $x, $lo, $mid - 1);
                if (!$serachLeft)
                    return self::binarySearch($array, $x, $mid + 1, $hi);
                else
                    return $serachLeft;
            }
        }
        return false;
    }
}
