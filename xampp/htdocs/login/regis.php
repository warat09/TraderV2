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
    <title>Sign Up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Main css -->
    <link rel="stylesheet" href="css/styleregis.css">
    <link rel="stylesheet"
	href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" >
    <link rel="shortcut icon" href="images/favicon1.png">	
<!--

Template 2097 Pop

http://www.tooplate.com/view/2097-pop

-->
    <!-- load CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="2097_pop/css/bootstrap.min.css">                                  <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="2097_pop/fontawesome/css/fontawesome-all.min.css">                <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" type="text/css" href="2097_pop/slick/slick.css"/>                       <!-- http://kenwheeler.github.io/slick/ -->
    <link rel="stylesheet" type="text/css" href="2097_pop/slick/slick-theme.css"/>
    <link rel="stylesheet" href="2097_pop/css/tooplate-style.css">                               <!-- Templatemo style -->

    <script>document.documentElement.className="js";var supportsCssVars=function(){var e,t=document.createElement("style");return t.innerHTML="root: { --tmp-var: bold; }",document.head.appendChild(t),e=!!(window.CSS&&window.CSS.supports&&window.CSS.supports("font-weight","var(--tmp-var)")),t.parentNode.removeChild(t),e};supportsCssVars()||alert("Please view this in a modern browser such as latest version of Chrome or Microsoft Edge.");</script>
    <!--------->

    <style>
        .signup{
            font-family: 'Prompt', sans-serif;
        }
    </style>
</head>

<body onCopy="return false">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt="">  -->
            <!--idห้ามซ้ำ-->

            <main class="d-flex align-items-center min-vh-1000 py-9 py-md-0">
                <div class="container">
                  <div class="card login-card">
                    <div class="row no-gutters"  style="background-color:#222222;">
                      <div class="col-md-2">
                          <table>
                              <tr>
                                  <br>
                                  <center><h3>รายการ</h3></center>    
                                  <br>
                              </tr>
                              <tr>
                                <center>
                                <div class="form-group">
                                    <a href="../home.php" class="text-reset">
                                        <div class="product">
                                            <div class="tm-nav-link">
                                            <i class="fas fa-home fa-3x tm-nav-icon"></i>
                                            <span class="tm-nav-text" style="font-size:68%;">หน้าหลัก</span>
                                            <div class="product__bg"></div>            
                                            </div>   
                                        </div>
                                    </a> 
                                </div>
                                </center>
                              </tr>
                              <tr>
                                <center>
                                    <div class="form-group">
                                        <a href="login.php" class="text-reset">
                                            <div class="product">
                                                <div class="tm-nav-link">
                                                <i class="fas fa-users fa-3x tm-nav-icon"></i>
                                                <span class="tm-nav-text" style="font-size:68%;">เข้าสู่ระบบ</span>
                                                <div class="product__bg"></div>            
                                                </div>   
                                            </div>
                                        </a> 
                                    </div>
                                    </center>
                              </tr>
                          </table>
                      </div>
                      <div class="col-md-1" >
                          <center>
                          <br>  
                        <img src="images/underline2.png"> 
                        <br>
                        <img src="images/underline2.png">
                        <br>
                        <br>
                    </center>
                      </div>
                      <div class="col-md-8" >
                        
                        <!-------------------------------------------------8449849846546-->
                        <!--register-->
 <form action="register_db.php" method="POST" id="signup-form" class="signup-form">
    <?php include('errors.php'); ?>
    
    <div class="main">
        <br><br>
        <center><a class="navbar-brand" href="../home.php"><img src="images/logo_1.png" alt="Beebacop"></a></center><br>
        <center> <h4 class="form-title" style="color:white;">สร้างบัญชีผู้ใช้งาน</h4></center><br>
        <!--------------แจ้งerror-------------------->
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
        <!------------------------------------------>
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
        <!------------------------------------------>
        <div class="form-group"  >
            <input type="text" class="form-control" name="names" id="names" placeholder="ชื่อ"/>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="surnames" id="surnames" placeholder="นามสกุล"/>
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" id="email" placeholder="อีเมล" class="form-control">
        </div>
        <div class="form-group">
            <label for="password" class="sr-only">รหัสผ่าน</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="รหัสผ่าน">
          </div>
        <div class="form-group">
            <input type="password" class="form-control" name="con_password" id="password" placeholder="ยืนยันรหัสผ่าน"/>
           
        </div>
        <div class="form-group">
            <input type="number" class="form-control" name="tell" id="tell" placeholder="เบอร์โทรศัพท์ +66"/>
        </div>
        <div class="box">
            <input  id="one" type="checkbox" name="box">
            <span class="check"></span>
            <label for="one"><a onclick="pdf()" class="loginhere-link" style="color:white;">ข้อมูลความเสี่ยงและข้อตกลงการใช้งานบอท</a></label>
        </div>      
        <h6 style="color:white;" onclick="cap()"><img src="./images/refreshS.png" width="40px" >  Captcha คุณไม่ใช่หุ่นยนต์?</h6>
         <div class="form-row"> 
        
        
        <div class="form-group col-md-6" onmousedown = 'return false' onselectstart = 'return false'>
            <input type="text" class="form-control" name = "capt" readonly id="capt" onclick="cap()" style="background-color:#353541;">
        </div>
        <div class="form-group col-md-6">
        <input type="text" class="form-control" name = "textinput" id="textinput" style="background-color:#353541;">
        </div>
        </div>
        <div class="form-group">
            <button onclick="validcap()" name="reg_user" id="addBtn" class="form-submit">สมัครสมาชิก</button>
        </div>
    </div>
    <br><br>
    </form>

    <!-- <p class="loginhere" style="color:white;">มีสมาชิกอยู่แล้ว..<a href="login.php" class="loginhere-link" style="color:white;">เข้าสู่ระบบ</a></p> -->
    <!--end regis-->
                        <!--gfffffffffffffffffffffffffffffffffffffffffffffffff-->
                      </div>
                    </div>
                  </div>                  
                </div>
              </main>
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

