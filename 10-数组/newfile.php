<?php

//获取数组的元素数量
$cars = array("volvo","bmw","toyota");//数值数组
echo count($cars);//3
//遍历数组
for ($x = 0; $x < count($cars); $x++) {
	echo $cars[$x];
	echo "<br>";
}

//关联数组
$age = array("peter"=>"35","ben"=>"37","joe"=>"43");
//遍历关联数组
foreach ($age as $x=>$x_value){
	echo "key=".$x.",value=".$x_value;
	echo "<br>";
}

//把数组分割成新的数组块
$cars2 = array("Volvo","BMW","Toyota","Honda","Mercedes","Opel");
print_r(array_chunk($cars2, 2));
/*
 * Array
(
    [0] => Array
        (
            [0] => Volvo
            [1] => BMW
        )

    [1] => Array
        (
            [0] => Toyota
            [1] => Honda
        )

    [2] => Array
        (
            [0] => Mercedes
            [1] => Opel
        )

)
 */

//取出数组中某一列的数据
$a = array(
		array(
				'id'=>5698,
				'first_name'=>'peter',
				'last_name'=>'griffin',
		),
		array(
				'id'=>4767,
				'first_name'=>'ben',
				'last_name'=>'smith',
		),
		array(
				'id'=>3809,
				'first_name'=>'joe',
				'last_name'=>'doe',
		)
);
//从数组中取出last_name列，用相应的id作为键值。
$last_names = array_column($a, 'last_name','id');
print_r($last_names);
/*
 * Array
(
  [5698] => Griffin
  [4767] => Smith
  [3809] => Doe
)
 */

//通过合并一个键名数组和一个键值数组来创建一个新的数组
$fname = array("peter","ben","joe");
$age = array("35","37","43");
print_r(array_combine($fname, $age));
/*
 * Array ( [Peter] => 35 [Ben] => 37 [Joe] => 43 ) 
 */

//统计数组中所有值出现的次数
$a2 = array("A","Dog","Cat","A","Dog");
print_r(array_count_values($a2));
//Array ( [A] => 2 [Cat] => 1 [Dog] => 2 ) 

//用给定的键值填充数组
$a3 = array_fill(3, 4, "blue");
print_r($a3);
//Array ( [3] => blue [4] => blue [5] => blue [6] => blue ) 

//用给定的键名填充数组
$keys = array("a","b","c","d");
print_r(array_fill_keys($keys, "blue"));
//Array ( [a] => blue [b] => blue [c] => blue [d] => blue ) 

//用回调函数过滤数组中的元素
function test_odd($var){
	return ($var & 1);
}
$a4 = array("a","b",2,3,4);
print_r(array_filter($a4,"test_odd"));
//Array ( [3] => 3 ) 

//反转数组中的键名与对应的键值
$a5 = array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
print_r(array_flip($a5));
//Array ( [red] => a [green] => b [blue] => c [yellow] => d ) 

//查看指定的键名是否存在于数组中
$a6 = array("volvo"=>"xc90","bmw"=>"x5");
if (array_key_exists("volvo", $a6)){
	echo "key exists";
}else {
	echo "key does not exists";
}
//指定数组的时候省略了键名，将会生成从 0 开始并以 1 递增的整数键名
$a7 = array("Volvo","BMW");
if (array_key_exists(0,$a7)){
	echo "Key exists!";
}else {
	echo "Key does not exist!";
}

//返回数组中所有的键名
$a8 = array("volvo"=>"XC90","BMW"=>"X5","toyota"=>"Highlander");
print_r(array_keys($a8));//Array ( [0] => Volvo [1] => BMW [2] => Toyota ) 
print_r(array_keys($a8,"Highlander"));//Array ( [0] => Toyota ) 
//true - 返回带有指定键值的键名。依赖类型，数字 5 与字符串 "5" 是不同的。
$a9 = array(10,20,30,"10");
print_r(array_keys($a9,"10",true));//Array ( [0] => 3 ) 
print_r(array_keys($a9,"10",false));//Array ( [0] => 0 [1] => 3 ) 

//将用户自定义的函数作用到数组中的每个值上，并返回用户自定义的函数作用后带有
//的新的值得数组
function myTest($v){
	if ($v === "Dog"){
		return "Fido";
	}
	return $v;
}
$a10 = array("Horse","Dog","Cat");
print_r(array_map("myTest", $a10));//Array ( [0] => Horse [1] => Fido [2] => Cat ) 

