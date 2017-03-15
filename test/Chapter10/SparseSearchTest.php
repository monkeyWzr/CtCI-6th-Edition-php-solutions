<?php
require_once __DIR__ . '/../../src/chapter10/SparseSearch.php';
use PHPUnit\Framework\TestCase;

class SparseSearchTest extends TestCase
{
    public function testSearch()
    {
        $s = ["I", "", "", "", "fall", "", "", "in", "", "", "love", "again"];
        $this->assertEquals(4, SparseSearch::search($s, "fall"));
        $this->assertEquals(7, SparseSearch::search($s, "in"));
        $this->assertEquals(-1, SparseSearch::search($s, "lq"));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testInvalidArray()
    {
        SparseSearch::search("hahahah", "ha");
    }
}
