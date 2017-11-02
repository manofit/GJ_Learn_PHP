<?php
$x=5;//全局变量

function myTest(){
	$y=10;//局部变量
	echo "<p>测试函数内变量:<p>";
	echo "变量x为:$x";//除函数外，全局变量可以被脚本中的任何地方引用
	echo "<br>";
	echo "变量y为:$y";
}

myTest();

echo "<p>测试函数外变量<p>";
echo "变量x为:$x";
echo "<br>";
echo "变量y为:$y";
?>