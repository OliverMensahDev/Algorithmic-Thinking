<?php 

function pair_with_target_sum($arr, $targetSum) {
    $left = 0;
    $right = count($arr) - 1;
    while ($left < $right) {
         $currentSum = $arr[$left] + $arr[$right];
       if ($currentSum === $targetSum) {
         return [$left, $right];
       }
   
       if ( $currentSum > $targetSum ) {
         $right -= 1; 
       } else {
         $left += 1;
       }
     }
     return [-1, -1];
}
   
echo 'Pair Target Sum'. PHP_EOL;
echo json_encode(pair_with_target_sum([1, 2, 3, 4, 6], 6)) . PHP_EOL;
echo json_encode(pair_with_target_sum([2, 5, 9, 11], 11)) . PHP_EOL; 
 
function removeDuplicates($arr)
{
    $nextNonDuplicateIndex = 1;
    $i = 1;
    while($i < count($arr)){
        if($arr[$i] != $arr[$nextNonDuplicateIndex - 1]){
            $arr[$nextNonDuplicateIndex] = $arr[$i];
            $nextNonDuplicateIndex += 1;
        }
        $i += 1;
    }
    return $nextNonDuplicateIndex;
}

echo 'Remove duplicates'. PHP_EOL;
echo removeDuplicates([2, 3, 3, 3, 6, 9, 9]) . PHP_EOL;
echo removeDuplicates([2, 2, 2, 11]) . PHP_EOL;

 
function removeElement($arr, $key)
{
    $nextElementIndex = 0;
    $i = 0;
    while($i < count($arr)){
        if($key != $arr[$i]){
            $arr[$nextElementIndex] = $arr[$i];
            $nextElementIndex += 1;
        }
        $i += 1;
    }
    return $nextElementIndex;
}

echo 'remove element'. PHP_EOL;
echo removeElement([2, 3, 3, 3, 6, 9, 9], 3) . PHP_EOL;
echo removeElement([2, 2, 2, 11], 2) . PHP_EOL;


function threeSumZero($arr) {
  if(count($arr) <=2) return [];
  sort($arr);
  $start = 0;
  $startNext = $start + 1;
  $end = count($arr) - 1;
  while($start < $end){
    $sum = $arr[$start] + $arr[$startNext] + $arr[$end];
    if($sum === 0){
      return [$arr[$start],  $arr[$startNext] , $arr[$end]];
    }
    else if($sum > 0){
        $start += 1;
        $startNext = $start + 1;
    }else{
        $end -= 1;
      }
  }
  return [];
}
 
echo 'Three Sum Zero'. PHP_EOL;
echo json_encode(threeSumZero([-2, 2, 6, -4])) . PHP_EOL;
echo json_encode(threeSumZero([0, 0, 0])) . PHP_EOL;
echo json_encode(threeSumZero([2, -2])) . PHP_EOL;
echo json_encode(threeSumZero([-3, 2, 3, 0, 0])) . PHP_EOL; 
echo json_encode(threeSumZero([2, -2])) . PHP_EOL;



function threeSumZero1($arr) {
  if(count($arr) <= 2) return [];
  sort($arr);
  for($i = 0; $i < count($arr); $i++){
    $start = $i + 1;
    $end = count($arr) - 1;
    while($start < $end){
      $sum = $arr[$i] + $arr[$start] + $arr[$end];
      if($sum === 0){
        return [$arr[$i],  $arr[$start] , $arr[$end]];
      }
      else if($sum > 0){
          $start += 1;
      }else{
          $end -= 1;
        }
    }
    return [];
  }
}
echo 'Three Sum Zero 1'. PHP_EOL;
echo json_encode(threeSumZero1([-2, 2, 6, -4])) . PHP_EOL;
echo json_encode(threeSumZero1([0, 0, 0])) . PHP_EOL;
echo json_encode(threeSumZero1([2, -2])) . PHP_EOL;
echo json_encode(threeSumZero1([-3, 2, 3, 0, 0])) . PHP_EOL;
echo json_encode(threeSumZero1([2, -2])) . PHP_EOL;