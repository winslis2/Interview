<?php 
$redis = new \Redis();
$redis->connect('127.0.0.1', 6379);
$rs = $redis->set('testnx', 123, ['nx', 'ex' => 10]);//nx 只有在键不存在的时候才会设置成功，也就是说在10秒之内设置会
// var_dump($rs);//返回true代表加锁成功，返回false代表加锁失败
var_dump($rs);
