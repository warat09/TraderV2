<?php
session_start();
include('db_conn.php');
$errors = array();
$noterrors = array();

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
 
 $investall = $resultsadmin1['money']+$resultsadmin2['money']+$resultsadmin3['money'];
 
 $resultsum = mysqli_query($conn, "SELECT SUM(MONEY) AS total FROM users"); 
 $row = mysqli_fetch_assoc($resultsum); 
 $sum = $row['total'];
 
 //count1
 $idport1 = "SELECT count(*) AS totalport1 FROM users WHERE INVESTMONEY >='100000'";
 $resultport1 = mysqli_query($conn,$idport1);
 $valuesport1 = mysqli_fetch_assoc($resultport1);
 $countport1 = $valuesport1['totalport1'];
 
 //count2
 $idport2 = "SELECT count(*) AS totalport2 FROM users WHERE INVESTMONEY >='10000'AND INVESTMONEY<'100000'";
 $resultport2 = mysqli_query($conn,$idport2);
 $valuesport2 = mysqli_fetch_assoc($resultport2);
 $countport2 = $valuesport2['totalport2'];
 
 //count3
 $idport3 = "SELECT count(*) AS totalport3 FROM users WHERE INVESTMONEY >='1000'AND INVESTMONEY<'10000'";
 $resultport3 = mysqli_query($conn,$idport3);
 $valuesport3 = mysqli_fetch_assoc($resultport3);
 $countport3 = $valuesport3['totalport3'];
 
 //ผลรวมลงทุนport1
 $sumport1 = "SELECT SUM(INVESTMONEY) AS sumport1 FROM users WHERE INVESTMONEY >='100000'";
 $resultsumport1 = mysqli_query($conn,$sumport1);
 $valuesSumport1 = mysqli_fetch_assoc($resultsumport1);
 $countsumport1 = $valuesSumport1['sumport1'];
 
 //ผลรวมลงทุนport2
 $sumport2 = "SELECT SUM(INVESTMONEY) AS sumport2 FROM users WHERE INVESTMONEY >='10000'AND INVESTMONEY<'100000'";
 $resultsumport2 = mysqli_query($conn,$sumport2);
 $valuesSumport2 = mysqli_fetch_assoc($resultsumport2);
 $countsumport2 = $valuesSumport2['sumport2'];
 
 //ผลรวมลงทุนport3
 $sumport3 = "SELECT SUM(INVESTMONEY) AS sumport3 FROM users WHERE INVESTMONEY >='1000'AND INVESTMONEY<'10000'";
 $resultsumport3 = mysqli_query($conn,$sumport3);
 $valuesSumport3 = mysqli_fetch_assoc($resultsumport3);
 $countsumport3 = $valuesSumport3['sumport3'];
 
 
 //กำไรต่ำสุดport1
 $lossport001 = "SELECT SUM(INVESTMONEY*0.01) AS lossport001 FROM users WHERE INVESTMONEY >='100000'";
 $resultlossport001 = mysqli_query($conn,$lossport001);
 $valuesLossport001 = mysqli_fetch_assoc($resultlossport001);
 $countlossport001 = $valuesLossport001['lossport001'];
 
 //กำไรสูงสุดสุดport1
 $profitport1009 = "SELECT SUM(INVESTMONEY*0.09) AS profitport1009 FROM users WHERE INVESTMONEY >='100000'";
 $resultprofitport1009 = mysqli_query($conn,$profitport1009);
 $valuesprofitport1009 = mysqli_fetch_assoc($resultprofitport1009);
 $countprofitport1009 = $valuesprofitport1009['profitport1009'];
 
 
 
 
 //กำไรต่ำสุดport2
 $lossport002 = "SELECT SUM(INVESTMONEY*0.01) AS lossport002 FROM users WHERE INVESTMONEY >='10000'AND INVESTMONEY<'100000'";
 $resultlossport002 = mysqli_query($conn,$lossport002);
 $valuesLossport002 = mysqli_fetch_assoc($resultlossport002);
 $countlossport002 = $valuesLossport002['lossport002'];
 
 //กำไรสูงสุดสุดport2
 $profitport2009 = "SELECT SUM(INVESTMONEY*0.09) AS profitport2009 FROM users WHERE INVESTMONEY >='10000'AND INVESTMONEY<'100000'";
 $resultprofitport2009 = mysqli_query($conn,$profitport2009);
 $valuesprofitport2009 = mysqli_fetch_assoc($resultprofitport2009);
 $countprofitport2009 = $valuesprofitport2009['profitport2009'];
 
 
 
 //กำไรต่ำสุดport3
 $lossport003 = "SELECT SUM(INVESTMONEY*0.01) AS lossport003 FROM users WHERE INVESTMONEY >='1000'AND INVESTMONEY<'10000'";
 $resultlossport003 = mysqli_query($conn,$lossport003);
 $valuesLossport003 = mysqli_fetch_assoc($resultlossport003);
 $countlossport003 = $valuesLossport003['lossport003'];
 
 //กำไรสูงสุดสุดport3
 $profitport3009 = "SELECT SUM(INVESTMONEY*0.09) AS profitport3009 FROM users WHERE INVESTMONEY >='1000'AND INVESTMONEY<'10000'";
 $resultprofitport3009 = mysqli_query($conn,$profitport3009);
 $valuesprofitport3009 = mysqli_fetch_assoc($resultprofitport3009);
 $countprofitport3009 = $valuesprofitport3009['profitport3009'];
 
 
 
 //Lossport1
 $lossport1 = "SELECT SUM(INVESTMONEY*0.02) AS lossport1 FROM users WHERE INVESTMONEY >='100000'";
 $resultlossport1 = mysqli_query($conn,$lossport1);
 $valuesLossport1 = mysqli_fetch_assoc($resultlossport1);
 $countlossport1 = $valuesLossport1['lossport1'];
 
 //Lossport2
 $lossport2 = "SELECT SUM(INVESTMONEY*0.02) AS lossport2 FROM users WHERE INVESTMONEY >='10000'AND INVESTMONEY<'100000'";
 $resultlossport2 = mysqli_query($conn,$lossport2);
 $valuesLossport2 = mysqli_fetch_assoc($resultlossport2);
 $countlossport2 = $valuesLossport2['lossport2'];
 
 //Lossport3
 $lossport3 = "SELECT SUM(INVESTMONEY*0.02) AS lossport3 FROM users WHERE INVESTMONEY >='1000'AND INVESTMONEY<'10000'";
 $resultlossport3 = mysqli_query($conn,$lossport3);
 $valuesLossport3 = mysqli_fetch_assoc($resultlossport3);
 $countlossport3 = $valuesLossport3['lossport3'];



