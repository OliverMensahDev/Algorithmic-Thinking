<?php 

//Given an array of n-1n−1 integers in the range from 11 to nn, find the one number that is missing from the array.
function findTheMissingNumber($arr) {
    $n = count($arr) + 1;
    // find sum of all numbers from 1 to n.
    $s1 = 0;
    for ($i = 1; $i <= $n; $i++)
     $s1 += $i;
  
    // subtract all numbers in input from sum.
    foreach($arr as $num){
      $s1 -= $num;
    }
  
    // s1, now, is the missing number
    return $s1;
  }
  
  
 echo 'The missing number is: '. findTheMissingNumber([1, 5, 2, 6, 4]). PHP_EOL;


 function findTheMissingNumber1($arr) {
    $n = count($arr) + 1;
    // x1 represents XOR of all values from 1 to n
    // find sum of all numbers from 1 to n.
    $x1 = 1;
    for ($i = 2; $i <= $n; $i++){
        $x1 = $x1 ^ $i; 
    }
    
    // x2 represents XOR of all values in arr
    $x2 = $arr[0];
    for ($i = 1; $i < $n -1; $i++)
      $x2 = $x2 ^ $arr[$i];
    
    // missing number is the xor of x1 and x2
    return $x1 ^ $x2;
  }
  
  
 echo 'The missing number is: '. findTheMissingNumber1([1, 5, 2, 6, 4]). PHP_EOL;


 function findSingleNumber($arr) {
    $num = 0;
    for ($i = 0; $i < count($arr); $i++){
      $num ^= $arr[$i];
    }
    return $num;
  }
  echo 'The single number is: '. findSingleNumber([1, 4, 2, 1, 3, 2, 3]). PHP_EOL;