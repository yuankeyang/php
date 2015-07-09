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
$sqlSp="select * from zy_spxinxi where spfenlei_id='$id' ";
$resultSp=mysql_query($sqlSp);
$rowSp = mysql_fetch_array($resultSp);
if($rowSp != null)
{
  echo "<script language=\"JavaScript\">alert(\"".$TEXT['alert-youfenlei-info']."\");window.location.href='../adminspfenlei.php';</script>";
}
else
{
 $sql = "delete from zy_spfenlei where id='$id'";
 $result = mysql_query($sql);

 if($result != 0)
 {
  echo "<script language=\"JavaScript\">alert(\"".$TEXT['alert-delete-successful']."\");window.location.href='../adminspfenlei.php';</script>";
 }
 else
 {
  echo "<script language=\"JavaScript\">alert(\"".$TEXT['alert-delete-fail']."\");window.location.href='../adminspfenlei.php';</script>";
 }
}
?>