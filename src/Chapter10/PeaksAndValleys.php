<?php

class PeaksAndValleys
{
    public static function sort($arr)
    {
        if (!is_array($arr))
            throw new InvalidArgumentException("The argument should be an array.", 1);

        for($i = 1, $n = count($arr); $i < $n; $i+=2)
        {
            if ($arr[$i-1] < $arr[$i])
                self::swap($arr, $i-1, $i);
            if ($i + 1 < $n && $arr[$i+1] < $arr[$i])
                self::swap($arr, $i+1, $i);
        }

        return $arr;
    }

    private static function swap(&$arr, $i, $j)
    {
        $temp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $temp;
    }
}
