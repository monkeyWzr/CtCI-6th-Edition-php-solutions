<?php
require_once __DIR__ . '/../lib/Node.php';

class SetOfStack
{
    class StackWithCapacity
    {
        private $capacity;
        private $size;
        private $head;

        public function __construct($capacity=10)
        {
            $this->capacity = $capacity;
            $this->size = 0;
        }

        public function push($value)
        {
            if ($this->isFull())
                return false;
            $node = new Node($value);
            $node->setNext($this->head);
            $this->head = $node;
            $this->size++;
        }

        public function pop()
        {
            if ($this->isEmpty())
                return null;
            $node = $this->head;
            $this->head = $this->head->getNext();
            $this->size--;
            return $node->getData();
        }

        public function isFull()
        {
            return ($size == $capacity);
        }

        public function isEmpty()
        {
            return ($size == 0);
        }

    }

    private $capacity;
    private $stacks;

    public function __construct($capacity=10)
    {
        $this->stacks = [];
        $this->capacity = $capacity;
    }

    public function push()
    {

    }

    public function pop()
    {

    }

    public function popAt($index)
    {
        // TODO
        // 让每个栈的尾和下一个栈的头相连
        // 这样当popAt(i)后，只需让i和i之后的栈头依次后移即可。
    }
}
