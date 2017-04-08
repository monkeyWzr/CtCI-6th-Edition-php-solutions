<?php

class BitVector
{
    private $bits;
    private $size;
    private static $intSize = PHP_INT_SIZE * 8;
    public function __construct($size=32000)
    {
        $this->size = (int) ($size / self::$intSize) + 1;
        for ($i = 0; $i < $this->size; $i++) {
            $this->bits[] = 0;
        }
    }

    /**
     * get value at the given position
     * @param  int   $position
     * @return value 0/1
     */
    public function get($position)
    {
        $offset = (int) $position / self::$intSize;
        $mask = 1 << ($position % self::$intSize);
        return $this->bits[$offset] & $mask;

    }

    /**
     * set value to 1 at the given position
     * @param int $position
     */
    public function set($position)
    {
        $offset = (int) $position / self::$intSize;
        $mask = 1 << ($position % self::$intSize);
        $this->bits[$offset] |= $mask;
    }
}
