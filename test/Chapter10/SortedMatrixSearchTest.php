<?php
require_once __DIR__ . '/../../src/chapter10/SortedMatrixSearch.php';
use PHPUnit\Framework\TestCase;

class SortedMatrixSearchTest extends TestCase
{
    public function testSearch()
    {
        $matrix = [[15, 20, 70, 85], [20, 35, 80, 95], [30, 55, 95, 105], [40, 80, 100, 120]];
        $this->assertTrue(SortedMatrixSearch::search(55, $matrix));
        $this->assertFalse(SortedMatrixSearch::search(66, $matrix));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testInvalidArgument()
    {
        SortedMatrixSearch::search(1, "1234567");
    }
}
