<?php
function isPalindrome($word){

    $characterList=[];
    for($i=0;$i<strlen($word);$i++){
        $characterList[]=$word[$i];
    }

    $reversedList=[];
    for ($i = count($characterList) - 1; $i >= 0; $i--) {
        $reversedList[] = $characterList[$i];
    }

    if ($characterList === $reversedList) {
        return true;
    } else {
        return false;
    }
} 


?>