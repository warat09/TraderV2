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
    <title>Forget-pass AutoBot</title>

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
</head>
<body>

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <!--idห้ามซ้ำ-->
            <div class="container">
                <div class="signup-content">
                    <form action ="forgotreset_db.php" method="POST" id="signup-form" class="signup-form">
                        <div class="main">
                           <center> <a href="index.html">
                                <img src="images/logo.png" alt="AutoBot-Trader">
                            </a></center>
                        <h2 class="form-title">ลืมรหัสผ่าน</h2>
                        
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
                          
                        <label class="cont"><?php echo $_GET['email']; ?>
                          </label>
                          <?php $_SESSION['email']=$_GET['email'] ?>
                        <div class="form-group">
                            <input type="text" class="form-input" name="password" id="password" placeholder="รหัสผ่าน"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="con_password" id="con_password" placeholder="ยืนยันรหัสผ่าน"/>
                        </div>
                        
                        <div class="form-group">    
                            <button id="addBtn" name="reset_password" class="form-submit">ยืนยัน</button>
                        </div>
                        </div>
                    </form>
                    <p class="loginhere">
                         <a href="login.html" class="loginhere-link">เข้าสู่ระบบ</a>
                    </p>
                </div>
            </div>
        </section>
    </div>
</html>
