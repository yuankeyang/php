﻿<?php
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
function Check() 
{
	if (document.getElementsByName("spfenlei")[0].value=="0")  
    {  
        alert('<?php echo $TEXT['alert-select-shangpingfenlei'];?>');  
          
        return false; 
    } 
    if (document.send.name.value=="")  
    {  
        alert('<?php echo $TEXT['alert-empty-shangpingmingcheng'];?>');  
          
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
<form action="include/addspxinxi.php" method="post"  name="send" onSubmit="return Check()">
<div class="rightTop">
<table width="100%" height="51"style="border-collapse: collapse;" cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="14"><img src="images/btn/navle.png" /></td>
<td background="images/btn/navbg.png">
<img src="images/ico/2.gif"  style="vertical-align:middle;"/>&nbsp;<?php echo $TEXT['add-commodity-information'];?></td>
<td width="15">
<img src="images/btn/navri.png" /></td>
</tr>
</table>
</div>
<div class="rightText"><?php echo $TEXT['commodity-classification'];?>：
<select name="spfenlei" class="cssInput">
<option value="0"><?php echo $TEXT['please-select-shangpingfenlei'];?></option>
<?php						
$sql="select * from zy_spfenlei order by id asc";
$result=mysql_query($sql);
while($rs=mysql_fetch_object($result)){
$id=$rs->id;
$name=$rs->name;                   
?>
<option value="<?php echo $id ;?>"><?php echo $name ;?></option>
<?php
}
?>
</select></div>
<div class="rightText"><?php echo $TEXT['commodity-name'];?>：<input name="name" size="30" class="cssInput"></div>
<div class="rightBotton"><input type="submit" value="  " style="background-image:url(images/btn/<?php echo $TEXT['btnbg'];?>.png); border:none; margin-left:50px;"></div>
</form>
</div>
</div>
</div>
<?php include "bottom.php"?>
</BODY>
</HTML>
