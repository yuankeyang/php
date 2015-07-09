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
function Check() 
{  
    if (document.send.title.value=="")  
    {  
        alert('<?php echo $TEXT['alert-empty-backup'];?>');  
          
        return false; 
    }  	
    return true; 
}  

function c()
{
document.getElementById("c01").className = "active02";    
document.getElementById("c02").className = "active02";
document.getElementById("c03").className = "active02";    
document.getElementById("c04").className = "active02";    
document.getElementById("c05").className = "active01";  
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
<form action="include/backup.php" method="post"  name="send" onSubmit="return Check()">
<div class="rightTop">
<table width="100%" height="51"style="border-collapse: collapse;" cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="14"><img src="images/btn/navle.png" /></td>
<td background="images/btn/navbg.png">
<img src="images/ico/2.gif"  style="vertical-align:middle;"/>&nbsp;<?php echo $TEXT['data-backup'];?></td>
<td width="15">
<img src="images/btn/navri.png" /></td>
</tr>
</table>
</div>
<div class="rightText"><?php echo $TEXT['backup-name'];?>：<input name="title" class="cssInput" value="<?php  echo date('Y-m-j') ;?>.sql" /></div>
<div class="rightBotton"><input type="submit" value="   " style="background-image:url(images/btn/<?php echo $TEXT['beifen-btn'];?>.png); border:none; margin-left:80px;" /></div>
</form>
</div>
</div>
</div>
<?php include "bottom.php"?>
</BODY>
</HTML>
