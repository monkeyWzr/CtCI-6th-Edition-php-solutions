<?php

class NoSizeSearch
{
    public static function search($listy, $x)
    {
        if (! ($listy instanceof Listy))
            throw new InvalidArgumentException('The first argument should be instance of Listy.');
        $i = 1;
        while ($listy->elementAt($i) != -1 && $listy->elementAt($i) < $x)
            $i <<= 1;

        return self::binarySearch($listy, $x, 0, $i);
    }

    public static function binarySearch($listy, $x, $lo, $hi)
    {
        if ($lo > $hi)
            return false;
        $mid = (int) (($lo + $hi) / 2);
        if ($listy->elementAt($mid) == $x)
            return $mid;

        if ($listy->elementAt($lo) <= $x && $x < $listy->elementAt($mid))
            return self::binarySearch($listy, $x, $lo, $mid - 1);
        elseif ($listy->elementAt($mid) < $x && $x < $listy->elementAt($hi))
            return self::binarySearch($listy, $x, $mid + 1, $hi);
        return false;
    }
}

class Listy
{
    private $elements;

    public function __construct(array $arr)
    {
        $this->elements = $arr;
    }

    public function elementAt($index)
    {
        if (!array_key_exists($index, $this->elements))
            return -1;
        return $this->elements[$index];
    }
}
