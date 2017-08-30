<?php

 class Test{
	const LOG_PATH="C:\wamp\logs\php_error.log";

	const PAGES=50;

	public function readFile($filepath)
	{
		$lines=array();

		$myfile = fopen($filepath, "r") or die("Unable to open file!");
		// 输出单行直到 end-of-file
		while(!feof($myfile)) {
			echo fgets($myfile) . "<br>";
		}
		fclose($myfile);

		return $lines;
	}

	public function writeFile($filepath, $txt)
	{
		$myfile = fopen($filepath, "a+") or die("Unable to open file!");
		$txt = $txt . "\n";
		fwrite($myfile, $txt);
		fclose($myfile);
	}

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


?>
