<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>
	<title></title>
</head>

Welcome </br>
<?php 

include "test.php";

$filepath = "C:\wamp\www\MyTest\data\data.txt";

// echo "js提交表单传的参数值为：" .$_REQUEST["parms"];
//$filepath = $_REQUEST["parms"];

if(!empty($_POST['submit']) && $_POST['submit'] == "提交")
{
	echo $_POST['submit'] . "<br>";
	echo $_POST['qihao'] . "<br>";
	echo $_POST['number'] . "<br>";

	$ret = zhixuan2zuxuan($_POST['number']);
	echo  "==" .$ret;
}

if(!empty($_POST['submit']) && $_POST['submit'] == "查询")
{
	echo $_POST['submit'] . "<br>";
	echo $_POST['qihao'] . "<br>";
	echo $_POST['number'] . "<br>";

	$test=new Test();
	$qihao = $_POST['qihao'];
	$number = $_POST['number'];
	$txt="";
	$txt .= intval($qihao) ."\t" .$number . "\n";
	// for ($i=0; $i < 100; $i++) { 
	// 	$txt .= $i+intval($qihao) ."\t" .$number . "\n";
	// }
	//echo $txt;

	$test->writeFile($filepath,$txt);
}


//排序

//统计遗漏

//直选转组选
function zhixuan2zuxuan($num)
{
	$ret = "";

	$bai = (int)(intval($num)/100);
	$shi =(int)(intval($num)/10%10);
	$ge = intval($num)%100%10;

	$tmp;
	if($bai > $shi)
	{
		$tmp = $bai;
		$bai = $shi;
		$shi = $tmp;
	}
	if($bai > $ge)
	{
		$tmp = $bai;
		$shi = $ge;
		$ge = $tmp;
	}

	if($shi > $ge)
	{
		$tmp = $shi;
		$shi = $ge;
		$ge = $tmp;
	}

	$ret = $bai."".$shi."".$ge;
	return $ret;
}


// if ($_FILES["file"]["error"] > 0)
// {
// 	echo "错误：" . $_FILES["file"]["error"] . "<br>";
// }
// else
// {
// 	#echo $("file") . "<br>";
// 	echo $_POST["file"] . "<br>";
// 	echo $_FILES["file"]["name"] . "<br>";
// 	echo $_FILES["file"]["size"] . "<br>";
// 	echo $_FILES["file"]["tmp_name"]. "<br>";
// }



//Test::showApacheLogs($filepath,10);

 ?>
<body>

</body>
</html>