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
$mingcheng = $_POST['mingcheng'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$url = $_POST['url'];
$dizhi = $_POST['dizhi'];

$query="select * from zy_jibenxinxi";
$result1=mysql_query($query);

if(mysql_num_rows($result1) == 1)
{
 $sql = " UPDATE zy_jibenxinxi SET mingcheng='$mingcheng',tel='$tel',email='$email',url='$url',dizhi='$dizhi' where id=1";
 $result2 = mysql_query($sql);
 if($result2) echo "<script language=\"JavaScript\">alert(\"".$TEXT['alert-submit-successful']."\");</script>";
 mysql_close();
 $url = "../jibenxinxi.php";
 echo "<script language='javascript' type='text/javascript'>";
 echo "window.location.href='$url'";
 echo "</script>";	
}
else
{
 $sql = "INSERT INTO zy_jibenxinxi (mingcheng,tel,email,url,dizhi) values('$mingcheng','$tel','$email','$url','$dizhi')";
 $result3 = mysql_query($sql);
 if($result3) echo "<script language=\"JavaScript\">alert(\"".$TEXT['alert-submit-successful']."\");</script>";
 mysql_close();
 $url = "../jibenxinxi.php";
 echo "<script language='javascript' type='text/javascript'>";
 echo "window.location.href='$url'";
 echo "</script>";	
}
?>