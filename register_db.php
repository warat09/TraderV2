<?php
    session_start();
    include('server.php');
    $errors = array();

    if (isset($_POST['reg_user'])){
        $name = mysqli_real_escape_string($conn, $_POST['names']);
        $surname = mysqli_real_escape_string($conn, $_POST['surnames']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $con_email = mysqli_real_escape_string($conn, $_POST['con_email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $con_password = mysqli_real_escape_string($conn, $_POST['con_password']);
        $phone = mysqli_real_escape_string($conn, $_POST['tell']);
        if (empty($name)||empty($surname)||empty($email)||empty($password)||empty($phone)){
            array_push($errors, "กรุณากรอกข้อมูลให้ครบ");
        }
        if($email != $con_email){
            array_push($errors, "อีเมล์ไม่ตรงกันกรุณากรอกใหม่");
        }
        if($password != $con_password){
            array_push($errors, "รหัสผ่านไม่ตรงกันกรุณากรอกใหม่");
        }

        $email_check_query = "SELECT * FROM users WHERE EMAIL = '$email'";
        $query = mysqli_query($conn, $email_check_query);
        $result = mysqli_fetch_assoc($query);

        if($result){
            if($result['EMAIL'] === $email){
                array_push($errors ,"อีเมล์นี่มีแล้ว") ;
            }

        }
    }
    if(count($errors) == 0){
        $password = md5($con_password);
        //save in sql
        $sql =  "INSERT INTO users (NAME, SURNAME, EMAIL, PASSWORD, PHONE) VALUES ('$name','$surname','$email','$password','$phone')";

        $_SESSION['email'] = $email;
        $_SESSION['success'] = "LOgin";
        header('location: profile.php');

        mysqli_query($conn, $sql);
    }
    
?>