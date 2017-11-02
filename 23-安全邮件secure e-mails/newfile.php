<?php

function spamcheck($field) {
	//从字符串中删除邮件的非法字符
	$field = filter_var($field, FILTER_SANITIZE_EMAIL);
	
	//验证电子邮件地址的值
	if (filter_var($field, FILTER_VALIDATE_EMAIL)){
		return true;
	}else {
		return false;
	}
}

if (isset($_REQUEST["email"])){
	//判断邮箱是否合法
	$mailcheck = spamcheck($_REQUEST["email"]);
	
	if ($mailcheck == true){
		// 发送邮件
		$email = $_REQUEST['email'] ;
		$subject = $_REQUEST['subject'] ;
		$message = $_REQUEST['message'] ;
		mail("someone@example.com", "Subject: $subject",
				$message, "From: $email" );
		echo "Thank you for using our mail form";
	}else {
		echo "非法输入";
	}
}else {
	// 如果没有邮箱参数则显示表单
	echo "<form method='post' action='mailform.php'>
	Email: <input name='email' type='text'><br>
	Subject: <input name='subject' type='text'><br>
	Message:<br>
	<textarea name='message' rows='15' cols='40'>
	</textarea><br>
	<input type='submit'>
	</form>";
}

?>