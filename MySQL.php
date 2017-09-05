<?php
echo "<meta charset='UTF-8'>";
$dbhost = 'localhost:3306';  // mysql服务器主机地址
$dbuser = 'root';            // mysql用户名
$dbpass = 'root';          // mysql用户名密码
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
    die('Could not connect: ' . mysqli_error());
}
echo '数据库连接成功！' . "\n";

// 创建数据库
// $sql = "CREATE DATABASE myDB";
// if ($conn->query($sql) === TRUE) {
//     echo "数据库创建成功";
// } else {
//     echo "Error creating database: " . $conn->error;
// }

//选择数据库
mysqli_select_db($conn, '3d');

//创建数据库表
$sql = "CREATE TABLE IF NOT EXISTS 3d(".
"riqi DATE, ".
"qihao INT NOT NULL AUTO_INCREMENT, ".
"num CHAR(3) NOT NULL, ".
"yilou_history VARCHAR(1000), ".
"PRIMARY KEY (qihao) ) DEFAULT CHARSET=utf8;";

//echo $sql . "\n";
$retval = mysqli_query($conn, $sql);
if(!$retval)
{
	die('数据表创建失败：' .mysqli_error($conn));
}
else
{
	echo "数据表创建成功\n";
}

//插入数据
// 设置编码，防止中文乱码
// mysqli_query($conn, "set names utf8");

// $sql = "INSERT INTO 3d " .
// "( riqi, qihao, num, yilou_history )" .
// "VALUES ".
// "('20170904', 170904, '395', '132,123')";

// $retval = mysqli_query($conn,$sql);
// if(!$retval)
// {
// 	die('无法插入数据：' .mysqli_error($conn));
// }
// else
// {
// 	echo "数据表插入成功\n";
// }

//查询数据
$sql = "SELECT * FROM 3d";
$retval = mysqli_query($conn,$sql);
if(!$retval)
{
	die('无法读取数据：' .mysqli_error($conn));
}
else
{
	echo "数据查询成功\n";
	echo '<h2>数据查询 mysqli_fetch_array MYSQL_ASSOC 测试<h2>';
	echo '<table border="1"><tr><td>riqi</td><td>qihao</td><td>num</td><td>历史周期</td></tr>';
	//MYSQL_ASSOC， 设置该参数查询结果返回关联数组
	while($row = mysqli_fetch_array($retval, MYSQL_ASSOC))
	{
	    echo "<tr><td> {$row['riqi']}</td> ".
	         "<td>{$row['qihao']} </td> ".
	         "<td>{$row['num']} </td> ".
	         "<td>{$row['yilou_history']} </td> ".
	         "</tr>";
	}
	echo '</table>';

}
//  mysqli_free_result() 释放内存
mysqli_free_result($retval);

//where 条件查询
$sql = "SELECT * FROM 3d WHERE qihao > 170904";
$retval = mysqli_query($conn,$sql);
if(!$retval)
{
	die('无法读取数据：' .mysqli_error($conn));
}
else
{
	echo "数据查询成功\n";
	echo '<h2>数据查询 mysqli_fetch_assoc 测试<h2>';
	echo '<table border="1"><tr><td>riqi</td><td>qihao</td><td>num</td><td>历史周期</td></tr>';
	//mysqli_fetch_assoc(), 该函数从结果集中取得一行作为关联数组。 返回根据从结果集取得的行生成的关联数组，
	//如果没有更多行，则返回 false
	while($row = mysqli_fetch_assoc($retval))
	{
	    echo "<tr><td> {$row['riqi']}</td> ".
	         "<td>{$row['qihao']} </td> ".
	         "<td>{$row['num']} </td> ".
	         "<td>{$row['yilou_history']} </td> ".
	         "</tr>";
	}
	echo '</table>';

}
//  mysqli_free_result() 释放内存
mysqli_free_result($retval);

//UPDATE
$sql = 'UPDATE 3d
        SET riqi="20170906"
        WHERE qihao=170906';

$retval = mysqli_query( $conn, $sql );
if(! $retval )
{
    die('无法更新数据: ' . mysqli_error($conn));
}
else
{
	echo '数据更新成功！';
}



//mysqli_close($conn);
$conn->close();
?>