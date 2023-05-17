<?php 

function threeSumZero($arr){
    $result = [];
        if(count($arr) <=2) return $result;
        sort($arr);
        for($i = 0; $i < count($arr) && $arr[$i] <= 0; $i++){
           if ($i == 0 || $arr[$i - 1] != $arr[$i]) { 
                $start = $i + 1;
                $end = count($arr) - 1;
                while($start < $end){
                  $sum = $arr[$i] + $arr[$start] + $arr[$end];
                  if($sum < 0){
                    ++$start;
                  }
                  else if($sum > 0){
                       --$end;
                  }else{
                      $result[] = [$arr[$i],  $arr[$start++] , $arr[$end--]];
                      while ($start < $end && $arr[$start] == $arr[$start - 1])
                        ++$start;
                    }
                }
             }
          }
        return $result;
}


 
 
echo json_encode(threeSumZero([-2, 2, 6, -4])) . PHP_EOL;
echo json_encode(threeSumZero([0, 0, 0])) . PHP_EOL;
echo json_encode(threeSumZero([2, -2])) . PHP_EOL;
echo json_encode(threeSumZero([-3, 2, 3, 0, 0])) . PHP_EOL; 
echo json_encode(threeSumZero([2, -2])) . PHP_EOL;
echo json_encode(threeSumZero([-1,0,1,2,-1,-4])) . PHP_EOL;
echo json_encode(threeSumZero([0,0,0, 0])) . PHP_EOL;

