<?php
session_start();
include('server.php');
$errors = array();
$noterrors = array();
$email = $_SESSION['email'];
if (!isset($_SESSION['email'])) {
  header('forgotpassword.php');
}
if (isset($_POST['reset_password'])){
    echo $_SESSION['email'];
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $con_password = mysqli_real_escape_string($conn, $_POST['con_password']);
    echo $password; 
    if (empty($password)){
      array_push($errors,"กรุณากรอกรหัสผ่าน");
      $_SESSION['error'] = "กรุณากรอกรหัสผ่าน";
      header('location: forgotreset.php');
    }
    if (empty($con_password)){
        array_push($errors,"กรุณากรอกรหัสผ่าน");
        $_SESSION['error'] = "กรุณากรอกรหัสผ่าน";
        header('location: forgotreset.php');
      }
    else{
      if(count($errors) == 0){
        $email = mysqli_real_escape_string($conn , $_SESSION['email']);
        $sql =  "SELECT * FROM users WHERE EMAIL='$email'";
                $result = mysqli_query($conn, $sql);       
                if(mysqli_num_rows($result)==1){
                    $sql2 = "UPDATE users SET PASSWORD='$password' WHERE EMAIL= '$email'";
                    mysqli_query($conn, $sql2);
                    array_push($noterrors,"รีเซ็ทรหัสผ่านแล้ว");
                    $_SESSION['noterror'] = "รีเซ็ทรหัสผ่านแล้ว";
                    header('location: login.php');
                }
                else{
                    array_push($errors,"อีเมล์หรือรหัสผิด");
                    $_SESSION['error'] = "อีเมล์หรือรหัสผิดลองอีกครั้ง";
                    //header('location: login.php');
                }
    }
  }
}

?>