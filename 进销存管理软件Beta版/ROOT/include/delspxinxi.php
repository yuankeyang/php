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
$id = $_REQUEST['id'];
$sqlKucun="select * from zy_spkucun where sp_id='$id' ";
$resultSp=mysql_query($sqlKucun);
$rowKucun = mysql_fetch_array($resultSp);
if($rowKucun != null)
{
  echo "<script language=\"JavaScript\">alert(\"".$TEXT['alert-youkucun-bunengshanchu']."\");window.location.href='../adminspxinxi.php';</script>";
}
else
{
	$sql = "delete from zy_spruku where sp_id='$id'";
    $result = mysql_query($sql);
    $sql = "delete from zy_spchuku where sp_id='$id'";
    $result = mysql_query($sql);
    $sql = "delete from zy_spxinxi where id='$id'";
    $result = mysql_query($sql);

 if($result != 0)
 {
  echo "<script language=\"JavaScript\">alert(\"".$TEXT['alert-delete-successful']."\");window.location.href='../adminspxinxi.php';</script>";
 }
 else
 {
  echo "<script language=\"JavaScript\">alert(\"".$TEXT['alert-delete-fail']."\");window.location.href='../adminspxinxi.php';</script>";
 }
}
?>