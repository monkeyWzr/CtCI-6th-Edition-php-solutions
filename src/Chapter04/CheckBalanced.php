<?php

class CheckBalanced
{
    /**
     * check if a tree is balanced
     * @param  BinaryTreeNode  $root    the root nodw
     * @param  integer         &$heigth current height
     * @return boolean                  true if balanced
     */
    public static function check($root, &$heigth = 0)
    {
        $height = 0;
        return self::isBalanced($root, $height);
    }

    private static function isBalanced($root, &$height)
    {
        if ($root == null)
            return true;
        $left = 0;
        $right = 0;
        if (!self::isBalanced($root->getLeft(), $left))
            return false;
        if (!self::isBalanced($root->getRight(), $right))
            return false;
        if (abs($left - $right) > 1)
            return false;
        $height = 1 + max($left, $right);
        return true;
    }
}
