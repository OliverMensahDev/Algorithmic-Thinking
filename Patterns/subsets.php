<?php 
function findSubsets($nums) {
    // start by adding the empty subset
    $subsets[] = [];
    for ($i = 0; $i < count($nums); $i++) {
      $currentNumber = $nums[$i];
      // we will take all existing subsets and insert the current number in them to create new subsets
      $n = count($subsets);
      for ($j = 0; $j < $n; $j++) {
        // create a new subset from the existing subset and insert the current element to it
        $set =  $subsets[$j]; // clone the permutation
        $set[] = $currentNumber;
        $subsets[] = $set;
      }
    }
  
    return $subsets;
  }
  
  
  echo 'Here is the list of subsets: ';
  $result = findSubsets([1, 3]);
  foreach($result as $subset){
    echo json_encode($subset);
  }
  echo PHP_EOL;


  echo 'Here is the list of subsets: ';
  $result = findSubsets([1, 5, 3]);
  foreach($result as $subset){
    echo json_encode($subset);
  }
  echo  PHP_EOL;
  