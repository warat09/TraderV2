<?php
    session_start();
    include('server.php');

    $errors = array();

    if(isset($_POST['login_user'])){
        $email = mysqli_real_escape_string($conn , $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        echo empty($email);
        if(empty($email)){
            array_push($errors, "กรุณากรอกอีเมล์");
            $_SESSION['error'] = "กรุณากรอกอีเมล์";
            header('location: login.php');

        }
        if(empty($password)){
            array_push($errors, "กรุณากรอกพาสเวิรด์");
            $_SESSION['error'] = "กรุณากรอกพาสเวิรด์";
            header('location: login.php');

        }
        if(empty($email)&&empty($password)){
            array_push($errors, "กรุณากรอกอีเมล์และพาสเวิรด์");
            $_SESSION['error'] = "กรุณากรอกอีเมล์และพาสเวิรด์";
            header('location: login.php');
        }
        else{
            if(count($errors) == 0){
                //$password = md5($passord);
                //save in sql
                $sql =  "SELECT * FROM users WHERE EMAIL='$email' AND PASSWORDS = '$password'";
                $result = mysqli_query($conn, $sql);
                
                if(mysqli_num_rows($result)==1){
                    $_SESSION['email'] = $email;
                    $_SESSION['success'] = "LOgin";
                    header('location: ./Admin3/profile.php');
                }
                else{
                    array_push($errors,"อีเมล์หรือรหัสผิด");
                    $_SESSION['error'] = "อีเมล์หรือรหัสผิดลองอีกครั้ง";
                    header('location: login.php');
                }
            }
        }
        
    }
?>