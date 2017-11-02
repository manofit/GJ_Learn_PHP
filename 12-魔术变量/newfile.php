<?php

//__LINE__ 文件中当前的行号
echo "这是第" . __LINE__ . "行";//这是第4行

//__FILE__ 文件的完整路径和文件名，如果用在被包含文件中，则返回被包含的文件名
echo "该文件位于" . __FILE__ ;//该文件位于E:\wamp\www\test\index.php

//__DIR__ 文件所在的目录，除非是根目录，否则末尾不包括斜杠
echo "该文件位于" . __DIR__ ;//该文件位于E:\wamp\www\test

//__FUNCTION__ 函数名称
function test(){
	echo "函数名为" . __FUNCTION__ ;//函数名为test
}

//__CLASS__ 类的名称
//当用在trait方法中时，__CLASS__调用trait方法的类的名字
class test {
	function _print(){
		echo "类名为" . __CLASS__ ;
		echo "函数名为" . __FUNCTION__ ;
	}
}
$t = new test();
$t -> _print();
/*
 * 类名为：test
函数名为：_print
 */

//__NAMESPACE__ 当前命名空间的名称
/*
namespace MyProject;
echo "命名空间" . __NAMESPACE__ ;//命名空间MyProject
*/

//_METHOD__ 类的方法名
function test2(){
	echo "函数名" . __METHOD__ ;//函数名test2
}
test2();



?>