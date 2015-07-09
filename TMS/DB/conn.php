<?php 
$serverName="localhost";//数据库服务器
$userName="root";
$passsword="xianggen";
$conn=mysql_connect($serverName,$userName,$passsword);
if(!$conn){
	die('Could not connect: ' . mysql_error());
	}
	//处理代码
mysql_query("SET NAMES 'UTF8'");
mysql_select_db("tms_db",$conn) or die("数据库访问错误！");
?>