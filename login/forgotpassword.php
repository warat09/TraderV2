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
    <title>Forget-pass</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/styleregis.css">
    <style>
        /* The container */
        .cont {
          display: block;
          position: relative;
          padding-left: 35px;
          margin-bottom: 12px;
          cursor: pointer;
          font-size: 22px;
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none;
        }
        
        /* Hide the browser's default radio button */
        .cont input {
          position: absolute;
          opacity: 0;
          cursor: pointer;
        }
        
        /* Create a custom radio button */
        .checkmark {
          position: absolute;
          top: 0;
          left: 0;
          height: 25px;
          width: 25px;
          background-color: #eee;
          border-radius: 50%;
        }
        
        /* On mouse-over, add a grey background color */
        .container:hover input ~ .checkmark {
          background-color: #ccc;
        }
        
        /* When the radio button is checked, add a blue background */
        .container input:checked ~ .checkmark {
          background-color: #2196F3;
        }
        
        /* Create the indicator (the dot/circle - hidden when not checked) */
        .checkmark:after {
          content: "";
          position: absolute;
          display: none;
        }
        
        /* Show the indicator (dot/circle) when checked */
        .container input:checked ~ .checkmark:after {
          display: block;
        }
        
        /* Style the indicator (dot/circle) */
        .container .checkmark:after {
             top: 9px;
            left: 9px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: white;
        }
        </style>
        <!------------------->
        <link rel="shortcut icon" href="images/favicon1.png">	
        <!------------------->
<!-- load CSS -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300">  <!-- Google web font "Open Sans" -->
<link rel="stylesheet" href="2097_pop/css/bootstrap.min.css">                                  <!-- https://getbootstrap.com/ -->
<link rel="stylesheet" href="2097_pop/fontawesome/css/fontawesome-all.min.css">                <!-- https://fontawesome.com/ -->
<link rel="stylesheet" type="text/css" href="2097_pop/slick/slick.css"/>                       <!-- http://kenwheeler.github.io/slick/ -->
<link rel="stylesheet" type="text/css" href="2097_pop/slick/slick-theme.css"/>
<link rel="stylesheet" href="2097_pop/css/tooplate-style.css">                               <!-- Templatemo style -->
<link rel="stylesheet"
	href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" >

<script>document.documentElement.className="js";var supportsCssVars=function(){var e,t=document.createElement("style");return t.innerHTML="root: { --tmp-var: bold; }",document.head.appendChild(t),e=!!(window.CSS&&window.CSS.supports&&window.CSS.supports("font-weight","var(--tmp-var)")),t.parentNode.removeChild(t),e};supportsCssVars()||alert("Please view this in a modern browser such as latest version of Chrome or Microsoft Edge.");</script>
<!--------->


</head>
<body>

  <style>
    .container{
        font-family: 'Prompt', sans-serif;
    }
  </style>

            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <!--idห้ามซ้ำ-->
          <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
            <div class="container">
              <div class="card login-card">
                <div class="row no-gutters" style="background-color:#222222;" >
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
                              <a href="home.php" class="text-reset">
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
              </center>
                  </div>
                  <div class="col-md-8" >
                   <div class="signup-content"style="background-color:#222222;">
                    <form action ="forgotpassword_db.php" method="POST" id="signup-form" class="signup-form">
                        <div class="main">
                          <br>
                           <center> 
                             <a href="index.html">
                                <img src="images/logo_1.png" alt="Beebacop">
                            </a>
                          </center><br>
                        <center><h4 style="color:white;">ลืมรหัสผ่าน</h4></center>
                        <br>
                       <p>กรอกอีเมลเพื่อรีเซ็ตรหัสผ่าน</p>
                           
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
                          
                        <div class="form-group mb-4">
                            <input type="text" class="form-control" name="email" id="email" placeholder="อีเมล"/>
                        </div>
                      
                        <div class="form-group">    
                          <button id="addBtn" name="forgot_user" class="form-submit">ยืนยัน</button>
                      </div>
                        </div>
                  
                    </form><br>
            
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </main>
     

</html>