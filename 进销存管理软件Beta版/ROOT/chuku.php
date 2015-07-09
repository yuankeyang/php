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
<script language="JavaScript">   
var onecount;   
onecount=0;   
subcat = new Array();   
<?php   
$sqlXinxi = "select * from zy_spxinxi";   
$resultXinxi = mysql_query($sqlXinxi);   
$count = 0;   
while($rowXinxi = mysql_fetch_row($resultXinxi)){   
?>   
subcat[<?php echo $count?>] = new Array("<?php echo $rowXinxi[0]?>","<?php echo $rowXinxi[2]?>","<?php echo $rowXinxi[1]?>");   
<?php   
$count++;   
}   
echo "onecount=$count;";   
?>   
//联动函数   
function changelocation(locationid)   
{
	document.myform.spname.length = 0;   
    var locationidlocationid=locationid;   
    var i;   
    for (i=0;i < onecount; i++)   
    {
		if (subcat[i][2] == locationid)   
        { 
            document.myform.spname.options[document.myform.spname.length] = new Option(subcat[i][1],subcat[i][0]);
	    }   
    }   
} 
function Check() 
{       
	if (document.getElementsByName("spfenlei")[0].value=="0")  
    {  
        alert('<?php echo $TEXT['alert-select-shangpingfenlei'];?>');  
          
        return false; 
    } 
	if (document.myform.jiage.value=="")  
    {  
        alert('<?php echo $TEXT['alert-empty-jiage'];?>');  
          
        return false; 
    } 
	if (document.myform.shuliang.value=="")  
    {  
        alert('<?php echo $TEXT['alert-chuku-shuliang'];?>');  
          
        return false; 
    } 
	if (document.myform.date.value=="")  
    {  
        alert('<?php echo $TEXT['alert-empty-xiaoshouriqi'];?>');  
          
        return false; 
    } 
    return true; 
}  

function c()
{
document.getElementById("c01").className = "active02";    
document.getElementById("c02").className = "active02";
document.getElementById("c03").className = "active02";    
document.getElementById("c04").className = "active01";    
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
<form action="include/chuku.php" method="post" name="myform" onSubmit="return Check()">
<div class="rightTop">
<table width="100%" height="51"style="border-collapse: collapse;" cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="14"><img src="images/btn/navle.png" /></td>
<td background="images/btn/navbg.png">
<img src="images/ico/2.gif"  style="vertical-align:middle;"/>&nbsp;<?php echo $TEXT['commodity-out'];?></td>
<td width="15">
<img src="images/btn/navri.png" /></td>
</tr>
</table>
</div>
<div class="rightText">
<?php echo $TEXT['commodity-classification'];?>：<select name="spfenlei" class="cssInput" onChange="changelocation(document.myform.spfenlei.options[document.myform.spfenlei.selectedIndex].value)"> 
<option value="0"><?php echo $TEXT['please-select-shangpingfenlei'];?></option>    
<?php   
$sqlFenlei = "select * from zy_spfenlei";   
$resultFenlei = mysql_query($sqlFenlei);   
while($rowFenlei = mysql_fetch_row($resultFenlei)){   
?>   
<option value="<?php echo $rowFenlei[0]; ?>"><?php echo $rowFenlei[1]; ?></option>   
<?php 
} 
?>   
</select>
</div>
<div class="rightText"><?php echo $TEXT['commodity-name'];?>：<select name="spname" class="cssInput"></select></div>
<div class="rightText"><?php echo $TEXT['xiaoshou-jiage'];?>：<input name="jiage" class="cssInput"></div>
<div class="rightText"><?php echo $TEXT['chuku-shuliang'];?>：<input name="shuliang" class="cssInput"></div>
<div class="rightText"><?php echo $TEXT['xiaoshou-riqi'];?>：<input name="date"  class="cssInput" value="<?php echo date('Y-m-j');?>"></div>
<div class="rightBotton"><input type="submit" value="  " style="background-image:url(images/btn/<?php echo $TEXT['btnbg'];?>.png); border:none;"></div>
</form>
</div>
</div>
</div>
<?php include "bottom.php"?>
</BODY>
</HTML>
