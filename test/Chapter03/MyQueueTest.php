<?php
require_once __DIR__ . '/../../src/chapter03/MyQueue.php';
use PHPUnit\Framework\TestCase;

class MyQueueTest extends TestCase
{
    public function testEnqueueAndDequeue()
    {
        $queue = new MyQueue();
        $queue->enqueue(1);
        $queue->enqueue(2);
        $queue->enqueue(3);
        $this->assertEquals(1, $queue->dequeue());
        $this->assertEquals(2, $queue->dequeue());
        $this->assertEquals(3, $queue->dequeue());
    }

    public function testSize()
    {
        $queue = new MyQueue();
        $queue->enqueue(1);
        $queue->enqueue(2);
        $queue->dequeue();
        $this->assertEquals(1, $queue->size());
    }

    public function testIsEmpty()
    {
        $queue = new MyQueue();
        $queue->enqueue(1);
        $queue->enqueue(2);
        $queue->dequeue();
        $queue->dequeue();
        $this->assertTrue($queue->isEmpty());
    }
}
