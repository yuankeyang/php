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
$sp_id = $_POST['spname'];
$jiage = $_POST['jiage'];
$shuliang = $_POST['shuliang'];
$date = $_POST['date'];

$sql_S_kucun="select * from zy_spkucun where sp_id=$sp_id";
$result_S_kucun=mysql_query($sql_S_kucun);
$count = mysql_num_rows($result_S_kucun); 
if($count == 0)
{
	echo "<script language=\"JavaScript\">alert(\"".$TEXT['alert-meiyou-kucun']."\");window.location.href='../chuku.php';</script>";
}
$row_S_kucun = mysql_fetch_array($result_S_kucun);
$kucun = $row_S_kucun["kucun"];	
if($kucun < $shuliang)
{
	echo "<script language=\"JavaScript\">alert(\"".$TEXT['alert-kucun-bugou']."\");window.location.href='../chuku.php';</script>";
}
else
{
	$kucun = $kucun-$shuliang;
    $sql_U_kucun = " UPDATE zy_spkucun SET kucun=$kucun where sp_id=$sp_id ";
    $result_U_kucun = mysql_query($sql_U_kucun);
	
	$sql = "INSERT INTO zy_spchuku (sp_id,jiage,shuliang,date) values('$sp_id','$jiage','$shuliang','$date')";
    $result = mysql_query($sql);
    if($result) echo "<script language=\"JavaScript\">alert(\"".$TEXT['alert-submit-successful']."\");window.location.href='../ruku.php';</script>";
}
mysql_close();
?>