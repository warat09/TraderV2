<?php
session_start();
include('db_conn.php');
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

$investmoney = $money-$inputmoney;

$addmoneyadmin1 = $moneyadmin1+$inputmoney;
$addmoneyadmin2 = $moneyadmin2+$inputmoney;
$addmoneyadmin3 = $moneyadmin3+$inputmoney;


date_default_timezone_set("Asia/Bangkok");

    $dates = date("Y/m/d");
    $realdate = date_create("$dates");

  
    $buttondate = date("d-m-Y");
    $objbuttondate = date_create("$buttondate");

    date_add($realdate,date_interval_create_from_date_string("3 days"));
    $date3= date_format($realdate,"d-m-Y");

    $datesql = $resultsuser['INVESTDATE'];
    $realdate3 = date_create("$datesql");

   
    $interval = date_diff($objbuttondate,$realdate3);

    $countday = $interval->format('%R%a');
    $countint = (int)$countday;


if($inputmoney>$money){
    echo "เงินไม่พอ";
}
else if($inputmoney < 1000){
    echo "ลงทุนขั้นต่ำ1000บาท";
}
else if($resultsuser['INVESTMONEY']==0){
    if($inputmoney>=100000){
        $sqlusermoney = "UPDATE users SET MONEY='$investmoney',INVESTMONEY='$inputmoney',INVESTDATE='$date3' WHERE EMAIL= '$email'";
        $updateuser = mysqli_query($conn, $sqlusermoney);

        $sqlmoney = "UPDATE admins SET money='$addmoneyadmin1' WHERE EMAIL= '$emailwarat'";
        $updateadmin = mysqli_query($conn, $sqlmoney);

    }
    else if($inputmoney>=1000&&$inputmoney<10000){
        $sqlusermoney = "UPDATE users SET MONEY='$investmoney',INVESTMONEY='$inputmoney',INVESTDATE='$date3' WHERE EMAIL= '$email'";
        $updateuser = mysqli_query($conn, $sqlusermoney);

        $sqlmoney = "UPDATE admins SET money='$addmoneyadmin3' WHERE EMAIL= '$emailsigz'";
        $updateadmin = mysqli_query($conn, $sqlmoney);

    }
    else if($inputmoney>=10000&&$inputmoney<100000){
        $sqlusermoney = "UPDATE users SET MONEY='$investmoney',INVESTMONEY='$inputmoney',INVESTDATE='$date3' WHERE EMAIL= '$email'";
        $updateuser = mysqli_query($conn, $sqlusermoney);

        $sqlmoney = "UPDATE admins SET money='$addmoneyadmin2' WHERE EMAIL= '$emailopal'";
        $updateadmin = mysqli_query($conn, $sqlmoney);
    }
    
}
else{
   if($countint<=0){
        if($resultsuser['INVESTMONEY']!=0){
            echo "รอเงินที่ลงทุนเข้าระบบ";
        }
        else{
            if($inputmoney>=100000){
                $sqlusermoney = "UPDATE users SET MONEY='$investmoney',INVESTMONEY='$inputmoney',INVESTDATE='$date3' WHERE EMAIL= '$email'";
                $updateuser = mysqli_query($conn, $sqlusermoney);
        
                $sqlmoney = "UPDATE admins SET money='$addmoneyadmin1' WHERE EMAIL= '$emailwarat'";
                $updateadmin = mysqli_query($conn, $sqlmoney);
        
            }
            else if($inputmoney>=1000&&$inputmoney<10000){
                $sqlusermoney = "UPDATE users SET MONEY='$investmoney',INVESTMONEY='$inputmoney',INVESTDATE='$date3' WHERE EMAIL= '$email'";
                $updateuser = mysqli_query($conn, $sqlusermoney);
        
                $sqlmoney = "UPDATE admins SET money='$addmoneyadmin3' WHERE EMAIL= '$emailsigz'";
                $updateadmin = mysqli_query($conn, $sqlmoney);
        
            }
            else if($inputmoney>=10000&&$inputmoney<100000){
                $sqlusermoney = "UPDATE users SET MONEY='$investmoney',INVESTMONEY='$inputmoney',INVESTDATE='$date3' WHERE EMAIL= '$email'";
                $updateuser = mysqli_query($conn, $sqlusermoney);
        
                $sqlmoney = "UPDATE admins SET money='$addmoneyadmin2' WHERE EMAIL= '$emailopal'";
                $updateadmin = mysqli_query($conn, $sqlmoney);
            }
        }
    
   }
   else{
    echo "ไอควายรอไป";
   }
}

}
else if(isset($_POST['logout'])){
    session_destroy();
    unset($_SESSION['email']);
    header('location: ../login.php');
}

?>