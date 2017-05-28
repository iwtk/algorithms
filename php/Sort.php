<?php
class Sort {
    public static function bubbleSort(&$arr) {
        for ($i = count($arr)-1; $i >= 1; $i--)
            for ($j = 0; $j < $i; $j++)
                if ($arr[$j] > $arr[$j+1]) self::swap($arr, $j, $j+1);
    }
    
    public static function insertionSort(&$arr) {
        for ($i = 1; $i <= count($arr)-1; $i++)
            for ($j = $i-1; $j >= 0; $j--) {
                if ($arr[$j] < $arr[$j+1]) break;
                self::swap($arr, $j, $j+1);
            }
    }
    
    public static function selectionSort(&$arr) {
        for ($i = 0; $i < count($arr)-1; $i++)
            for ($j = $i+1; $j <= count($arr)-1; $j++)
                if ($arr[$i] > $arr[$j]) self::swap($arr, $i, $j);
    }
    
    public static function shellSort(&$arr) {
        $gaps = array(8, 4, 2, 1);
        foreach ($gaps as $g) {
            for ($i = $g; $i <= count($arr)-1; $i += $g)
                for ($j = $i; $j >= $g; $j -= $g) {
                    if ($arr[$j-$g] < $arr[$j]) break;
                    self::swap($arr, $j, $j-$g);
                }
        }
    }
    
    public static function quickSort(&$arr, $left, $right) {
        if ($left >= $right) return;
        
        $index = self::partition($arr, $left, $right);
        self::quickSort($arr, $left, $index - 1);
        self::quickSort($arr, $index, $right);
    }
    
    private static function partition(&$arr, $left, $right) {
        $pivot = $arr[($left + $right) / 2];
        
        while ($left <= $right) {
            while ($arr[$left] < $pivot) $left++;
            while ($arr[$right] > $pivot) $right--;
            if ($left <= $right) {
                self::swap($arr, $left, $right);
                $left++;
                $right--;
            }
        }
        return $left;
    }
    
    private function swap(&$arr, $a, $b) {
        $tmp = $arr[$a];
        $arr[$a] = $arr[$b];
        $arr[$b] = $tmp;
    }
    
}
$arr = array(8, 3, 1, 2, 7, 5, 6, 4);
//Sort::bubbleSort($arr);
//Sort::insertionSort($arr);
//Sort::selectionSort($arr);
//Sort::shellSort($arr);
Sort::quickSort($arr, 0, count($arr)-1);
foreach ($arr as $val)
    echo $val;
