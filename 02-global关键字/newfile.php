<?php

$x=5;
$y=10;

function myTest(){
	global $x,$y;//在函数内调用函数外定义的全局变量，我们需要在函数中的变量前加上global关键字
	$y = $x + $y;
	
	$GLOBALS['y'] = $GLOBALS['x'] + $GLOBALS['y'];
	//PHP将所有的全局变量存储在一个名为$GLOBALS[index]的数组中。
	//index保存变量的名称，这个数组可以在函数内部访问，也可以直接用来更新全局变量。
}

myTest();

echo $y;//输出15

?>