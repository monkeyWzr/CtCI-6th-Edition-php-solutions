<?php

class SparseSearch
{
    public static function search($array, $str)
    {
        if (!is_array($array))
            throw new InvalidArgumentException('The first argument should be array.');
        $lo = 0;
        $hi = count($array) - 1;
        while($lo < $hi) {
            $mid = (int) (($lo + $hi) / 2);
            if ($array[$mid] == "") {
                $left = $mid - 1;
                $right = $mid + 1;
                while ($array[$mid] == "") {
                    if ($left < $lo && $right > $hi)
                        return -1;
                    if ($left > $lo && $array[$left] != "")
                        $mid = $left;
                    elseif ($right < $hi && $array[$right] != "")
                        $mid = $right;
                    $left--;
                    $right++;
                }
            }
            if ($array[$mid] < $str)
                $lo = $mid + 1;
            elseif($array[$mid] > $str)
                $hi = $mid - 1;
            else
                return $mid;
        }
        return -1;
    }
}
