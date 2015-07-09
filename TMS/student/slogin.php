<?php include '../head.php';?>
<?php include '../topbar.php';?>
<div class="container">
<?php

if(!isset($_POST['submit'])){
	exit('非法访问');
	}
$username = htmlspecialchars($_POST['sno']);
$spasswd = htmlspecialchars($_POST['spasswd']);
//包含数据库连接文件
include('../DB/conn.php');
//检查用户名及密码
$check_qury=mysql_query("select * from student where Sno='$username' and password='$spasswd' limit 1");
if($result=mysql_fetch_array($check_qury)){
	//登录成功
	session_start();
	$_SESSION['stu_id'] = $username;
	echo '<h2>',$_SESSION['stu_id'],' 欢迎你！</h2>';
	echo '<p>进入<a href="center.php">用户中心</a><br /></p>';
    echo '<p>点击此处 <a href="../loginout.php?action=logout">注销</a> 登录！<br /></p>';
    exit;
	}else{
		 exit('登录失败！点击此处 <a href="javascript:history.back(-1);">返回</a> 重试');
	}
include('../DB/conn_close.php');
?>
</div>
<?php include '../end.php';?>
