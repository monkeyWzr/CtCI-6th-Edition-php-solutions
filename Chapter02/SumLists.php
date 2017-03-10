<?php

class SumLists
{
    /**
     * Sum two numbers represented by linked lists
     * @param  SplDoublyLinkedList $listA number list A
     * @param  SplDoublyLinkedList $listB number list B
     * @return int
     */
    public static function inReverseOrder($listA, $listB)
    {
        $count = 0;
        if ($listA->isEmpty() && $listB->isEmpty())
            return $count;
        if (!$listA->isEmpty())
            $count += $listA->shift();
        if (!$listB->isEmpty())
            $count += $listB->shift();

        return $count + 10 * self::inReverseOrder($listA, $listB);
    }

    /**
     * Sum two numbers represented by linked lists in forward order
     * @param  SplDoublyLinkedList $listA number list A
     * @param  SplDoublyLinkedList $listB number list B
     * @return int
     */
    public static function inForwardOrder($listA, $listB)
    {
        $lengthA = $listA->count();
        $lengthB = $listB->count();
        if ($lengthA < $lengthB)
            self::addZerosToHead($listA, $lengthB - $lengthA);
        else if ($lengthB < $lengthA)
            self::addZerosToHead($listB, $lengthA - $lengthB);

        return self::countInForwardOrder($listA, $listB, 0);
    }

    /**
     * Sum two numbers represented by linked lists in forward order
     * the length of two lists must be equal
     * @param  SplDoublyLinkedList $listA number list A
     * @param  SplDoublyLinkedList $listB number list B
     * @return int
     */
    public static function countInForwardOrder($listA, $listB, $previous)
    {
        if ($listA->isEmpty() && $listB->isEmpty())
            return $previous;
        $count = 0;
        if (!$listA->isEmpty()) {
            $count += $listA->shift();
        }
        if (!$listB->isEmpty()) {
            $count += $listB->shift();
        }
        $count += $previous * 10;
        return  self::countInForwardOrder($listA, $listB, $count);
    }

    /**
     * Add zeros at head of the list
     * @param SplDoublyLinkedList &$list the number list
     * @param int                 $num   the number of zeros
     */
    public static function addZerosToHead(&$list, $num)
    {
        for ($i = 0; $i < $num; $i++) {
            $list->add(0, 0);
        }
    }
}

// $A = new SplDoublyLinkedList();
// $B = new SplDoublyLinkedList();
// $A->push(7);
// $A->push(1);
// $A->push(6);
// $B->push(5);
// $B->push(9);
// $B->push(2);
// $B->push(4);


// echo SumLists::inReverseOrder($A, $B);
// echo SumLists::inForwardOrder($A, $B);

