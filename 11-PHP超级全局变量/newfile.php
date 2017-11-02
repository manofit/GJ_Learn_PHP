<?php

//超级全局变量是PHP系统自带的变量，在一个脚本的全部作用域中都可以使用，不需要
//特别说明，就可以在函数及类中使用
/*
 * 
    $GLOBALS
    $_SERVER
    $_REQUEST
    $_POST
    $_GET
    $_FILES
    $_ENV
    $_COOKIE
    $_SESSION
 */

//$_REQUEST用于收集HTML表单提交的数据
/*
 * <html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
Name: <input type="text" name="fname">
<input type="submit">
</form>

<?php
$name = $_REQUEST['fname'];
echo $name;
?>

</body>
</html>
 */

//$_POST用于收集表单提交的数据
/*
 * <html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
Name: <input type="text" name="fname">
<input type="submit">
</form>

<?php
$name = $_POST['fname'];
echo $name;
?>

</body>
</html>
 */

//$_GET用于收集表单提交的数据
//假如又一个包含参数的超链接，当用户点击链接 "Test $GET", 
//参数 "subject" 和 "web" 将发送至"test_get.php",你可以在
//"test_get.php" 文件中使用 $_GET 变量来获取这些数据。
/*
 *  <html>
<body>

<a href="test_get.php?subject=PHP&web=runoob.com">Test $GET</a>

</body>
</html> 
 */
//以下实例显示了 "test_get.php" 文件的代码
/*
 *  <html>
<body>

<?php
echo "Study " . $_GET['subject'] . " at " . $_GET['web'];
?>

</body>
</html>
 */

?>
