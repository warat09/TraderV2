<?php
session_start();
include('server.php');
$errors = array();
$noterrors = array();

$bank = mysqli_real_escape_string($conn, $_POST['bank']);
$idbank = mysqli_real_escape_string($conn,$_POST['idbank']);
$money = mysqli_real_escape_string($conn,$_POST['money']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$email_check = mysqli_real_escape_string($conn,$_SESSION['email']);

$sql =  "SELECT * FROM users WHERE EMAIL='$email_check'";
$result = mysqli_query($conn, $sql);
$results = mysqli_fetch_assoc($result);

$moneyuser = $results['MONEY'];


date_default_timezone_set("Asia/Bangkok");

$realtime = date("h:i:sa");
$realdate = date("d/m/Y");

if(isset($_POST['submit'])){
    if(empty($bank)){
        array_push($errors,"กรุณาเลือกธนาคาร");
        $_SESSION['error'] = "กรุณาเลือกธนาคาร";
        header("location: withdrawn.php");
    }
    else if(empty($idbank)){
        array_push($errors,"กรุณากรอกบัญชี");
        $_SESSION['error'] = "กรุณากรอกบัญชี";
        header("location: withdrawn.php");
    }
    else if(empty($money)){
        array_push($errors,"กรุณากรอกจำนวนเงิน");
        $_SESSION['error'] = "กรุณากรอกจำนวนเงิน";
        header("location: withdrawn.php");
    }
    else if(empty($password)){
        array_push($errors,"กรุณากรอกพาสเวิร์ด");
        $_SESSION['error'] = "กรุณากรอกพาสเวิร์ด";
        header("location: withdrawn.php");
    }
    else if($results['PASSWORD'] != $password){
        array_push($errors,"รหัสผ่านไม่ถูกต้อง");
        $_SESSION['error'] = "รหัสผ่านไม่ถูกต้อง";
        header("location: withdrawn.php");
    }
    else if($money>$moneyuser){
        array_push($errors,"เงินในบัญชีไม่เพียงพอ");
        $_SESSION['error'] = "เงินในบัญชีไม่เพียงพอ";
        header("location: withdrawn.php");
    }
    else{
        if(count($errors)==0){
            $sql2 = "INSERT INTO withdrawn_information (DATEANDHR,EMAIL,BANK,IDBANK,MONEY) VALUES ('$realdate||$realtime','$email_check','$bank','$idbank','$money')";
            mysqli_query($conn, $sql2);  
            array_push($noterrors,"ส่งเรียบร้อยแล้วเดียวทางระบบจะตรวจสอบอีกครั้ง");
            $_SESSION['noterror'] = "ส่งเรียบร้อยแล้วเดียวทางระบบจะตรวจสอบอีกครั้ง";
            header("location: withdrawn.php");
        }
    }
}
?>