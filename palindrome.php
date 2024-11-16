git push --set-upstream origin devBranch<?php
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = $_POST['string'] ?? '';
    echo json_encode(['isPalindrome' => isPalindrome($input)]);
}
?>