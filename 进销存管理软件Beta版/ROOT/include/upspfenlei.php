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
$id = $_POST['id'];
$name = $_POST['name'];

$sql = " UPDATE zy_spfenlei SET name='$name' where id=$id ";
$result2 = mysql_query($sql);

if($result2) 
{
 echo "<script language=\"JavaScript\">alert(\"".$TEXT['modify-successfully']."\");</script>";
}
else
{
 echo "<script language=\"JavaScript\">alert(\"".$TEXT['modify-fail']."\");</script>";    	 
}

mysql_close();

$url = "../upspfenlei.php?id=$id";
echo "<script language='javascript' type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";

?>