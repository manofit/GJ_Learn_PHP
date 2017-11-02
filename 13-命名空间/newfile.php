<?php

namespace myProject1;
//myProject1命名空间的php代码

namespace myProject2;
	use myProject4;
namespace myProject2;
//myProject2命名空间的php代码

namespace myProject3{
	//myProject3命名空间的php代码
	//把3，6行注释掉解决报错
}

/*
 * 在声明命名空间前唯一合法的代码是用于定义源文件编码方式的declare语句。
 * 所有非PHP代码包括空白符都不要出现在命名空间的声明之前
 */
declare(encoding = 'UTF-8');
namespace myProject4{
	const CONNECT_OK = 1;
	class Connection{/*...*/}
	function connect(){/*...*/}
}

namespace {//全局代码
	session_start();
	$a = myProject4\connect();
	echo myProject4\Connection::start();
}

//以下代码会出现错误
//命名空间前出现<html>会致命错误，命名空间必须是程序脚本的第一条语句
/*<html>
<?php>
namespace myProject5;
?>
*/

//与目录和文件的关系很像，php命名空间也允许指定层次化的命名空间的名称。
namespace myProject5\Sub\Level{

const CONNECT_OK = 1;
class Connection {/*...*/}
function Connect(){/*...*/}

}
/*
 * 创建了常量 MyProject\Sub\Level\CONNECT_OK，
 * 类 MyProject\Sub\Level\Connection ，
 * 函数 MyProject\Sub\Level\Connect
 */

/*
 * 命名空间的使用：命名空间中的类名可以通过三种方式引用
 * 1.非限定名称，或者不包含前缀的类名称；
 * 2.限定名称，或者包含前缀的名称；
 * 3.完全限定名称，或者包含了全局前缀操作符的名称
 */
//file1.php文件代码
namespace Foo\Bar\subnamespace;

const FOO = 1;
function foo(){}
class foo {
	static function staticmethod(){}
}

//file2.php文件代码
namespace Foo\Bar;
include 'file1.php';

const FOO = 2;
function foo(){}
class foo{
	static function staticmethod(){}
}

/*非限定名称*/
foo(); //解析为函数Foo\Bar\foo
foo::staticmethod(); //解析为类Foo\Bar\foo，以及类的方法staticmethod
echo FOO; //解析为常量Foo\Bar\FOO

/*限定名称*/
subnamespace\foo(); // 解析为函数Foo\Bar|subnamespace\foo
subnamespace\foo::staticmethod(); // 解析为类Foo\Bar\subnamespace\foo，以及类的方法staticmethod
echo subnamespace\FOO; //解析为常量Foo\Bar|subnamespace\FOO

/*完全限定名称*/
\Foo\Bar\foo(); //解析为函数Foo\Bar\foo
\Foo\Bar\foo::staticmethod();//解析为类Foo\Bar\foo，以及类的方法staticmethod
echo \Foo\Bar\FOO; //解析为常量Foo\Bar\foo

//namespace关键字和__NAMESPACE__常量
//PHP支持两种抽象的访问当前命名空间内部元素的方法，__NAMESPACE__魔术常量
//和namespace关键字
//常量__NAMESPACE__的值是包含当前命名空间名称的字符串。在全局中，是一个空
//字符串
/*
<?php
namespace myProject6;
echo __NAMESPACE__ // myProject6
?>
*/
/*
<?php 
echo '"'__NAMESPACE__'"' // ""
?>
*/

//常量__NAMESPACE__在动态创建名称是很有用
namespace myProject7;

function get($classname){
	$a = __NAMESPACE__ . '\\' . $classname;
	return new $a;
}

//关键字namespace用来显式访问当前命名空间或者子命名空间中的元素，等价于类中的self操作符。
<?php
namespace myProject6;

use blan\blah as mine;

