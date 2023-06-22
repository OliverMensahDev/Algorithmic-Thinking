<?php

function mergeArrays(array $list){
    $mergedArrays = [];
    sort($list);
    $listItemFirstValue = $list[0][0];
    $listItemSecondValue  = $list[0][1];

    for($index = 1; $index < count($list); $index++){
        $listItem = $list[$index];
        if($listItem[0] <= $listItemSecondValue){
            $listItemSecondValue = max($listItemSecondValue, $listItem[1]);
        }else{
            $mergedArrays[] = [$listItemFirstValue,  $listItemSecondValue];
            $listItemFirstValue = $listItem[0];
            $listItemSecondValue = $listItem[1];
        }
    }
    $mergedArrays[] = [$listItemFirstValue,  $listItemSecondValue];

    return $mergedArrays;
}
print_r( mergeArrays([[2,4], [1,2], [5, 10], [6,8]]));

function pair_with_target_sum(array $list, int $targetSum){
    $left = 0;
    $right = count($list) - 1;
    while($left <= $right){
        $currentSum = $list[$left] + $list[$right];
        if($currentSum == $targetSum) return [$left, $right];
        else if($currentSum > $targetSum) $right -= 1;
        else $left += 1;
    }
    return [-1, -1];
}

echo json_encode(pair_with_target_sum([1, 2, 3, 3, 4, 6], 6)) . PHP_EOL;
echo json_encode(pair_with_target_sum([2, 5, 9, 11], 11)) . PHP_EOL; 