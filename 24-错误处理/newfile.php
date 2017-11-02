<?php

if (!file_exists("welcome.txt")){
    die("file not exists");
}else {
    $file = fopen("welcome.txt", "r");
}

//设置错误处理程序
function customError(){
    echo "<b>Error:</b> [$errno] $errstr";
}
//设置错误处理函数
set_error_handler("customError");
echo ($test);//出发错误

$test = 2;
if ($test > 1){
    trigger_error("变量的值应该小于1");
}

//通过e-mail发送错误消息
function customError(){
    echo "<b>Error:</b> [$errno] $errStr<br>";
    echo "已通知网站管理员";
    error_log("Error : [$errno] $errstr", 1, "someone@163.com", "From:webmaster@163.com");
}
set_error_handler("customError",E_USER_WARNING);
$test = 2;
if ($test > 1){
    trigger_error("变量值必须小于等于1",E_USER_WARNING);
}

?>