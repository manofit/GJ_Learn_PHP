<?php

$txt1 = "hello world";
$txt2 = "hello everyone";
echo $txt1 . " " . $txt2;

echo strlen($txt1);//返回字符串长度(字符数)，12

echo strpos($txt1, "world");//用于在一串字符串中查找一个字符或者指定的字符串
//如果找到了，返回指定字符串第一个字符出现的位置。

$str = addcslashes("hello world", "w");//在指定字符前加反斜杠
echo $str;//hello \world
$str2 = "Welcome to my humble Homepage!";
echo $str2."<br>";
echo addcslashes($str2, "A..Z")."<br>";//\Welcome to my humble \Homepage!
echo addcslashes($str2, "a..z")."<br>";//在指定字符范围内加上反斜杠,W\e\l\c\o\m\e \t\o \m\y \h\u\m\b\l\e H\o\m\e\p\a\g\e!
echo addcslashes($str2, "a..g")."<br>";//addcslashes函数区分大小写,W\el\com\e to my hum\bl\e Hom\ep\a\g\e! 

$str3 = addslashes('What does "yolo" mean?');
echo $str3;//What does \"yolo" mean?
//addslashes返回在预定义字符前添加反斜杠的字符串
//预定义字符:('),("),(\),(NULL)
//默认情况下，PHP 指令 magic_quotes_gpc 为 on，对所有的 GET、POST 
//和 COOKIE 数据自动运行 addslashes()。不要对已经被 
//magic_quotes_gpc 转义过的字符串使用 addslashes()，因为这样会导致
//双层转义。遇到这种情况时可以使用函数 get_magic_quotes_gpc() 进行检测。
$str4 = "Who's Peter?";
echo $str4."This is not safe in database"."<br>";//Who's Peter ? This is not safe in a database
echo addslashes($str4)."This is safe in database"."<br>";//Who\'s Peter ? This is safe in a database query. 

$str5 = "Hello World!";
echo bin2hex($str5)."<br>";//ASCII字符的字符串转换为十六进制值
echo pack("H*",bin2hex($str5))."<br>";//把十六进制值转为字符串
echo hex2bin(bin2hex($str5));//把十六进制值转为ASCII字符

$str6 = "hello world";
echo chop($str6,"world");//输出:hello
//移除字符串右侧的空白字符或者其他预定义字符，charlist参数为空，则移除：
//"\0","\t","\n","\x0B","\r"," "

$str7 = chr(046);//从指定ASCII值返回字符
echo "You $str7 me forever";//You & me forever
$str8 = chr(43);
$str9 = chr(61);
echo "2 $str8 2 $str9 4";//2+2=4

$str10 = "hello world!";
echo chunk_split($str10,6,"...");//每隔6个长度分割str字符串，并在后面加上...
//输出:hello ...world!...

//convert_uudecode()解码
//convert_uuencode()编码
$str11 = "Hello World!";
$encodeStr = convert_uuencode($str11);
echo $encodeStr."<br>";//,2&5L;&@=V]R;&0A `
$decodeStr = convert_uudecode(convert_uuencode($str11));
echo $decodeStr."<br>";//Hello World!

$str12 = "PHP is pretty fun!!";
$strArray = count_chars($str12,1);
print_r($strArray);
/*
 * Array ( [32] => 1 [33] => 1 [72] => 1 [87] => 1 [100] => 1
 *  [101] => 1 [108] => 3 [111] => 2 [114] => 1 ) 
 *  ASCII值为键名，出现的次数为键值。
 */
foreach ($strArray as $key=>$val)
{
	echo "The character <b>chr($key)<b> was found $val times ";
}

$str13 = "one,two,three,four";
//返回包含一个元素的数组
print_r(explode(",", $str13),0);
print "<br>";
//数组元素为2
print_r(explode(",", $str13),2);
print "<br>";
//删除最后一个数组元素
print_r(explode(",", $str13),-1);
/*
 * Array
(
    [0] => one,two,three,four
)

Array
(
    [0] => one
    [1] => two,three,four
)

Array
(
    [0] => one
    [1] => two
    [2] => three
)
 */

$str14 = "beijing";
$number = 9;
$file = fopen("text.txt", "w");
echo fprintf($file, "There are %u million bikes in %s .",$number,$str14);
//文本There are 9 million bicycles in Beijing.会被写到文件test.txt
//fprintf()函数把格式化的字符串写到指定的输出流(文件或者数据库)

