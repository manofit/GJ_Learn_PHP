<?php

//php简易mail
$to = "someone@example.com";//接受者
$subject = "参数邮件";//邮件标题
$message = "hello, 这是邮件的内容";//邮件正文
$from = "someone@163.com";//发送者
$head = "From:" . $from;//头部信息
mail($to, $subject, $message, $head);

//模拟通过页面填入基本信息向用户发送邮件
if (isset($_REQUEST["email"])){
	$email = $_REQUEST["email"];
	$subject = $_REQUEST["subject"];
	$message = $_REQUEST["message"];
	mail("someome@163.com", $subject, $message, "From" . $email);
}else {
	echo "<form method='post' action='mailform.php'>
	Email: <input name='email' type='text'><br>
	Subject: <input name='subject' type='text'><br>
	Message:<br>
	<textarea name='message' rows='15' cols='40'>
	</textarea><br>
	<input type='submit'>
	</form>";
}

//预定义的$_REQUEST变量包含$_GET,$_POST,$_COOKIE的内容，$_REQUEST变量可用来收集通过GET和POST方法发送的表单





?>