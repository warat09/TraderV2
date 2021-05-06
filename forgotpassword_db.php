<?php
session_start();
include('server.php');


$errors = array();
$noterrors = array();

if(isset($_POST['forgot_user'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    if(empty($email)){
        array_push($errors, "กรุณากรอกอีเมล์");
        $_SESSION['error'] = "กรุณากรอกอีเมล์";
        header('location: forgotpassword.php');
    }
    
    else{
        if(count($errors) == 0){
            $query = mysqli_query($conn,"SELECT * FROM users WHERE EMAIL='$email'");
            
            require("phpmailer/class.phpmailer.php"); // path to the PHPMailer class.
 
            $fm = "beebacorporation@gmail.com"; // *** ต้องใช้อีเมล์ @gmail.com เท่านั้น ***
            $to = $email; // อีเมล์ที่ใช้รับข้อมูลจากแบบฟอร์ม
            $custemail = $_POST['email']; // อีเมล์ของผู้ติดต่อที่กรอกผ่านแบบฟอร์ม

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
            $mail->Password = "mistersig";            // App Password not Gmail password
            $mail->Subject = "Reset password email!";
            /* ------------------------------------------------------------------------------------------------------------- */
            
            $mail->setFrom($fm, "BeeBaCorporation");
            $mail->AddAddress($to);
            $mail->AddReplyTo($custemail);
            $mail->isHTML(true);
            
            $mail->Body     = "
            Please click on the link below for reset:<br><br>
            
            <a href='http://mistersigz.thddns.net:7572/TraderV2/forgotreset.php?&email=$email'>Click Here</a>
            ";
            $mail->WordWrap = 50; 
    
    //
    
            if(mysqli_num_rows($query)==1){
                if(!$mail->Send()) {
                    echo 'Message was not sent.';
                    echo 'ยังไม่สามารถส่งเมลล์ได้ในขณะนี้ ' . $mail->ErrorInfo;
                    exit;
                    } 
                    else {
                    array_push($noterrors, "ส่งเมลล์สำเร็จ");
                    $_SESSION['noterror'] = "ส่งเมลล์สำเร็จ";
                    header('location: forgotpassword.php');
                    }
            }else{
                array_push($errors, "อีเมล์นี่ไม่มีในฐานระบบ");
                $_SESSION['error'] = "อีเมล์นี่ไม่มีในฐานระบบ";
                 header('location: forgotpassword.php');
            }
        }
    }
}
?>
