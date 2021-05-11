<?php 

session_start();
include('server.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up AutoBot</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Main css -->
    <link rel="stylesheet" href="css/styleregis.css">
</head>

<body onCopy="return false">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <!--idห้ามซ้ำ-->

            <div class="container">
                <div class="signup-content">
                    <form action="register_db.php" method="POST" id="signup-form" class="signup-form">
                        <?php include('errors.php'); ?>
                        
                        <div class="main">
                            <div class="row">
                                <div class="logo_sections">
                                    <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="image"></a>
                                </div>
                            </div>
                        <h2 class="form-title">สร้างบัญชี</h2>
                        <!--------------แจ้งerror------------------>
                        <?php if (isset($_SESSION['error'])) : ?>
                        <div class="error">
                        <h3 style="color:red">
                             <?php 
                                 echo $_SESSION['error'];
                                 unset($_SESSION['error']);
                            ?>
                        </h3>
                        </div>
                        <?php endif ?>

                        <!--------------แจ้งไม่error------------------>
                        <?php if (isset($_SESSION['noterror'])) : ?>
                        <div class="noterror">
                        <h3 style="color:green">
                             <?php 
                                 echo $_SESSION['noterror'];
                                 unset($_SESSION['noterror']);
                            ?>
                        </h3>
                        </div>
                        <?php endif ?>
                        
                        <div class="form-group">
                            <input type="text" class="form-input" name="names" id="names" placeholder="ชื่อ"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="surnames" id="surnames" placeholder="นามสกุล"/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="อีเมล">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="รหัสผ่าน"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="con_password" id="password" placeholder="ยืนยันรหัสผ่าน"/>
                            <span toggle="#password" class="zmdi zmdi-eye   field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-input" name="tell" id="tell" placeholder="เบอร์โทรศัพท์
                            "/>
                        </div> 
                        <div class="box">
                            <input  id="one" type="checkbox" name="box">
                            <span class="check"></span>
                            <label for="one"><a onclick="pdf()" class="loginhere-link">ข้อมูลความเสี่ยงและข้อตกลงการใช้งานบอท</a></label>
                        </div>     
                        <label>กรุณากรอก Captcha:</label>
                         <div class="form-row">
                        <div class="form-group col-md-6" onmousedown = 'return false' onselectstart = 'return false'>
                        <input type="text" class="form-control" name = "capt" readonly id="capt">
                        </div>
                        <div class="form-group col-md-6">
                        <input type="text" class="form-control" name = "textinput" id="textinput">
                        </div>
                        </div>
                    
                <h6>Captcha ไม่เห็นกดที่รูป <img src="./images/refresh.png" width="40px" onclick="cap()"></h6>
                        
                        <div class="form-group">
                            <button onclick="validcap()" name="reg_user" id="addBtn" class="form-submit">สมัคร</button>
                        </div>
                        </div>
                    </form>
                    <p class="loginhere">
                        สมัครสมาชิกแล้วใช่ใหม? <a href="login.php" class="loginhere-link">เข้าสู่ระบบ</a>
                    </p>
                </div>
            </div>
        </section>
    </div>
</script>
<script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
<script type="text/javascript">
    function cap()  {
        var alpha = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V'
                   ,'W','X','Y','Z','1','2','3','4','5','6','7','8','9','0','a','b','c','d','e','f','g','h','i',
                   'j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z', '!','@','#','$','%','^','&','*','+'];
                   var a = alpha[Math.floor(Math.random()*71)];
                   var b = alpha[Math.floor(Math.random()*71)];
                   var c = alpha[Math.floor(Math.random()*71)];
                   var d = alpha[Math.floor(Math.random()*71)];
                   var e = alpha[Math.floor(Math.random()*71)];
                   var f = alpha[Math.floor(Math.random()*71)];
  
                   var final = a+b+c+d+e+f;
                   document.getElementById("capt").value=final;
                 }
                 function validcap(){
                  var stg1 = document.getElementById('capt').value;
                  var stg2 = document.getElementById('textinput').value;
                  if(stg1==stg2){
                    return true;
                  }else if(stg1 != stg2){
                    return false  
                  }
                  
                 }
                 //function check(){
                    //if(document.getElementById("one").checked == false){
                    //alert("false")
                  //}
                 //}
  </script>
  
  <script>
      function pdf(){
    window.open("ข้อมูลความเสี่ยงและข้อตกลงการใช้งานบอท/ข้อมูลความเสี่ยงและข้อตกลงการใช้งานบอท.pdf")
    }
  </script>
  <script>
    const recap1 = document.getElementById("textinput")
    const recap2 = document.getElementById('capt')
    if(recap1.value != recap2.value){
        window.alert('กรุณากรอกให้ถูกต้อง')
    }
  </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
