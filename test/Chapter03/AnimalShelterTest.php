<?php
require_once __DIR__ . '/../../src/chapter03/AnimalShelter.php';
use PHPUnit\Framework\TestCase;

class AnimalShelterTest extends TestCase
{
    public function testEnqueueAndDequeue()
    {
        $shelter = new AnimalShelter();
        $MikeTheDog = new Dog("Mike");
        $LilyTheCat = new Cat("Lily");
        $LucyTheDog = new Dog("Lucy");
        $LiuTheCat = new Cat("Liu");
        $HuangTheCat = new Cat("Huang");
        $SmithTheDog = new Dog("Smith");
        $shelter->enqueue($MikeTheDog);
        $shelter->enqueue($LilyTheCat);
        $shelter->enqueue($LucyTheDog);
        $shelter->enqueue($LiuTheCat);
        $shelter->enqueue($HuangTheCat);
        $shelter->enqueue($SmithTheDog);

        $this->assertEquals($MikeTheDog, $shelter->dequeueAny());
        $this->assertEquals($LilyTheCat, $shelter->dequeueCat());
        $this->assertEquals($LucyTheDog, $shelter->dequeueDog());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testInvalidAnimal()
    {
        $MaThePig = new Pig("Ma");
        $shelter = new AnimalShelter();
        $shelter->enqueue($MaThePig);
    }

    public function testEmpty()
    {
        $shelter = new AnimalShelter();
        $this->assertNull($shelter->dequeueAny());
    }
}

class Pig extends Animal
{
    public function __construct($name, $timestamp=INF)
    {
        parent::__construct($name, $timestamp);
    }

    use Actions;
}
