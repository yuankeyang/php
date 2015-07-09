<?php
session_start();
if(!isset($_SESSION['stu_id'])){
  exit("非法访问");
}
$user_id=$_SESSION['stu_id'];
include('../DB/conn.php');
$sql="select * from courseview where Sno='".$user_id."'";
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
