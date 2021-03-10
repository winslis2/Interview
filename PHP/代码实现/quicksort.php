<?php 
function quickSort(array $arr) :array {
    $length = count($arr);
    if ($length < 2) {
        return $arr;
    }
    $mid = $arr[0];
    $left = $right = [];
    for ($i=1; $i < $length; $i++) {
        if ($mid < $arr[$i]) {
            $right[] = $arr[$i];
        }else{
            $left[] = $arr[$i];
        }
    }
    $left = quickSort($left);
    $right = quickSort($right);
    return array_merge($left,array($mid),$right);
}
$arr = [3,1,5,6,4,2];
print_r(quickSort($arr));