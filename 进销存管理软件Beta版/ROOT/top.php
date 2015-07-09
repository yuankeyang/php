<?php
//读取当前语言
$file=$_SERVER['DOCUMENT_ROOT']."/lang.tmp";
$result=trim(file_get_contents($file));
include($_SERVER['DOCUMENT_ROOT'].'/lang/'.$result.'.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>top</title>
</head>
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
	font:"宋体";
}

#table1 {
	width: 100%;
	border: 0px;
	height: 61;
	cellpadding: 0;
	cellspacing: 0;
	position:relative;
}

a {text-decoration:none; border:0px; font: normal 12px tahoma, arial, verdana, sans-serif;position:relative;}
a  img{text-decoration:none; border:0px; margin-bottom:5px;position:relative;}

#swIcon {margin-top:3px;cursor:pointer;position:relative;}

.center{width: 100%;height: 100%;background-repeat: no-repeat; filter:progid:dximagetransform.microsoft.alphaimageloader(src='images/con_bg.jpg', sizingmethod='scale');}
</style>
<body>
<div style="width: 100%; height: 85; margin:0px; padding:0px; border-bottom:3px solid #FFF;">
			<table id="#table1" width="100%" border="0" height="85"  bgcolor="#3C8DBC" cellpadding="0" cellspacing="0">
				<tr>
					<td width="74%" valign="middle" height="85">
                        <img  src="images/<?php echo $TEXT['logozi'];?>.png"/>
					</td>

					<td width="25%"align="right" valign="middle">
                     <div style="float: left;text-align: center; font-weight:bold; width: 24%;"id="swIcon" >
							<img src="images/bag/admin.png"/>
						<p style="margin-top:0px; font-size:14px; height:18px; color:#ffffff; filter:glow(color=#187bc8,strength=1); text-align: center;">
						[<?php echo $loginname; ?>]
                        </p>
						</div>
                     <div style="float: left; text-align: center; width: 25%;"id="swIcon">
							<a href="main.php"><img src="images/bag/<?php echo $TEXT['home-btn'];?>.png"alt="<?php echo $TEXT['alt-home'];?>"  style="margin-top:4px;"/></a>
						</div>
                       <div style="float: left; text-align: center; width: 25%;"id="swIcon">
							<a href="pass.php"><img src="images/bag/<?php echo $TEXT['shezhi-btn'];?>.png"alt="<?php echo $TEXT['alt-setting-password'];?>" style="margin-top:4px;"/></a>
						</div>
                          <div style="float: left; text-align: center; width: 25%;"
							id="swIcon">
							<A onClick="if (confirm('<?php echo $TEXT['alert-exit'];?>')) return true; else return false;" href="index.php"><img src="images/bag/<?php echo $TEXT['exit-btn'];?>.png"alt="退出" style="margin-top:4px;"/></a>
						</div>

					</td>
				</tr>
			</table>
		</div>
</body>
</html>