$arr = array("Hello","World!","Beautiful","Day!");
echo implode(" ", $arr);
echo implode("+", $arr);
echo implode("X", $arr);
echo join(" ", $arr);
/*
 * Hello World! Beautiful Day!
   Hello+World!+Beautiful+Day!
   HelloXWorld!XBeautifulXDay! 
   Hello World! Beautiful Day!
 */

echo lcfirst("Hello world");//hello world

$str15 = "Hello World";
echo ltrim($str15,"Hello");// World

$str16 = "Hello";
echo md5($str16);//计算字符串的MD5散列
$fileName = "test.txt";
echo md5_file($fileName);//计算文件的MD5散列

echo ord("h");//104,返回字符串中第一个字符的ASCII值
echo ord("hello");//104

//把查询字符串解析到变量中
parse_str("name=Peter&age=14");
echo $name."<br>";
echo $age;
/*
 * Peter
 * 14
 */
parse_str("name=Peter&age=14",$array);
print_r($arr);
/*
 * Array ( [name] => Peter [age] => 43 ) 
 */

similar_text("Hello World", "Hello Peter",$percent);
echo $percent;//63.3333333333

//格式化字符串
$number2 = 9;
$str17 = "beijing";
$txt = sprintf("There are %u million bikes in %s .",$number2,$str17);
echo $txt;

//替换字符串中的字符(大小写不敏感)
echo str_ireplace("WORLD", "peter", "hello world");
$arr2 = array("blue","red","green","yellow");
print_r(str_ireplace("RED", "pink", $arr2,$i));
echo "replacement:$i";//输出1,对替换数进行计数
//使用str_replace()进行大小写敏感替换
$find = array("HELLO","WORLD");
$replace = array("B");
$arr3 = array("Hello","world","!");
print_r(str_ireplace($find, $replace, $arr3));
/*
 * Array ( [0] => B [1] => [2] => ! ) 
 * 如果同时需要对某个数组进行查找和替换，并且需要执行替换的元素少于查找到
 * 的元素的数量，那么多余的元素将用空字符串进行替换。
 */

//字符串填充
$str18 = "hello world";
echo str_pad($str18, 20,".",STR_PAD_LEFT);
//20：新字符串长度；
/*
 * STR_PAD_BOTH - 填充字符串的两侧
 * STR_PAD_LEFT - 填充字符串的左侧
 * STR_PAD_RIGHT - 填充字符串的右侧
 */

//重复指定字符串
echo str_repeat(".", 13);//.............

//随机打乱字符串中的所有字符
echo str_shuffle("hello world");

//将字符串分割成数组
print_r(str_split("hello",3));//Array ( [0] => Hel [1] => lo ) 

//计算字符串中的单词数
echo str_word_count("hello world!");//2
//返回包含字符串中的单词的数组
print_r(str_word_count("hello world",1));//Arrar([0]=>hello [1]=>world)
//返回数组，键名为单词在字符串中的位置，键值是实际的单词
print_r(str_word_count("hello world",2));//Array([0]=>hello [6]=>world)
//没有char参数和有char参数
print_r(str_word_count("hello world & good morning!",1));
print "<br>";
print_r(str_word_count("hello world $ good morning!",1,"$"));
/*
 * Array ( [0] => Hello [1] => world [2] => good 
 * [3] => morning )
 * Array ( [0] => Hello [1] => world [2] => & 
 * [3] => good [4] => morning ) 
 */

//字符串比较,不区分大小写
//区分大小写比较：strcmp()
echo strcasecmp("Hello world", "HELLO WORLD")."<br>";//0
echo strcasecmp("Hello world", "HELLO")."<br>";//7
echo strcasecmp("Hello world", "HELLO WORLD! HELLO");//-7

//一个字符串在另一个字符串中的第一次出现,区分大小写
//不区分大小写的搜索：stristr()
echo strchr("Hello world!", "world");//world!
echo strchr("Hello world!", 111);//o world!
echo strchr("Hello world!", "world",true);//Hello 

//返回在找到任何指定字符之前，在字符串中查找的字符数(包括空格)
echo strcspn("hello world!", "w",0,6);
//从第0个字符开始查找“w”，最多查找6个长度

//删除字符串中的html，php标签
echo strip_tags("hello <b><i>world</i></b>","<b>");//<b>标签不删除

