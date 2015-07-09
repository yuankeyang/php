<?php
header("Content-type: text/html; charset=UTF-8");
session_start();
if(!isset($_SESSION['tea_id'])){
  exit("非法访问");
}
function is_ajax() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}
$user_id=$_SESSION['tea_id'];

if(isset($_POST["cnum"]) && !empty($_POST["cnum"])){
    $cnum=$_POST["cnum"];
}
include('../DB/conn.php');
$sql="select cs.`Sno`,cs.`Rgrade`,cs.`Mgrade`,cs.`Egrade` FROM cs WHERE Cno=".$cnum;
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
