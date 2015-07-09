<?php
//读取当前语言
$file=$_SERVER['DOCUMENT_ROOT']."/lang.tmp";
$result=trim(file_get_contents($file));
include($_SERVER['DOCUMENT_ROOT'].'/lang/'.$result.'.php');
?>
<?php
header('Content-Type: text/html; charset=utf-8'); 
include("../conn/conn.php");
session_start(); 
if($_SESSION["zy_admin_id"] == null)
{
 echo "<script language=\"JavaScript\">window.location.href='../index.php';</script>";
}
$id = $_SESSION["zy_admin_id"];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

$query="select * from zy_admin where id='$id'";
$result=mysql_query($query);
$row = mysql_fetch_array($result);

if($row['loginpass'] != $pass1)
{
 echo "<script language=\"JavaScript\">alert(\"".$TEXT['originpassword-error']."\");window.location.href='../pass.php';</script>";
}

$up = "update zy_admin set loginpass='$pass2' where id='$id'";
$rsup=mysql_query($up);
if($rsup != null)
{
 echo "<script language=\"JavaScript\">alert(\"".$TEXT['modify-successfully']."\");window.location.href='../pass.php';</script>";
}
else
{
 echo "<script language=\"JavaScript\">alert(\"".$TEXT['modify-fail']."\");window.location.href='../pass.php';</script>";
}

mysql_close();

?>