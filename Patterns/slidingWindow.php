<?php
function longest_substring_with_k_distinct($str, $k) {
  $windowStart = 0;
  $maxLength = 0;
  $charFrequency = [];

  // in the following loop we'll try to extend the range [window_start, window_end]
  for ( $windowEnd = 0; $windowEnd < strlen($str); $windowEnd++) {
     $rightChar = $str[$windowEnd];
    if (!(isset($charFrequency[$rightChar]))) {
      $charFrequency[$rightChar] = 0;
    }
    $charFrequency[$rightChar] += 1;
    // shrink the sliding window, until we are left with 'k' distinct characters in the char_frequency
    while (count(array_keys($charFrequency)) > $k) {
      $leftChar = $str[$windowStart];
      $charFrequency[$leftChar] -= 1;
      if ($charFrequency[$leftChar] === 0) {
         unset($charFrequency[$leftChar]);
      }
      $windowStart += 1; // shrink the window
    }
    // remember the maximum length so far
    $maxLength = max($maxLength, $windowEnd - $windowStart + 1);
  }

  return $maxLength;
}


echo 'Length of the longest substring: ' . longest_substring_with_k_distinct('araaci', 2) ."\n";
echo 'Length of the longest substring: ' . longest_substring_with_k_distinct('araaci', 1) ."\n";
echo 'Length of the longest substring: ' . longest_substring_with_k_distinct('cbbebi', 3) ."\n";

function lengthOfLongestSubstringWithNoRepeatingCharacters($str) {
  $windowStart = 0;
  $maxLength = 0;
  $charFrequency = [];
  for ( $windowEnd = 0; $windowEnd < strlen($str); $windowEnd++) {
     $rightChar = $str[$windowEnd];
    if (!(isset($charFrequency[$rightChar]))) {
      $charFrequency[$rightChar] = 0;
    }
    $charFrequency[$rightChar] += 1;
    while ($charFrequency[$rightChar] > 1) {
      $leftChar = $str[$windowStart];
      $charFrequency[$leftChar] -= 1;
      $windowStart += 1; // shrink the window
    }
    // remember the maximum length so far
    $maxLength = max($maxLength, $windowEnd - $windowStart + 1);
  }

  return $maxLength;
}

echo 'Length of the longest substring with no repeating characters: ' . lengthOfLongestSubstringWithNoRepeatingCharacters('araaci') ."\n";
echo 'Length of the longest substring with no repeating characters:  ' . lengthOfLongestSubstringWithNoRepeatingCharacters('arcia') ."\n";
echo 'Length of the longest substring with no repeating characters: ' . lengthOfLongestSubstringWithNoRepeatingCharacters('cbbebi') ."\n";

function lengthOfLongestSubstringWithNoRepeatingCharacters1($str) {
  $windowStart = 0;
  $maxLength = 0;
  $charIndexMap = [];

  // try to extend the range [windowStart, windowEnd]
  for ($windowEnd = 0; $windowEnd < strlen($str); $windowEnd++) {
    $rightChar = $str[$windowEnd];
    // if the map already contains the 'rightChar', shrink the window from the beginning so that
    // we have only one occurrence of 'rightChar'
    if (isset($charIndexMap[$rightChar])) {
      // this is tricky; in the current window, we will not have any 'rightChar' after its previous index
      // and if 'windowStart' is already ahead of the last index of 'rightChar', we'll keep 'windowStart'
      $windowStart = max($windowStart, $charIndexMap[$rightChar] + 1);
    }
    // insert the 'rightChar' into the map
    $charIndexMap[$rightChar] = $windowEnd;
    // remember the maximum length so far
    $maxLength = max($maxLength, $windowEnd - $windowStart + 1);
  }
  return $maxLength;
}

echo 'Length of the longest substring with no repeating characters(second method): ' . lengthOfLongestSubstringWithNoRepeatingCharacters1('aabccbb') ."\n";
echo 'Length of the longest substring with no repeating characters(second method):  ' . lengthOfLongestSubstringWithNoRepeatingCharacters1('abbbb') ."\n";
echo 'Length of the longest substring with no repeating characters(second method): ' . lengthOfLongestSubstringWithNoRepeatingCharacters1('abccde') ."\n";


