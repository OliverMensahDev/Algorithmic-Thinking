<?php 

function findNumbers(array $nums)
{
    $count = 0; 

    foreach($nums as $num){
        $numDigits = 0 ;

        while( $num > 0 ){
            $num /= 10;
            $numDigits++;
        }
        if($numDigits % 2 == 0){
            $count++;
        }
    }
    return $count;
}

echo findNumbers([1, 20, 12, 1, 102, 1020]);
