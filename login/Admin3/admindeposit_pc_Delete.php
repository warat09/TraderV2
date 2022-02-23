<?php
session_start();
include('db_conn.php');



$DATEHR = $_GET['datehr'];
$EMAIL = $_GET['email'];
$MONEY = $_GET['money'];
$DATE = $_GET['date'];
$HM = $_GET['hm'];
$IMAGE = $_GET['image'];


$queryDelete = "DELETE FROM billing_information WHERE DATEANDHR='$DATEHR'AND EMAIL='$EMAIL' AND MONEY='$MONEY' AND DATE='$DATE' AND HM='$HM' AND IMAGE='$IMAGE'";
$queryInsert = "INSERT INTO oldbilling_information (DATEANDHR,EMAIL,MONEY,DATE,HM,IMAGE,STATUS) VALUES ('$DATEHR','$EMAIL','$MONEY','$DATE','$HM','$IMAGE','ไม่อนุมัติ')";
mysqli_query($conn,$queryDelete);
mysqli_query($conn,$queryInsert);

header("location: admindeposit.php");
?>