<?php
session_start();
include('db_conn.php');
$emailadmin = $_SESSION['email'];
$email = mysqli_real_escape_string($conn , $_SESSION['email']);
    $sql =  "SELECT * FROM admins WHERE EMAIL='$emailadmin'";
    $result = mysqli_query($conn, $sql);
    $results = mysqli_fetch_assoc($result);

$DATEHR = $_GET['datehr'];
$EMAIL = $_GET['email'];
$MONEY = $_GET['money'];
$DATE = $_GET['date'];
$HM = $_GET['hm'];
$IMAGE = $_GET['image'];

$moneyad = $results['money'];

$moneyadmin = $MONEY+$moneyad;



$queryDelete = "DELETE FROM billing_information WHERE DATEANDHR='$DATEHR'AND EMAIL='$EMAIL' AND MONEY='$MONEY' AND DATE='$DATE' AND HM='$HM' AND IMAGE='$IMAGE'";
$queryInsert = "INSERT INTO oldbilling_information (DATEANDHR,EMAIL,MONEY,DATE,HM,IMAGE) VALUES ('$DATEHR','$EMAIL','$MONEY','$DATE','$HM','$IMAGE')";
mysqli_query($conn,$queryDelete);
mysqli_query($conn,$queryInsert);

$sqlmoney = "UPDATE admins SET money='$moneyadmin' WHERE EMAIL= '$email'";
$update = mysqli_query($conn, $sqlmoney);

header("location: admindeposit.php");
?>