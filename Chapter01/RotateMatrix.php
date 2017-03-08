<?php

class RotateMatrix {

    public static function rotate(&$matrix) {
        if (count($matrix) == 0 || count($matrix) != count($matrix[0]))
            return false;
        for ($layer = 0, $n = count($matrix); $layer < $n / 2; $layer++) {
            $first = $layer;
            $last = $n - 1 - $layer;
            for ($i = $first; $i < $last; $i++) {
                $offset = $i - $first;
                $top = $matrix[$first][$i];
                $matrix[$first][$i] = $matrix[$last - $offset][$first];
                $matrix[$last - $offset][$first] = $matrix[$last][$last - $offset];
                $matrix[$last][$last - $offset] = $matrix[$i][$last];
                $matrix[$i][$last] = $top;
            }
        }
        return true;
    }
}

// $matrix = Array([1, 2, 3],
//                 [4, 5, 6],
//                 [7, 8, 9]);
// RotateMatrix::rotate($matrix);
// print_r($matrix);
