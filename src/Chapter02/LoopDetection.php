<?php
require_once __DIR__ . '/../lib/Node.php';

class LoopDetection
{
    /**
     * Detect the beginning node of the loop in a circular list.
     * @param  Node $head the head node
     * @return Node       the beginning node of the loop
     *                    null if not circular
     */
    public static function detect($head)
    {
        $slow = $head;
        $fast = $head;
        while ($fast != null && $fast->getNext() != null) {
            $slow = $slow->getNext();
            $fast = $fast->getNext()->getNext();
            if ($slow == $fast) {
                $slow = $head;
                while ($slow != $fast) {
                    $slow = $slow->getNext();
                    $fast = $fast->getNext();
                }
                return $slow;
            }
        }
        return null;
    }
}

// $n1 = new Node("n1");
// $n2 = new Node("n2");
// $n3 = new Node("n3");
// $n4 = new Node("n4");
// $n5 = new Node("n5");

// $n1->setNext($n2);
// $n2->setNext($n3);
// $n3->setNext($n4);
// $n4->setNext($n5);
// $n5->setNext($n3);

// $n = LoopDetection::detect($n1);
// var_dump($n);
