<?php

//fopen()函数用于在php中打开文件
/*
 <html>
<body>

<?php
$file = fopen("welcome","r");
?>

</body>
</html>
 */
//文件可能的打开模式：
/*
 * r 	只读。在文件的开头开始。
r+ 	读/写。在文件的开头开始。
w 	只写。打开并清空文件的内容；如果文件不存在，则创建新文件。
w+ 	读/写。打开并清空文件的内容；如果文件不存在，则创建新文件。
a 	追加。打开并向文件末尾进行写操作，如果文件不存在，则创建新文件。
a+ 	读/追加。通过向文件末尾写内容，来保持文件内容。
x 	只写。创建新文件。如果文件已存在，则返回 FALSE 和一个错误。
x+ 	读/写。创建新文件。如果文件已存在，则返回 FALSE 和一个错误。
 */

//如果fopen()无法打开指定文件，则会返回0(false)
/*
<html>
<body>
<?php
$file = fopen("welcome.txt", "r") or  exit("Unable to open file!")
?>
</body>
</html>
*/

//fclose()用于关闭打开的文件:
$file = fopen("test.txt", "r");
//执行一些代码
fclose($file);

//检测文件末尾
//feof()函数检测是否已到达文件末尾(EOF)
//在循环遍历未知长度的数据时，feof()函数很有用
//在w,a,x模式下无法读取打开的文件

//逐行读取文件
//fgets()函数用于从文件中逐行读取文件
//在调用该函数后，文件指针会移动到下一行
//下面的实例，先打开文件，再逐行读取文件，直到文件的末尾
$file = fopen("welcome.txt", "r") or exit("unable to open file");
//逐行读取文件直到末尾
while (!feof($file)) {
	echo fgets($file) . "<br>";
}
fclose($file);

//逐字读取文件
//fgetc()函数用于从文件中逐字读取文件
//在调用该函数后，文件指针会移动到下一个字符
$file = fopen("welcome.txt", "r") or exit("unable to open file");
//逐字读取文件直到末尾
while (!feof($file)) {
	echo fgetc($file) . "<br>";
}
fclose($file);

//返回路径中的文件名部分
$path = "/testweb/home.php";
//show the file name with file extention
echo basename($path);//home.php
//show the file name without file extention
echo basename($path,".php");//home

//清除文件状态缓存
//check filesize
echo filesize("test.txt");//792
echo "<br />";
$file = fopen("test.txt", "a+");
//truncate file
ftruncate($file, 100);
fclose($file);
//clear cache and check filesize again
clearstatcache();
echo filesize($file);//100

//复制文件，成功返回true，失败返回false
echo copy("source.txt", "target.txt");//1

//返回路径中的目录名称部分
echo dirname("c:/testweb/home.php");//c:/testweb
echo dirname("/testweb/home.php");///testweb

//返回目录的可用空间，以字节为单位
echo disk_free_space("C:");//1096343442
//返回目录的磁盘总容量
echo disk_total_space("C:");//144353533535

//从打开的文件中返回单一的字符
$file = fopen("test2.txt", "r");
echo fgetc($file);//H
fclose($file);
//该函数处理大文件比较缓慢，如果非要处理大文件，应该使用fgets依次读取一行，然后使用fgetc依次
//处理行数据

//从打开的文件中返回一行，并过滤掉html和php标签
//test.hmtl代码：
/*
 <div>
    <p><b>This is a paragraph.</b></p>
</div>
 */
$file = fopen("test.html", "r");
echo fgetss($file);//This is a paragraph.
fclose($file);

//把文件读入数组，数组中的每个元素都是文件中的一行，包括换行符在内
print_r(file("test.txt"));
/*
 * Array
(
[0] => Hello World. Testing testing!
[1] => Another day, another line.
[2] => If the array picks up this line,
[3] => then is it a pickup line?
) 
 */

//检查文件或者目录是否存在
echo file_exists("test.txt");//1

//把文件读入字符串
echo file_get_contents("test.txt");//This is a test file with test text.
//把字符串写入文件，成功返回文件中字符数，失败返回false
echo file_put_contents("test.txt", "Hello world. Testing!");//21

//文件或者目录的类型，该函数结果会被缓存，应该清楚缓存
echo filetype("test.txt");//file
echo filetype("images");//dir

//锁定或者释放文件
/* LOCK_SH - 共享锁定（读取的程序）。允许其他进程访问该文件。
    LOCK_EX - 独占锁定（写入的程序）。防止其他进程访问该文件。
    LOCK_UN - 释放一个共享锁定或独占锁定
    LOCK_NB - 锁定的情况下避免阻塞其他进程。
 */
$file = fopen("test.txt", "r");
if (flock($file, LOCK_EX)){
	fwrite($file, "Writing something");
	flock($file, LOCK_UN);
}else {
	echo "Error locking file";
}
fclose($file);






















?>