<?php

class ValidateBST
{
    public static function check($root)
    {
        return self::isBST($root, null, null);
    }

    private static function isBST($root, $min, $max)
    {
        if ($root == null)
            return true;
        if (($min != null && $root->getData() < $min) || ($max != null && $root->getData() > $max))
            return false;

        if (!self::isBST($root->getLeft(), $min, $root->getData()) || !self::isBST($root->getRight(), $root->getData(), $max))
            return false;
        return true;
    }
}
