<?php 
//Given ‘M’ sorted arrays, find the smallest range that includes at least one number from each of the ‘M’ lists.

function smallestRange($lists) {
  $minHeap = new SplMinHeap();
  $rangeStart = 0;
  $rangeEnd = INF;
  $curMax = -INF;
  foreach($lists as $list){
    $minHeap->insert([$list[0], 0, $list]);  
    $curMax = max($curMax, $list[0]); 
    print($curMax);
  }
    while ($minHeap->count() === count($lists)) {
      [$number, $i, $list] = $minHeap->extract();
      if($rangeEnd - $rangeStart > $curMax - $number){
          $rangeStart = $number;
          $rangeEnd = $curMax;
      }
      // if the array of the top element has more elements, add the next element to the heap
      if (count($list) > $i + 1) {
        $minHeap->insert([$list[$i + 1], $i + 1, $list]);
        $curMax = max($curMax, $list[$i + 1]); 
      }
    }
    return [$rangeStart, $rangeEnd];
}


echo json_encode(smallestRange([
    [1, 5, 8],
    [4, 12],
    [7, 8, 10],
]));