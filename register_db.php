<?php
    session_start();
    include('server.php');
    $errors = array();
    $noterrors = array();
    
  
    
    if (isset($_POST['reg_user'])){
        $name = mysqli_real_escape_string($conn, $_POST['names']);
        $surname = mysqli_real_escape_string($conn, $_POST['surnames']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $con_password = mysqli_real_escape_string($conn, $_POST['con_password']);
        $phone = mysqli_real_escape_string($conn, $_POST['tell']);
        ///variable recap
        $recap1 = mysqli_real_escape_string($conn, $_POST['textinput']);
        $recap2 = mysqli_real_escape_string($conn, $_POST['capt']);

        if (empty($name)||empty($surname)||empty($email)||empty($password)||empty($con_password)||empty($phone)){
            array_push($errors, "กรุณากรอกข้อมูลให้ครบ");
            $_SESSION['error'] = "กรุณากรอกข้อมูลให้ครบ";
        }
        if(empty($recap1)){
            array_push($errors, "กรุณากรอกCaptcha");
            $_SESSION['error'] = "กรุณากรอกCaptcha";
        }
        if($password != $con_password){
            array_push($errors, "รหัสผ่านไม่ตรงกันกรุณากรอกใหม่");
            $_SESSION['error'] = "รหัสผ่านไม่ตรงกันกรุณากรอกใหม่";
        }
        if($recap1 != $recap2){
            array_push($errors, "กรุณากรอกCaptchaให้ถูกต้อง");
            $_SESSION['error'] = "กรุณากรอกCaptchaให้ถูกต้อง";
        }

        
        $email_check_query = "SELECT * FROM users WHERE EMAIL = '$email'";
        $query = mysqli_query($conn, $email_check_query);
        $result = mysqli_fetch_assoc($query);

        if($result){
            if($result['EMAIL'] === $email){
                array_push($errors ,"อีเมล์นี่มีแล้ว") ;
                $_SESSION['error'] = "อีเมล์นี่มีแล้ว";
            }

        }
        if(count($errors) == 0){
            $verify = false;
            $token = bin2hex(random_bytes(50));
        
            //เข้ารหัสไม่ซ้ำ
            //$password = md5($con_password);
            

            if(mysqli_num_rows($query)==0){
                $query = mysqli_query($conn,"SELECT * FROM users WHERE V_EMAIL='$email'");
            
            require("phpmailer/class.phpmailer.php"); // path to the PHPMailer class.
 
            $fm = "beebacorporation@gmail.com"; // *** ต้องใช้อีเมล์ @gmail.com เท่านั้น ***
            $to = $email; // อีเมล์ที่ใช้รับข้อมูลจากแบบฟอร์ม
            $custemail = $_POST['email']; // อีเมล์ของผู้ติดต่อที่กรอกผ่านแบบฟอร์ม

            $mail = new PHPMailer();
            $mail->CharSet = "utf-8"; 
            
            
            $mail->IsSMTP();
            $mail->Mailer = "smtp";
            $mail->IsSMTP(); // telling the class to use SMTP
            $mail->SMTPAuth = true;                  // enable SMTP authentication
            $mail->SMTPSecure = "tls";                 // sets the prefix to the servier
            $mail->Host = "smtp.gmail.com";      // sets GMAIL as the SMTP server
            $mail->Port = 587;                   // set the SMTP port for the GMAIL server
            $mail->Username = "beebacorporation@gmail.com";  // Gmail Email username
            $mail->Password = "mistersig";            // App Password not Gmail password
           
            
            $mail->setFrom($fm, "BeeBaCorporation");
            $mail->AddAddress($to);
            $mail->AddReplyTo($custemail);
            $mail->Subject = "Please verify email!";
            $mail->isHTML(true);
            $mail->Body     = "
            Please click on the link below:<br><br>
            
            <a href='http://mistersigz.thddns.net:7572/TraderV2/emailcontrol.php?name=$name&surname=$surname&email=$email&success=$password&phone=$phone&token=$token'>Click Here</a>
            ";
            $mail->WordWrap = 50;
                if(!$mail->Send()) {
                    echo 'Message was not sent.';
                    echo 'ยังไม่สามารถส่งเมลล์ได้ในขณะนี้ ' . $mail->ErrorInfo;
                    exit;
                    } 
                    else {
                    array_push($noterrors, "ส่งเมลล์สำเร็จ");
                    $_SESSION['noterror'] = "ส่งเมลล์สำเร็จ";
                    //save in sql
                    //$sql =  "INSERT INTO users (NAME, SURNAME, EMAIL, PASSWORD, PHONE) VALUES ('$name','$surname','$email','$password','$phone')";
                    //$sql =  "INSERT INTO varify (V_NAME, V_SURNAME, V_EMAIL, V_PASSWORD, V_PHONE , Verify, Token) VALUES ('$name','$surname','$email','$password','$phone','$verify','$token')";
                    //mysqli_query($conn, $sql);
                        
                    $_SESSION['name'] = $name;
                    $_SESSION['surname'] = $surname;
                    $_SESSION['email'] = $email;
                    $_SESSION['success'] = $password;
                    $_SESSION['phone'] = $phone;
                    $_SESSION['verify'] = $verify;
                    $_SESSION['Token'] = $token;

                    
                    

                    //sentverifyemail($email,$token);
                    //header('location: ./Admin3/profile.php');
                    header('location: regis.php');
                    }
            }
            else{
                array_push($errors, "ผิดพลาด");
                $_SESSION['error'] = "ผิดพลาด";
                 header('location: regis.php');
            }    
        }
        else{
            header('location: regis.php');
        }
    }
    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
    
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
    
?>