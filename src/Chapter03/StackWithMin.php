<?php

class StackWithMin
{
    private $stackMin;
    private $stack;

    public function __construct() {
        $this->stackMin = new \Ds\Stack();
        $this->stack = new \Ds\Stack();
    }

    public function push($value)
    {
        if ($value < $this->min())
            $this->stackMin->push($value);
        $this->stack->push($value);
    }

    public function pop()
    {
        $value = $this->stack->pop();
        if ($value == $this->min())
            $this->stackMin->pop();
        return $value;
    }

    public function min()
    {
        if ($this->stackMin->isEmpty())
            return INF;
        return $this->stackMin->peek();
    }
}