function myTest2($v1,$v2){
	if ($v1 === $v2){
		return "same";
	}
	return "different";
}
$a11 = array("Horse","Dog","Cat");
$a12 = array("Cow","Dog","Rat");
print_r(array_map("myTest2", $a11,$a12));// Array ( [0] => different [1] => same [2] => different ) 

$a13 = array("Dog","Cat");
$a14 = array("Puppy","Kitten");
print_r(array_map(null, $a13,$a14));
//Array ( [0] => Array ( [0] => Dog [1] => Puppy ) 
//[1] => Array ( [0] => Cat [1] => Kitten ) ) 

//合并数组
$a15 = array("a"=>"red","b"=>"green");
$a16 = array("c"=>"blue","b"=>"yellow");
print_r(array_merge($a15,$a16));
/*
 * Array
(
    [a] => red
    [b] => yellow
    [c] => blue
)
 */
//如果仅仅向 array_merge() 函数输入一个数组，且键名是整数，则该函数将返回
//带有整数键名的新数组，其键名以 0 开始进行重新索引.
$a17 = array(3=>"red",4=>"green");
print_r(array_merge($a17));
//Array ( [0] => red [1] => green ) 

//递归的合并数组
$a18 = array("a"=>"red","b"=>"green");
$a19 = array("c"=>"blue","b"=>"yellow");
print_r(array_merge_recursive($a18,$a19));
//Array ( [a] => red [b] => Array ( [0] => green [1] => yellow ) [c] => blue ) 

//排序数组
$a20 = array("Dog","Cat","Horse","Bear","Zebra");
$a21= array("Fido","Missy");
array_multisort($a20);
array_multisort($a21);
print_r($a20);
print_r($a21);
//Array ( [0] => Bear [1] => Cat [2] => Dog [3] => Horse [4] => Zebra )
// Array ( [0] => Missy [1] => Fido ) 

$a22=array(1,30,15,7,25);
$a23=array(4,30,20,41,66);
$num=array_merge($a22,$a23);
array_multisort($num,SORT_DESC,SORT_NUMERIC);
print_r($num);
/*
 * Array ( [0] => 66 [1] => 41 [2] => 30 [3] => 30 [4] => 25
 *  [5] => 20 [6] => 15 [7] => 7 [8] => 4 [9] => 1 ) 
 */

//插入指定数量的指定元素到数组
$a24 = array("red","green");
print_r(array_pad($a24, 5, "blue"));
print_r(array_pad($a24, -5, "blue"));
//Array ( [0] => red [1] => green [2] => blue [3] => blue [4] => blue ) 
//Array ( [0] => blue [1] => blue [2] => blue [3] => red [4] => green ) 

//删除数组中最后一个元素
$a25 = array("red","green","blue");
array_pop($a25);
print_r($a25);
//Array([0]=>"red" [1]=>"green")

//计算数组中所有值得乘积
$a26 = array(5,5);
echo array_product($a26);//25

//将一个或者多个元素插入数组的末尾
$a27 = array("red","green");
array_push($a27, "blue","yellow");
print_r($a27);//Array ( [0] => red [1] => green [2] => blue [3] => yellow ) 

//返回数组中的一个随机键名
$a28 = array("red","green","blue","yellow","brown");
$random_keys = array_rand($a28);
echo $a28[$random_keys[0]]."<br>";
echo $a28[$random_keys[1]]."<br>";
echo $a28[$random_keys[2]];

function myTest3($v1,$v2){
	return $v1 . "-" . $v2;
}
$a29 = array("Dog","Cat","Horse");
print_r(array_reduce($a29, "mtTest3"));
//-Dog-Cat-Horse 
print_r(array_reduce($a29, "mtTest3",5));
//5-Dog-Cat-Horse 
function myTest4($v1,$v2){
	return $v1+$v2;
}
$a30 = array(10,15,20);
print_r(array_reduce($a30, "myTest4",5));//50

//用后一个数组替换前一个数组
$a31 = array("a"=>"red","b"=>"green");
$a32 = array("a"=>"orange","burgundy");
print_r(array_replace($a31, $a32));//Array ( [a] => orange [b] => green [0] => burgundy ) 
$a33 = array("a"=>"red","green");
$a34 = array("a"=>"orange","b"=>"burgundy");
print_r(array_replace($a33, $a34));//Array ( [a] => orange [0] => green [b] => burgundy ) 
$a35=array("red","green");
$a36=array("blue","yellow");
$a37=array("orange","burgundy");
print_r(array_replace($a35,$a36,$a37));//Array ( [0] => orange [1] => burgundy ) 
$a38=array("red","green","blue","yellow");
$a39=array(0=>"orange",3=>"burgundy");
print_r(array_replace($a38,$a39));//Array ( [0] => orange [1] => green [2] => blue [3] => burgundy ) 

