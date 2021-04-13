<?php
    session_start();
    include('server.php');
    $errors = array();

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
        
            //เข้ารหัสไม่ซ้ำ
            //$password = md5($con_password);
            
            //save in sql
            $sql =  "INSERT INTO users (NAME, SURNAME, EMAIL, PASSWORDS, PHONE) VALUES ('$name','$surname','$email','$password','$phone')";
            mysqli_query($conn, $sql);
    
            $_SESSION['email'] = $email;
            $_SESSION['success'] = $password;
            header('location: ./Admin3/profile.php');
    
            
        }
        else{
            header('location: regis.php');
        }
    }
    
    
?>