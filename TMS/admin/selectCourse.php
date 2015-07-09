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
	$.ajax({
		type:'POST',
		url:'getInfo.php',
		timeout:4000,
		dataType:'json',
		data:{data:"course"},
		success:function(data){
			for(i=0;i<data.length;i++){
				$('#course-info').append("<tr><td>"
				+data[i].Cno+"</td><td>"
				+data[i].Cname+"</td><td>"
				+data[i].Ccredit+"</td><td>"
				+"<a href=\"javascript:void(0)\">修改</a></td>"+
				"<td><a href=\"javascript:void(0)\">删除</a></td></tr>");
			}
		},
	});
});
</script>
</head>
<body>
	<h2>
	<label class="label label-default">所有的可选的课程</label>
	<h2>
	<table class="table table-bordered table-striped">
	<thead>
	<th>课程号</th><th>课程名</th><th>学分</th><th colspan="2">操作</th>
	</thead>
	<tbody id="course-info">
	</tbody>
	</table>
</body>
</html>