<?php

//String(字符串)可以放在双引号或者单引号中
$x = "Hello World";
$y = 'Hello CLF';

//Integer(整型)
//var_dump函数返回变量的数据类型和值
$a = 5678;
var_dump($a);//int(5678)
echo "<br>";
$b = -345;
var_dump($b);//int(-345)
echo "<br>";
$c = 0x8c;
var_dump($c);//int(140)
echo "<br>";
$d = 047;
var_dump($d);//int(39)


//Float(浮点型)
$f1 = 10.234;
var_dump($f1);//float(10.234)
echo "<br>";
$f2 = 2.4e3;
var_dump($f2);//float(2400)
echo "<br>";
$f3 = 8e-5;
var_dump($f3);//float(8.0e-5)

//Boolean(布尔型)
$t = true;
$fal = false;

//Object(对象)
//使用class关键字声明对象,类是可以包含属性和方法的结构。
class Car{
	var $color;
	function Car($color = "green"){
		$this->color = $color;
	}
	function what_color(){
		return $this->color;//this就是指向当前对象实例的指针
	}
}

function print_vars($obj){
	foreach (get_object_vars($obj) as $prop => $val) {
		echo "\t$prop = $val\n";
	}
}

//初始化实例
$herbie = new Car("white");
echo "\herbie:Properties\n";
print_vars($herbie);//\herbie: Properties color = white

//NULL值
//NULL值表示没有值，NULL是数据类型为NULL的值。
//可以通过设置变量值为NULL来清空变量数据。
$txt3 = "你好";
$txt3 = null;
echo $txt3;//NULL

?>