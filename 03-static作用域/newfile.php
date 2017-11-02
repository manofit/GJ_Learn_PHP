<?php

function myTest()
{
	static $x = 0;
	echo $x;
	$x++;
}

myTest();//0
myTest();//1
myTest();//2

//输出结果为012
?>