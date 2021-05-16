<?php
session_start();
include('db_conn.php');



$DATEHR = $_GET['datehr'];
$EMAIL = $_GET['email'];
$BANK = $_GET['bank'];
$IDBANK = $_GET['idbank'];
$MONEY= $_GET['money'];


$emailuser = mysqli_real_escape_string($conn , $EMAIL);
$sqluser =  "SELECT * FROM users WHERE EMAIL='$emailuser'";
$resultuser = mysqli_query($conn, $sqluser);
$resultsuser = mysqli_fetch_assoc($resultuser);
$moneyuser = $resultsuser['MONEY'];
$updateusermoney = $moneyuser-$MONEY;

$queryDelete = "DELETE FROM withdrawn_information WHERE DATEANDHR='$DATEHR'AND EMAIL='$EMAIL' AND BANK='$BANK' AND IDBANK='$IDBANK' AND MONEY='$MONEY'";
$queryInsert = "INSERT INTO oldwithdrawn_information (DATEANDHR,EMAIL,BANK,IDBANK,MONEY,STATUS) VALUES ('$DATEHR','$EMAIL','$BANK','$IDBANK','$MONEY','อนุมัติ')";
mysqli_query($conn,$queryDelete);
mysqli_query($conn,$queryInsert);


$sqlusermoney = "UPDATE users SET MONEY='$updateusermoney' WHERE EMAIL= '$emailuser'";
$update = mysqli_query($conn, $sqlusermoney);

header("location: adminwithdrawn.php");
?>