//stripcslashes()删除由addcslashes()添加的反斜杠
//stripslashes()删除由addslashes()添加的反斜杠

//返回一个字符串在另一个字符串中第一次出现的位置,大小写不敏感
echo stripos("I love php,I love php too", "PHP");//7
//strpos()大小写敏感

//前n个字符的字符串进行比较，大小写不敏感
echo strncasecmp("Hello world!", "hello world", 6);//0
//前n个字符的字符串进行比较，大小写敏感
echo strncmp("Hello world", "hello world", 6);//-1

//查找字符串在另一个字符串中最后一次出现的位置，返回从该位置开始后面的字符串
echo strrchr("Hello world! What a beautiful day!", what);
//What a beautiful day!
echo strrchr("hello world", 111);//orld

//字符串翻转
echo strrev("Hello World!");//!dlroW olleH 

//返回字符串在另一个字符串中最后一次出现的位置,大小写不敏感
echo strripos("I love php, I love php too.", "PHP");//19
//strrpos大小写敏感

//返回在字符串中包含特定字符的数目
echo strspn("Hello world", "kHlleo");//5
echo strspn("abcdefg", "abc");//3

//字符串分割成更小的字符串
$string = "Hello world. Beautiful day today.";
$token = strtok($string, " ");
while ($token != false)
{
	echo "$token<br>";
	$token = strtok(" ");
}

//把字符串转为小写
echo strtolower("HELLO WORLD.");//hello world
//把字符串转为大写
echo strtoupper("hello world");//HELLO WORLD

//把字符串中的字符转为特定字符
echo strtr("Hilla warld", "ia", "eo");//Hello world
//键名是原始字符，键值是目标字符
$arr4 = array("Hello" => "Hi","World" => "earth");
echo strtr("Hello world", $arr4);//Hi earth

//获取子字符串
echo substr("Hello world",10)."<br>";//d
echo substr("Hello world",1)."<br>";//ello world
echo substr("Hello world",3)."<br>";//lo world
echo substr("Hello world",7)."<br>";//orld
echo "<br>";
echo substr("Hello world",-1)."<br>";//d
echo substr("Hello world",-10)."<br>";//ello world
echo substr("Hello world",-8)."<br>";//lo world
echo substr("Hello world",-4)."<br>";//orld

echo substr("Hello world",0,10)."<br>";//Hello worl
echo substr("Hello world",1,8)."<br>";//ello wor
echo substr("Hello world",0,5)."<br>";//Hello
echo substr("Hello world",6,6)."<br>";//world
echo "<br>";
echo substr("Hello world",0,-1)."<br>";//Hello worl
echo substr("Hello world",-10,-2)."<br>";//ello wor
echo substr("Hello world",0,-6)."<br>";//Hello
echo substr("Hello world",-2-3)."<br>";//world

//计算子串在字符串中出现的次数
//区分大小写，不计数重叠的子串
echo substr_count("Hello world.The world is nice", "is");//2
$str19 = "This is nice";
echo strlen($str19)."<br>";//12
echo substr_count($str19, "is")."<br>";//2
echo substr_count($str19, "is",2)."<br>";//2
echo substr_count($str19, "is",3)."<br>";//1
echo substr_count($str19, "is",3,3)."<br>";//0
$str20 = "abcabcab";
echo substr_count($str20, "abcab");//1

//字符串替换或者插入
echo substr_replace("Hello world", "earth", 6);//Hello earth
echo substr_replace("Hello world", "earth", -5);//Hello earth
echo substr_replace("world", "Hello", 0,0);//Hello world

//首字符换成大写
echo ucfirst("hello world");//Hello world
//首字符换成小写
echo lcfirst("Hello world");//hello world
//每个单词的首字符换成大写
echo ucwords("hello world");//Hello World

//格式化的字符串写到输出流
$number3 = 9;
$str21 = "beijing";
$file2 = fopen("test.txt", "w");
echo vfprintf($file2, "there are %u bikes in %s.", array($number3,str21));
//输出格式化字符串
vprintf("there are %u bikes in %s.", array($number3,str21));
//格式化字符串写到变量中
$txt3 = vsprintf("there are %u bikes in %s.", array($number3,str21));

//按照指定长度对字符串进行拆行
$str22 = "An example of a long word is: Supercalifragulistic";
echo wordwrap($str22,15,"\n",TRUE);
//TRUE:单词可能被分割；FALSE:单词不会被分割

?>