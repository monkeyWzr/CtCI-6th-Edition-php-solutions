<?php
require_once __DIR__ . '/../lib/BinaryTreeNode.php';

class MinimalTree {
    public static function build($arr)
    {
        return self::buildTree($arr, 0, count($arr) - 1);
    }

    private static function buildTree($arr, $lo, $hi)
    {
        if ($lo == $hi) {
            return new BinaryTreeNode($arr[$lo]);
        }
        if ($lo > $hi)
            return null;
        $mid = floor(($lo + $hi) / 2);
        $root = new BinaryTreeNode($arr[$mid]);
        $root->setLeft(self::buildTree($arr, $lo, $mid - 1));
        $root->setRight(self::buildTree($arr, $mid + 1, $hi));
        return $root;
    }
}

// $a = [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];

// var_dump(MinimalTree::build($a));
