<?php

/*
 * 您在计算机上操作某个应用程序时，您打开它，做些更改，然后关闭它。这很像一
 * 次对话（Session）。计算机知道您是谁。它清楚您在何时打开和关闭应用程序。
 * 然而，在因特网上问题出现了：由于 HTTP 地址无法保持状态，Web 服务器并
 * 不知道您是谁以及您做了什么。PHP session 解决了这个问题，它通过在服务
 * 器上存储用户信息以便随后使用（比如用户名称、购买商品等）。然而，会话信
 * 息是临时的，在用户离开网站后将被删除。如果您需要永久存储信息，可以把数
 * 据存储在数据库中。
 */

/*
 * session的工作机制：为每个访客创建一个唯一的id(UID)，并基于这个
 * UID来存储变量。UID存储在cookie中，或者通过url进行传导
 */

//开始php session
//在把用户信息存储到session之前，首先必须启动会话。session_start()
//函数必须位于<html>标签之前
session_start();//向服务器注册用户的会话，以便可以开始保存用户的信息，同时会为用户会话分配一个UID

//存储session变量
$_SESSION["views"] = 1;

if (isset($_SESSION["views"])){
	$_SESSION["views"] = $_SESSION["views"] + 1;
}else {
	$_SESSION["views"] = 1;
}

//输出session变量
echo "浏览量:" . $_SESSION["views"];

//删除session变量
//unset()函数用于释放指定的session变量
if (isset($_SESSION["views"])){
	unset($_SESSION["views"]);
}
//seeion_destroy()函数彻底销毁session，将重置session，我们将失去已存储的session的数据
session_destroy();




?>