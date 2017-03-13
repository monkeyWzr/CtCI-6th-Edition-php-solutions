<?php
require_once __DIR__ . '/../../src/chapter04/ListOfDepth.php';
require_once __DIR__ . '/../../src/lib/BinaryTreeNode.php';
use PHPUnit\Framework\TestCase;

class ListOfDepthTest extends TestCase
{
    public function testListOfDepth()
    {
        $root = new BinaryTreeNode(0);
        $node01 = new BinaryTreeNode(1);
        $node02 = new BinaryTreeNode(2);
        $node11 = new BinaryTreeNode(3);
        $node12 = new BinaryTreeNode(4);
        $node13 = new BinaryTreeNode(5);
        $node14 = new BinaryTreeNode(6);
        $node21 = new BinaryTreeNode(7);
        $node22 = new BinaryTreeNode(8);

        $root->setLeft($node01);
        $root->setright($node02);
        $node01->setLeft($node11);
        $node01->setright($node12);
        $node02->setLeft($node13);
        $node02->setright($node14);
        $node11->setLeft($node21);
        $node11->setright($node22);

        $levels = ListOfDepth::getLevels($root);
        $first = new SplDoublyLinkedList();
        $first->push($root);
        $this->assertEquals($first, $levels[0]);

        $second = new SplDoublyLinkedList();
        $second->push($node01);
        $second->push($node02);
        $this->assertEquals($second, $levels[1]);

        $third = new SplDoublyLinkedList();
        $third->push($node11);
        $third->push($node12);
        $third->push($node13);
        $third->push($node14);
        $this->assertEquals($third, $levels[2]);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testInvalidTree()
    {
        ListOfDepth::getLevels(null);
    }
}
