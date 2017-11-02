<?php

//创建一个有异常处理的函数
function checkNum($number){
    if ($number > 1){
        throw new Exception("变量的值必须小于等于1");
    }
    return true;
}
//在 try块内触发异常
try {
    checkNum(2);
    //如果抛出异常，以下代码不会执行
    echo "如果输出该内容，说明 $number 变量小于等于1";
} catch (Exception $e) {
    echo "message:" . $e->getMessage();
}

//创建自定义Exception类
class myException extends Exception{
    public function errorMessage(){
        $errorMsg = "错误行号".$this->getLine()."in".$this->getFile()
        .":<b>".$this->getMessage()."</b>这不是一个合法的email地址";
        return $errorMsg;
    }
}

$email = "someone@example...com";

try {
    if (filter_var($email,FILTER_VALIDATE_EMAIL) === FALSE){
        throw new myException();//触发异常
    }
} catch (myException $e) {
    echo $e->errorMessage();
}

//多个异常
class customException extends Exception
{
    public function errorMessage()
    {
        // 错误信息
        $errorMsg = '错误行号 '.$this->getLine().' in '.$this->getFile()
        .': <b>'.$this->getMessage().'</b> 不是一个合法的 E-Mail 地址';
        return $errorMsg;
    }
}

$email1 = "someone@example.com";

try
{
    // 检测邮箱
    if(filter_var($email1, FILTER_VALIDATE_EMAIL) === FALSE)
    {
        // 如果是个不合法的邮箱地址，抛出异常
        throw new customException($email1);
    }
    // 检测 "example" 是否在邮箱地址中
    if(strpos($email1, "example") !== FALSE)
    {
        throw new Exception("$email1 是 example 邮箱");
    }
}
catch (customException $e)
{
    echo $e->errorMessage();
}
catch(Exception $e)
{
    echo $e->getMessage();
}

//重新抛出异常
class customException extends Exception{
    public function errorMessage(){
        $errorMsg = $this->getMessage() . "不是一个合法的email地址";
        return $errorMsg;
    }
}
$email2 = "someone@example.com";
try {
    try {
        if (strpos($email2, "example") !== FALSE){
            throw new Exception($email2);
        }
    } catch (Exception $e) {
        //重新抛出异常
        throw new customException($email2);
    }
} catch (customException $e) {
    echo $e->errorMessage();
}
//如果在当前的try代码块中异常没被捕获，则他将在更高层级上查找catch代码块。


//设置顶层异常处理函数，处理所有为捕获异常的用户定义函数
function myException($exception){
    echo "<b>Exception:</b>".$exception->getMessage();
}

set_exception_handler("myException");

throw new Exception("Uncaught Ecxeption occurred");

/*
 * 
    需要进行异常处理的代码应该放入 try 代码块内，以便捕获潜在的异常。
    每个 try 或 throw 代码块必须至少拥有一个对应的 catch 代码块。
    使用多个 catch 代码块可以捕获不同种类的异常。
    可以在 try 代码块内的 catch 代码块中抛出（再次抛出）异常。

    简而言之：如果抛出了异常，就必须捕获它。
 * 
 * */








?>