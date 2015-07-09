<?php include '../head.php'?>
<?php include '../topbar.php'?>
<?php
session_start();
if(!isset($_SESSION['stu_id'])){
	exit("非法访问");
	}
?>
<?php include '../DB/conn.php'?>
<?php
$user_id=$_SESSION['stu_id'];
$query_result=mysql_query("select * from student where sno='$user_id' limit 1;");
$result_array=mysql_fetch_array($query_result);
?>
<div class="container" style="min-height:600px;">
<div class="left-nav">
<ul id="logintab" class="nav nav-stacked">
<li class="active"><a data-toggle="tab" href="#info">个人信息</a></li>
<li><a data-toggle="tab" href="#course">课程表</a></li>
<li><a data-toggle="tab" href="#select-course">选课</a></li>
<li><a data-toggle="tab" href="#repasswd">修改密码</a></li>
</ul>
</div>
<div class="right-content">
<div class="tab-content">
<div class="tab-pane active" id="info">
<table class="table table-bordered table-striped">
<tbody>
<tr><td>姓名</td><td><?php echo $result_array['Sname']; ?></td></tr>
<tr><td>学号</td><td><?php echo $result_array['Sno']; ?></td></tr>
<tr><td>性别</td><td><?php echo $result_array['Ssex']; ?></td></tr>
<tr><td>年龄</td><td><?php echo $result_array['Sage']; ?></td></tr>
<tr><td>班级</td><td><?php echo $result_array['Sclass']; ?></td></tr>
</tbody>
</table>
</div>
<div class="tab-pane" id="course">
	<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
			type:'POST',
			url:'getcourse.php',
			timeout:4000,
			dataType:'json',
			success:function(data){
				//alert(data.length);
				for(i=0;i<data.length;i++){
						x=data[i].timex;
						y=data[i].timey;
						td=$("#class-"+y+" td");
						content=data[i].Cname+" "+data[i].Cno+" "+data[i].Tname;
						td.eq(x).html(content);
				}
			},
			error:function(){
				alert("error");
			}
		});
	});
	</script>
<table class="table table-bordered table-striped">
<thead>
<tr>
<th></th>
<th>星期一</th>
<th>星期二</th>
<th>星期三</th>
<th>星期四</th>
<th>星期五</th>
<th>星期六</th>
<th>星期日</th>
</tr>
</thead>
<tbody>
	<tr id="class-1">
	<td>上午一</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
	</tr>
	<tr id="class-2">
	<td>上午二</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
	</tr>
	<tr id="class-3">
	<td>下午一</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
	</tr>
	<tr id="class-4">
	<td>下午二</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
	</tr>
	<tr id="class-5">
	<td>晚上一</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
	</tr>
	<tr id="class-6">
	<td>晚上二</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
	</tr>
</tbody>
</table>
</div>
<div class="tab-pane" id="select-course">
目前不能选课
</div>
<div class="tab-pane" id="repasswd">
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
