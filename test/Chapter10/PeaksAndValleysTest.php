<?php
require_once __DIR__ . '/../../src/chapter10/PeaksAndValleys.php';
use PHPUnit\Framework\TestCase;

class PeaksAndValleysTest extends TestCase
{
    public function testSort()
    {
        $nums1 = [5,3,1,2,3];
        $this->assertPeaksAndValleys(PeaksAndValleys::sort($nums1));

        $nums2 = [3, 4, 6, 9, 7, 1, 13, 90, 34, 5];
        $this->assertPeaksAndValleys(PeaksAndValleys::sort($nums2));
    }

    protected function assertPeaksAndValleys($arr)
    {
        for ($i = 1, $n = count($arr); $i < $n; $i+=2) {
            $this->assertTrue($arr[$i-1] >= $arr[$i]);
            if ($i + 1 < $n)
                $this->assertTrue($arr[$i] < $arr[$i-1]);
        }
    }
}
