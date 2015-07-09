<?php include '../head.php'?>
<?php include '../topbar.php'?>
<?php
session_start();
if(!isset($_SESSION['admin_id'])){
	exit("非法访问");
	}
?>
<?php include '../DB/conn.php'?>
<?php
$user_id=$_SESSION['admin_id'];
$query_result=mysql_query("select * from student where sno='$user_id' limit 1;");
$result_array=mysql_fetch_array($query_result);
?>
<style>
.tab-pane iframe{border:none;width:100%;height:100%}
</style>
<div class="container" style="min-height:600px;">
<div class="left-nav">
<ul id="logintab" class="nav nav-stacked">
<li class="active"><a data-toggle="tab" href="#info">信息管理</a></li>
<li><a data-toggle="tab" href="#course">课程管理</a></li>
<li><a data-toggle="tab" href="#select-course">发布选课</a></li>
<li><a data-toggle="tab" href="#changePasswd">修改密码</a></li>
</ul>
</div>
<div class="right-content">
<div class="tab-content">
<div class="tab-pane active" id="info">
<iframe src="infoManagement.php">
</iframe>
</div>
<div class="tab-pane" id="course">
<iframe src="courseManagement.php">
</iframe>
</div>
<div class="tab-pane" id="select-course">
<iframe src="selectCourse.php">
</iframe>
</div>
<div class="tab-pane" id="changePasswd">
<table class="table table-bordered table-striped">
	<tbody>
	<tr><td>原密码：</td><td><input type="password" name="passwd_old"></td></tr>
	<tr><td>新密码：</td><td><input type="password" name="passwd_new"></td></tr>
	<tr><td>确认密码：</td><td><input type="password" name="passwd_re"></td></tr>
	<tr><td></td><td><button class="btn btn-default">提交</button></td></tr>
	</tbody>
	</table>
</div>
</div>
</div>
</div>
<?php include '../end.php'?>
