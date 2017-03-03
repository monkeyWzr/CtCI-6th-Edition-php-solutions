<?php

class ZeroMatrix {
    public static function setZeros(&$matrix) {
        $firstColHasZero = false;
        $firstrowHasZero = false;

        if (in_array(0, $matrix[0]))
            $firstrowHasZero = true;
        for ($i = 0, $length = count($matrix); $i < $length; $i++) {
            if ($matrix[$i][0] == 0)
                $firstColHasZero = true;
        }

        for ($i = 0, $length = count($matrix); $i < $length; $i++) {
            for ($j = 0, $width = count($matrix[0]); $j < $width; $j++)
                if ($matrix[$i][$j] == 0) {
                    $matrix[0][$j] = 0;
                    $matrix[$i][0] = 0;
                }
        }

        for ($i = 0, $length = count($matrix); $i < $length; $i++) {
            if ($matrix[$i][0] == 0)
                self::nullifyRow($matrix, $i);
        }
        for ($i = 0, $length = count($matrix[0]); $i < $length; $i++) {
            if ($matrix[0][$i] == 0)
                self::nullifyCol($matrix, $i);
        }

        if ($firstrowHasZero) {
            self::nullifyRow($matrix, 0);
        }
        if ($firstColHasZero) {
            self::nullifyCol($matrix, 0);
        }

        return true;
    }

    private static function nullifyRow(&$matrix, $row) {
        for ($i = 0, $width = count($matrix[0]); $i < $width; $i++)
            $matrix[$row][$i] = 0;
    }

    private static function nullifyCol(&$matrix, $col) {
        for ($i = 0, $length = count($matrix); $i < $length; $i++)
            $matrix[$i][$col] = 0;
    }
}

$matrix = Array([1, 2, 3, 4, 5],
                [1, 0, 3, 0, 5],
                [1, 2, 3, 4, 5]);
ZeroMatrix::setZeros($matrix);
print_r($matrix);