blah\mine(); //call function blah\blah\mine()
namespace\blah\mine();//call function myPro\blah\mine()
namespace\func();//call function myPro\fun()
namespace\sub\func();//call function myPro\sub\func()
namespace\cname::method();//call static method "method" of class myPro\cname
$a1 = new namespace\sub\cname();//instantiates object of class myPro\sub\cname
$b = namespace\CONSTANT ;//assign value of constant myPro\CONTANT to $b
?>

<?php
namespace\func(); // calls function func()
namespace\sub\func(); // calls function sub\func()
namespace\cname::method(); // calls static method "method" of class cname
$a = new namespace\sub\cname(); // instantiates object of class sub\cname
$b = namespace\CONSTANT; // assigns value of constant CONSTANT to $b
?>

<?php 
//php命名空间支持两种使用别名或者导入方式：为类名称使用别名，或者为命名空间
//名称使用别名。注意：php不支持导入函数或者变量
//使用use操作符导入和使用别名
namespace foo;
use My\Full\Classname as Another;
use My\Full\NSName;
use ArrayObject;//导入一个全局类

$obj = new namespace\Another; //实例化foo\Another对象
$obj = new Another;//实例化My\Full\Classname对象
NSName\subns\func();//调用函数My\FUll\NSName\subns\func
$a = new \ArrayObject(array(1));//实例化ArrayObject对象
//如果不使用"use ArrayObject"，则实例化一个foo\ArrayObject对象
?>

<?php 

//一行中包含多个use语句
use My\Full\Classname as Another, My\Full\NSname;

$obj = new Another;//实例化My\Full\Classname对象
NSname\subns\func();//调用My\Full\NSname\subns\func

?>

<?php 

//导入和动态名称
use My\Full\Classname as Another, My\Full\NSname;

$obj = new Another;//实例化My\Full\Classname对象
$a = "Another";
$obj = new $a;//实例化Another对象

?>

<?php 

//导入操作只影响非限定名称和限定名称，完全限定名称由于是确定的，所以不受影响
use My\Full\Classname as Another, My\Full\NSname;

$obj = new Another;//实例化My\Full\Classname
$obj = new \Another; //实例化Another

$obj = new Another\thing;//实例化My\Full\Another\thing
$obj = new \Another\thing;//实例化Another\thing

?>

<?php 

//在一个命名空间中，当 PHP 遇到一个非限定的类、函数或常量名称时，它使用不同
//的优先策略来解析该名称
//类名称总是解析到当前命名空间中的名称，因此在访问系统内部或者不包含在命名
//空间中的类名称时，必须使用完全限定名称
namespace A\B\C;
class Exception extends \Exception{}

$a = new Exception("hi");//$a是类A\B\C\Exception的一个对象
$b = new \Exception('hi');//$b是类Exception的一个对象

$c = new ArrayObject();//致命错误，找不到A\B\C\Arrayobject类
?>

<?php 

//命名空间中后备的全局函数/常量
namespace A\B\C;

const E_ERROR = 45;
function strlen($str)
{
	return \strlen($str) - 1;
}
//对于函数或者常量来说，如果当前的命名空间中不存在该函数或者常量，php会退而
//使用全局空间中的函数或者常量
echo E_ERROR, "\n"; // 输出 "45"
echo INI_ALL, "\n"; // 输出 "7" - 使用全局常量 INI_ALL

echo strlen('hi'), "\n"; // 输出 "1"

if (is_array('hi')) { // 输出 "is not array"
	echo "is array\n";
} else {
	echo "is not array\n";
}

?>

<?php 

//如果没有定义任何命名空间，所有的类与函数的定义都是在全局空间，与PHP引入
//命名空间概念前一样。在名称前加上前缀\表明该名称是全局空间中的名称，即使
//该名称位于其他命名空间中时也是如此
namespace A\B\C;
//这个函数是A\B\C\fopen
function fopen(){
	$f = \fopen(...);//调用全局的fopen函数
	return $f;
}

?>

?>