<?php
require_once __DIR__ . '/../../src/chapter10/NoSizeSearch.php';
use PHPUnit\Framework\TestCase;

class NoSizeSearchTest extends TestCase
{
    public function testSearch()
    {
        $listy = new Listy([1,2,3,4,5,6]);
        $this->assertEquals(3, NoSizeSearch::search($listy, 4));
        $this->assertFalse(NoSizeSearch::search($listy, 7));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testInvalidArray()
    {
        NoSizeSearch::search([1,2,3,4], 2);
    }
}
