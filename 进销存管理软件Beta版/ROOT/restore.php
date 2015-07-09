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
<TITLE><?php echo $TEXT['title'];?></TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<LINK rel=stylesheet type=text/css href="css/css.css">
<script language="javascript">  
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
<div class="rightTop">
<table width="100%" height="51"style="border-collapse: collapse;" cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="14"><img src="images/btn/navle.png" /></td><td background="images/btn/navbg.png"><img src="images/ico/2.gif"  style="vertical-align:middle;"/>&nbsp;<?php echo $TEXT['data-reduction'];?></td><td width="15"><img src="images/btn/navri.png" /></td>
</tr>
</table>
</div>
<div class="rightCont">
<table align="center" style=" text-align:center; margin-top:0px; border-collapse:collapse; background:#fff;" cellpadding="0" cellspacing="0" border="1" bordercolor="#2297d1">
<tr height="40px" bgcolor="#2FA5E0" style="font-size:14px;">
<td width="150px;"><?php echo $TEXT['number']?></td>
<td width="300px;"><?php echo $TEXT['data-name'];?></td>
<td width="150px;"><?php echo $TEXT['opt'];?></td></tr>
<?php
$dir = 'backup/'; 
if(is_dir($dir))
{  
  if( $dir_handle = opendir($dir) )  
  {
	  $i=0;
	 while (false !== ( $file_name = readdir($dir_handle)) ) 
	 {
		
		if($file_name=='.' or $file_name =='..')
		{
			continue;
		} 
		else
		{
			 $i=$i+1;
?>
<tr height="40px;">
<td width="150px;"><?php  echo $i ?></td>
<td width="300px;"><?php  echo $file_name ?></td>
<td width="150px;"><a href="include/restore.php?file=<?php  echo $file_name ?>" onClick="if (confirm('<?php echo $TEXT['alert-data-recover'];?>')) return true; else return false;"><?php echo $TEXT['restore'];?></a></td>
</tr>
<?php
		     
	    }
     }
  }
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
