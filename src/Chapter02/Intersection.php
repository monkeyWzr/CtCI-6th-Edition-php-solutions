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
    public static function check($headA, $headB)
    {
        if ($headA == null || $headB == null)
            throw new InvalidArgumentException("The lists should not be null.");

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

// $n = Intersection::check(null, null);
