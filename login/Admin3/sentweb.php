<?php
session_start();
include('server.php');

$errors = array();
$noterrors = array();

if(isset($_POST['submit'])){
    $email = $_POST['emails'];
    $name = $_POST['names'];
    $phone = $_POST['phones'];
    $message = $_POST['message'];
    if(empty($email)&&empty($name)&&empty($phone)&&empty($message)){
        array_push($errors, "กรุณากรอกข้อมูลเพื่อส่งอีเมล");
        $_SESSION['error'] = "กรุณากรอกข้อมูลเพื่อส่งอีเมล";
         header("location: contact.php");
    }
    else if(empty($email)){
        array_push($errors, "กรุณากรอกอีเมล");
        $_SESSION['error'] = "กรุณากรอกอีเมล";
         header("location: contact.php");
    }
    else if(empty($name)){
        array_push($errors, "กรุณากรอกชื่อ");
        $_SESSION['error'] = "กรุณากรอกชื่อ";
         header("location: contact.php");
    }
    else if(empty($phone)){
        array_push($errors, "กรุณากรอกเบอร์");
        $_SESSION['error'] = "กรุณากรอกเบอร์";
         header("location: contact.php");
    }
    else if(empty($message)){
        array_push($errors, "กรุณากรอกข้อความ");
        $_SESSION['error'] = "กรุณากรอกข้อความ";
         header("location: contact.php");
    }
    else{
        require("phpmailer/class.phpmailer.php"); // path to the PHPMailer class.
 
            $fm = "beebacorporation@gmail.com"; // *** ต้องใช้อีเมล์ @gmail.com เท่านั้น ***
            $to = $email; // อีเมล์ที่ใช้รับข้อมูลจากแบบฟอร์ม
            $custemail = $_POST['emails']; // อีเมล์ของผู้ติดต่อที่กรอกผ่านแบบฟอร์ม

            $mail = new PHPMailer();
            $mail->CharSet = "utf-8"; 
            
            /* ------------------------------------------------------------------------------------------------------------- */
            /* ตั้งค่าการส่งอีเมล์ โดยใช้ SMTP ของ Gmail */
            $mail->IsSMTP();
            $mail->Mailer = "smtp";
            $mail->IsSMTP(); // telling the class to use SMTP
            $mail->SMTPAuth = true;                  // enable SMTP authentication
            $mail->SMTPSecure = "tls";                 // sets the prefix to the servier
            $mail->Host = "smtp.gmail.com";      // sets GMAIL as the SMTP server
            $mail->Port = 587;                   // set the SMTP port for the GMAIL server
            $mail->Username = "beebacorporation@gmail.com";  // Gmail Email username
            $mail->Password = "mistersigz";            // App Password not Gmail password
            $mail->Subject = "แบบฟรอมจากคุณ $name";
            /* ------------------------------------------------------------------------------------------------------------- */
            
            $mail->setFrom($fm, $to);
            $mail->AddAddress($fm);
            $mail->AddReplyTo($fm);
            $mail->isHTML(true);
            
            $mail->Body     = "
            ชื่อ : $name <br>
            อีเมล : $email<br>
            เบอร์ : $phone<br>
            เขียนว่า :<br>
            $message
            ";
            $mail->WordWrap = 50; 
            
                if(!$mail->Send()) {
                    array_push($errors, "ส่งอีเมลไม่สำเร็จ");
                    $_SESSION['error'] = "ส่งอีเมลไม่สำเร็จ";
                    header("location: contact.php");
                    exit;
                    } 
                    else {
                    array_push($noterrors, "ส่งอีเมลสำเร็จ");
                    $_SESSION['noterror'] = "ส่งอีเมลสำเร็จ";
                    header("location: contact.php");
                    }}
    }
    
                
?>