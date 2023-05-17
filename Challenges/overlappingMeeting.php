<?php 

class Meeting{
  private int $startTime;
  private int $endTime;
  
  public function __construct(int $startTime, int $endTime)
  {
    $this->startTime = $startTime;
    $this->endTime = $endTime;
  }
  
  public function startTime()
  {
    return $this->startTime;
  }
  
  public function endTime()
  {
    return $this->endTime;
  }
}


function mergeRanges(array $meetings)
{
  if(count($meetings) < 2) return $meetings;
  
  $mergedRanges = [];
  sort($meetings);
  $startTime = $meetings[0]->startTime();
  $endTime = $meetings[0]->endTime();
  
  for($i = 1; $i < count($meetings); $i++){
    $meeting = $meetings[$i];
    if($meeting->startTime() <= $endTime){
      $endTime = max($endTime, $meeting->endTime());
    }else{
      $mergedRanges[] = new Meeting($startTime, $endTime);
      $startTime = $meeting->startTime();
      $endTime = $meeting->endTime();
    }
  }
  
  $mergedRanges[] = new Meeting($startTime, $endTime);

  return $mergedRanges;
}


$desc = 'meetings overlap';
$actual = mergeRanges([new Meeting(1, 3), new Meeting(2, 4)]);
$expected = [new Meeting(1, 4)];
assertArrayEquals($actual, $expected, $desc);

$desc = 'meetings touch';
$actual = mergeRanges([new Meeting(5, 6), new Meeting(6, 8)]);
$expected = [new Meeting(5, 8)];
assertArrayEquals($actual, $expected, $desc);

$desc = 'meeting contains other meeting';
$actual = mergeRanges([new Meeting(1, 8), new Meeting(2, 5)]);
$expected = [new Meeting(1, 8)];
assertArrayEquals($actual, $expected, $desc);

$desc = 'meetings stay separate';
$actual = mergeRanges([new Meeting(1, 3), new Meeting(4, 8)]);
$expected = [new Meeting(1, 3), new Meeting(4, 8)];
assertArrayEquals($actual, $expected, $desc);

$desc = 'multiple merged meetings';
$actual = mergeRanges([
    new Meeting(1, 4),
    new Meeting(2, 5),
    new Meeting(5, 8)
]);
$expected = [new Meeting(1, 8)];
assertArrayEquals($actual, $expected, $desc);

$desc = 'meetings not sorted';
$actual = mergeRanges([
    new Meeting(5, 8),
    new Meeting(1, 4),
    new Meeting(6, 8)
]);
$expected = [new Meeting(1, 4), new Meeting(5, 8)];
assertArrayEquals($actual, $expected, $desc);

$desc = 'one long meeting contains smaller meetings';
$actual = mergeRanges([
    new Meeting(1, 10),
    new Meeting(2, 5),
    new Meeting(6, 8),
    new Meeting(9, 10),
    new Meeting(10, 12)
]);
$expected = mergeRanges([
    new Meeting(1, 12),
]);
assertArrayEquals($actual, $expected, $desc);

$desc = 'sample input';
$actual = mergeRanges([
    new Meeting(0, 1),
    new Meeting(3, 5),
    new Meeting(4, 8),
    new Meeting(10, 12),
    new Meeting(9, 10)
]);
$expected = mergeRanges([
    new Meeting(0, 1),
    new Meeting(3, 8),
    new Meeting(9, 12)
]);
assertArrayEquals($actual, $expected, $desc);

function assertArrayEquals($a, $b, $desc)
{
    $serializedA = serialize($a);
    $serializedB = serialize($b);

    if ($serializedA === $serializedB) {
        echo "$desc ... PASS\n";
    } else {
        echo "$desc ... FAIL: " . arrayToString($a) ." != " . arrayToString($b) . "\n";
    }
}

function arrayToString(array $array)
{
    return "[" .  implode(',', array_map(function($obj) { return json_encode([$obj->startTime(), $obj->endTime()]); }, $array)) . "]";
} 