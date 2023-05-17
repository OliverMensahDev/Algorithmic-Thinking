<?php 
function findTheKthSmallestNumberInSortedMatrix($matrices, $k){
    $minHeap = new SplMinHeap();
    // put the 1st element of each list in the min heap
    for($i = 0; $i < count($matrices); $i++){
          $minHeap->insert([$matrices[$i][0], 0, $matrices[$i]]);    
    }
  
    $number = 0;
    $numberCount = 0;
    while ($minHeap->count() > 0) {
        [$number, $i, $matrix] = $minHeap->extract();
        $numberCount += 1;
        if($numberCount == $k) break;
  
        // if the array of the top element has more elements, add the next element to the heap
        if (count($matrix) > $i + 1) {
          $minHeap->insert([$matrix[$i + 1], $i + 1, $matrix]);
        }
    }
    return $number;
}

echo 'Kth smallest number is: ' .json_encode(findTheKthSmallestNumberInSortedMatrix([
    [2, 6, 8], 
    [3, 7, 10],
    [5, 8, 11]
], 5)). PHP_EOL;