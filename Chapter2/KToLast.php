<?php
require_once __DIR__ . '/../lib/Node.php';

class KToLast
{
    public static function find($head, $k)
    {
        $i = 0;
        $curr = $head;
        $ret = null;
        while ($curr != null) {
            $i++;
            if ($i == $k)
                $ret = $head;
            else if ($ret != null)
                $ret = $ret->getNext();

            $curr = $curr->getNext();
        }
        return $ret == null ? null : $ret->getData();
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

// echo KToLast::find($head, 5);
