<?php
//读取当前语言
$file=$_SERVER['DOCUMENT_ROOT']."/lang.tmp";
$result=trim(file_get_contents($file));
include($_SERVER['DOCUMENT_ROOT'].'/lang/'.$result.'.php');
?>
<?php
header('Content-Type: text/html; charset=utf-8'); 
include("../conn/conn.php");

$filename = $_REQUEST["file"];
$mysql_file="../backup/".$filename; //指定要恢复的MySQL备份文件路径,请自已修改此路径
restore($mysql_file); //执行MySQL恢复命令
function restore($fname)
 {
  if (file_exists($fname)) {
   $sql_value="";
   $cg=0;
   $sb=0;
   $sqls=file($fname);
   foreach($sqls as $sql)
   {
    $sql_value.=$sql;
   }
   $a=explode(";\r\n", $sql_value);  //根据";\r\n"条件对数据库中分条执行
   $total=count($a)-1;
   mysql_query("set names 'utf8'");
   for ($i=0;$i<$total;$i++)
   {
    mysql_query("set names 'utf8'");
    //执行命令
    if(mysql_query($a[$i]))
    {
     $cg+=1;
    }
    else
    {
     $sb+=1;
     $sb_command[$sb]=$a[$i];
    }
   }
   echo "<script language=\"JavaScript\">alert(\"".$TEXT['alert-data-recover-successful']."\");window.location.href='../restore.php';</script>";
  }else{
   echo "<script language=\"JavaScript\">alert(\"".$TEXT['data-backupfile-no-exit']."\");window.location.href='../restore.php';</script>";
  }
 }
?>
