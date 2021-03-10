<?php 
//时间复杂度过大
function fib($n) {
    if ($n==0 || $n==1) {
        return $n;
    }
    return fib($n-1) + fib($n-2);
}


function fib1($n) {
    $f0 = 0;
    $f1 = 1;
    $f2 = 0;
    if ($n == 0 || $n == 1) {
        return $n;
    }
    for ($i = 2; $i <= $n; $i++) {
        $f2 = $f0 + $f1;
        $f0 = $f1;
        $f1 = $f2;
    }
    return $f2;
}
echo fib1(10);
