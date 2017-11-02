<?php

//php类定义
class phpClass{
	var $var1;
	var $var2 = "constant string";
	
	function myFunc ($arg1,$arg2){
		//....
	}
	
	//....
}

class Site{
	var $url;
	var $title;
	
	function setUrl($par){
		$this->url = $par;
	}
	
	function getUrl(){
		echo $this->url . PHP_EOL;
		//PHP_EOL换行符
	}
	
	function setTitle($par){
		$this->title = $par;
	}
	
	function getTitle(){
		echo $this->title;
	}
}

$runoob = new Site;
$taobao = new Site;
$google = new Site;

// 调用成员函数，设置标题和URL
$runoob->setTitle( "菜鸟教程" );
$taobao->setTitle( "淘宝" );
$google->setTitle( "Google 搜索" );

$runoob->setUrl( 'www.runoob.com' );
$taobao->setUrl( 'www.taobao.com' );
$google->setUrl( 'www.google.com' );

// 调用成员函数，获取标题和URL
$runoob->getTitle();
$taobao->getTitle();
$google->getTitle();

$runoob->getUrl();
$taobao->getUrl();
$google->getUrl(); 
?>

<?php 

//构造方法
class Site{
	var $url;
	var $title;
	
	function __construct($par1,$par2){
		$this->url = $par1;
		$this->title = $par2;
	}
	
	function getUrl(){
		echo $this->url;
	}
	
	function getTitle(){
		echo $this->title;
	}
}

$runoob = new Site("www.runoob.com","菜鸟教程");
$taobao = new Site("www.baidu.com","百度");
$google = new Site("www.google.com","谷歌");

$runoob->getUrl();
$taobao->getUrl();
$google->getUrl();

?>

<?php 

//析构函数
class class1 {
	function __construct(){
		print "构造函数";
		$this->name = "xxx";
	}
	
	function __destruct(){
		print "销毁" . $this->name . "\n";
	}
}

$obj = new class1();

//输出
/*
 * 构造函数
   销毁 xxx
 */

?>

<?php 

/*
 *  public（公有）：公有的类成员可以在任何地方被访问。
    protected（受保护）：受保护的类成员则可以被其自身以及其子类和父类访问。
    private（私有）：私有的类成员则只能被其定义所在的类访问。
 */

//属性的访问控制
class MyClass
{
	public $public = 'Public';
	protected $protected = 'Protected';
	private $private = 'Private';
	
	function printHello()
	{
		echo $this->public;
		echo $this->protected;
		echo $this->private;
	}
}

$obj = new MyClass();
echo $obj->public; // 这行能被正常执行
echo $obj->protected; // 这行会产生一个致命错误
echo $obj->private; // 这行也会产生一个致命错误
$obj->printHello(); // 输出 Public、Protected 和 Private


/**
 * Define MyClass2
 */
class MyClass2 extends MyClass
{
	// 可以对 public 和 protected 进行重定义，但 private 而不能
	protected $protected = 'Protected2';
	
	function printHello()
	{
		echo $this->public;
		echo $this->protected;
		echo $this->private;
	}
}

$obj2 = new MyClass2();
echo $obj2->public; // 这行能被正常执行
echo $obj2->private; // 未定义 private
echo $obj2->protected; // 这行会产生一个致命错误
$obj2->printHello(); // 输出 Public、Protected2 和 Undefined

?>

<?php 

//方法的访问控制
class MyClass
{
	// 声明一个公有的构造函数
	public function __construct() { }
	
	// 声明一个公有的方法
	public function MyPublic() { }
	
	// 声明一个受保护的方法
	protected function MyProtected() { }
	
	// 声明一个私有的方法
	private function MyPrivate() { }
	
	// 此方法为公有
	function Foo()
	{
		$this->MyPublic();
		$this->MyProtected();
		$this->MyPrivate();
	}
}

$myclass = new MyClass;
$myclass->MyPublic(); // 这行能被正常执行
$myclass->MyProtected(); // 这行会产生一个致命错误
$myclass->MyPrivate(); // 这行会产生一个致命错误
$myclass->Foo(); // 公有，受保护，私有都可以执行


/**
 * Define MyClass2
 */
class MyClass2 extends MyClass
{
	// 此方法为公有
	function Foo2()
	{
		$this->MyPublic();
		$this->MyProtected();
		$this->MyPrivate(); // 这行会产生一个致命错误
	}
}

$myclass2 = new MyClass2;
$myclass2->MyPublic(); // 这行能被正常执行
$myclass2->Foo2(); // 公有的和受保护的都可执行，但私有的不行

class Bar
{
	public function test() {
		$this->testPrivate();
		$this->testPublic();
	}
	
	public function testPublic() {
		echo "Bar::testPublic\n";
	}
	
	private function testPrivate() {
		echo "Bar::testPrivate\n";
	}
}

