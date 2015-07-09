<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<?php
session_start();
unset($_SESSION['zy_admin_id']);
unset($_SESSION['zy_admin_loginname']);
$file='lang.tmp';//存储当前的语言
if(isset($_GET['lang'])){
	$lang=trim($_GET['lang']);
	$fp=fopen($file,'w');
	fwrite($fp,$lang);
	fclose($fp);
}

if(!file_exists($file)){
	$fp=fopen($file,'w') or die("不能创建本地文件");
	fwrite($fp,'zh_CN');
	fclose($fp);
	
}
$result=trim(file_get_contents($file));

if($result==""){
	file_put_contents($file,'zh_CN');
}
$language1=trim(file_get_contents($file));//语言
$language2="en_US";
if($language1=="en_US"){
	$language2="zh_CN";
}

include('lang/'.$language1.'.php');

?>
<TITLE><?php echo $TEXT['title']; ?></TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<meta http-equiv="cache-control" content="no-cache">

<style type="text/css">
body {
	font-size: 12px;
	PADDING-RIGHT : 0px;
	PADDING-LEFT: 0px;
	PADDING-BOTTOM: 0px;
	PADDING-TOP: 0px;
	PADDING-RIGHT: 0px;
    margin:0px;
	width:100%;
	height:auto;
	position:relative;
	background-color:#3c7fb4;
}
.inp{ border:none;position:relative; background:url(images/inputbg.jpg); height:30px; width:143px; line-height:30px;text-indent:6px;}
.btn{ border:none;position:relative; background:url(images/<?php echo $TEXT['dl-btn']?>.jpg); height:25px; width:64px; line-height:30px;}
</style>
<script language="javascript">
function Check()
{
    if (document.send.loginname.value=="")
    {
        alert('<?php echo $TEXT['alert-empty-username'];?>');

        return false;
    }

    if (document.send.loginpass.value=="")
    {
        alert('<?php echo $TEXT['alert-empty-password'];?>');

        return false;
    }

    return true;
}

//改变语言

function changeLang(v){
	if(v=='en_US'){
		location.replace('<?php $_SERVER['HTTP_HOST']?>?lang=en_US');
	}else {
	location.replace('<?php $_SERVER['HTTP_HOST']?>?lang=zh_CN');
	}
}
</script>
</head>
<body>
<select onChange="changeLang(this.value)" style="float:left;z-index:100;margin:20px 50px;">
<option value="<?php echo $language1;?>" selected="selected"><?php echo $language1;?></option>
<option value="<?php echo $language2;?>"><?php echo $language2;?></option>
</select>
<div align="center">
<div style="width:1000px; height:620px; background:url(images/bgSale.jpg);">
<form action="include/login.php" method="post" name="send" onSubmit="return Check()">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
<tr height="210px">
<td width="44%" >
</td>
<td width="56%"></td>
</tr>
<tr height="60px">
<td colspan="2" align="center" valign="middle"><img  src="images/<?php echo $TEXT['salelogo']?>.png"/></td>
</tr>
<tr height="60px">
<td></td>
<td></td>
</tr>
<tr height="45px">
<td align="right"><?php echo $TEXT['username'];?>：</td>
<td align="left"><input class="inp" id="loginname" name="loginname" type="text"/></td>
</tr>
<tr height="45px">
<td align="right"><?php echo $TEXT['password']?>：</td>
<td align="left"><input class="inp" Id="loginpass" name="loginpass" type="password"/></td>
</tr>
<tr height="60px">
<td colspan="2" align="center"><input  class="btn" id="tijiao" type="submit" value="       " /></td>
</tr>
<tr height="140px">
<td colspan="2"><div style="height:30px; line-height:30px;" align="center"><font style="color:#ffffff; letter-spacing:2px; font-weight:bold;">
<?php echo $TEXT['copyright']; ?>
</font>
</div></td>
</tr>
</table>
</form>
</div>
</div>
</body>
</html>
