<?php

$allowedExts = array("gif","jpeg","jpg","png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]
		["type"] == "image/jpeg") || ($_FILES["file"]["type"] == 
				"image/jpg")) && ($_FILES["file"]["size"] < 204800) && 
		in_array($extension	, $temp)){
	if ($_FILES["file"]["error"] > 0){
		echo "错误:" . $_FILES["file"]["error"] . "<br>";
	}else{
		echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
		echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
		echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
		
		if (file_exists("upload/".$_FILES["file"]["name"])){
			echo $_FILES["file"]["name"] . "已经存在";
		}else {
			move_uploaded_file($_FILES["file"]["name"], "upload/" . $_FILES["file"]["name"]);
			echo "文件存储在:" . "upload/" . $_FILES["file"]["name"];
		}
	}
}else {
	echo "非法的文件格式";
}

//文件上传后会在服务器的php临时文件夹中创建一个被上传文件的临时副本，这个副本
//文件会在脚本结束时消失，要保存被上传的文件，我们需要把它拷贝到另外的位置。
?>