$a40 = array("a"=>array("red"),"b"=>array("green","blue"));
$a41 = array("a"=>array("yellow"),"b"=>array("black"));
$result = array_replace_recursive($a40, $a41);
print_r($result);//Array ( [a] => Array ( [0] => yellow ) [b] => Array ( [0] => black [1] => blue ) ) 
$result2 = array_replace($a40, $a41);
print_r($result2);//Array ( [a] => Array ( [0] => yellow ) [b] => Array ( [0] => black ) ) 

//数组元素反转，并返回新的数组
$a42 = array("Volvo","XC90",array("BMW","Toyota"));
$reverse = array_reverse($a42);
$prereverse = array_reverse($a42,true);
print_r($a42);//Array ( [0] => Volvo [1] => XC90 [2] => Array ( [0] => BMW [1] => Toyota ) ) 
print_r($reverse);//Array ( [0] => Array ( [0] => BMW [1] => Toyota ) [1] => XC90 [2] => Volvo ) 
print_r($prereverse);//Array ( [2] => Array ( [0] => BMW [1] => Toyota ) [1] => XC90 [0] => Volvo ) 

//数组中搜索键值，返回某个键名
$a43 = array("a"=>"red","b"=>"green","c"=>"blue");
echo array_search("red", $a43);//@author gaojun
$a44=array("a"=>"5","b"=>5,"c"=>"5");
echo array_search(5,$a44,true);//b

//删除数组中第一个元素，并返回被删元素的值
echo array_shift($a43);//red
print_r($a43);//Array ( [b] => green [c] => blue ) 

//从数组中取出指定数目的元素
$a45 = array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
print_r(array_slice($a45, 1,2));
//Array ( [b] => green [c] => blue ) 

//从数组中移除元素，并用新元素替代
$a46 = array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
$a47 = array("a"=>"purple","b"=>"orange");
array_splice($a46, 0,2,$a47);
print_r($a46);// Array ( [0] => purple [1] => orange [c] => blue [d] => yellow ) 

//返回数组中元素的和
$a48 = array(5,15,25);
echo array_sum($a48);//45

//删除数组中重复的值
$a49 = array("a"=>"red","b"=>"green","c"=>"red");
print_r(array_unique($a49));//Array ( [a] => red [b] => green ) 

//在数组开头插入新元素
$a50 = array("a"=>"red","b"=>"green");
array_unshift($a50, "blue");
print_r($a50);//Array ( [0] => blue [a] => red [b] => green ) 
print_r(array_unshift($a50, "blue"));//3

//返回数组中的所有值
$a51 = array("Name"=>"Peter","Age"=>"41","Country"=>"USA");
print_r(array_values($a51));
//Array ( [0] => Peter [1] => 41 [2] => USA ) 

//对数组中的每一个元素应用用户自定义函数
function myTest5($key,$value){
	echo "The $key has value $value";
}
$a52 = array("a"=>"red","b"=>"green","c"=>"orange");
array_walk($a52, "myTest5");
/*
 * The key a has the value red
The key b has the value green
The key c has the value blue
 */
function myTest6($key,$value,$p){
	echo "$key $p $value";
}
array_walk($a52, "myTest5","has value");
/*
 * a has the value red
b has the value green
c has the value blue
 */
function myTest7(&$value,$key){
	$value = "yellow";
}
array_walk($a52, "myTest7");
print_r($a52);
/*
 * Array ( [a] => yellow [b] => yellow [c] => yellow ) 
 */

//对每个元素递归使用自定义函数
function myTest8($value,$key){
	echo "The key $key has value $value";
}
$a53 = array("a"=>"red","b"=>"green");
$a54 = array($a53,"1"=>"blue","2"=>"yellow");
array_walk_recursive($a54, "myTest8");
/*
 * The key a has the value red
The key b has the value green
The key 1 has the value blue
The key 2 has the value yellow
 */

