<?php

/*
 * include和require除了错误的执行方式不同之外，在其他方面都是相同的：
 * 1.require生成一个致命错误，在错误发生后脚本会停止运行
 * 2.include生成一个警告，在错误发生后脚本会继续运行
 */

include 'filename';

require 'filename';

//假设现在有一个标准的也偷文件，名为"header.php"，如需要在页面中引用这个页头文件：
/*
<html>
<head>
<meta charset="utf-8">
<title>菜鸟教程(runoob.com)</title>
</head>
<body>

<?php include 'header.php'; ?>
<h1>欢迎来到我的主页!</h1>
<p>一些文本。</p>

</body>
</html>
*/

//假设又一个在所有页面中使用的标准菜单文件"menu.php":
/*
echo '<a href="/">主页</a>'
<a href="/html">html教程</a>
<a href="/php">php教程</a>;
*/
//网站中所有的页面均应应用该菜单文件
/*
 <html>
<head>
<meta charset="utf-8">
<title>菜鸟教程(runoob.com)</title>
</head>
<body>

<div class="leftmenu">
<?php include 'menu.php'; ?>
</div>
<h1>欢迎来到我的主页!</h1>
<p>一些文本。</p>

</body>
</html>
 */

//假设有一个定义变量的包含文件"vars.php"
/*
<?php 
$color = "red";
$cars = "BMW";
?>
*/
//这些变量可用在调用文件中
/*
<html>
<head>
<meta charset="utf-8">
<title>菜鸟教程(runoob.com)</title>
</head>
<body>

<h1>欢迎来到我的主页!</h1>
<?php 
include 'vars.php';
echo "I have a $color $car"; // I have a red BMW
?>

</body>
</html>
*/



?>