<?php
require_once __DIR__ . '/../../src/chapter03/SortStack.php';
use PHPUnit\Framework\TestCase;

class SortStackTest extends TestCase
{
    public function testSort()
    {
        $stack = new \Ds\Stack();
        $stack->push(1);
        $stack->push(8);
        $stack->push(3);
        $stack->push(4);
        SortStack::sort($stack);
        $this->assertEquals(1, $stack->pop());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testEmptyStack()
    {
        $stack = new \Ds\Stack();
        SortStack::sort($stack);
    }
}