//对数组按键值进行降序排列
$age2 = array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
arsort($age2);
foreach ($age2 as $x=>$x_value){
	echo "Key " . $x . "has value" . $x_value;
	echo "<br>";
}
/*
 * Key=Joe, Value=43
Key=Ben, Value=37
Key=Peter, Value=35
 */

//对数组按键值进行升序排列:asort()

//创建一个包含变量名和值的数组
$firtName2 = "Peter";
$lastName2 = "Griff";
$age3 = "34";

$result3 = compact("firstName2","lastName2","age3");
print_r($result3);//Array ( [firstname] => Peter [lastname] => Griffin [age] => 41 ) 

$name = array("firstName2","lastName2");
$result4 = compact($name,"location","age3");
print_r($result4);//Array ( [firstname] => Peter [lastname] => Griffin [age] => 41 ) 
//任何没有变量名与之对应的字符串都被略过。

//返回数组中元素的数目
$car3 = array("volvo","BMW","toyota");
echo count($car3);//3
//递归计算数组中元素个数
$car4 = array("volvo"=>array("xc60","xc90"),"BMW"=>array("x3","x5"),"toyota"=>array("highlander"));
echo count($car4)."<br>";//3
echo count($car4,1);//8


$people = array("Peter", "Joe", "Glenn", "Cleveland");
echo current($people) . "<br>"; // Peter
echo next($people) . "<br>"; // Joe
echo current($people) . "<br>"; // Joe
echo prev($people) . "<br>"; // Peter
echo end($people) . "<br>"; // Cleveland
echo prev($people) . "<br>"; // Glenn
echo current($people) . "<br>"; //  Glenn
echo reset($people) . "<br>"; //  Peter
echo next($people) . "<br>" . "<br>"; // Joe
print_r (each($people)); //Array ( [1] => Joe [value] => Joe [0] => 1 [key] => 1 ) 

reset($people);
while (list($key,$val) = each($people)) {
	echo "$key => $val";
}
/*
 * 0 => Peter
1 => Joe
2 => Glenn
3 => Cleveland
 */

//将数组中的变量导入当前符号表
$a55 = "Original";
$my_array = array("a"=>"Cat","b"=>"Dog","c"=>"Horse");
extract($my_array);
echo "\$a = $a; \$b = $b; \$c = $c";
//$a = Cat; $b = Dog; $c = Horse 

//检查数组中是否存在某个值
$people2 = array("Peter","Joe","Glenn","Cleveland",23);
if (in_array("23", $people2,TRUE)){
	echo "Match found";
}else {
	echo "Match not found";
}
if (in_array("Glenn", $people2,TRUE)){
	echo "Match found";
}else {
	echo "Match not found";
}
if (in_array(23, $my_array,TRUE)){
	echo "Match found";
}else {
	echo "Match not found";
}

//从当前内部指针位置返回元素键名
$people3 = array("Peter","Joe","Glenn","Cleveland");
echo "The key from the current position is " . key($people3);

//对数组按照键名降序排列
$age4 = array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
krsort($age4);

foreach ($age4 as $x=>$x_value){
	echo $x . "has value" . $x_value;
	echo "<br>";
}
/*
 * Key=Peter, Value=35
Key=Joe, Value=43
Key=Ben, Value=37
 */
//ksort()按照升序排列

//把数组中的值赋值给一些变量
$my_array2 = array("Dog","Cat","Horse");
list($a,$b,$c) = $my_array2;
echo "I have several animals , a $a , b $b, c $c";
//I have several animals, a Dog, a Cat and a Horse. 
list($a, , $c) = $my_array2;
echo "Here I only use the $a and $c variables.";

//count 别名 sizeof()

//创建指定范围和间隔的数组
$number = range(0, 50, 10);
print_r($number);
//Array ( [0] => 0 [1] => 10 [2] => 20 [3] => 30 [4] => 40 [5] => 50 ) 
$letter = range("a", "d");
print_r($letter);//Array ( [0] => a [1] => b [2] => c [3] => d ) 

/*
 * arsort()对关联数组按照键值进行降序排列
 * asort()对关联数组按照键值进行升序排列
 * 
 * krsort()对关联数组按照键名进行降序排列
 * ksort()对关联数组按照键名进行升序排列
 * 
 * rsort()对数值数组进行降序排列
 * sort()对数值数组进行升序排列
 * 
 * uasort()用用户自定义函数对数组的键值进行排序
 * uksort()用用户自定义函数对数组的键名进行排序
 * usort()用用户自定义的比较函数对数组进行排序
 */













?>