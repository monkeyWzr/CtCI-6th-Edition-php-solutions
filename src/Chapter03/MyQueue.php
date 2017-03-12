<?php

class MYQueue
{
    private $stack;
    private $reverseStack;

    public function __construct()
    {
        $this->stack = new \Ds\Stack;
        $this->reverseStack = new \Ds\Stack;
    }

    public function enqueue($value)
    {
        $this->stack->push($value);
    }

    public function dequeue()
    {
        if ($this->reverseStack->isEmpty()) {
            while (!$this->stack->isEmpty()) {
                $this->reverseStack->push($this->stack->pop());
            }
        }

        return $this->reverseStack->pop();
    }

    public function isEmpty()
    {
        return $this->stack->isEmpty() && $this->reverseStack->isEmpty();
    }

    public function size()
    {
        return $this->stack->count() + $this->reverseStack->count();
    }
}