class Foo extends Bar
{
	//重写了父类的共有方法
	public function testPublic() {
		echo "Foo::testPublic\n";
	}
	
	//并不能重写父类的私有方法
	private function testPrivate() {
		echo "Foo::testPrivate\n";
	}
}

$myFoo = new foo();
$myFoo->test(); // Bar::testPrivate Foo::testPublic

/*
 * 私有的属性和方法不能被访问，不能被继承，更不可能被重写
 */
?>

<?php 
//接口中指定类必须实现哪些方法，但是不需要定义这些方法具体内容
//接口(interface),中定义的方法必须是公有的，这是接口的特性
//要实现一个接口，使用inlements操作符。类中必须实现接口中定义的所有方法。

interface iTemplate{
	public function setVariable($name,$var);
	public function getHtml($template);
}

class Template implements iTemplate {
	private $vars = array();
	
	public function setVariable($name, $var){
		$this->vars[$name] = $var;
	}
	
	public function getHtml($template){
		foreach ($this->vars as $name => $value){
			$template = str_replace('{' . $name . '}', $value, $template);
		}
		
		return $template;
	}
}
?>

<?php 

//常量
class myClass{
	const constant = '常量值';
	
	function showConstant(){
		echo self::constant . PHP_EOL;
	}
}

echo MyClass::constant . PHP_EOL;

$classname = "myClass";
echo $classname::constant . PHP_EOL;

$class = new MyClass();
$class->showConstant();
echo $class::constant . PHP_EOL;

?>

<?php 

/*
 * 任何一个类，如果里面至少有一个方法被声明为抽象的，那么这个类就必须声明为
 * 抽象的。定义为抽象的类不能实例化。被定义为抽象的方法只是声明其调用方式(
 * 参数)，不能定义其具体功能实现。继承一个抽象的类，子类必须定义父类中所有的
 * 抽象方法，另外，这些方法的访问控制必须和父类一样活着更宽松。此外方法的调用
 * 方式必须匹配，即类型和所需要参数数量必须一致。
 */

abstract class AbstractClass{
	abstract protected function getValue();
	abstract protected function prefixValue($prefix);
	
	public function printOut(){
		$this->getValue() . PHP_EOL;
	}
}

class Class1 extends AbstractClass {
	protected function getValue(){
		return "Class1";
	}
	
	public function prefixValue($prefix){
		return "{$prefix}Class1";
	}
}

class Class2 extends AbstractClass{
	protected function getValue(){
		return "Class2";
	}
	
	public function prefixValue($prefix){
		return "{$prefix}Class2";
	}
}

$class1 = new Class1();
$class1 -> printOut();
echo $class1 -> prefixValue('FOO_');

$class2 = new Class2();
$class2 -> printOut();
echo $class2 -> prefixValue('FOO_');

/*
 * ConcreteClass1
FOO_ConcreteClass1
ConcreteClass2
FOO_ConcreteClass2
 */

?>

<?php 

/*
 * static关键字
 * 声明类属性或方法为static，就可以不实例化类而直接访问
 * 静态属性不能通过一个类已实例化的对象来访问，但是静态方法可以
 * 静态属性不可以由对象通过->操作符来访问
 */
class Foo{
	public static $my_static = 'foo';
	
	public function staticValue(){
		return self::$my_static;
	}
}

print Foo::$my_static . PHP_EOL;

$foo = new Foo();
print $foo -> staticValue() . PHP_EOL;

?>

<?php 

//如果父类中的方法被声明为final，则子类无法覆盖该方法；如果一个类被声明
//为final，则不能被集成
class BaseClass {
	public function test(){
		echo "BaseClass::Test() called" . PHP_EOL;
	}
	
	final public function moreTesting(){
		echo "BaseClass::moreTesting() called" .PHP_EOL;
	}
}

class ChildClass extends BaseClass{
	public function moreTesting(){
		echo "ChildClass::moreTesting() called"  . PHP_EOL;
	}
	//报错信息 Fatal error: Cannot override final method BaseClass::moreTesting(
}

?>

<?php 

/*
 * 调用父类的构造方法
 * php不会在子类的构造方法中访问父类的构造方法，要执行父类的构造方法，需要在
 * 子类的构造方法中调用parent::__construct()
 */
class BaseClass {
	function __construct(){
		print "BaseClass 类中的构造方法";
	}
}

class SubClass extends BaseClass {
	function __construct(){
		parent::__construct();
		print "subclass 类的构造方法";
	}
}

class OtherSubclass extends BaseClass {
	//自动调用父类的构造方法
}

// 调用 BaseClass 构造方法
$obj = new BaseClass();

// 调用 BaseClass、SubClass 构造方法
$obj = new SubClass();

// 调用 BaseClass 构造方法
$obj = new OtherSubclass();

/*
 * BaseClass 类中构造方法
BaseClass 类中构造方法
SubClass 类中构造方法
BaseClass 类中构造方法
 */


?>
