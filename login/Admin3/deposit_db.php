<?php
session_start();
include('server.php');
$errors = array();
$noterrors = array();

if (isset($_POST['submit'])){

     date_default_timezone_set("Asia/Bangkok");

    $realtime = date("h:i:sa");
    $realdate = date("d/m/Y");
    $money = mysqli_real_escape_string($conn, $_POST['payment']);
    $date = mysqli_real_escape_string($conn,$_POST['your-date']);
    $hour = mysqli_real_escape_string($conn,$_POST['menu-h']);
    $min = mysqli_real_escape_string($conn,$_POST['menu-n']);
    

    $img_name = $_FILES['payImage']['name'];
	  $img_size = $_FILES['payImage']['size'];
	  $tmp_name = $_FILES['payImage']['tmp_name'];
	  $error = $_FILES['payImage']['error'];
    $name_Img = $_POST['payImage'];
    

    $email = mysqli_real_escape_string($conn , $_SESSION['email']);
    $sql =  "SELECT * FROM users WHERE EMAIL='$email'";
    $result = mysqli_query($conn, $sql);
    $results = mysqli_fetch_assoc($result);
    $uploads_dir = 'payment/';

    
   
    if (empty($money)){
        array_push($errors,"กรุณากรอกจำนวนเงิน");
        $_SESSION['error'] = "กรุณากรอกจำนวนเงิน";
        header("location: deposit.php");
    }
    if (empty($date)){
      array_push($errors,"กรุณาเลือกวันที่ชำระ");
      $_SESSION['error'] = "กรุณาเลือกวันที่ชำระ";
      header("location: deposit.php");
  }
    if (empty($hour)){
      array_push($errors,"กรุณาเลือกชั่วโมงชำระ");
      $_SESSION['error'] = "กรุณาเลือกชั่วโมงชำระ";
      header("location: deposit.php");
    }
    if (empty($min)){
      array_push($errors,"กรุณาเลือกนาทีชำระ");
      $_SESSION['error'] = "กรุณาเลือกนาทีชำระ";
      header("location: deposit.php");
    }
    if($img_size == 0){
      array_push($errors,"กรุณาแนบหลักฐานการโอน");
        $_SESSION['error'] = "กรุณาแนบหลักฐานการโอน";
        header("location: deposit.php");
    }
    if(empty($_POST['payment'])&&$img_size == 0){
      array_push($errors,"กรุณากรอกจำนวนเงินและแนบหลักฐานการโอน");
        $_SESSION['error'] = "กรุณากรอกจำนวนเงินและแนบหลักฐานการโอน";
        header("location: deposit.php");
    }
    else{
      if(count($errors) == 0){  
        $sql2 = "INSERT INTO billing_information (DATEANDHR,EMAIL,MONEY,DATE,HM,IMAGE) VALUES ('$realdate||$realtime','$email','$money','$date','$hour:$min','$img_name')";
        $img_upload_path = 'payment/'.$img_name;
        mysqli_query($conn, $sql2);   
        move_uploaded_file($tmp_name,$img_upload_path);
        array_push($noterrors,"ส่งเรียบร้อยแล้วเดียวทางระบบจะตรวจสอบอีกครั้ง");
        $_SESSION['noterror'] = "ส่งเรียบร้อยแล้วเดียวทางระบบจะตรวจสอบอีกครั้ง";
        header("location: deposit.php");
                          }
  }
}else{
  array_push($errors,"error");
  $_SESSION['error'] = "error";
  header("location: deposit.php");
}

?>