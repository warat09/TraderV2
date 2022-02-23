<?php
session_start();
include('db_conn.php');

$errors = array();
$noterrors = array();

if(isset($_POST['submits'])){

    //id admin warat
$emailadmin1 = "beebacorporation@gmail.com";
$emailwarat = mysqli_real_escape_string($conn , $emailadmin1);
$sqladmin1 =  "SELECT * FROM admins WHERE EMAIL='$emailadmin1'";
$resultadmin1 = mysqli_query($conn, $sqladmin1);
$resultsadmin1 = mysqli_fetch_assoc($resultadmin1);

//id admin opal
$emailadmin2 = "afterlevisp@hotmail.com";
$emailopal = mysqli_real_escape_string($conn , $emailadmin2);
$sqladmin2 =  "SELECT * FROM admins WHERE EMAIL='$emailadmin2'";
$resultadmin2 = mysqli_query($conn, $sqladmin2);
$resultsadmin2 = mysqli_fetch_assoc($resultadmin2);

//id admin SiGz
$emailadmin3 = "mrsilent7797@gmail.com";
$emailsigz = mysqli_real_escape_string($conn , $emailadmin3);
$sqladmin3 =  "SELECT * FROM admins WHERE EMAIL='$emailadmin3'";
$resultadmin3 = mysqli_query($conn, $sqladmin3);
$resultsadmin3 = mysqli_fetch_assoc($resultadmin3);

$emailsession = $_SESSION['email'];

$emailuser = mysqli_real_escape_string($conn , $_SESSION['email']);
$sqluser =  "SELECT * FROM users WHERE EMAIL='$emailsession'";
$resultuser = mysqli_query($conn, $sqluser);
$resultsuser = mysqli_fetch_assoc($resultuser);

$inputmoney = $_POST['s'];
$email= $_SESSION['email'];
$money= $_SESSION['money'];

$moneyadmin1 = $resultsadmin1['money'];
$moneyadmin2 = $resultsadmin2['money'];
$moneyadmin3 = $resultsadmin3['money'];




date_default_timezone_set("Asia/Bangkok");
$realtime = date("h:i:sa");
$realdate = date("d/m/Y");

if(empty($inputmoney)){
    array_push($errors,"กรุณากรอกเงินลงทุน");
    $_SESSION['error'] = "กรุณากรอกเงินลงทุน";
    header("location: profile.php");
}

else if($inputmoney>$money){
    array_push($errors,"เงินในบัญชีไม่เพียงพอ");
    $_SESSION['error'] = "เงินในบัญชีไม่เพียงพอ";
    header("location: profile.php");
}
else if($inputmoney < 1000){
    array_push($errors,"ลงทุนขั้นต่ำ 1000 บาท");
    $_SESSION['error'] = "ลงทุนขั้นต่ำ 1000 บาท";
    header("location: profile.php");
}
else if($resultsuser['INVESTMONEY']!=0){
    array_push($errors,"คุณได้วางเงินลงทุนไว้แล้ว");
    $_SESSION['error'] = "คุณได้วางเงินลงทุนไว้แล้ว";
    header("location: profile.php");
}
else if($resultsuser['INVESTMONEY']==0){
$investmoney = $money-$inputmoney;
$addmoneyadmin1 = $moneyadmin1+$inputmoney;
$addmoneyadmin2 = $moneyadmin2+$inputmoney;
$addmoneyadmin3 = $moneyadmin3+$inputmoney;
    if($inputmoney>=100000){
        if($resultsadmin1['STATUSBOT']=='OFF'){
            array_push($errors,"สถานะพอรต์1 กำลังรันบอทหรือปิดใช้งาน");
            $_SESSION['error'] = "สถานะพอรต์1 กำลังรันบอทหรือปิดใช้งาน";
            header("location: profile.php");
        }
        else{
            $sqlusermoney = "UPDATE users SET MONEY='$investmoney',INVESTMONEY='$inputmoney',INVESTDATE='$realdate:$realtime' WHERE EMAIL= '$email'";
            $updateuser = mysqli_query($conn, $sqlusermoney);
    
            $sqlmoney = "UPDATE admins SET money='$addmoneyadmin1' WHERE EMAIL= '$emailwarat'";
            $updateadmin = mysqli_query($conn, $sqlmoney);
            array_push($noterrors,"ทำรายการลงทุนพอรต์1 เรียบร้อย");
            $_SESSION['noterror'] = "ทำรายการลงทุนพอรต์1 เรียบร้อย";
            header('location: profile.php');
        }

    }
    else if($inputmoney>=10000&&$inputmoney<100000){
        if($resultsadmin2['STATUSBOT']=='OFF'){
            array_push($errors,"สถานะพอรต์2 กำลังรันบอทหรือปิดใช้งาน");
            $_SESSION['error'] = "สถานะพอรต์2 กำลังรันบอทหรือปิดใช้งาน";
            header("location: profile.php");
        }
        else{
            $sqlusermoney = "UPDATE users SET MONEY='$investmoney',INVESTMONEY='$inputmoney',INVESTDATE='$realdate:$realtime' WHERE EMAIL= '$email'";
            $updateuser = mysqli_query($conn, $sqlusermoney);
    
            $sqlmoney = "UPDATE admins SET money='$addmoneyadmin2' WHERE EMAIL= '$emailopal'";
            $updateadmin = mysqli_query($conn, $sqlmoney);
            array_push($noterrors,"ทำรายการลงทุนพอรต์2 เรียบร้อย");
            $_SESSION['noterror'] = "ทำรายการลงทุนพอรต์2 เรียบร้อย";
            header('location: profile.php');
        }

    }
    else if($inputmoney>=1000&&$inputmoney<10000){
        if($resultsadmin3['STATUSBOT']=='OFF'){
            array_push($errors,"สถานะพอรต์3 กำลังรันบอทหรือปิดใช้งาน");
            $_SESSION['error'] = "สถานะพอรต์3 กำลังรันบอทหรือปิดใช้งาน";
            header("location: profile.php");
        }
        else{
            $sqlusermoney = "UPDATE users SET MONEY='$investmoney',INVESTMONEY='$inputmoney',INVESTDATE='$realdate:$realtime' WHERE EMAIL= '$email'";
            $updateuser = mysqli_query($conn, $sqlusermoney);
    
            $sqlmoney = "UPDATE admins SET money='$addmoneyadmin3' WHERE EMAIL= '$emailsigz'";
            $updateadmin = mysqli_query($conn, $sqlmoney);
            array_push($noterrors,"ทำรายการลงทุนพอรต์3 เรียบร้อย");
            $_SESSION['noterror'] = "ทำรายการลงทุนพอรต์3 เรียบร้อย";
            header('location: profile.php');
        }

    }

    
}

}
else if(isset($_POST['logout'])){
    session_destroy();
    unset($_SESSION['email']);
    header('location: ../login.php');
}

?>