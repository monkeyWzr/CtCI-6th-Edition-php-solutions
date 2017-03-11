<?php

class GroupAnagrams
{
    public static function group($array)
    {
        foreach ($array as $string) {
            $stringInOrder = str_split($string);
            sort($stringInOrder);
            $map[implode('', $stringInOrder)][] = $string;
        }
        $ret = [];
        foreach ($map as $group) {
            $ret = array_merge($ret, $group);
        }
        return $ret;
    }
}

// $array = ['haha', 'fefe', 'bobo', 'ahah', 'obob'];
// print_r(GroupAnagrams::group($array));
