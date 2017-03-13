<?php

abstract class Animal
{
    protected $name;
    protected $timestamp;
    public function __construct($name, $timestamp) {
        $this->name = $name;
        $this->timestamp = $timestamp;
    }
}

trait Actions
{
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    public function getTimestamp()
    {
        return $this->timestamp;
    }
}

class Dog extends Animal
{
    public function __construct($name, $timestamp=INF)
    {
        parent::__construct($name, $timestamp);
    }

    use actions;
}

class Cat extends Animal
{
    public function __construct($name, $timestamp=INF)
    {
        parent::__construct($name, $timestamp);
    }

    use Actions;
}

class AnimalShelter
{
    private $dogs;
    private $cats;
    private $timestamp;

    public function __construct()
    {
        $this->dogs = new \Ds\Queue();
        $this->cats = new \Ds\Queue();
        $this->timestamp = 0;
    }

    public function enqueue($animal)
    {
        if ($animal instanceof Dog) {
            $animal->setTimestamp($this->timestamp++);
            $this->dogs->push($animal);
        }
        elseif ($animal instanceof Cat) {
            $animal->setTimestamp($this->timestamp++);
            $this->cats->push($animal);
        }
        else
            throw new InvalidArgumentException('This kind of animals are not acceptable.');
    }

    public function dequeueAny()
    {
        if ($this->dogs->isEmpty())
            return $this->cats->isEmpty() ? null : $this->cats->pop();
        elseif ($this->cats->isEmpty())
            return $this->dogs->pop();
        else
            return $this->dogs->peek()->getTimestamp() < $this->cats->peek()->getTimestamp()
                   ? $this->dogs->pop() : $this->cats->pop();
    }

    public function dequeueDog()
    {
        if ($this->dogs->isEmpty())
            return null;
        return $this->dogs->pop();
    }

    public function dequeueCat()
    {
        if ($this->cats->isEmpty())
            return null;
        return $this->cats->pop();
    }
}
