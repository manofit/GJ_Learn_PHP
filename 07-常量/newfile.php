<?php

//常量值被定义后，在脚本的其他任何地方都不能被改变。
//常量在整个脚本中都可以被使用。

//设置常量值
//区分大小写的常量名
define("GREETING","欢迎访问百度");
echo GREETING;//输出"欢迎访问百度"
echo "<br>";
echo greeting;//输出"greeting"

//不区分大小写常量名
define("GREETING2","欢迎访问阿里",true);
echo greeting2;//输出"欢迎访问阿里"

function myTest(){
	echo GREETING;
}
myTest();
?>