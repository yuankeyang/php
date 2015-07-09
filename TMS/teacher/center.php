<?php include '../head.php'?>
<?php include '../topbar.php'?>
<?php
session_start();
if(!isset($_SESSION['tea_id'])){
	exit("非法访问");
	}
?>
<?php include '../DB/conn.php'?>
<?php
$user_id=$_SESSION['tea_id'];
$query_result=mysql_query("select * from teacher where tno='$user_id' limit 1;");
$result_array=mysql_fetch_array($query_result);
?>
<div class="container" style="min-height:600px;height:100%;">
<div class="left-nav">
<ul id="logintab" class="nav nav-stacked">
<li class="active"><a data-toggle="tab" href="#info">个人信息</a></li>
<li><a data-toggle="tab" href="#scoreinput">成绩录入</a></li>
<li><a data-toggle="tab" href="#repasswd">密码修改</a></li>
</ul>
</div>
<div class="right-content">
<div class="tab-content">
<div class="tab-pane active" id="info">
<table class="table table-bordered table-striped">
<tbody>
<tr><td>姓名</td><td><?php echo $result_array['Tname']; ?></td></tr>
<tr><td>职工号</td><td><?php echo $result_array['Tno']; ?></td></tr>
<tr><td>手机</td><td><?php echo $result_array['Tphone']; ?></td></tr>
<tr><td>邮箱</td><td><?php echo $result_array['Tmail']; ?></td></tr>
<tr><td>院系</td><td><?php echo $result_array['Fno']; ?></td></tr>
</tbody>
</table>
</div>
<div class="tab-pane" id="scoreinput">
<script type="text/javascript">
$(document).ready(function(){
		var cno1;//选中的课程号
	$.ajax({
		type:'POST',
		url:'getcourseInfo.php',
		timeout:4000,
		dataType:'json',
		success:function(data){
			//老师开设的课程
			cno1=data[0].Cno;
			for(i=0;i<data.length;i++){
				$("#mycourse").empty();
				$("#mycourse").append("<option value=\""+data[i].Cno+"\">"+
				data[i].Cname+"  学分："+data[i].Ccredit+"</option>");
			}
			$.ajax({
				type:'POST',
				url:'getcourseStu.php',
				timeout:4000,
				dataType:'json',
				data:{cnum:cno1},
				success:function(data){
					for(i=0;i<data.length;i++){
					$("#course-students").append("<tr><td>"
					+data[i].Sno+"</td><td>"
					+data[i].Rgrade+"</td><td>"
					+data[i].Mgrade+"</td><td>"
					+data[i].Egrade+"</td><td><a href=\"javascript:void(0)\">修改</a></td>"
					+"<td><a href=\"javascript:void(0)\">删除</a></td></tr>");
					}
				},
				error:function(){
					alert("AJAX获取数据出错！");
				}
			});
		},
		error:function(){
			alert("获取数据出错！");
		}
	});


	$("#mycourse").change(function(){
		cno2=$("#mycourse").val();//选中的课程号
		$.ajax({
			type:'POST',
			url:'getcourseStu.php',
			timeout:4000,
			dataType:'json',
			data:{cnum:cno2},
			success:function(data){
				for(i=0;i<data.length;i++){
				$("#course-students").append("<tr><td>"
				+data[i].Sno+"</td><td>"
				+data[i].Rgrade+"</td><td>"
				+data[i].Mgrade+"</td><td>"
				+data[i].Egrade+"</td></tr>");
				}
			},
			error:function(){
				alert("AJAX获取数据出错！");
			}
		});
		$("#course-students").empty();

	});
});
</script>
	<label>我开设的课程：</label>
	<select id="mycourse">
	</select>
	<table class="table table-bordered table-striped">
		<thead><tr>
		<th>学号</th><th>平时成绩</th><th>期中成绩</th><th>期末成绩</th><th colspan="2">操作</th>
		</tr></thead>
		<tbody id="course-students">
		</tbody>
	</table>
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
