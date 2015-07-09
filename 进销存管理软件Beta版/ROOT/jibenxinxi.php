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
<TITLE><?php echo $TEXT['title']; ?></TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<LINK rel=stylesheet type=text/css href="css/css.css">
<script language="javascript">  
function Check() 
{  
    if (document.send.mingcheng.value=="")  
    {  
        alert('<?php echo $TEXT['alert-empty-name'];?>');  
          
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
$query="select * from zy_jibenxinxi";
$result=mysql_query($query);
$row = mysql_fetch_array($result);
?>
<form action="include/jibenxinxi.php" method="post"  name="send" onSubmit="return Check()">
<div class="rightTop">
<table width="100%" height="51"style="border-collapse: collapse;" cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="14"><img src="images/btn/navle.png" /></td><td background="images/btn/navbg.png"><img src="images/ico/2.gif"  style="vertical-align:middle;"/>&nbsp;<?php echo $TEXT['company-information'];?></td><td width="15"><img src="images/btn/navri.png" /></td>
</tr>
</table>
</div>
<div class="rightText"><?php echo $TEXT['name'];?>：<input name="mingcheng" class="cssInput" size="50"value="<?php echo $row["mingcheng"]; ?>"></div>
<div class="rightText"><?php echo $TEXT['phone'];?>：<input name="tel" class="cssInput" size="50" value="<?php echo $row["tel"]; ?>"></div>
<div class="rightText"><?php echo $TEXT['email'];?>：<input name="email" class="cssInput" size="50" value="<?php echo $row["email"]; ?>"></div>
<div class="rightText"><?php echo $TEXT['website'];?>：<input name="url" class="cssInput" size="50" value="<?php echo $row["url"]; ?>"></div>
<div class="rightText"><?php echo $TEXT['address'];?>：<input name="dizhi" class="cssInput" size="50" value="<?php echo $row["dizhi"]; ?>"></div>
<div class="rightBotton"><input type="submit" value="  " style="background-image:url(images/btn/<?php echo $TEXT['btnbg'];?>.png); border:none;"></div>
</form>
</div>
</div>
</div>
<?php include "bottom.php"?>
</BODY>
</HTML>
