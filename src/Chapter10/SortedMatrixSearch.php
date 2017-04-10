<?php

class SortedMatrixSearch
{
    public static function search($x, $matrix)
    {
        if (!is_array($matrix))
            throw new InvalidArgumentException("The matrix should not be an array.");
        $m = count($matrix);
        if ($m == 0)
            return false;
        $n = count($matrix[0]);

        return self::binarySearch($x, $matrix, 0, 0, $m - 1, $n - 1);
    }

    private static function binarySearch($x, $matrix, $startRow, $startCol, $endRow, $endCol)
    {
        if ($startRow > $endRow || $startCol > $endCol) {
            return false;
        }
        if ($x < $matrix[$startRow][$startCol] || $x > $matrix[$endRow][$endCol]) {
            return false;
        }
        $midRow = ($startRow + $endRow) >> 1;
        $midCol = ($startCol + $endCol) >> 1;

        if ($x == $matrix[$midRow][$midCol])
            return true;

        if ($x > $matrix[$midRow][$midCol]) {
            if(self::binarySearch($x, $matrix, $midRow + 1, $midCol + 1, $endRow, $endCol))
                return true;
        }
        elseif ($x < $matrix[$midRow][$midCol]) {
            if(self::binarySearch($x, $matrix, $startRow, $startCol, $midRow - 1, $midCol - 1))
                return true;
        }
        else
            return true;

        if(self::binarySearch($x, $matrix, $startRow, $midCol + 1, $midRow, $endCol))
            return true;
        if(self::binarySearch($x, $matrix, $midRow + 1, $startCol, $endRow, $midCol))
            return true;

        return false;
    }
}
