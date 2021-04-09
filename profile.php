<?php 
    session_start();

    if(!isset($_SESSION['email'])){
        $_SESSION['msg'] = "กรุณาเข้าสู้ระบบ";
        header('location: login.php');
    }
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['email']);
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Profile</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
   <!-----------------------------------------------------------------------------------------------------------------------
                                              THEME
----------------------------------------------------------------------------------------------------------------------->
<header class="header-desktop3 d-none d-lg-block">
    <div class="section__content section__content--p35">
        <div class="header3-wrap">
            <div class="header__logo">
                <a href="../index.html">
                    <img src="images/icon/logo.png" alt="AutoBot-Trader">
                </a>
            </div>
            <div class="header__navbar">
                <ul class="list-unstyled">
                    <li class="has-sub">
                        <a href="#">
                            <i class="fas fa-desktop"></i>
                            <span class="bot-line"></span>ระบบ</a>
                        <ul class="header3-sub-list list-unstyled">
                            <li>
                                <a href="../login.html">เข้าสู่ระบบ</a>
                            </li>
                            <li>
                                <a href="../register.html">สมัครสมาชิก</a>
                            </li>
                            <li>
                                <a href="../login.php">ออกจากระบบ</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="#">
                            <i class="fas fa-copy"></i>
                            <span class="bot-line"></span>เว็บไซต์</a>
                        <ul class="header3-sub-list list-unstyled">
                            <li>
                                <a href="../index.html">หน้าหลัก</a>
                            </li>
                            <li>
                                <a href="../static.html">สถิติ</a>
                            </li>
                            <li>
                                <a href="../new.html">ข่าวสาร</a>
                            </li>
                            <li>
                                <a href="../about.html">เกี่ยวกับ</a>
                            </li>
                            <li>
                                <a href="../conditions.html">ข้อตกลง</a>
                            </li>
                            <li>
                                <a href="../contact.html">ติดต่อ</a>
                            </li>
                            
                        </ul>
                    </li>
                    
                    <li class="has-sub">
                        <a href="#">
                            <i class="fas fa-shopping-basket"></i>
                            <span class="bot-line"></span>บัญชี</a>
                        <ul class="header3-sub-list list-unstyled">
                            <li>
                                <a href="editprofile.html">แก้ไขโปรไฟล์</a>
                            </li>
                            <li>
                                <a href="deposit.html">ฝากเงิน</a>
                            </li>
                            <li>
                                <a href="withdrawn.html">ถอนเงิน</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="header__tool">
                <div class="fa-hover col-lg-2 col-md-2">
                    <a href="editprofile.html">
                        <i class="fa fa-user"></i></a>
                </div>
                <div class="fa-hover col-lg-5 col-md-8">
                  <a href="../index.html">
                    <i class="fa fa-home"></i>
                 </a></div>
             
                <div class="account-wrap">
                    <div class="account-item account-item--style2">
                        <div class="image">
                            <img src="images/icon/avatar-02.jpg" alt="Beeba">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </header>
  <!----------------------------------------------------------------------------------------------------------------------->
   
  <!----------------------------------------------------------------------------------------------------------------------->
  
        </header>
        <!-- END HEADER DESKTOP-->



        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                       
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- WELCOME-->
            <section class="welcome p-t-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if(isset($_SESSION['email'])) : ?>
                                <p>welcome <strong><?php echo $_SESSION['email']; ?></strong></p>
                                <p><a herf = "profile.php?logout='1'" style="color: red;"></a></p>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END WELCOME-->
            
            <!-- STATISTIC-->
            <section class="statistic statistic2">
                <div class="container">
                    <div class="alert alert-dark" role="alert">
                       
                    
                    <label class="switch switch-default switch-pill switch-success mr-2">
                        <input type="checkbox" class="switch-input" checked="true">
                        <span class="switch-label"></span>
                        <span class="switch-handle"></span>
                      </label>
                      สถานะบอท(Bot)
                    </div>
                    <div class="row">
                       
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--green">
                                <h2 class="number">10,368</h2>
                                <span class="desc">เงินในบัญชี(Balance)</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-account-o"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--red">
                                <h2 class="number">+1,060,386</h2>
                                <span class="desc">กำไร/ขาดทุน</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-money"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->

            <!-- DATA TABLE-->
            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-5 m-b-35">ประวัติบัญชี</h3>
                            <div class="table-data__tool">
                                <div class="table-data__tool-left"></div>
                                <div class="table-data__tool-right">
                                    <a href="deposit.html"><button class="btn btn-success btn-lg">
                                        <i class="zmdi zmdi-plus"></i>ฝากเงิน</button></a>
                                    <a href="withdrawn.html"><button type="button" class="btn btn-danger btn-lg">
                                        <i class="zmdi zmdi-plus"></i>ถอนเงิน</button></a>
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                       
                                            <th>วัน/เดือน/ปี</th>
                                            <th>สถานะ</th>
                                            <th>การอนุมัติ</th>
                                            <th>เงิน</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="tr-shadow">
                                        
                                         
                                            <td>2018-09-27 02:12</td>
                                            <td>ฝากเงิน</td>
                                            <td><span class="status--process">ผ่าน</span></td>
                                            <td>$679.00</td>
                        
                                        </tr>
                                        <tr class="spacer"></tr>
                                        <tr class="tr-shadow">
                                         
                                         
                                            <td>2018-09-29 05:57</td>
                                            <td>ฝากเงิน</td>
                                            <td>
                                                <span class="status--process">ผ่าน</span>
                                            </td>
                                            <td>$999.00</td>
                                
                                        </tr>
                                        <tr class="spacer"></tr>
                                        <tr class="tr-shadow">
                                      
                            
                                            <td>2018-09-25 19:03</td>
                                            <td>ถอนเงิน</td>
                                            <td>
                                                <span class="status--denied">ไม่ผ่าน</span>
                                            </td>
                                            <td>$1199.00</td>
                            
                                        </tr>
                                        <tr class="spacer"></tr>
                                        <tr class="tr-shadow">
                                    
                            
                                            <td>2018-09-24 19:10</td>
                                            <td>ถอนเงิน</td>
                                            <td>
                                                <span class="status--process">ผ่าน</span>
                                            </td>
                                            <td>$699.00</td>
                                    
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END DATA TABLE-->

            <!-- COPYRIGHT-->
            <section class="p-t-60 p-b-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END COPYRIGHT-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>