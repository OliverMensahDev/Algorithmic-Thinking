<?php

// Given an array of sorted numbers, remove all duplicates from it. return the new array without duplicate
function removeDuplicates($arr){
  $i = 1;
  $nextNonDuplicate = 1;
  while($i < count($arr)){
    if($arr[$i] !== $arr[$nextNonDuplicate -1]){
      $arr[$nextNonDuplicate] = $arr[$i];
      $nextNonDuplicate += 1;
    }
    $i++;
  }

  return array_slice($arr, 0, $nextNonDuplicate);
}

echo json_encode(removeDuplicates([1,2,2,3,3,4])). PHP_EOL;
echo json_encode(removeDuplicates([1,2,2])). PHP_EOL;
echo json_encode(removeDuplicates([1,2,3])). PHP_EOL;
