<?php 


// giving a string find the word with largest even length

function maxEvenLengthOfWordInSentence(string $str){
    $maxLength = 0;  
    $charLength = strlen($str);
    $charIndex = 0;
    $startWord = 0;
    $endWord = 0;
    
    while($charIndex < $charLength){
      $endWord++;
      if($str[$charIndex] == ' '){
        if(($endWord -1 - $startWord)  % 2 == 0){
          $maxLength = max($maxLength,  + $endWord -1 - $startWord);
        }
        $startWord = $endWord;
      }
      $charIndex++;
    }
    
    if(($endWord - $startWord)  % 2 == 0){
        $maxLength = max($maxLength,  + $endWord  - $startWord);
    }
    
    return $maxLength;
  }
         
  
  echo maxEvenLengthOfWordInSentence("Caning is not meant to train children"). PHP_EOL;
  echo maxEvenLengthOfWordInSentence("The girl ate all the vegetables in the fridge"). PHP_EOL;
