<?php
class Sort {
    public static function bubbleSort($arr) {
        for ($i = count($arr) - 1; $i > 1; $i--)
            for ($j = 0; $j < $i; $j++)
                if ($arr[$j] > $arr[$j+1]) self::swap($arr, $j, $j+1);
    }
    
    public static function insertionSort($arr) {
        for ($i = 1; $i < count($arr); $i++)
            for ($j = $i-1; $j >= 0; $j--) {
                if ($arr[$j] < $arr[$j+1]) break;
                self::swap($arr, $j, $j+1);
            }
    }
    
    private function swap($arr, $a, $b) {
        $tmp = $arr[$a];
        $arr[$a] = $arr[$b];
        $arr[$b] = $tmp;
    }
}

$arr = array(8, 3, 1, 2, 7, 5, 6, 4);
//Sort::bubbleSort($arr);
Sort::insertionSort($arr);

foreach ($arr as $val)
    echo $val;
