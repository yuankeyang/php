<?php
session_start();
if(!isset($_SESSION['tea_id'])){
  exit("非法访问");
}
$user_id=$_SESSION['tea_id'];
include('../DB/conn.php');
$sql="select tc.`Tno`,tc.`Cno`,course.`Cname`,course.`Ccredit` ".
"FROM tc LEFT JOIN course ON tc.`Cno`=course.`Cno` WHERE tc.Tno='".$user_id."'";
$query_result=mysql_query($sql);
$row=array();
$n=0;
while($result_array=mysql_fetch_array($query_result)){
  $row[$n]=$result_array;
  $n++;
}
include('../DB/conn_close.php');
echo json_encode($row);
?>
