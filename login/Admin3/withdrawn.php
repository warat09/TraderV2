<?php
session_start();
include('server.php');
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
    <title>withdrawn</title>

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

    
       
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <!--------------------------------------------------------------------->
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/icon/logo-white.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <!----------------------------------------------------------------------------------------------------->
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">ถอนเงิน</h3>
                            </div>
                            <hr>
                            <form action="withdrawn_db.php" method="post" novalidate="novalidate">
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
                                    <label for="cc-payment" class="control-label mb-1">ธนาคาร</label>
                                    <select id="cc-pament" name="bank" type="text" class="form-control" aria-required="true" aria-invalid="false" value=""><option value="">------------------- เลือกธนาคาร -------------------</option><option value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ</option><option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option><option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option><option value="ธนาคารทหารไทย">ธนาคารทหารไทย</option><option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์</option><option value="ธนาคารกรุงศรีอยุธยา">ธนาคารกรุงศรีอยุธยา</option><option value="ธนาคารเกียรตินาคินภัทร">ธนาคารเกียรตินาคินภัทร</option><option value="ธนาคารซีไอเอ็มบีไทย">ธนาคารซีไอเอ็มบีไทย</option><option value="ธนาคารทิสโก้">ธนาคารทิสโก้</option><option value="ธนาคารธนชาต">ธนาคารธนชาต</option><option value="ธนาคารยูโอบีธนาคารยูโอบี">ธนาคารยูโอบี</option><option value="ธนาคารออมสิน">ธนาคารออมสิน</option></select>
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">บัญชี</label>
                                    <input id="cc-pament" name="idbank" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">จำนวนเงิน</label>
                                    <input id="cc-pament" name="money" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">รหัสยืนยัน</label>
                                    <input id="cc-pament" name="password" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                </div>
                                     
                                <div>

                                    <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                        <span id="payment-button-amount">ยืนยัน</span>
                                        <span id="payment-button-sending" style="display:none;">กำลังส่ง…</span>
                                    </button>
                                    
                                </div>
                            </form>
                        </div>
                        <!----------------------------------------------------------------------------------------------------->
                    </div>
                </div>
                <!---------------------------------------------------------------------->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
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
<!-- end document-->
