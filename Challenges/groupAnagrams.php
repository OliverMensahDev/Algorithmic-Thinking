<?php 
function groupAnagrams(array $strs){
    $map = [];
    for($i = 0; $i < count($strs); $i++){
        $stringParts = str_split($strs[$i]);
        sort($stringParts);
        $key = implode($stringParts);
        if(!isset($map[$key])){
            $map[$key] = [];
        }
        $map[$key][] = $strs[$i];
    }
    $result = [];
    foreach($map as $key => $anagrams){
        $result[] = $anagrams;
    }
    return $result;
}

echo json_encode(groupAnagrams(["eat","tea","tan","ate","nat","bat"]));