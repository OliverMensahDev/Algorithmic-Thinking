<?php 

class Interval {

    private int $start;
    private int $end;

    public function __construct($start, $end) 
    {
      $this->start = $start;
      $this->end = $end;
    }

    public function start()
    {
        return $this->start;
    }
  
    public function end()
    {
        return $this->end;
    }
  
    public function printInterval() 
    {
     echo json_encode([$this->start, $this->end]);
    }
  }
  
  
  function merge($intervals) {
    if (count($intervals) < 2) {
      return $intervals;
    }
    // sort the intervals on the start time
    sort($intervals); 
  
    $mergedIntervals = [];
    $start = $intervals[0]->start();
    $end = $intervals[0]->end();
    for ($i = 1; $i < count($intervals); $i++) {
       $interval = $intervals[$i];
      if ($interval->start() <= $end) { // overlapping intervals, adjust the 'end'
        $end = max($interval->end(), $end);
      } else { // non-overlapping interval, add the previous interval and reset
        $mergedIntervals[] = new Interval($start, $end);
        $start = $interval->start();
        $end = $interval->end();
      }
    }
    // add the last interval
    $mergedIntervals[] = new Interval($start, $end);
    return $mergedIntervals;
  }
  
  
  echo 'Merged intervals: '. PHP_EOL;
  $result = merge([new Interval(1, 4), new Interval(2, 5), new Interval(7, 9)]);
  for ($i = 0; $i < count($result); $i++) {
    $result[$i]->printInterval();
  }
  echo PHP_EOL;

  echo 'Merged intervals: '. PHP_EOL;
  $result = merge([new Interval(6, 7), new Interval(2, 4), new Interval(5, 9)]);
  for ($i = 0; $i < count($result); $i++) {
    $result[$i]->printInterval();
  }
  echo PHP_EOL;
  
  echo 'Merged intervals: '. PHP_EOL;
  $result = merge([new Interval(1, 4), new Interval(2, 6), new Interval(3, 5)]);
  for ($i = 0; $i < count($result); $i++) {
    $result[$i]->printInterval();
  }
  echo PHP_EOL;


function overlaps($intervals) {
    if (count($intervals) < 2) {
      return $intervals;
    }
    // sort the intervals on the start time
    sort($intervals); 
  
    $start = $intervals[0]->start();
    $end = $intervals[0]->end();
    for ($i = 1; $i < count($intervals); $i++) {
        $interval = $intervals[$i];
        if ($interval->start() <= $end) return true;
        else{
            $start = $interval->start();
            $end = $interval->end();
        } 
    }
    return false;
}
  

  
echo 'Intervals overlaps: '. (int) overlaps([new Interval(1, 4), new Interval(2, 5), new Interval(7, 9)]). PHP_EOL;
echo 'Intervals overlaps: '. (int)overlaps([new Interval(6, 7), new Interval(2, 4), new Interval(5, 9)]). PHP_EOL;
echo 'Intervals overlaps: '. (int)overlaps([new Interval(1, 2), new Interval(3, 5), new Interval(8, 9)]). PHP_EOL;