<?php
//读取当前语言
$file=$_SERVER['DOCUMENT_ROOT']."\lang.tmp";
$result=trim(file_get_contents($file));
include($_SERVER['DOCUMENT_ROOT'].'\lang\\'.$result.'.php');
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $TEXT['title'];?></title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta content="application/xhtml+xml; charset=UTF-8" http-equiv="Content-Type">
<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
<meta content="no-cache" http-equiv="pragma">
<meta content="0" http-equiv="expires">
<link rel="stylesheet" type="text/css" href="css/css.css" />
</head>
<body>
<?php 
if(isset($_COOKIE["admin_id"]))
{
	$admin_id = $_COOKIE["admin_id"];
	$loginname = $_COOKIE["loginname"];	
}
else
{
	echo "<script language=\"JavaScript\">window.location.href='login.php';</script>";
}
?> 
<div class="top"><?php echo $TEXT['title'];?></div>
<div class="cont">
<div class="cont_top">
<div class="cont_top_fanhui"><a href="main.php"><?php echo $TEXT['back'];?></a></div>
<div class="cont_top_title"><?php echo $TEXT['commodity-information'];?></div>
</div>
<div class="sale">
<?php	
include("../conn/conn.php");			
$sql="select * from zy_spxinxi order by id desc";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){  
$spfenlei_id = $row["spfenlei_id"]; 
$sqlFenlei="select * from zy_spfenlei where id=$spfenlei_id";
$resultFenlei=mysql_query($sqlFenlei);
$rowFenlei=mysql_fetch_array($resultFenlei);     
?>
<div class="sale_list">
<div class="sale_list_list"><?php echo $TEXT['commodity-classification'];?>：<?php echo $rowFenlei["name"];?></div>
<div class="sale_list_list"><?php echo $TEXT['commodity-name'];?>：<?php echo $row["name"];?></div>
</div>
<?php
}
?>
</div>
</div>
<div class="bottom"><?php echo $TEXT['copyright'];?></div>
</body>
</html>
