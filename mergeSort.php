<?php
function mergeSort($array) {
    if (count($array) <= 1) {
        return $array;
    }
    $mid = floor(count($array) / 2);
    $left = mergeSort(array_slice($array, 0, $mid));
    $right = mergeSort(array_slice($array, $mid));
}


?>