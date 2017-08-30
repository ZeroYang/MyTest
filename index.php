<!DOCTYPE html>
<html>

<head>
	<title>Bigger</title>
	<meta charset="UTF-8">
</head>

<!-- <form action="welcome.php" method="post">
	Name: <input type="text" name="name"><br>
	E-mail: <input type="text" name="email"><br>
	<input type="submit" value="post">
</form> -->

<!-- <form action="welcome_get.php" method="get">
	Name: <input type="text" name="name"><br>
	E-mail: <input type="text" name="email"><br>
	<input type="submit" value="get">
</form>
 -->
<!-- <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	Name: <input type="text" name="name"><br>
	E-mail: <input type="text" name="email"><br>
	<input type="submit" value="self">
</form>
 -->
<!-- <form action="readfile.php" method="post" enctype="multipart/form-data"> -->
<!-- <form action="readfile.php" method="post" >
    <label for="file">Filename:</label>
	<input type="file" name="file" id="file"><br>

	<input type="submit" name="submit" value="提交">
</form> -->

<form id="FileForm" method="post" action="readfile.php">
选取你的文件：<input type="file" onchange="readFilePath(this)">
	<br/>
	<button type="button" onclick="start()">开始</button>
</form>

<form  method="post" action="readfile.php">
期号：<input type="text" name="qihao">
号码：<input type="text" name="number">
	<br/>
	<input type="submit" name="submit" value="提交">
</form>

<form  method="post" action="readfile.php">
期号：<input type="text" name="qihao">
号码：<input type="text" name="number">
	<br/>
	<input type="submit" name="submit" value="查询">
</form>

<script>
var filePath="xxxxx";
function readFilePath(file)
{
	filePath = file.value;
	console.log(file.value);
}

function start()
{
	console.log(filePath);
	var FileForm= document.getElementById("FileForm");
	FileForm.action="readfile.php?parms="+filePath;
	alert( FileForm.action);
	FileForm.target="_self";
	FileForm.submit();
}
</script>
<!-- <script type="text/javascript"> function test() {   var t1=3;   t1 = t1+2;   alert(t1);   } </script> -->
<!--<?php echo "<script type='text/javascript'>test();</script>"; ?> -->

<script type="text/javascript" > var url="aaaa*"; </script> 
<?php $key="<script type=text/javascript>document.write(filePath)</script>"; echo $key; ?>

<?php  

$name = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	# code...
	$name = test_input($_POST["name"]);
	$email = test_input($_POST["email"]);

	echo $name ."<br>";
	echo $email ."<br>";
}


function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>

<form action="welcome_get.php">

<input list="browsers" name="browser">
<datalist id="browsers">
  <option value="Internet Explorer">
  <option value="Firefox">
  <option value="Chrome">
  <option value="Opera">
  <option value="Safari">
</datalist>
<input type="submit" value="测试">
</form>

<button type="button" onclick="alert('Hello World!')">button</button>

<body>

</body>
</html>