function fruits_into_baskets($fruits) {
    $windowStart = 0;
    $maxLength = 0;
    $fruitFrequency = [];
  
    // in the following loop we'll try to extend the range [window_start, window_end]
    for ( $windowEnd = 0; $windowEnd < count($fruits); $windowEnd++) {
       $rightFruit = $fruits[$windowEnd];
      if (!(isset($fruitFrequency[$rightFruit]))) {
        $fruitFrequency[$rightFruit] = 0;
      }
      $fruitFrequency[$rightFruit] += 1;
      // shrink the sliding window, until we are left with 'k' distinct characters in the char_frequency
      while (count(array_keys($fruitFrequency)) > 2) {
        $leftFruit = $fruits[$windowStart];
        $fruitFrequency[$leftFruit] -= 1;
        if ($fruitFrequency[$leftFruit] === 0) {
           unset($fruitFrequency[$leftFruit]);
        }
        $windowStart += 1; // shrink the window
      }
      // remember the maximum length so far
      $maxLength = max($maxLength, $windowEnd - $windowStart + 1);
    }
  
    return $maxLength;
  }
  
  
echo 'Maximum number of fruits: ' . fruits_into_baskets(['A', 'B', 'C', 'A', 'C']) ."\n";
echo 'Maximum number of fruits: ' . fruits_into_baskets(['A', 'B', 'C', 'B', 'B', 'C']) ."\n";


function smallestLenghtOfSubArrayWithGivenSum($s, $arr)
{
    $minLength = INF;
    $j = 0;
    $sum = 0;

    for($i = 0; $i < count($arr); $i++){
        $sum += $arr[$i];

        while($sum >= $s){
            $minLength = min($minLength, $i - $j + 1);
            $sum -= $arr[$j];
            $j += 1;
        }
    }
    if($minLength == INF){
        return 0;
    }
    return $minLength;
}
echo smallestLenghtOfSubArrayWithGivenSum(7, [2, 1, 5, 2, 3, 2]);
echo smallestLenghtOfSubArrayWithGivenSum(7, [2, 1, 5, 2, 8]);
echo smallestLenghtOfSubArrayWithGivenSum(8, [3, 4, 1, 1, 6]);
echo smallestLenghtOfSubArrayWithGivenSum(8, [1, 4, 1, 1, 0]);


$data = [2, 1, 5, 1, 3, 2];
$k=3;

function maxSumOfSubArrayOfGivenSizeBF()
{
    global $data;
    global $k;

    $max = 0;

    for($i = 0; $i < count($data) - $k + 1; $i++){
        $sum = 0;
        for($j = $i ; $j < $i + $k; $j++){
            $sum += $data[$j];
            $max = max($sum, $max);
        }
 
    }
    return $max;
} 
echo maxSumOfSubArrayOfGivenSizeBF();

function maxSumOfSubArrayOfGivenSize()
{
    global $data;
    global $k;

    $max = 0;
    $sum = 0;
    $start = 0;

    for($end = 0; $end < count($data); $end++){
        $sum += $data[$end];
        if($end >= $k -1){
            $max = max($sum, $max);
            $sum -= $data[$start];
            $start +=1;
        }
    }
    return $max;
}
echo maxSumOfSubArrayOfGivenSize();


$data = [1, 3, 2, 6, -1, 4, 1, 8, 2];
$subArrayLength = 5;

function findAverageOfSubArraysBF()
{
  global $data;
  global $subArrayLength;

  $result = [];

  for($i = 0; $i < count($data) - $subArrayLength + 1; $i++){
   $sum  = 0;
   for($j = $i; $j < $i + $subArrayLength; $j++){
     $sum += $data[$j];
   }
   $result[] = $sum / $subArrayLength;
  }

  return $result;
}

$result = findAverageOfSubArraysBF();
echo "The sub array is " . json_encode($result);

function findAverageOfSubArrays()
{
  global $data;
  global $subArrayLength;

  $result = [];
  $sum  = 0;
  $start = 0;
  for($end = 0; $end < count($data); $end++){
    $sum += $data[$end];
    if($end >= $subArrayLength - 1){
      $result[] = $sum / $subArrayLength;
      $sum -= $data[$start];
      $start +=1;
    }
  }

  return $result;
}

$result = findAverageOfSubArrays();
echo "The sub array is " . json_encode($result);