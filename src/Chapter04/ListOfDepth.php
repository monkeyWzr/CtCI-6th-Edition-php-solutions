<?php
require_once __DIR__ . '/../lib/BinaryTreeNode.php';

class ListOfDepth
{
    public static function getLevels($root)
    {
        if ($root == null)
            throw new InvalidArgumentException('The tree have no nodes.');
        $levels = [];
        $i = 0;
        $current = new SplDoublyLinkedList();
        $current->push($root);
        while(!$current->isEmpty()) {
            $levels[] = $current;
            $parents = $current;
            $current = new SplDoublyLinkedList();
            foreach ($parents as $parent) {
                if ($parent->getLeft() != null)
                    $current->push($parent->getLeft());
                if ($parent->getRight() != null)
                    $current->push($parent->getRight());
            }
        }

        return $levels;
    }
}
