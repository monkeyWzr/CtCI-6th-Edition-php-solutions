<?php
require_once __DIR__ . '/../../src/chapter03/StackWithMin.php';
use PHPUnit\Framework\TestCase;

class StackWithMinTest extends TestCase
{
    public function testMinReturn()
    {
        $stack = new StackWithMin();
        $stack->push(1);
        $stack->push(2);

        $this->assertEquals(1, $stack->min());
    }

    public function testMinChanged(){
        $stack = new StackWithMin();
        $stack->push(2);
        $stack->push(3);
        $stack->push(1);
        $this->assertEquals(1, $stack->min());

        $stack->pop();
        $this->assertEquals(2, $stack->min());
    }

    public function testInfReturnWhenEmpty()
    {
        $stack = new StackWithMin();
        $this->assertEquals(INF, $stack->min());
    }
}
