<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<?php
//读取当前语言
$file=$_SERVER['DOCUMENT_ROOT']."/lang.tmp";
$result=trim(file_get_contents($file));
include($_SERVER['DOCUMENT_ROOT'].'/lang/'.$result.'.php');

include("conn/conn.php");
session_start();
if($_SESSION["zy_admin_id"] == null)
{
 echo "<script language=\"JavaScript\">window.location.href='index.php';</script>";
}
$admin_id = $_SESSION["zy_admin_id"];
$loginname=$_SESSION["zy_admin_loginname"];
?>
<TITLE><?php echo $TEXT['title']; ?></TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<LINK rel=stylesheet type=text/css href="css/css.css">
<style type="text/css">
.tdah  a{ color:#666; text-decoration:none;height: 90px; width: 90px; font-size:14px; font-weight:bold;}
.tdah  a:hover{ color:#36C; text-decoration:none;height: 90px; width: 90px; font-size:14px; font-weight:bold;}
</style>

</HEAD>
<BODY>

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
<img src="images/ico/2.gif"  style="vertical-align:middle;"/>&nbsp;<?php echo $TEXT['my-desktop'];?></td>
<td width="15">
<img src="images/btn/navri.png" /></td>
</tr>
</table>
</div>
<div class="rightCont">
<table align="center" width="700" style=" text-align:center;border-collapse: collapse;"  cellpadding="0" cellspacing="0" border="0" bordercolor="#3279cb">
<tr height="300px;">
<td width="90px;" align="center"class="tdah"><a href="jibenxinxi.php"><img src="images/bag/01.png"  style="margin-bottom:15px;"/><br />
<?php echo $TEXT['company-information'];?></a></td>
<td width="90px;" align="center"class="tdah"><a href="ruku.php"><img src="images/bag/04.png"  style="margin-bottom:15px;"/><br />
<?php echo $TEXT['commodity-in'];?></a></td>
<td width="90px;" align="center"class="tdah"><a href="kucun.php"><img src="images/bag/13.png"  style="margin-bottom:15px;"/><br />
<?php echo $TEXT['commodity-inventory'];?></a></td>
<td width="90px;" align="center"class="tdah"><a href="chuku.php"><img src="images/bag/12.png"  style="margin-bottom:15px;"/><br />
<?php echo $TEXT['commodity-out'];?></a></td>
</tr>
</table>
</div>
</div>
</div>
</div>
<?php include "bottom.php"?>
</BODY>
</HTML>
