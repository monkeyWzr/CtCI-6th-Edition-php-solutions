<?php
require_once __DIR__ . '/../lib/Node.php';
/**
 * Partition solution.
 * @author monkeyWzr <monkeywzr@gmail.com>
 */
class Partition
{
    /**
     * partition the linked list
     * @param  Node $head      the head node
     * @param  int  $partition the partition flag
     * @return Node            the new head node
     */
    public static function partion($head, $partition)
    {
        $first = $head;
        $last = $head;
        $curr = $head->getNext();
        while ($curr != null) {
            if ($curr->getData() < $partition) {
                $curr->setNext($first);
                $first = $curr;
            }
            else {
                $last->setNext($curr);
                $last = $curr;
            }
            $curr = $curr->getNext();
        }
        return $first;
    }

    /**
     * Another way
     * The first node in the list is not been tested
     * because it must be in the rigth place after the partition done.
     * @param  Node $node      the head node of the linked list
     * @param  int  $partition the partition flag
     * @return Node            the new head node
     */
    public static function partition2($node, $partition)
    {
        $first = $node;
        $previous = null;
        while ($node != null) {
            if ($previous != null && $node->getData() < $partition) {

                $previous->setNext($node->getNext());

                $node->setNext($first);

                $first = $node;

                $node = $previous->getNext();
            }
            else {
                $previous = $node;
                $node = $node->getNext();
            }
        }
        return $first;
    }
}

// $dataArray = [1, 2, 7, 11, 22, 2, 3, 4, 5, 6, 6, 7, 8];
// $head = new Node(2);
// $curr = $head;
// foreach ($dataArray as $key => $value) {
//     $node = new Node($value);
//     $curr->setNext($node);
//     $curr = $node;
// }

// var_dump(Partition::partition2($head, 5));
