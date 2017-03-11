<?php
require __DIR__ . '/../../src/chapter02/Intersection.php';
use PHPUnit\Framework\TestCase;

class IntersectionTest extends TestCase
{
    public function testIntersectingNodeReturn()
    {
        $a1 = new Node("a1");
        $a2 = new Node("a2");
        $a3 = new Node("a3");
        $a4 = new Node("a4");
        $a5 = new Node("a5");

        $a1->setNext($a2);
        $a2->setNext($a3);
        $a3->setNext($a4);
        $a4->setNext($a5);

        $b1 = new Node("b1");
        $b2 = new Node("b2");
        $b3 = new Node("b3");

        $b1->setNext($b2);
        $b2->setNext($b3);

        $c1 = new Node("c1");
        $c2 = new Node("c2");
        $c3 = new Node("c3");

        $c1->setNext($c2);
        $c2->setNext($c3);

        $a5->setNext($c1);
        $b3->setNext($c1);

        $this->assertSame($c1, Intersection::check($a1, $b1));
    }

    public function testNullReturn()
    {
        $a1 = new Node("a1");
        $a2 = new Node("a2");
        $a3 = new Node("a3");
        $a4 = new Node("a4");
        $a5 = new Node("a5");

        $a1->setNext($a2);
        $a2->setNext($a3);
        $a3->setNext($a4);
        $a4->setNext($a5);

        $b1 = new Node("b1");
        $b2 = new Node("b2");
        $b3 = new Node("b3");

        $b1->setNext($b2);
        $b2->setNext($b3);

        $this->assertNull(Intersection::check($a1, $b1));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testInvalidArgumentException()
    {
        Intersection::check(null, null);
    }
}
