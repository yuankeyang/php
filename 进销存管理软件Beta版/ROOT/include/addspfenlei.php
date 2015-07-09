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
$name = $_POST['name'];

$sql = "INSERT INTO zy_spfenlei (name) values('$name')";

$result = mysql_query($sql);

if($result) echo "<script language=\"JavaScript\">alert(\"".$TEXT['alert-add-successful']."\");</script>";

mysql_close();

$url = "../addspfenlei.php";
echo "<script language='javascript' type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";	


?>