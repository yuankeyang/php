<?php
//读取当前语言
$file=$_SERVER['DOCUMENT_ROOT']."/lang.tmp";
$result=trim(file_get_contents($file));
include($_SERVER['DOCUMENT_ROOT'].'/lang/'.$result.'.php');
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
<TITLE>正源销售管理系统</TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<LINK rel=stylesheet type=text/css href="css/css.css">
<script language="javascript">  
function Check() 
{  
    if (document.send.name.value=="")  
    {  
        alert('请输入分类名称!');  
          
        return false; 
    }  
    return true; 
}  
</script>
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
<?php
$id = $_REQUEST['id'];
$query="select * from zy_spfenlei where id=$id";
$result=mysql_query($query);
$row = mysql_fetch_array($result);
?>
<form action="include/upspfenlei.php" method="post"  name="send" onSubmit="return Check()">
<div class="rightTop">
<table width="100%" height="51"style="border-collapse: collapse;" cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="14"><img src="images/btn/navle.png" /></td>
<td background="images/btn/navbg.png">
<img src="images/ico/2.gif"  style="vertical-align:middle;"/>&nbsp;修改商品分类</td>
<td width="15">
<img src="images/btn/navri.png" /></td>
</tr>
</table>
</div>
<div class="rightText">分类名称：<input name="name" class="cssInput" size="30" value="<?php  echo $row["name"];?>"><input type="hidden" name="id" value="<?php  echo $row["id"];?>" /></div>
<div class="rightBotton"><input type="submit" value="  " style="background-image:url(images/btn/eidt.png); border:none; margin-left:70px;"></div>
</form>
</div>
</div>
</div>
<?php include "bottom.php"?>
</BODY>
</HTML>
