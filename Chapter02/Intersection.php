<?php
require_once __DIR__ . '/../lib/Node.php';

class Intersection
{
    /**
     * Check if two list intersect.
     * @param  Node $listA list A
     * @param  Node $listB list B
     * @return Node        the intersecting node
     *                     null if not intersecting
     */
    public static function check(Node $headA, Node $headB)
    {
        if ($headA == null || $headB == null)
            return null;

        $counterA = self::countList($headA);
        $counterB = self::countList($headB);

        do {
            if ($counterA > $counterB) {
                $headA = $headA->getNext();
                $counterA--;
            }
            elseif ($counterB > $counterA) {
                $headB = $headB->getNext();
                $counterB--;
            }
            else {
                $headA = $headA->getNext();
                $headB = $headB->getNext();
            }
        } while ($headA != $headB);

        return $headA;
    }

    private static function countList($head)
    {
        $count = 0;
        while ($head != null) {
            $head = $head->getNext();
            $count++;
        }
        return $count;
    }
}


// $a1 = new Node("a1");
// $a2 = new Node("a2");
// $a3 = new Node("a3");
// $a4 = new Node("a4");
// $a5 = new Node("a5");

// $a1->setNext($a2);
// $a2->setNext($a3);
// $a3->setNext($a4);
// $a4->setNext($a5);

// $b1 = new Node("b1");
// $b2 = new Node("b2");
// $b3 = new Node("b3");

// $b1->setNext($b2);
// $b2->setNext($b3);

// $c1 = new Node("c1");
// $c2 = new Node("c2");
// $c3 = new Node("c3");

// $c1->setNext($c2);
// $c2->setNext($c3);

// $a5->setNext($c1);
// $b3->setNext($c1);

// $n = Intersection::check($a1, $b1);
// if ($n == null)
//     echo "null";
// else
//     var_dump($n);
