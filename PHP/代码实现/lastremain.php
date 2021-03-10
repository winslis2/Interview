<?php 
function lastRemain($n, $m) {
    $res= 0;
    for($i=2;$i<=$n;$i++) {
        $res = ($res+$m)%$i;
    }
    return $res;
}
echo lastRemain(10,17);