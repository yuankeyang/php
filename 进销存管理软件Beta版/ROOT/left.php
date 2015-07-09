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
</head>
<style type="text/css">
.panel {
	padding-top:0px; margin-top:0px; 
}
#body1 {
	PADDING-RIGHT: 15px; PADDING-LEFT: 15px;PADDING-BOTTOM: 15px;  WIDTH: 100%; height:850px; PADDING-TOP: 0px;
	background-repeat: repeat-y;

}
UL {
	PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP:0px; LIST-STYLE-TYPE: none
}
.div01{ margin-top:15px; width:95%;}
.span3{width:95%; }
.nav-collapse{ border:1px solid #f5f5f5; background:#FFF}

.active01{background-color:#2FA5E0; height:35px; line-height:35px; font-size:14px; color:#FFF;; }
.active01 a{height:35px; line-height:35px; font-size:14px; color:#FFF; margin-left:20px; font-weight:bold}

.active02{ height:35px; line-height:35px; font-size:14px; color:#FFF;;border-top:1px solid #f5f5f5; border-bottom:1px solid #f5f5f5;}
.active02 a{ height:35px; line-height:35px; font-size:14px; color:#2FA5E0; margin-left:20px; font-weight:bold}
.ilo a{ color: #999; font-size:12px; }
.ilo a:hover{ color:#666; font-size:14px; font-weight:bold;}
.m02d{ margin:0;padding:0;width:100%; list-style-type:none; }
.m02d li{height:45px; line-height:45px; margin-left:10px; margin-top:10px;}

.span01{ margin:0;padding:0; font-size:14px; font-weight:bold;}
.span01 img{margin-top:0px;vertical-align:middle;}

</style> 


<body class="panel" style="padding-bottom:0px; padding-top:0px;">
<div id="body1" style="width:100%;">
   <div class="div01" > 
                <div class="span3" id="sidebar"  >
                
                
                  <ul class="nav-collapse collapse">
                        <li id="c01" class="active01"><a href="#"><?php echo $TEXT['basic-information'];?></a></li>
                        <ul class="m02d">
                        <li class="ilo"><a href="jibenxinxi.php" id="f40"><span class="span01"> <img  src="images/ico/01.png"/> 
						&nbsp;<?php echo $TEXT['basic-information'];?></span></a></li>
                        <li class="ilo"><a href="addspfenlei.php" id="f40"><span class="span01"> <img  src="images/ico/14.png"/> 
						&nbsp;<?php echo $TEXT['add-commodity-category'];?></span></a></li>
                        <li class="ilo"><a href="adminspfenlei.php" id="f40"><span class="span01"> <img  src="images/ico/15.png"/> 
						&nbsp;<?php echo $TEXT['manage-commodity-category'];?></span></a></li>
                        <li class="ilo"><a href="addspxinxi.php" id="f40"><span class="span01"> <img  src="images/ico/16.png"/>
						&nbsp;<?php echo $TEXT['add-commodity-information'];?></span></a></li>
                        <li class="ilo"><a href="adminspxinxi.php" id="f40"><span class="span01"> <img  src="images/ico/13.png"/> 
						&nbsp;<?php echo $TEXT['manage-commodity-information'];?></span></a></li>
                        </ul>
                        
                        <li id="c02" class="active02"> <a href="#"> 
						<?php echo $TEXT['manage-stock'];?></a></li>
                        <ul class="m02d">
                        <li class="ilo">
                        <a href="ruku.php" id="f40"><span class="span01"> <img  src="images/ico/04.png"/>
						&nbsp;<?php echo $TEXT['commodity-in'];?></span></a></li>
                        <li class="ilo">
                        <a href="rukujilu.php" id="f40"><span class="span01"> <img  src="images/ico/19.png" /> 
						&nbsp;<?php echo $TEXT['in-records'];?></span></a></li>
                        </ul>
                        
                        <li id="c03" class="active02" > <a href="#">
						<?php echo $TEXT['manage-inventory'];?></a> </li>
                        <ul class="m02d">
                        <li class="ilo">
                        <a href="kucun.php" id="f40"><span class="span01"> <img  src="images/ico/17.png"/> 
						&nbsp;<?php echo $TEXT['commodity-inventory'];?></span></a></li>
                        </ul>
                        
                        <li id="c04" class="active02" > <a href="#">
						<?php echo $TEXT['sales-manage'];?></a> </li>
                        <ul class="m02d">
                        <li class="ilo">
                        <a href="chuku.php" id="f40"><span class="span01"> <img  src="images/ico/18.png"/>
						&nbsp;<?php echo $TEXT['commodity-out'];?></span></a></li>
                        <li class="ilo">
                        <a href="chukujilu.php" id="f40"><span class="span01"> <img  src="images/ico/09.png"/> 
						&nbsp;<?php echo $TEXT['out-records'];?></span></a></li>
                        </ul>
                        
                        <li id="c05" class="active02" ><a href="#"> 
						<?php echo $TEXT['manage-data'];?></a></li>
                        <ul class="m02d">
                        <li class="ilo"><a href="backup.php" id="f40">
                        <span class="span01"> <img  src="images/ico/06.png"/> 
						&nbsp;<?php echo $TEXT['data-backup'];?></span></a></li>
                        <li class="ilo"><a href="restore.php" id="f40">
                        <span class="span01"> <img  src="images/ico/07.png"/> 
						&nbsp;<?php echo $TEXT['data-reduction'];?></span></a></li>
                        </ul>
                      
                    </ul>  
  </div>
</div> 
</div>
</body>
</html>