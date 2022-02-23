<?php
session_start();
include('server.php');
$errors = array();
$noterrors = array();

if (isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['names']);
    $surname = mysqli_real_escape_string($conn, $_POST['surname']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $newpassword = mysqli_real_escape_string($conn, $_POST['newpassword']);
    $newcon_password = mysqli_real_escape_string($conn, $_POST['con_newpassword']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

    $img_name = $_FILES['my_image']['name'];
	  $img_size = $_FILES['my_image']['size'];
	  $tmp_name = $_FILES['my_image']['tmp_name'];
	  $error = $_FILES['my_image']['error'];

    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);

    $allowed_exs = array("jpg", "jpeg", "png"); 
    
    $email = mysqli_real_escape_string($conn , $_SESSION['email']);
    $sql =  "SELECT * FROM users WHERE EMAIL='$email'";
    $result = mysqli_query($conn, $sql);
    $results = mysqli_fetch_assoc($result);
    $uploads_dir = '/image';

    if (empty($name)){
        array_push($errors,"กรุณากรอกชื่อ");
        $_SESSION['error'] = "กรุณากรอกชื่อ";
        header("location: editprofile.php");
      }
    if (empty($surname)){
        array_push($errors,"กรุณากรอกนามสกุล");
        $_SESSION['error'] = "กรุณากรอกนามสกุล";
        header("location: editprofile.php");
    }
    if (empty($phone)){
        array_push($errors,"กรุณากรอกเบอร์");
        $_SESSION['error'] = "กรุณากรอกเบอร์";
        header("location: editprofile.php");
    }
        if($results['PASSWORD'] != $password){
            array_push($errors, "รหัสผ่านไม่ถูกต้องกรุณากรอกใหม่");
             $_SESSION['error'] = "รหัสผ่านไม่ถูกต้องกรุณากรอกใหม่";
             header("location: editprofile.php");
        }
    else{
      if(count($errors) == 0){     
                if(mysqli_num_rows($result)==1){
                    if(empty($newpassword)&&empty($newcon_password)&&$_FILES['my_image']['size']==0){
                        $sql = "UPDATE users SET NAME='$name', SURNAME='$surname',PHONE='$phone' WHERE EMAIL= '$email'";
                        $update = mysqli_query($conn, $sql);
                        if($update){
                          array_push($noterrors,"รีเซ็ทรหัสผ่านแล้ว");
                          $_SESSION['noterror'] = "รีเซ็ทรหัสผ่านแล้ว";
                          header("location: editprofile.php");
                        }
                    }
                    else if(empty($newpassword)&&empty($newcon_password)&&$_FILES['my_image']['size']>0){
                      $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				              $img_upload_path = 'uploads/'.$new_img_name;

                        $sql = "UPDATE users SET NAME='$name', SURNAME='$surname',PHONE='$phone',profile_image='$new_img_name' WHERE EMAIL= '$email'";
                        $update = mysqli_query($conn, $sql);
                        if($update){
                          move_uploaded_file($tmp_name, $img_upload_path);
                          array_push($noterrors,"รีเซ็ทรหัสผ่านแล้ว");
                          $_SESSION['noterror'] = "รีเซ็ทรหัสผ่านแล้ว";
                          header("location: editprofile.php");
                        }
                    }
                   
                    
                    
                    else{
                        if (empty($newcon_password)){
                            array_push($errors,"กรุณากรอกยืนยันรหัสผ่าน");
                            $_SESSION['error'] = "กรุณากรอกยืนยันรหัสผ่าน";
                            header("location: editprofile.php");
                          }
                          if (empty($newpassword)){
                            array_push($errors,"กรุณากรอกรหัสผ่าน");
                            $_SESSION['error'] = "กรุณากรอกรหัสผ่าน";
                            header("location: editprofile.php");
                          }
                        if (empty($password)){
                            array_push($errors,"กรุณากรอกรหัสผ่านเดิม");
                            $_SESSION['error'] = "กรุณากรอกรหัสผ่านเดิม";
                            header("location: editprofile.php");
                        }
                          if($newpassword != $newcon_password){
                            array_push($errors, "รหัสผ่านไม่ตรงกันกรุณากรอกใหม่");
                            $_SESSION['error'] = "รหัสผ่านไม่ตรงกันกรุณากรอกใหม่";
                            header("location: editprofile.php");
                            }
                            else{
                              if($_FILES['my_image']['size']==0){
                                $sql = "UPDATE users SET NAME='$name', SURNAME='$surname',PHONE='$phone',PASSWORD='$newpassword' WHERE EMAIL= '$email'";
                                $update = mysqli_query($conn, $sql);
                              if($update){
                                array_push($noterrors,"รีเซ็ทรหัสผ่านแล้ว");
                                $_SESSION['noterror'] = "รีเซ็ทรหัสผ่านแล้ว";
                                header("location: editprofile.php");
                              }
                              }
                               else if($_FILES['my_image']['size']>0){
                                  $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                                  $img_upload_path = 'uploads/'.$new_img_name;
          
                                  $sql = "UPDATE users SET NAME='$name', SURNAME='$surname',PHONE='$phone',PASSWORD='$newpassword',profile_image='$new_img_name' WHERE EMAIL= '$email'";
                                  $update = mysqli_query($conn, $sql);
                                  if($update){
                                    move_uploaded_file($tmp_name, $img_upload_path);
                                    array_push($noterrors,"รีเซ็ทรหัสผ่านแล้ว");
                                    $_SESSION['noterror'] = "รีเซ็ทรหัสผ่านแล้ว";
                                    header("location: editprofile.php");
                                  }
                                }
                                
                            }
                    }
                }
                else{
                    array_push($errors,"อีเมล์หรือรหัสผิด");
                    $_SESSION['error'] = "อีเมล์หรือรหัสผิดลองอีกครั้ง";
                    header("location: editprofile.php");
                }
                          }
  }
}else{
  array_push($errors,"error");
  $_SESSION['error'] = "error";
  header("location: editprofile.php");
}

?>