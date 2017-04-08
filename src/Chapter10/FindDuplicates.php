<?php
require_once __DIR__ . '/BitVector.php';

class FindDuplicates
{
    public static function find($nums)
    {
        if (!is_array($nums))
            throw new InvalidArgumentException("the argument shuould be an array.");
        $mask = new BitVector(count($nums));
        foreach ($nums as $num) {
            if ($mask->get($num))
                $ret[] = $num;
            else
                $mask->set($num);
        }
        return $ret;
    }
}
