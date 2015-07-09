<?php
//¶ÁÈ¡µ±Ç°ÓïÑÔ
$file=$_SERVER['DOCUMENT_ROOT']."\lang.tmp";
$result=trim(file_get_contents($file));
include($_SERVER['DOCUMENT_ROOT'].'\lang\\'.$result.'.php');
?>
<?php

$linkData=@mysql_connect("localhost","root","xianggen");

mysql_query("SET NAMES 'utf8'");

if(!$linkData)
{
   echo $TEXT['database-connect-error'];
}

$link=@mysql_select_db("zysale");

if(!$link)
{
   echo $TEXT['not-found-database'];
}

?>