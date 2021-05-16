<?php
session_start();
include('db_conn.php');

$DATEHR = $_GET['datehr'];
$EMAIL = $_GET['email'];
$BANK = $_GET['bank'];
$IDBANK = $_GET['idbank'];
$MONEY= $_GET['money'];



$queryDelete = "DELETE FROM withdrawn_information WHERE DATEANDHR='$DATEHR'AND EMAIL='$EMAIL' AND BANK='$BANK' AND IDBANK='$IDBANK' AND MONEY='$MONEY'";
$queryInsert = "INSERT INTO oldwithdrawn_information (DATEANDHR,EMAIL,BANK,IDBANK,MONEY,STATUS) VALUES ('$DATEHR','$EMAIL','$BANK','$IDBANK','$MONEY','ไม่อนุมัติ')";
mysqli_query($conn,$queryDelete);
mysqli_query($conn,$queryInsert);


header("location: adminwithdrawn.php");
?>