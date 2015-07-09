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
<div class="main">
<div class="main_title">
<div class="main_title_left"><?php echo $TEXT['login-account'];?>：<?php echo $loginname;?></div>
<div class="main_title_right"><a href="login.php"><?php echo $TEXT['exit'];?></a></div>
</div>
<div class="main_list"><a href="adminspxinxi.php"><input type="button" value="商品信息"></a></div>
<div class="main_list"><a href="rukujilu.php"><input type="button" value="入库记录"></a></div>
<div class="main_list"><a href="kucun.php"><input type="button" value="商品库存"></a></div>
<div class="main_list"><a href="chukujilu.php"><input type="button" value="出库记录"></a></div>
</div>
</div>
<div class="bottom"><?php echo $TEXT['copyright'];?></div>
</body>
</html>
