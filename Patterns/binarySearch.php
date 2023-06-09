<?php 
/**
 * Given a sorted array of numbers, find if a given number ‘key’ is present in the array. 
 * Though we know that the array is sorted, we don’t know if it’s sorted in ascending or descending order. 
 * You should assume that the array can have duplicates.
 * Write a function to return the index of the ‘key’ if it is present in the array, otherwise return -1.
 */
function binarySearch(array $arr, int $key){
    $start = 0;
    $end = count($arr) -1;
    $isAscending = $arr[$start] < $arr[$end];
    while($start <= $end){
        $mid = floor($start + ($end - $start) / 2);
        if($key == $arr[$mid]) return $mid;
        if($isAscending){
            if($key > $arr[$mid]){
                $start = $mid + 1;
            }else{
                $end = $mid - 1;
            }
        }else{
            if($key > $arr[$mid]){
                $end = $mid - 1;
            }else{
                $start = $mid + 1;
            }
        }
    }
    return -1;
}
echo "binarySearch".  PHP_EOL;
echo binarySearch([4, 6, 10], 10) . PHP_EOL;
echo binarySearch([1, 2, 3, 4, 5, 6, 7], 5) . PHP_EOL;
echo binarySearch([10, 6, 4], 10) . PHP_EOL;
echo binarySearch([10, 6, 4], 4) . PHP_EOL;

/**
 * Given an array of numbers sorted in ascending order, find the floor of a given number ‘key’. 
 * The floor of the ‘key’ will be the biggest element in the given array smaller than or equal to the ‘key’
 * Write a function to return the index of the floor of the ‘key’. If there isn’t a floor, return -1.
 */
function searchFloorOfANumber(array $arr, int $key){
    if($key <  $arr[0]) return -1;
    $n = count($arr);
    $start = 0;
    $end = $n -1;
    $mids = [];
    while($start <= $end){
        $mid = floor($start + ($end - $start) / 2);
        $mids[] = $mid;
        if($key < $arr[$mid]){
            $end = $mid - 1;
        }else if($key > $arr[$mid]){
            $start = $mid + 1;
        }else{
            return $mid;
        }
    }
    print_r($mids);
    return $end;
}

/**
 * Given an array of numbers sorted in an ascending order, find the ceiling of a given number ‘key’. 
 * The ceiling of the ‘key’ will be the smallest element in the given array greater than or equal to the ‘key’.
 * Write a function to return the index of the ceiling of the ‘key’. If there isn’t any ceiling return -1.
 */
function searchCeilingOfANumber(array $arr, int $key){
    $n = count($arr);
    if($key >  $arr[$n - 1]) return -1;
    $start = 0;
    $end = $n -1;
    while($start <= $end){
        $mid = floor($start + ($end - $start) / 2);
        if($key == $arr[$mid]) return $mid;
        if($key < $arr[$mid]){
            $end = $mid - 1;
        }else{
            $start = $mid + 1;
        }
    }
    return $start;
}


$data = [1, 2, 8, 10, 12, 19, 21];
echo "The floor of 0 is ". searchFloorOfANumber($data, 0) .  PHP_EOL;
echo "The ceiling of 0 is ". searchCeilingOfANumber($data, 0) .  PHP_EOL;

echo "The floor of 1 is ". searchFloorOfANumber($data, 1) .  PHP_EOL;
echo "The ceiling of 1 is ". searchCeilingOfANumber($data, 1) .  PHP_EOL;

echo "The floor of 5 is ". searchFloorOfANumber($data, 5) .  PHP_EOL;
echo "The ceiling of 5 is ". searchCeilingOfANumber($data, 5) .  PHP_EOL;


echo "The floor of 20 is ". searchFloorOfANumber($data, 20) .  PHP_EOL;
echo "The ceiling of 20 is ". searchCeilingOfANumber($data, 20) .  PHP_EOL;