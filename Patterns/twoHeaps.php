<?php 

class MedianOfAStream {
    private SplMaxHeap $maxHeap;
    private SplMinHeap $minHeap;

    public function __construct()
    {
      $this->maxHeap = new SplMaxHeap(); // containing first half of numbers
      $this->minHeap = new SplMinHeap(); // containing second half of numbers
    }
  
    function insertNum($num) {
      if ($this->maxHeap->count() === 0 || $this->maxHeap->top() >= $num) {
        $this->maxHeap->insert($num);
      } else {
        $this->minHeap->insert($num);
      }
  
      // either both the heaps will have equal number of elements or max-heap will have one
      // more element than the min-heap
      if ($this->maxHeap->count() > $this->minHeap->count() + 1) {
        $this->minHeap->insert($this->maxHeap->extract());
      } else if ($this->maxHeap->count() < $this->minHeap->count()) {
        $this->maxHeap->insert($this->minHeap->extract());
      }
    }
  
    function findMedian() {
      if ($this->maxHeap->count() === $this->minHeap->count()) {
        // we have even number of elements, take the average of middle two elements
        return $this->maxHeap->top() / 2.0 + $this->minHeap->top() / 2.0;
      }
  
      // because max-heap will have one more element than the min-heap
      return $this->maxHeap->top();
    }

    function maxHeap(){
        return $this->maxHeap;
    }

    function minHeap(){
        return $this->minHeap;
    }
  }
  
  
  $medianOfAStream = new MedianOfAStream();
  $medianOfAStream->insertNum(3);
  $medianOfAStream->insertNum(1);
 echo 'The median is: ' . $medianOfAStream->findMedian() . PHP_EOL;
 $medianOfAStream->insertNum(5);
 echo 'The median is: ' . $medianOfAStream->findMedian() . PHP_EOL;
  $medianOfAStream->insertNum(4);
  echo 'The median is: ' . $medianOfAStream->findMedian() . PHP_EOL;


  while(!$medianOfAStream->maxHeap()->isEmpty()){
      echo $medianOfAStream->maxHeap()->extract();
  }

  while(!$medianOfAStream->minHeap()->isEmpty()){
    echo $medianOfAStream->minHeap()->extract();
}