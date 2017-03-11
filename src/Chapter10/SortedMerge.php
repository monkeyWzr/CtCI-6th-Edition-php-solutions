<?php

class SortedMerge
{
    /**
     * merge two sorted arrays
     * @param  array $arrA the large array that has the enough buffer at the end th hold B
     * @param  array $arrB the array to be merged
     * @return array
     */
    public static function merge($arrA, $arrB)
    {
        $lengthA = count($arrA);
        $lengthB = count($arrB);
        if ($lengthA < $lengthB)
            throw new InvalidArgumentException("The array A should larger than B.");
        $indexA = $lengthA - $lengthB - 1;
        $indexB = $lengthB - 1;
        $index = $lengthA - 1;
        while ($indexB >= 0) {
            if ($indexA >= 0 && $arrA[$indexA] > $arrB[$indexB])
                $arrA[$index--] = $arrA[$indexA--];
            else
                $arrA[$index--] = $arrB[$indexB--];
        }

        return $arrA;
    }
}


// $arrA = [1, 2, 4, 5, 8, null, null, null];
// $arrB = [3, 6, 9];
// print_r(SortedMerge::merge($arrA,$arrB));