if(isset($_POST['submitprofit'])){
$inputprofit = $_POST['profit'];

if($_SESSION['email']==$emailadmin1){
    if($_POST['password'] != $resultsadmin1['password']){
        array_push($errors, "รหัสผ่านแอดมินผิด");
        $_SESSION['error'] = "รหัสผ่านแอดมินผิด";
        header('location: adminprofile.php');
   
    }
    else{
        $suminvest1 = $countsumport1;
        $adminprofit = $resultsadmin1['money']+$inputprofit;

        mysqli_query($conn, "UPDATE admins SET money=money+'$inputprofit' WHERE email = '$emailadmin1'");

    
       
        for($i = 0.09;$i>0;$i-=0.01){
            $sumprofit = "SELECT SUM(INVESTMONEY*$i) AS sumprofit FROM users WHERE INVESTMONEY >='100000'";
            $resultsumprofit = mysqli_query($conn,$sumprofit);
            $valuesSumprofit = mysqli_fetch_assoc($resultsumprofit);
            $countsumprofit = $valuesSumprofit['sumprofit'];
            if(($adminprofit)>=($countsumprofit+$suminvest1)){
                $sqlmoneyuser = "UPDATE users SET MONEY=INVESTMONEY+MONEY+(INVESTMONEY*$i),INVESTMONEY=0 WHERE INVESTMONEY >= '100000'";
                $update = mysqli_query($conn, $sqlmoneyuser);
                mysqli_query($conn, "UPDATE admins SET money=money-('$suminvest1'+'$countsumprofit') WHERE email = '$emailadmin1'");
                //แอดมิน-=$suminvest+$countsumprofit
                break;

            }
            
        }
        mysqli_query($conn, "UPDATE users SET MONEY=INVESTMONEY+MONEY,INVESTMONEY=0 WHERE INVESTMONEY >='100000'");
        array_push($noterrors, "ทำรายการเรียบร้อย");
        $_SESSION['noterror'] = "ทำรายการเรียบร้อย";
        header('location: adminprofile.php');

    }
    
}
else if($_SESSION['email']==$emailadmin2){
    if($_POST['password'] != $resultsadmin2['password']){
        array_push($errors, "รหัสผ่านแอดมินผิด");
        $_SESSION['error'] = "รหัสผ่านแอดมินผิด";
        header('location: adminprofile.php');
     
    }
    else{
        $suminvest2 = $countsumport2;
        $adminprofit = $resultsadmin2['money']+$inputprofit;

        mysqli_query($conn, "UPDATE admins SET money=money+'$inputprofit' WHERE email = '$emailadmin2'");

    
       
        for($i = 0.09;$i>0;$i-=0.01){
            $sumprofit = "SELECT SUM(INVESTMONEY*$i) AS sumprofit FROM users WHERE INVESTMONEY >='10000' AND INVESTMONEY <'100000'";
            $resultsumprofit = mysqli_query($conn,$sumprofit);
            $valuesSumprofit = mysqli_fetch_assoc($resultsumprofit);
            $countsumprofit = $valuesSumprofit['sumprofit'];
            if(($adminprofit)>=($countsumprofit+$suminvest2)){
                $sqlmoneyuser = "UPDATE users SET MONEY=INVESTMONEY+MONEY+(INVESTMONEY*$i),INVESTMONEY=0 WHERE INVESTMONEY >='10000' AND INVESTMONEY <'100000'";
                $update = mysqli_query($conn, $sqlmoneyuser);
                mysqli_query($conn, "UPDATE admins SET money=money-('$suminvest2'+'$countsumprofit') WHERE email = '$emailadmin2'");
                //แอดมิน-=$suminvest+$countsumprofit
                break;
            }
        }
        mysqli_query($conn, "UPDATE users SET MONEY=INVESTMONEY+MONEY,INVESTMONEY=0 WHERE INVESTMONEY >='10000' AND INVESTMONEY <'100000'");
        array_push($noterrors, "ทำรายการเรียบร้อย");
        $_SESSION['noterror'] = "ทำรายการเรียบร้อย";
        header('location: adminprofile.php');
    }
}
else if($_SESSION['email']==$emailadmin3){
    if($_POST['password'] != $resultsadmin3['password']){
        array_push($errors, "รหัสผ่านแอดมินผิด");
        $_SESSION['error'] = "รหัสผ่านแอดมินผิด";
        header('location: adminprofile.php');
      
    }
    else{
        $suminvest3 = $countsumport3;
        $adminprofit = $resultsadmin3['money']+$inputprofit;

        mysqli_query($conn, "UPDATE admins SET money=money+'$inputprofit' WHERE email = '$emailadmin3'");

    
       
        for($i = 0.09;$i>0;$i-=0.01){
            $sumprofit = "SELECT SUM(INVESTMONEY*$i) AS sumprofit FROM users WHERE INVESTMONEY >='1000' AND INVESTMONEY <'10000'";
            $resultsumprofit = mysqli_query($conn,$sumprofit);
            $valuesSumprofit = mysqli_fetch_assoc($resultsumprofit);
            $countsumprofit = $valuesSumprofit['sumprofit'];
            if(($adminprofit)>=($countsumprofit+$suminvest3)){
                $sqlmoneyuser = "UPDATE users SET MONEY=INVESTMONEY+MONEY+(INVESTMONEY*$i),INVESTMONEY=0 WHERE INVESTMONEY >='1000' AND INVESTMONEY <'10000'";
                $update = mysqli_query($conn, $sqlmoneyuser);
                mysqli_query($conn, "UPDATE admins SET money=money-('$suminvest3'+'$countsumprofit') WHERE email = '$emailadmin3'");
                //แอดมิน-=$suminvest+$countsumprofit
                break;
            }
        }
        mysqli_query($conn, "UPDATE users SET MONEY=INVESTMONEY+MONEY,INVESTMONEY=0 WHERE INVESTMONEY >='1000' AND INVESTMONEY <'10000'");
        array_push($noterrors, "ทำรายการเรียบร้อย");
        $_SESSION['noterror'] = "ทำรายการเรียบร้อย";
        header('location: adminprofile.php');
    }

}

}
else if(isset($_POST['submitloss'])){
$inputprofit = $_POST['profit'];
if($_SESSION['email']==$emailadmin1){
    if($_POST['password'] != $resultsadmin1['password']){
        array_push($errors, "รหัสผ่านแอดมินผิด");
        $_SESSION['error'] = "รหัสผ่านแอดมินผิด";
        header('location: adminprofile.php');
     
    }
    else{
        echo $_SESSION['email'];
        echo $countlossport1;
        echo $countsumport1;
        mysqli_query($conn, "UPDATE admins SET money=money-$countsumport1 WHERE email = '$emailadmin1'");
        $sqlmoneylossuser = "UPDATE users SET MONEY=MONEY+(INVESTMONEY-(INVESTMONEY*0.02)),INVESTMONEY=0 WHERE INVESTMONEY >='100000'";
        $updateloss = mysqli_query($conn, $sqlmoneylossuser);
        array_push($noterrors, "ทำรายการเรียบร้อย");
        $_SESSION['noterror'] = "ทำรายการเรียบร้อย";
        header('location: adminprofile.php');
      
    }
    
}
else if($_SESSION['email']==$emailadmin2){
    if($_POST['password'] != $resultsadmin2['password']){
        array_push($errors, "รหัสผ่านแอดมินผิด");
        $_SESSION['error'] = "รหัสผ่านแอดมินผิด";
        header('location: adminprofile.php');
     
    }
    else{
    mysqli_query($conn, "UPDATE admins SET money=money-$countsumport2 WHERE email = '$emailadmin2'");
   $sqlmoneylossuser2 = "UPDATE users SET MONEY=MONEY+(INVESTMONEY-(INVESTMONEY*0.02)),INVESTMONEY=0 WHERE INVESTMONEY >='10000'AND INVESTMONEY<'100000'";
    $updateloss2 = mysqli_query($conn, $sqlmoneylossuser2);
    array_push($noterrors, "ทำรายการเรียบร้อย");
    $_SESSION['noterror'] = "ทำรายการเรียบร้อย";
    header('location: adminprofile.php');
 
    }
}
else if($_SESSION['email']==$emailadmin3){
    if($_POST['password'] != $resultsadmin3['password']){
        array_push($errors, "รหัสผ่านแอดมินผิด");
        $_SESSION['error'] = "รหัสผ่านแอดมินผิด";
        header('location: adminprofile.php');
     
    }
    else{
    mysqli_query($conn, "UPDATE admins SET money=money-$countsumport3 WHERE email = '$emailadmin3'");
   $sqlmoneylossuser3 = "UPDATE users SET MONEY=MONEY+(INVESTMONEY-(INVESTMONEY*0.02)),INVESTMONEY=0 WHERE INVESTMONEY >='1000'AND INVESTMONEY<'10000'";
    $updateloss3 = mysqli_query($conn, $sqlmoneylossuser3);
    array_push($noterrors, "ทำรายการเรียบร้อย");
    $_SESSION['noterror'] = "ทำรายการเรียบร้อย";
    header('location: adminprofile.php');
   
    }
}
}
else if(isset($_POST['submitstatus'])){
    $sessionstatusbot = $_POST['statusbot'];
    if(empty($_POST['statusbot'])){
        array_push($errors, "กรุณาเลือกสถานะบอท");
        $_SESSION['error'] = "กรุณาเลือกสถานะบอท";
        header('location: adminprofile.php');
    }
    else if($_SESSION['email']==$emailadmin1){
        mysqli_query($conn, "UPDATE admins SET STATUSBOT='$sessionstatusbot' WHERE email = '$emailadmin1'");
        array_push($noterrors, "อัพสถานะบอทพอรต์ 1 เรียบร้อย");
        $_SESSION['noterror'] = "อัพสถานะบอทพอรต์ 1 เรียบร้อย";
        header('location: adminprofile.php');
    }
    else if($_SESSION['email']==$emailadmin2){
        mysqli_query($conn, "UPDATE admins SET STATUSBOT='$sessionstatusbot' WHERE email = '$emailadmin2'");
        array_push($noterrors, "อัพสถานะบอทพอรต์ 2 เรียบร้อย");
        $_SESSION['noterror'] = "อัพสถานะบอทพอรต์ 2 เรียบร้อย";
        header('location: adminprofile.php');
    }
    else if($_SESSION['email']==$emailadmin3){
        mysqli_query($conn, "UPDATE admins SET STATUSBOT='$sessionstatusbot' WHERE email = '$emailadmin3'");
        array_push($noterrors, "อัพสถานะบอทพอรต์ 3 เรียบร้อย");
        $_SESSION['noterror'] = "อัพสถานะบอทพอรต์ 3 เรียบร้อย";
        header('location: adminprofile.php');
    }
}
else if(isset($_POST['submityoutube'])){
$youtube = $_POST['tokenyoutube'];
if(empty($youtube)){
    array_push($errors, "กรุณากรอกโทเคน youtube");
    $_SESSION['error'] = "กรุณากรอกโทเคน youtube";
    header('location: adminprofile.php');
}
else if($_SESSION['email']==$emailadmin1){
    mysqli_query($conn, "UPDATE admins SET YOUTUBE='$youtube' WHERE email = '$emailadmin1'");
    array_push($noterrors, "อัพเดทโทเคนพอรต์ 1 เรียบร้อย");
    $_SESSION['noterror'] = "อัพเดทโทเคนพอรต์ 1 เรียบร้อย";
    header('location: adminprofile.php');
}
else if($_SESSION['email']==$emailadmin2){
    mysqli_query($conn, "UPDATE admins SET YOUTUBE='$youtube' WHERE email = '$emailadmin2'");
    array_push($noterrors, "อัพเดทโทเคนพอรต์ 2 เรียบร้อย");
    $_SESSION['noterror'] = "อัพเดทโทเคนพอรต์ 2 เรียบร้อย";
    header('location: adminprofile.php');
}
else if($_SESSION['email']==$emailadmin3){
    mysqli_query($conn, "UPDATE admins SET YOUTUBE='$youtube' WHERE email = '$emailadmin3'");
    array_push($noterrors, "อัพเดทโทเคนพอรต์ 3 เรียบร้อย");
    $_SESSION['noterror'] = "อัพเดทโทเคนพอรต์ 3 เรียบร้อย";
    header('location: adminprofile.php');
}
}
else if(isset($_POST['userall'])){
    header('location: adminprofile.php');
}
else if(isset($_POST['deposit'])){
    header('location: admindeposit.php');
}
else if(isset($_POST['withdrawn'])){
    header('location: adminwithdrawn.php');
}

?>