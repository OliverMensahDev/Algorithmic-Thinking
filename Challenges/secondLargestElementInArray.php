<?php

// find the second largest element in the array

function secondLargestElement(array $arr){
  $max = $arr[0];
  $nextMax = $arr[0];
  $i = 1;
  while($i < count($arr)){
     if($arr[$i] > $max){
       $nextMax = $max;
       $max = $arr[$i];
     }else{
       if($max === $nextMax){
         $nextMax = $arr[$i];
       }
       $nextMax = max($nextMax, $arr[$i]); 
     }
    $i++;
  }
  return $nextMax;
}

echo secondLargestElement([12, 4,1,5, 4,10, 13]). PHP_EOL;
echo secondLargestElement([4,1,5, 4,10, 13]). PHP_EOL;
echo secondLargestElement([15, 4,1,5, 4,10, 13]). PHP_EOL;