<?php
require_once __DIR__ . '/../lib/DoublyLinkedListNode.php';

class SetOfStacks
{
    private $capacity;
    private $stacks;
    private $currentStack;

    public function __construct($capacity=10)
    {
        if ($capacity < 1)
            throw new InvalidArgumentException("the capacity should greater than 0");
        $this->stacks = [];
        $this->capacity = $capacity;
        $this->currentStack = -1;
    }

    public function push($value)
    {
        if (empty($this->stacks) || $this->stacks[$this->currentStack]->isFull()) {
            $newStack = new StackWithCapacity($this->capacity);
            $this->currentStack++;
            $this->stacks[$this->currentStack] = $newStack;
        }

        $this->stacks[$this->currentStack]->push($value);
    }

    public function pop()
    {
        if (empty($this->stacks))
            return false;
        $value = $this->stacks[$this->currentStack]->pop();

        if ($this->stacks[$this->currentStack]->isEmpty()) {
            unset($this->stacks[$this->currentStack]);
            $this->currentStack--;
        }

        return $value;
    }

    public function popAt($index)
    {
        if (empty($this->stacks))
            return false;
        if ($index < 0 || $index > $this->currentStack)
            throw new InvalidArgumentException('Index is out of range.');
        $value = $this->stacks[$index]->pop();

        if (($length = count($this->stacks)) > 1) {
            for ($i = $index + 1; $i < $length; $i++) {
                $this->stacks[$i - 1]->push($this->stacks[$i]->popTail());
            }
        }

        if ($this->stacks[$this->currentStack]->isEmpty()) {
            unset($this->stacks[$this->currentStack]);
            $this->currentStack--;
        }

        return $value;
    }

    public function isEmpty()
    {
        return ($this->currentStack == -1);
    }

    public function setSize()
    {
        return $this->currentStack + 1;
    }
}

class StackWithCapacity
    {
        private $capacity;
        private $size;
        private $head;
        private $tail;

        public function __construct($capacity=10)
        {
            $this->capacity = $capacity;
            $this->size = 0;
            $this->head = null;
            $this->tail = null;
        }

        public function push($value)
        {
            if ($this->isFull())
                return false;
            $node = new DoublyLinkedListNode($value);
            if ($this->size == 0)
                $this->tail = $node;
            if ($this->size == 1)
                $this->tail->setPrevious($node);
            if ($this->head != null)
                $this->head->setPrevious($node);
            $node->setNext($this->head);
            $this->head = $node;
            $this->size++;
        }

        public function popTail()
        {
            if ($this->isEmpty())
                return false;
            $tail = $this->tail;
            $newTail = $this->tail->getPrevious();
            if ($newTail != null)
                $newTail->setNext(null);
            $this->tail = $newTail;
            $this->size--;
            return $tail->getData();
        }

        public function pop()
        {
            if ($this->isEmpty())
                return null;
            $node = $this->head;
            $this->head = $this->head->getNext();
            $this->size--;
            if ($this->size == 0)
                $this->tail = null;
            return $node->getData();
        }

        public function isFull()
        {
            return ($this->size == $this->capacity);
        }

        public function isEmpty()
        {
            return ($this->size == 0);
        }
    }
