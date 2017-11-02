<?php

//cookie常用于识别用户，cookie是一种服务器留在用户计算机上的小文件，
//每当同一台计算机通过浏览器请求页面时，这台极端及将会发送cookie。

//setcookie()函数用于设置cookie，函数必须位于<html>标签之前
//创建名为user的cookie，赋值runoob，规定一小时后过期。
//注意：在发送cookie时，cookie的值会自动进行url编码，在取回是进行自动解码
//为防止url编码，使用setrawcookie()取而代之
setcookie("user","runoob",time()+3600);

$expire = time()+60*60*24*30;
setcookie("user","runoob",$expire);

//$_COOKIE变量用于取回cookie的值
//输出cookie的值
echo $_COOKIE["user"];
//查看所有cookie
print_r($_COOKIE);

//使用isset()函数查看是否已经设置了cookie
if (isset($_COOKIE["user"])){
	echo "欢迎" . $_COOKIE["user"] . "<br>";
}else {
	echo "普通访客<br>";
}

//删除cookie，就是使过期时间变成过去的时间点
setcookie("user","runoob",time()-3600);


?>