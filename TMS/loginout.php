<?php include 'head.php';?>
<?php include 'topbar.php';?>
<div class="container">
<?php
//注销登录
if($_GET['action']=="logout"){
session_start();
unset($_SESSION['stu_id']); 
unset($_SESSION['tea_id']);
unset($_SESSION['admin_id']);   
//unset($_SESSION['username']);  
echo '<h2>注销成功！</h2>';
// echo '<p>点击此处 <a href="',$_SERVER['HTTP_HOST'],'/index.php">登录</a></p>';  
exit;  
}
?>
</div>
<?php include 'end.php';?>
