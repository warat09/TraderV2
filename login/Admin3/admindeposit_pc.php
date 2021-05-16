<?php
session_start();
include('db_conn.php');



$DATEHR = $_GET['datehr'];
$EMAIL = $_GET['email'];
$MONEY = $_GET['money'];
$DATE = $_GET['date'];
$HM = $_GET['hm'];
$IMAGE = $_GET['image'];


$emailuser = mysqli_real_escape_string($conn , $EMAIL);
    $sqluser =  "SELECT * FROM users WHERE EMAIL='$emailuser'";
    $resultuser = mysqli_query($conn, $sqluser);
    $resultsuser = mysqli_fetch_assoc($resultuser);
    $moneyuser = $resultsuser['MONEY'];

$moneyusers = $moneyuser+$MONEY;


$queryDelete = "DELETE FROM billing_information WHERE DATEANDHR='$DATEHR'AND EMAIL='$EMAIL' AND MONEY='$MONEY' AND DATE='$DATE' AND HM='$HM' AND IMAGE='$IMAGE'";
$queryInsert = "INSERT INTO oldbilling_information (DATEANDHR,EMAIL,MONEY,DATE,HM,IMAGE,STATUS) VALUES ('$DATEHR','$EMAIL','$MONEY','$DATE','$HM','$IMAGE','อนุมัติ')";
mysqli_query($conn,$queryDelete);
mysqli_query($conn,$queryInsert);



$sqlmoneyuser = "UPDATE users SET money='$moneyusers' WHERE EMAIL= '$EMAIL'";
$update = mysqli_query($conn, $sqlmoneyuser);

header("location: admindeposit.php");
?>