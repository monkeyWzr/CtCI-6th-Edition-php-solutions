<?php

class SortStack
{
    /**
     * Sort a stack such that the smallest items are on the top
     * @param  \Ds\Stack &$stack the stack
     * @return void
     */
    public static function sort(&$stack)
    {
        if ($stack->isEmpty())
            throw new InvalidArgumentException('The stack must not be empty.');

        $reverseStack = new \Ds\Stack();
        $temp = new \Ds\Stack();
        $reverseStack->push($stack->pop());

        while (!$stack->isEmpty()) {
            while (!$reverseStack->isEmpty() && $reverseStack->peek() > $stack->peek())
                $temp->push($reverseStack->pop());

            $reverseStack->push($stack->pop());

            while (!$temp->isEmpty())
                $reverseStack->push($temp->pop());
        }

        while (!$reverseStack->isEmpty()) {
            $stack->push($reverseStack->pop());
        }
    }
}
