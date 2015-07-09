<?php
header("Content-type: text/html; charset=UTF-8");
session_start();
if(!isset($_SESSION['admin_id'])){
  exit("非法访问");
}
function is_ajax() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

//$user_id=$_SESSION['admin_id'];
if(isset($_POST["data"]) && !empty($_POST["data"])){
    $category=$_POST["data"];
}
include('../DB/conn.php');
$sql="select * from ".$category;
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
