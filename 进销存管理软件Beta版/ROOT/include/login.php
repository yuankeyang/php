<?php
header('Content-Type: text/html; charset=utf-8'); 
include("../conn/conn.php");
//读取当前语言
$file=$_SERVER['DOCUMENT_ROOT']."/lang.tmp";
$result=trim(file_get_contents($file));
include($_SERVER['DOCUMENT_ROOT'].'/lang/'.$result.'.php');

$loginname = $_POST['loginname'];
$loginpass = $_POST['loginpass'];

$sql = "SELECT * FROM zy_admin WHERE loginname='$loginname' and loginpass='$loginpass'"; 
$res = mysql_query($sql); 
$rows = mysql_fetch_array($res); 
 
if($rows)
{  
session_start(); 
$_SESSION["zy_admin_id"] = $rows['id']; 
$_SESSION["zy_admin_loginname"] = $loginname; 

echo "<script language=\"JavaScript\">window.location.href='../main.php';</script>";
} 
else 
{ 
echo "<script language=javascript>alert('".$TEXT['alert-login-error']."');history.back();</script>";
}
?>