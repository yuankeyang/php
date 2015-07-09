<?php
//读取当前语言
$file=$_SERVER['DOCUMENT_ROOT']."/lang.tmp";
$result=trim(file_get_contents($file));
include($_SERVER['DOCUMENT_ROOT'].'/lang/'.$result.'.php');
?>
<?php
header('Content-Type: text/html; charset=utf-8'); 
include("../conn/conn.php");

mysql_query("set names 'utf8'");
$mysql= "set charset utf8;\r\n";  
$q1=mysql_query("show tables");
while($t=mysql_fetch_array($q1)){
    $table=$t[0];
    $q2=mysql_query("show create table `$table`");
    $sql=mysql_fetch_array($q2);
    $mysql.=$sql['Create Table'].";\r\n";
    $q3=mysql_query("select * from `$table`");
    while($data=mysql_fetch_assoc($q3)){
        $keys=array_keys($data);
        $keys=array_map('addslashes',$keys);
        $keys=join('`,`',$keys);
        $keys="`".$keys."`";
        $vals=array_values($data);
        $vals=array_map('addslashes',$vals);
        $vals=join("','",$vals);
        $vals="'".$vals."'";
        $mysql.="insert into `$table`($keys) values($vals);\r\n";
    }
}

$filename="../backup/".$_REQUEST['title']; 
$fp = fopen($filename,'w');
fputs($fp,$mysql);
fclose($fp);
echo "<script language=\"JavaScript\">alert(\"".$TEXT['alert-backup-successful']."\");window.location.href='../restore.php';</script>";
?>