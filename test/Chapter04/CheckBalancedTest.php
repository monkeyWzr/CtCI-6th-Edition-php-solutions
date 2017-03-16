<?php
require_once __DIR__ . '/../../src/chapter04/CheckBalanced.php';
require_once __DIR__ . '/../../src/lib/BinaryTreeNode.php';
use PHPUnit\Framework\TestCase;

class CheckBalancedTest extends TestCase
{
    public function testCheck()
    {
        $root = new BinaryTreeNode(0);
        $node01 = new BinaryTreeNode(1);
        $node02 = new BinaryTreeNode(2);
        $node13 = new BinaryTreeNode(3);
        $node34 = new BinaryTreeNode(4);
        $node45 = new BinaryTreeNode(5);
        $node26 = new BinaryTreeNode(6);
        $root->setLeft($node01);
        $root->setRight($node02);
        $node01->setLeft($node13);
        $node13->setLeft($node34);
        $node34->setLeft($node45);
        $node02->setLeft($node26);
        $this->assertFalse(CheckBalanced::check($root));
    }
}
