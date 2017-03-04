<?php
require_once __DIR__ . '/../lib/Node.php';

class MiddleNode
{
    public static function delete($node)
    {
        if ($node != null && $node->getNext() != null) {
            $node->setData($node->getNext()->getData());
            $node->setNext($node->getNext()->getNext());
            return true;
        }
        return false;
    }
}
