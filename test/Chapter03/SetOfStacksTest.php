<?php
require_once __DIR__ . '/../../src/chapter03/SetOfStacks.php';
use PHPUnit\Framework\TestCase;

class SetOfStacksTest extends TestCase
{
    public function testPushAndPop()
    {
        $setOfStacks = new SetOfStacks(2);
        $setOfStacks->push(1);
        $setOfStacks->push(2);
        $setOfStacks->push(3);
        $this->assertEquals(2, $setOfStacks->setSize());
        $this->assertEquals(3, $setOfStacks->pop());
        $this->assertEquals(1, $setOfStacks->setSize());
    }

    public function testPopAt()
    {
        $setOfStacks = new SetOfStacks(2);
        $setOfStacks->push(1);
        $setOfStacks->push(2);
        $setOfStacks->push(3);
        $this->assertEquals(2, $setOfStacks->popAt(0));
        $this->assertEquals(1, $setOfStacks->setSize());
        $this->assertEquals(3, $setOfStacks->pop());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testConstructionInvalidArguments()
    {
        $setOfStacks = new SetOfStacks(0);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testPopAtInvalidArguments()
    {
        $setOfStacks = new SetOfStacks(2);
        $setOfStacks->push(1);
        $setOfStacks->popAt(2);
    }

    public function testEmptyReturn()
    {
        $setOfStacks = new SetOfStacks(2);
        $this->assertEquals(false, $setOfStacks->pop());
        $this->assertEquals(false, $setOfStacks->popAt(0));

        $setOfStacks->push(1);
        $setOfStacks->pop();
        $this->assertEquals(false, $setOfStacks->pop());

        $setOfStacks->push(2);
        $setOfStacks->push(3);
        $setOfStacks->push(4);
        $setOfStacks->pop();
        $setOfStacks->pop();
        $setOfStacks->pop();
        $this->assertEquals(false, $setOfStacks->pop());
    }
}
