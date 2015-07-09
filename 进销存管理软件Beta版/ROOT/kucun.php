<?php
//读取当前语言
$file=$_SERVER['DOCUMENT_ROOT']."\lang.tmp";
$result=trim(file_get_contents($file));
include($_SERVER['DOCUMENT_ROOT'].'\lang\\'.$result.'.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<?php
include("conn/conn.php");
session_start(); 
if($_SESSION["zy_admin_id"] == null)
{
 echo "<script language=\"JavaScript\">window.location.href='index.php';</script>";
}
$admin_id = $_SESSION["zy_admin_id"];
$loginname=$_SESSION["zy_admin_loginname"];
?>
<TITLE><?php echo $TEXT['title'];?></TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<LINK rel=stylesheet type=text/css href="css/css.css">
<script language="javascript">  
function c()
{
document.getElementById("c01").className = "active02";    
document.getElementById("c02").className = "active02";
document.getElementById("c03").className = "active01";    
document.getElementById("c04").className = "active02";    
document.getElementById("c05").className = "active02";  
}

</script>
</HEAD>
<BODY onLoad="c()">
<div style="width: 100%; height: 85"><?php include "top.php" ?></div>
<div class="cont">
<div class="left">
<div class="leftLeft">
<?php include "left.php" ?>
</div>
</div>

<div class="right">
<div class="rightRight">
<div class="rightTop">
<table width="100%" height="51"style="border-collapse: collapse;" cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="14"><img src="images/btn/navle.png" /></td>
<td background="images/btn/navbg.png">
<img src="images/ico/2.gif"  style="vertical-align:middle;"/>&nbsp;<?php echo $TEXT['commodity-inventory'];?></td>
<td width="15">
<img src="images/btn/navri.png" /></td>
</tr>
</table>
</div>
<div class="rightCont">
<table align="center" style=" text-align:center; margin-top:0px; border-collapse:collapse; background:#fff;" cellpadding="0" cellspacing="0" border="1" bordercolor="#2297d1">
<tr height="40px" bgcolor="#2FA5E0" style="font-size:14px;">
<td width="200px;"><?php echo $TEXT['commodity-classification'];?></td>
<td width="400px;"><?php echo $TEXT['commodity-name'];?></td>
<td width="150px;"><?php echo $TEXT['inventory-quantity'];?></td></tr>
<?php					
$sql="select * from zy_spkucun order by id asc";
$result=mysql_query($sql);
while($rs=mysql_fetch_object($result)){
$id=$rs->id;
$sp_id=$rs->sp_id;
$kucun=$rs->kucun;   
$sqlSp="select * from zy_spxinxi where id=$sp_id";
$resultSp=mysql_query($sqlSp);
$rowSp = mysql_fetch_array($resultSp);
$spfenlei_id = $rowSp["spfenlei_id"];
$spname = $rowSp["name"];
$sqlFenlei="select * from zy_spfenlei where id=$spfenlei_id";
$resultFenlei=mysql_query($sqlFenlei);
$rowFenlei = mysql_fetch_array($resultFenlei);      
$fenleiname = $rowFenlei["name"];          
?>
<tr height="40px;">
<td width="200px;"><?php echo $fenleiname ;?></td>
<td width="400px;"><?php echo $spname ;?></td>
<td width="150px;"><?php echo $kucun ;?></td>
</tr>
<?php
}
?>
</table>
</div>
</div>
</div>
</div>
<?php include "bottom.php"?>
</BODY>
</HTML>
