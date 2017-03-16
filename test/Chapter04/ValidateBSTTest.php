<?php
require_once __DIR__ . '/../../src/chapter04/ValidateBST.php';
require_once __DIR__ . '/../../src/lib/BinaryTreeNode.php';
use PHPUnit\Framework\TestCase;

class ValidateBSTTest extends TestCase
{
    public function testCheck()
    {
        $root = new BinaryTreeNode(5);
        $node1 = new BinaryTreeNode(1);
        $node2 = new BinaryTreeNode(2);
        $node3 = new BinaryTreeNode(3);
        $node4 = new BinaryTreeNode(4);
        $node6 = new BinaryTreeNode(6);
        $node7 = new BinaryTreeNode(7);
        $node8 = new BinaryTreeNode(8);
        $node9 = new BinaryTreeNode(9);
        $node10 = new BinaryTreeNode(10);
        $node2->setLeft($node1);
        $node3->setLeft($node2);
        $node3->setRight($node4);
        $node6->setRight($node7);
        $node10->setLeft($node9);
        $node8->setLeft($node6);
        $node8->setRight($node10);
        $root->setLeft($node3);
        $root->setRight($node8);
        $this->assertTrue(ValidateBST::check($root));
        $root->setRight($node8);
        $root->setLeft($node3);
        $this->assertTrue(ValidateBST::check($root));
    }
}
