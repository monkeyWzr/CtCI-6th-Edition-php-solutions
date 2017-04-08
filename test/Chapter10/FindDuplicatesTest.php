<?php
require_once __DIR__ . '/../../src/chapter10/FindDuplicates.php';
use PHPUnit\Framework\TestCase;

class FindDuplicatesTest extends TestCase
{
    public function testFind()
    {
        $arr = [1,2,3,3,4,5,5,6,6,6,7,8,9,0,0];
        $this->assertEquals([3,5,6,6,0], FindDuplicates::find($arr));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testInvalidArray()
    {
        FindDuplicates::find("hahaha");
    }
}
