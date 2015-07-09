<?php
//读取当前语言
$file=$_SERVER['DOCUMENT_ROOT']."\lang.tmp";
$result=trim(file_get_contents($file));
include($_SERVER['DOCUMENT_ROOT'].'\lang\\'.$result.'.php');
?>
<?php
header('Content-Type: text/html; charset=utf-8'); 
include("../conn/conn.php");
$loginname = $_POST['loginname'];
$loginpass = $_POST['loginpass'];

$sql = "SELECT * FROM zy_admin WHERE loginname='$loginname' and loginpass='$loginpass'"; 
$result = mysql_query($sql); 
$row = mysql_fetch_array($result); 
 
if($row)
{
	$admin_id = $row["id"];
	setcookie('admin_id',$admin_id,time()+86400);
	setcookie('loginname',$loginname,time()+86400);
	echo "<script language=\"JavaScript\">window.location.href='main.php';</script>";
} 
else 
{
	echo "<script language=javascript>alert('".$TEXT['alert-login-error']."');history.back();</script>";
}
?>