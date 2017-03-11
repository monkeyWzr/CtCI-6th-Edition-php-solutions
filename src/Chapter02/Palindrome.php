<?php
require_once __DIR__ . '/../lib/Node.php';

class Palindrome
{
    /**
     * Check if a linked list is a palindrome.
     * @param  Node    $head the head node
     * @return boolean
     */
    public static function check($head)
    {
        $stack = new SplStack();
        $slow = $head;
        $fast = $head;
        while ($fast != null && $fast->getNext() != null) {
            $stack->push($slow);
            $slow = $slow->getNext();
            $fast = $fast->getNext()->getNext();
        }
        if ($fast != null)
            $slow = $slow->getNext();
        while (!$stack->isEmpty()) {
            if ($slow->getData() != $stack->pop()->getData())
                return false;
            $slow = $slow->getNext();
        }
        return true;
    }
}

// $a = new Node('a');
// $b = new Node('b');
// $c = new Node('c');
// $d = new Node('b');
// $e = new Node('a');
// // $f = new Node('a');

// $a->setNext($b);
// $b->setNext($c);
// $c->setNext($d);
// $d->setNext($e);
// // $e->setNext($f);

// echo Palindrome::check($a) ? "true" :"false";

