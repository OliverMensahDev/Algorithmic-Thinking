<?php 

function cyclicSort($nums) {
    $i = 0;
    while($i < count($nums)){
        $j = $nums[$i] - 1;
        if($nums[$i] != $nums[$j]){
            [$nums[$i], $nums[$j]] = [$nums[$j], $nums[$i]];
        }else{
            $i += 1;
        }
    }
    return $nums;
  }
  
  
echo json_encode(cyclicSort([3, 1, 5, 4, 2])) . PHP_EOL;
echo json_encode(cyclicSort([2, 6, 4, 3, 1, 5])) . PHP_EOL;
echo json_encode(cyclicSort([1, 5, 6, 4, 3, 2])). PHP_EOL;


function missingNumber($nums) {
    $i = 0;
    $n = count($nums);
    while($i < $n ){
        $j = $nums[$i];
        if($nums[$i] < $n && $nums[$i] != $nums[$j]){
            [$nums[$i], $nums[$j]] = [$nums[$j], $nums[$i]];
        }else{
            $i += 1;
        }
    }

    for ($i = 0; $i < $n; $i++) {
        if ($nums[$i] !== $i) {
          return $i;
        }
      }
    
    return $n;
  }
  
echo missingNumber([1, 0, 4, 2]) . PHP_EOL;
echo missingNumber([0, 4, 3, 1, 5]). PHP_EOL;
echo missingNumber([2, 5, 6, 4, 3, 0]) . PHP_EOL;



function missingNumbers($nums) {
    $i = 0;
    $n = count($nums);
    while($i < $n ){
        $j = $nums[$i] - 1;
        if($nums[$i] != $nums[$j]){
            [$nums[$i], $nums[$j]] = [$nums[$j], $nums[$i]];
        }else{
            $i += 1;
        }
    }
    $missingNumbers = [];
    for ($i = 0; $i < $n; $i++) {
        if ($nums[$i] !== $i + 1) {
          $missingNumbers[] = $i + 1;
        }
      }
    
    return $missingNumbers;
  }
  
echo json_encode(missingNumbers([2, 3, 1, 8, 2, 3, 5, 1])) . PHP_EOL;
echo json_encode(missingNumbers([2, 4, 1, 2])) . PHP_EOL;
echo json_encode(missingNumbers([2, 3, 2, 1])) . PHP_EOL;

function findDuplicate($nums) {
    $i = 0;
    while ($i < count($nums) ){
      if ($nums[$i] !== $i + 1) {
        $j = $nums[$i] - 1;
        if ($nums[$i] !== $nums[$j]) {
          [$nums[$i], $nums[$j]] = [$nums[$j], $nums[$i]]; 
        } else { 
          return $nums[$i];
        }
      } else {
        $i += 1;
      }
    }
    return -1;
  }
  
    
echo json_encode(findDuplicate([1, 4, 4, 3, 2])) . PHP_EOL;
echo json_encode(findDuplicate([2, 1, 3, 3, 5, 4])) . PHP_EOL;
echo json_encode(findDuplicate([2, 3, 2, 1])) . PHP_EOL;


function findAllDuplicates($nums) {
    $i = 0;
    while ($i < count($nums)) {
      $j = $nums[$i] - 1;
      if ($nums[$i] != $nums[$j]) {
        [$nums[$i], $nums[$j]] = [$nums[$j], $nums[$i]]; 
    } else {
        $i++;
      }
    }
  
    $duplicateNumbers = [];
    for ($i = 0; $i < count($nums); $i++) {
      if ($nums[$i] !== $i + 1) {
        $duplicateNumbers[] = $nums[$i];
      }
    }
  
    return $duplicateNumbers;
  }
  
    
  echo json_encode(findAllDuplicates([3, 4, 4, 5, 5])) . PHP_EOL;
  echo json_encode(findAllDuplicates([5, 4, 7, 2, 3, 5, 3])) . PHP_EOL;
