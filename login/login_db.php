<?php
    session_start();
    include('server.php');

    $errors = array();

    if(isset($_POST['login_user'])){
        $email = mysqli_real_escape_string($conn , $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        if(empty($email)){
            array_push($errors, "กรุณากรอกอีเมล์");
            $_SESSION['error'] = "กรุณากรอกอีเมล์";
            header('location: login.php');

        }
        else if(empty($password)){
            array_push($errors, "กรุณากรอกพาสเวิรด์");
            $_SESSION['error'] = "กรุณากรอกพาสเวิรด์";
            header('location: login.php');

        }
        else if(empty($email)&&empty($password)){
            array_push($errors, "กรุณากรอกอีเมล์และพาสเวิรด์");
            $_SESSION['error'] = "กรุณากรอกอีเมล์และพาสเวิรด์";
            header('location: login.php');
        }
        else{
            if(count($errors) == 0){
                //$password = md5($passord);
                //save in sql
                $sql =  "SELECT * FROM users WHERE EMAIL='$email' AND PASSWORD = '$password'";
                $result = mysqli_query($conn, $sql);
                $results = mysqli_fetch_assoc($result);

                $sqladmin =  "SELECT * FROM admins WHERE email='$email' AND password = '$password'";
                $resultadmin = mysqli_query($conn,$sqladmin);
                $results = mysqli_fetch_assoc($resultadmin);
                
                
                if(mysqli_num_rows($result)==1){
                    $_SESSION['email'] = $email;
                    $_SESSION['success'] = "เข้าสู่ระบบสำเร็จ";
                    header("location: ./Admin3/profile.php");
                }
                else if(mysqli_num_rows($resultadmin)==1){
                    $_SESSION['email'] = $email;
                    $_SESSION['success'] = "เข้าสู่ระบบสำเร็จ";
                    header("location: ./Admin3/adminprofile.php");
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