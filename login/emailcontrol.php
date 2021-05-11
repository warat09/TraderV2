<?php
session_start();
include('server.php');
$errors = array();
$noterrors = array();
	function redirect() {
		header('Location: login.php');
		exit();
	}

	if (!isset($_GET['email']) || !isset($_GET['success'])) {
		redirect();
	} else {
        $_POST['name'] = $_GET['name'];
        $_POST['surname'] = $_GET['surname'];
        $_POST['email'] = $_GET['email'];
        $_POST['success'] = $_GET['success'];
        $_POST['phone'] = $_GET['phone'];

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $surname = mysqli_real_escape_string($conn, $_POST['surname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['success']);
        $phone = mysqli_real_escape_string($conn,   $_POST['phone']);
        //echo $name;
		//$sql ="SELECT * FROM varify WHERE V_NAME='$name' AND V_SURNAME ='$surname' AND V_EMAIL='$email' AND V_PASSWORD ='$password' AND V_PHONE='$phone' AND Token = '$token'";
        //mysqli_query($conn, $sql);
        $email_check_query = "SELECT * FROM users WHERE EMAIL = '$email'";
        $query = mysqli_query($conn, $email_check_query);
        $result = mysqli_fetch_assoc($query);

        if($result){
            if($result['EMAIL'] === $email){
                array_push($errors ,"อีเมล์นี่ยืนยันตัวตนแล้ว") ;
                $_SESSION['error'] = "อีเมล์นี่ยืนยันตัวตนแล้ว";
                header('location: login.php');
            }
            
        }	else{
            $sql2 = "INSERT INTO users (NAME, SURNAME, EMAIL, PASSWORD, PHONE,MONEY, profile_image) VALUES ('$name','$surname','$email','$password','$phone',0,'begin.png')";
            mysqli_query($conn, $sql2);
            //$sql2 =  "INSERT INTO users (NAME, SURNAME, EMAIL, PASSWORD, PHONE ) VALUES ('$name','$surname','$email','$password','$phone')";
            //mysqli_query($conn, $sql2);
            $_SESSION['email'] = $email;
            $_SESSION['success'] = "ยินดีต้อนรับสมาชิกใหม่";
            header('location: ./Admin3/profile.php');
        }		
	}
?>