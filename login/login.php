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
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
  <link rel="shortcut icon" href="images/favicon1.png">	
  <link rel="stylesheet"
	href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" >
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
      .container{
          font-family: 'Prompt', sans-serif;
      }
  </style>
</head>
<body>
  
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters"  style="background-color:#222222;">
          <div class="col-md-7">
            <img src="images/login.jpg" alt="FeeIgsi" class="login-card-img">
          </div>
          <div class="col-md-5" >
            <div class="card-body">
            <center>
              <a class="navbar-brand" href="index.html"><img src="images/logo_1.png" alt="Beebacop"></a>
              <p class="login-card-description" style="color:white;">เข้าสู่ระบบ</p>
            </center>
            <center>
    <style>
      h3 {
  font-size: 1.3em;
}
    </style>
              <form action="login_db.php" method="POST">
                      <?php include('errors.php'); ?>
                      <?php if(isset($_SESSION['error'])) : ?>
                                <div class = "error">
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
                    <label for="email" class="sr-only">อีเมล</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="อีเมล">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">รหัสผ่าน</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="รหัสผ่าน">
                  </div>
                  <div>
                    <button name="login_user" id="login_user" class="btn btn-block login-btn mb-4"  value="ล็อคอิน">ล็อคอิน</button>
                  </div>
                         <!-----------------------> 
                         <table>
                          <tr>
                            <td>
                              <a href="regis.php" class="text-reset">
                              <div class="product">
                              <div class="tm-nav-link">
                                <i class="fas fa-users fa-3x tm-nav-icon"></i>
                                <span class="tm-nav-text" style="font-size:68%;">สมัครสมาชิก</span>
                                <div class="product__bg"></div>            
                            </div>   
                            </div>
                            </a>
                            </td>

                            <td>

                            </td>
                            <td></td><td></td><td></td>
                            <td>
                              <!-- <a href="forgotpassword.php" class="text-reset">  -->
                              <div class="grid__item" id="team-link">
                              <div class="product">
                                <div class="tm-nav-link">
                                  <i class="fas fa-comments fa-3x tm-nav-icon"></i>
                                  <span class="tm-nav-text" style="font-size:68%;">ลืมรหัสผ่าน</span>
                                  <div class="product__bg"></div>             
                                </div>   

                              </div>

                              </div>
                              <!-- </a> -->
                            </td>
                            <td>

                            </td>
                            <td>
                              
                            </td>
                            </tr>
                          </tr>

                         </table>
             
                                                                
   
             <!----------------------->
                </form>
              </center>
            </div>
          </div>

        </div>
      </div>
      
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- load JS -->
    <script src="2097_pop/js/jquery-3.2.1.slim.min.js"></script>         <!-- https://jquery.com/ -->    
    <script src="2097_pop/slick/slick.min.js"></script>                  <!-- http://kenwheeler.github.io/slick/ -->  
    <script src="2097_pop/js/anime.min.js"></script>                     <!-- http://animejs.com/ -->
    <script src="2097_pop/js/main.js"></script>  
    <script>      

        function setupFooter() {
            var pageHeight = $('.tm-site-header-container').height() + $('footer').height() + 100;

            var main = $('.tm-main-content');

            if($(window).height() < pageHeight) {
                main.addClass('tm-footer-relative');
            }
            else {
                main.removeClass('tm-footer-relative');   
            }
        }

        /* DOM is ready
        ------------------------------------------------*/
        $(function(){

            setupFooter();

            $(window).resize(function(){
                setupFooter();
            });

            $('.tm-current-year').text(new Date().getFullYear());  // Update year in copyright           
        });

    </script>             

</body>
</html>
