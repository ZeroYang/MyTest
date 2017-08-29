<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>
	<title></title>
</head>

Welcome
<?php 
echo "js提交表单传的参数值为：" .$_REQUEST["parms"];

$filepath = $_REQUEST["parms"];

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


 class Test{
	const LOG_PATH="C:\wamp\logs\php_error.log";

	const PAGES=50;

	function readLogs($filepath,$num=20)
	{
		$fp=fopen($filepath, "r");
		$pos=-2;
		$eof="";
		$head=false;
		$lines=array();

		while ($num>0) {

			while ($eof != "\n") {
				if (fseek($fp, $pos, SEEK_END)==0) {
					$eof=fgetc($fp);//逐字符读取
					$pos--;
				}else{
					fseek($fp, 0, SEEK_SET);
					$head=true;
					break;
				}
			}
			array_unshift($lines, fgets($fp)); //fgets() 逐行
			if ($head) {
				break;
			}

			$eof="";
			$num--;
		}
		fclose($fp);
		return array_reverse($lines);
	}

    public static function showApacheLogs($filepath,$num=20){
        $test=new Test();
        $result=$test->readLogs($filepath,$num);
        $html="";
        foreach($result as $line){
            if(strpos($line,"error:")){
                $line="<font color='red'>".$line."</font>";
            }
            $html.="<div class='line'>".$line."<div>";
        }
        echo $html;
    }
}

Test::showApacheLogs($filepath,10);

 ?>
<body>

</body>
</html>