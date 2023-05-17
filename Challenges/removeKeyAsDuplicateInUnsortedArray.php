<?php 
// Given an unsorted array of numbers and a target ‘key’, remove all instances of ‘key’ in-place 
//and return the new length of the array.
// Input: [3, 2, 3, 6, 3, 10, 9, 3], Key=3
// Output: 4
// Explanation: The first four elements after removing every 'Key' will be [2, 6, 10, 9].

function removeKeyAsDuplicateInUnsortedArray($arr, $key){
    $nextElement = 0;
    for($i = 0; $i < count($arr); $i++){
        if($arr[$i] != $key){
            $arr[$nextElement] = $arr[$i];
            $nextElement++;
        }
    }
    return $nextElement;
}

echo removeKeyAsDuplicateInUnsortedArray([2, 3, 3, 3, 6, 9, 9], 3) . PHP_EOL;
echo removeKeyAsDuplicateInUnsortedArray([2, 2, 2, 11], 2) . PHP_EOL;