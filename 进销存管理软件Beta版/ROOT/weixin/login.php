<?php
//读取当前语言
$file=$_SERVER['DOCUMENT_ROOT']."\lang.tmp";
$result=trim(file_get_contents($file));
include($_SERVER['DOCUMENT_ROOT'].'\lang\\'.$result.'.php');
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $TEXT['title'];?></title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta content="application/xhtml+xml; charset=UTF-8" http-equiv="Content-Type">
<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
<meta content="no-cache" http-equiv="pragma">
<meta content="0" http-equiv="expires">
<link rel="stylesheet" type="text/css" href="css/css.css" />
<script language="javascript">  
function Check() 
{  
    if (document.send.loginname.value=="")  
    {  
        alert('<?php echo $TEXT['alert-empty-account'];?>');  
          
        return false; 
    }   
	if (document.send.loginpass.value=="")  
    {  
        alert('<?php echo $TEXT['alert-empty-password'];?>');  
          
        return false; 
    } 
    return true; 
}  
</script>
</head>
<body>
<?php 
setcookie('admin_id',"",time()-86400);
setcookie('loginname',"",time()-86400);
?>
<div class="top"><?php echo $TEXT['title'];?></div>
<div class="cont">
<form action="php_login.php" method="post" name="send" onSubmit="return Check()">
<div class="login">
<div class="login_list"><?php echo $TEXT['account'];?>：<input name="loginname"></div>
<div class="login_list"><?php echo $TEXT['password'];?>：<input name="loginpass"></div>
<div class="login_botton"><input type="submit" value="<?php echo $TEXT['login'];?>"></div>
</div>
</form>
</div>
<div class="bottom"><?php echo $TEXT['copyright'];?></div>
</body>
</html>
