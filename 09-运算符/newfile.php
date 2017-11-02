<?php

//整除运算符
var_dump(intdiv(10, 3));//int(3)

//三元运算符
$test = "菜鸟";
//普通写法
$username = isset($test) ? $test : 'nobody';
echo $username,PHP_EOL;
//PHP 5.3+写法
$username2 = $test ?: 'nobody';
echo $username2,PHP_EOL;

//NULL合并运算符
$username3 = isset($_GET['user']) ? $_GET['user'] : 'nobody';
//等同于：
$username4 = $_GET['user'] ?? 'nobody';

//组合运算符(太空船运算符)
$c = $a <=> $b
//如果$a>$b,$c=1;
//如果$a<$b,$c=-1;
//如果$a=$b,$c=0;
?>