<?php 
function findMaxConsecutiveOnes(array $nums)
{
    $maxCount = 0;
    $onesCounter = 0;
    for($i = 0; $i < count($nums); $i++){
        if($nums[$i] == 1) {
            $onesCounter++;
        }
        if($onesCounter > $maxCount) $maxCount = $onesCounter;
        if($nums[$i] ==  0){
            $onesCounter = 0;
        }
    }

    return $maxCount;
}
echo findMaxConsecutiveOnes([1,1,0,1,1,1]) ."\n";

function improvedFunction($nums)
{
    $maxCount = 0;
    $onesCounter = 0;
    for($i = 0; $i < count($nums); $i++){
        if($nums[$i] == 1) {
            $onesCounter++;
            continue;
        }
        $maxCount = max($maxCount, $onesCounter);
        $onesCounter = 0;
    }

    return max($maxCount, $onesCounter);
}
echo improvedFunction([1,1,0,1,1,1]) ."\n";