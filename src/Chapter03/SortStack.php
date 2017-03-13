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
        $reverseStack->push($stack->pop());

        while (!$stack->isEmpty()) {
            $temp = $stack->pop();
            while (!$reverseStack->isEmpty() && $reverseStack->peek() > $temp) {
                $stack->push($reverseStack->pop());
            }
            $reverseStack->push($temp);
        }

        while (!$reverseStack->isEmpty()) {
            $stack->push($reverseStack->pop());
        }
    }
}
