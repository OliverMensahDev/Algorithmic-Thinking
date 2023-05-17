<?php

// Given an array of sorted numbers, remove all duplicates from it. You should not use any extra space; after
// removing the duplicates in-place return the length of the subarray that has no duplicate in it.

function lengthOfSubarrayWithNoDuplicate($arr){
  $i = 1;
  $nextNonDuplicate = 1;
  while($i < count($arr)){
    if($arr[$i] !== $arr[$nextNonDuplicate -1]){
      $arr[$nextNonDuplicate] = $arr[$i];
      $nextNonDuplicate += 1;
    }
    $i++;
  }
  return $nextNonDuplicate;
}

echo lengthOfSubarrayWithNoDuplicate([1,2,2,3,3,4]). PHP_EOL;
echo lengthOfSubarrayWithNoDuplicate([1,2,2]). PHP_EOL;
echo lengthOfSubarrayWithNoDuplicate([1,2,3]). PHP_EOL;



