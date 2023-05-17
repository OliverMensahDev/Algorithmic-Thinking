<?php
// Given ‘M’ sorted arrays, find the K’th smallest number among all the arrays.

function mergeArray($lists, $k) {
    $minHeap = new SplMinHeap();
  // put the 1st element of each list in the min heap
  for($i = 0; $i < count($lists); $i++){
        $minHeap->insert([$lists[$i][0], 0, $lists[$i]]);    
    }

   $number = 0;
   $numberCount = 0;
    while ($minHeap->count() > 0) {
      [$number, $i, $list] = $minHeap->extract();
      $numberCount += 1;
      if($numberCount == $k) break;

      // if the array of the top element has more elements, add the next element to the heap
      if (count($list) > $i + 1) {
        $minHeap->insert([$list[$i + 1], $i + 1, $list]);
      }
    }
    return $number;
}


echo json_encode(mergeArray([
    [2, 6, 8],
    [3, 6, 7],
    [1, 3, 4],
], 5));