<?php
function binarySearch(array $list, int $key){
    $start = 0;
    $end = count($list) - 1;
    $isAscending = $list[0] < $list[1];
    while($start <= $end){
        $mid = floor($start + ($end - $start) / 2);
        if($key == $list[$mid]) return $mid;
        if($isAscending){
            if($key < $list[$mid]) $end = $mid - 1;
            else $start = $mid + 1;
        }else{
            if($key < $list[$mid]) $start = $mid + 1;
            else $end = $mid - 1;
        }
    }
    return -1; 
}

echo binarySearch([], 1) . PHP_EOL;
echo binarySearch([1], 1) . PHP_EOL;
echo binarySearch([1], 2) . PHP_EOL;
echo binarySearch([1,2,3,4], 3) . PHP_EOL;
echo binarySearch([1,2,3,4], 0) . PHP_EOL;
echo binarySearch([10, 9 , 8, 7], 10) . PHP_EOL;