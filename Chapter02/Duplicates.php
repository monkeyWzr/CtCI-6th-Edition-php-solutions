<?php
require_once __DIR__ . '/../lib/Node.php';

class Duplicates
{
    public static function remove($head)
    {
        if ($head == null) return;
        $nodes = [$head->getData() => true];
        $lastNode = $head;

        while ($lastNode->getNext() != null) {
            $node = $lastNode->getNext();
            if (array_key_exists($node->getData(), $nodes)) {
                $lastNode->setNext($node->getNext());
            }
            else {
                $nodes[$node->getData()] = true;
            }
            $lastNode = $node;
        }
    }
}

// $dataArray = [1, 2, 3, 4, 5, 6, 6, 7, 8];
// $head = new Node(0);
// $curr = $head;
// foreach ($dataArray as $key => $value) {
//     $node = new Node($value);
//     $curr->setNext($node);
//     $curr = $node;
// }

// var_dump($head);
// Duplicates::remove($head);
// var_dump($head);
