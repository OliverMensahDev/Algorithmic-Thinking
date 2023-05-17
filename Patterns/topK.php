<?php 

function findKLargestNumbers(array $nums, int $k) {
    $minHeap = new SplMinHeap();
    // put first 'K' numbers in the min heap
    for ($i = 0; $i < $k; $i++) {
      $minHeap->insert($nums[$i]);
    }
  
    // go through the remaining numbers of the array, if the number from the array is bigger than the
    // top(i.e., smallest) number of the min-heap, remove the top number from heap and add the number from array
    for ($i = $k; $i < count($nums); $i++) {
      if ($nums[$i] > $minHeap->top()) {
          $minHeap->extract();
          $minHeap->insert($nums[$i]);
      }
    }
  
    // the heap has the top 'K' numbers, return them in a list
    $result = [];
    while(!$minHeap->isEmpty()){
        $result[] = $minHeap->extract();
    }
    return $result;
  }

  echo 'findKLargestNumbers'. PHP_EOL;
  echo 'Here are the top K numbers: ' . json_encode(findKLargestNumbers([3, 1, 5, 12, 2, 11], 3)) . PHP_EOL;
  echo 'Here are the top K numbers: ' . json_encode(findKLargestNumbers([5, 12, 11, -1, 12], 3)) . PHP_EOL;


  function findKSmallestNumbers(array $nums, int $k) {
    $maxHeap = new SplMaxHeap();
    // put first 'K' numbers in the min heap
    for ($i = 0; $i < $k; $i++) {
        $maxHeap->insert($nums[$i]);
    }
  
    // go through the remaining numbers of the array, if the number from the array is bigger than the
    // top(i.e., smallest) number of the min-heap, remove the top number from heap and add the number from array
    for ($i = $k; $i < count($nums); $i++) {
      if ($nums[$i] < $maxHeap->top()) {
        $maxHeap->extract();
        $maxHeap->insert($nums[$i]);
      }
    }
  
    // the heap has the top 'K' numbers, return them in a list
    $result = [];
    while(!$maxHeap->isEmpty()){
        $result[] = $maxHeap->extract();
    }
    return $result;
  }

  echo 'findKSmallestNumbers'. PHP_EOL;
  echo 'Here are the top K numbers: ' . json_encode(findKSmallestNumbers([3, 1, 5, 12, 2, 11], 3)) . PHP_EOL;
  echo 'Here are the top K numbers: ' . json_encode(findKSmallestNumbers([5, 12, 11, -1, 12], 3)) . PHP_EOL;