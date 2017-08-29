<?php 
echo "Hello World!"; 
$x=5;
$y=6;
$z=$x+$y;
echo $z;

function myTest()
{
	$z = 10;
	echo "$z";

	global $x,$y;

	//$y = $x + $y;

	$GLOBALS['y'] = $GLOBALS['x'] + $GLOBALS['y'];
}

myTest();

//strlen() 函数返回字符串的长度（字符数）。
echo strlen("Hello world!"); 

//如果在字符串中找到匹配，该函数会返回第一个匹配的字符位置。如果未找到匹配，则返回 FALSE。
echo strpos("Hello world!","world"); 

function myTest1()
{
	static $x = 0;
	echo $x;
	$x++;
}

echo $y;

myTest1();
echo "<br>";
myTest1();
echo "<br>";
myTest1();

function mytest2($x)
{
	echo "/r/n"+$x+"/r/n";
}

echo "<br>";
mytest2(5);

echo "<br>";
echo $x . " ". $y;

echo "This", " string", " was", " made", " with multiple parameters.";

$cars=array("Volvo","BMW","SAAB");

print "My car is a {$cars[0]}";

//并置运算符 (.) 用于把两个字符串值连接起来
echo "car count" . count($cars);
sort($cars);
print_r($cars);
echo $cars;

function intdiv($x,$y)
{
	return intval($x/$y);
}

$s = var_dump(intdiv(10, 3));
echo $s;

$h=date("H");
if($h<20)
{
	echo 'good day';
}

//switch
$favcolor="red";
switch ($favcolor)
{
case "red":
    echo "你喜欢的颜色是红色!";
    break;
case "blue":
    echo "你喜欢的颜色是蓝色!";
    break;
case "green":
    echo "你喜欢的颜色是绿色!";
    break;
default:
    echo "你喜欢的颜色不是 红, 蓝, 或绿色!";
}

//while
$x=1; 

while($x<=5) {
  echo "这个数字是：$x <br>";
  $x++;
}

//do while
$x=1; 
do {
  echo "这个数字是：$x <br>";
  $x++;
} while ($x<=5);

?> 