<!DOCTYPE>
<html>
<head>
<meta http-equiv="content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="/css/bootstrap.min.css" />
<link rel="stylesheet" href="/css/bootstrap-theme.css" />
<link rel="stylesheet" href="/css/demo.css"/>
<script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
	var category=$('#classification').val();
	$.ajax({
		type:'POST',
		url:'getInfo.php',
		timeout:4000,
		dataType:'json',
		data:{data:category},
		success:function(data){
			//alert(data.length);
			$("#info").html('');
			for(i=0;i<data.length;i++){
			$("#info").append("<tr><td>"+data[i].Sno+"</td><td>"
			+data[i].Sname+"</td><td>"
			+data[i].password+"</td>"
			+"<td><a href=\"javascript:void(0)\">修改</a></td>"
			+"<td><a href=\"javascript:void(0)\">删除</a></td></tr>");
			}
		},
		error:function(){
			alert("获取数据出错！");
		}
	});
	$('#classification').change(function(){
	var category=$('#classification').val();
	$.ajax({
		type:'POST',
		url:'getInfo.php',
		timeout:4000,
		dataType:'json',
		data:{data:category},
		success:function(data){
			//alert(data.length);
			if(category=="student"){
			$("#info").html('');
			for(i=0;i<data.length;i++){
			$("#info").append("<tr><td>"+data[i].Sno+"</td><td>"
			+data[i].Sname+"</td><td>"
			+data[i].password+"</td>"
			+"<td><a href=\"javascript:void(0)\">修改</a></td>"
			+"<td><a href=\"javascript:void(0)\">删除</a></td></tr>");
			}
			}else{
			$("#info").html('');
			for(i=0;i<data.length;i++){
			$("#info").append("<tr><td>"+data[i].Tno+"</td><td>"
			+data[i].Tname+"</td><td>"
			+data[i].password+"</td>"
			+"<td><a href=\"javascript:void(0)\">修改</a></td>"
			+"<td><a href=\"javascript:void(0)\">删除</a></td></tr>");
			}
			}
		},
		error:function(){
			alert("获取数据出错！");
		}
	});
	});
});
</script>
</head>
<body>
<h2><label class="label label-default">类别：</label>
	<select id="classification">
	<option value="student">学生信息</option>
	<option value="teacher">教师信息</option>
	</select></h2>
	<table class="table table-bordered table-striped">
		<thead><tr>
		<th>学号/工号</th><th>姓名</th><th>密码</th><th colspan="2">操作</th>
		</tr></thead>
		<tbody id="info">
		</tbody>
		<tr><td>批量操作</td><td><button>导入</button></td>
		<td><button>导出</button></td><td colspan="2"><button>全部删除</button></td></tr>
	</table>
</body>
</html>