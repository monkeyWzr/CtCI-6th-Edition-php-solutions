<?php
require_once __DIR__ . '/../../src/chapter10/SearchInRotatedArray.php';
use PHPUnit\Framework\TestCase;

class SearchInRotatedArrayTest extends TestCase
{
    public function testSearch()
    {
        $nums = [5, 6, 7, 8, 9, 10, 1, 2, 3, 4];
        $this->assertEquals(2, SearchInRotatedArray::search($nums, 7));
        $this->assertEquals(5, SearchInRotatedArray::search($nums, 10));
        $this->assertFalse(SearchInRotatedArray::search($nums, 11));
    }

    public function testSearchWithDuplicates()
    {
        $nums = [4, 4, 4, 4, 4, 10, 1, 2, 3, 4];
        $this->assertEquals(7, SearchInRotatedArray::search($nums, 2));
        $this->assertFalse(SearchInRotatedArray::search($nums, 5));
    }

    public function testInvalidArray()
    {
        $this->assertFalse(SearchInRotatedArray::search([], 2));

        $this->expectException(InvalidArgumentException::class);
        $this->expectException(SearchInRotatedArray::search(8, 2));

        $this->expectException(InvalidArgumentException::class);
        $this->expectException(SearchInRotatedArray::search(null, 2));
    }
}
