<?php

function searchFloorOfANumber(array $arr, int $key){
    if($key < $arr[0]) return -1;
    $start = 0; 
    $end  = count($arr) - 1; 
    while($start <= $end){
        $mid = floor($start +($end - $start)/2);
        if($key < $arr[$mid])$end = $mid - 1;
        else if($key > $arr[$mid]) $start = $mid + 1;
        else return $mid;
    }

    return $end;
}


function searchCeilingOfANumber(array $arr, int $key){
    $end = count($arr) - 1;
    if($key > $arr[$end]) return -1;
    $start = 0; 
    while($start <= $end){
        $mid = floor($start +($end - $start)/2);
        if($key < $arr[$mid])$end = $mid - 1;
        else if($key > $arr[$mid]) $start = $mid + 1;
        else return $mid;
    }
    return $start;
}

$data = [1, 2, 8, 10, 12, 19];
echo "The floor of 0 is ". searchFloorOfANumber($data, 0) .  PHP_EOL;
echo "The ceiling of 0 is ". searchCeilingOfANumber($data, 0) .  PHP_EOL;

echo "The floor of 1 is ". searchFloorOfANumber($data, 1) .  PHP_EOL;
echo "The ceiling of 1 is ". searchCeilingOfANumber($data, 1) .  PHP_EOL;

echo "The floor of 5 is ". searchFloorOfANumber($data, 5) .  PHP_EOL;
echo "The ceiling of 5 is ". searchCeilingOfANumber($data, 5) .  PHP_EOL;


echo "The floor of 20 is ". searchFloorOfANumber($data, 20) .  PHP_EOL;
echo "The ceiling of 20 is ". searchCeilingOfANumber($data, 20) .  PHP_EOL;