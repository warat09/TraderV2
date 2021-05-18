
<?php 
    include('db_conn.php');
    session_start();
    $email = mysqli_real_escape_string($conn , $_SESSION['email']);
    $sql =  "SELECT * FROM users WHERE EMAIL='$email'";
    $result = mysqli_query($conn, $sql);
    $results = mysqli_fetch_assoc($result);
    $image = $results['profile_image'];
    $name = $results['NAME'];
    $surname = $results['SURNAME'];
    $_SESSION['money'] = $results['MONEY'];

    $id = "SELECT count(ID) AS total FROM users";
    $result = mysqli_query($conn,$id);
    $values = mysqli_fetch_assoc($result);
    $count = $values['total'];

     //id admin warat
 $emailadmin1 = "beebacorporation@gmail.com";
 $emailwarat = mysqli_real_escape_string($conn , $emailadmin1);
 $sqladmin1 =  "SELECT * FROM admins WHERE EMAIL='$emailadmin1'";
 $resultadmin1 = mysqli_query($conn, $sqladmin1);
 $resultsadmin1 = mysqli_fetch_assoc($resultadmin1);
 $youtubeadmin1 = $resultsadmin1['YOUTUBE'];
 
 //id admin opal
 $emailadmin2 = "afterlevisp@hotmail.com";
 $emailopal = mysqli_real_escape_string($conn , $emailadmin2);
 $sqladmin2 =  "SELECT * FROM admins WHERE EMAIL='$emailadmin2'";
 $resultadmin2 = mysqli_query($conn, $sqladmin2);
 $resultsadmin2 = mysqli_fetch_assoc($resultadmin2);
 $youtubeadmin2 = $resultsadmin2['YOUTUBE'];
 
 //id admin SiGz
 $emailadmin3 = "mrsilent7797@gmail.com";
 $emailsigz = mysqli_real_escape_string($conn , $emailadmin3);
 $sqladmin3 =  "SELECT * FROM admins WHERE EMAIL='$emailadmin3'";
 $resultadmin3 = mysqli_query($conn, $sqladmin3);
 $resultsadmin3 = mysqli_fetch_assoc($resultadmin3);
 $youtubeadmin3 = $resultsadmin3['YOUTUBE'];
  
    if(!isset($_SESSION['email'])){
        $_SESSION['error'] = "กรุณาเข้าสู่ระบบ";
        header('location: ../login.php');
    }
    else if(isset($_POST['logout'])){
        session_destroy();
        unset($_SESSION['email']);
        header('location: ../login.php');
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

    <!---NEW-->
	
    <link href="css/news/bootstrap.min.css" rel="stylesheet">
    <link href="css/news/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/news/animate.min.css" rel="stylesheet" >	
    <link href="css/news/font-awesome.min.css" rel="stylesheet">	
    <link href="css/news/prettyPhoto.css" rel="stylesheet">

    <link href="css/news/theme.css" rel="stylesheet">	
    <link href="css/news/responsive.css" rel="stylesheet">
    <link href="css/news/colors/blue.css" rel="stylesheet" class="colors">
 <!-- Modernizer -->
 <script src="js/news/modernizer.js"></script>


    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">


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
    
        <
    <style>
    .button3 {
        background-color: white; 
        color: black; 
        border: 2px solid #f44336;
    }
    .navbar-sidebar{
        font-family: 'Prompt', sans-serif;
    }
    

    .main-content{
        font-family: 'Prompt', sans-serif;
    }
    .page-container{
        font-family: 'Prompt', sans-serif;
    }
    
    </style>
    

</head>

<body style="background-color:#192231;">
    <div class="page-wrapper" style="background-color:#192231;">
    <!-----------------------------------------------------------------------------------------------------------------------
                                                THEME
    ----------------------------------------------------------------------------------------------------------------------->
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block"style="background-color:#131c29;" >
            <div class="logo" style="background-color:#131c29;">
           
                <a href="location:../login.html">
                    <br>
                    <img src="images/logo_1.png"  alt="Beeba" />
                    <br><br>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1" style="background-color:#131c29;">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a href="profile.php">
                                <i class="fas fa-chart-bar"></i>หน้าหลัก</a>
                        </li>
                        <li >
                          <a class="js-arrow" href="#">
                              <i class="fas fa-table"></i>เกี่ยวกับการเงิน</a>
                          <ul class="list-unstyled navbar__sub-list js-sub-list">
                              <li> 
                                <a href="history.php"><i class="fas fa-archive"></i>ประวัติ</a>
                              </li>
                              <li>
                                <a href="deposit.php"><i class="fas fa-dollar"></i>ฝากเงิน</a>
                              </li>
                              <li >
                                <a href="withdrawn.php"><i class="fas fa-dollar"></i>ถอนเงิน</a>
                              </li>
                      
                          </ul>
                      </li>
                      <li>
                        <a href="news.php">
                            <i class="fas fa-file-text"></i>ข่าวสาร</a>
                      </li>
                      <li>
                        <a href="contact.php">
                            <i class="fas fa-comments"></i>ติดต่อ</a>
                      </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR--> 
        <form method = "post">
        <div class="page-container" style="background-color:#192231;">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop" style="background-color:#131c29;">
                <div class="section__content section__content--p30" >
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                              <h3 style="font-size: 95%;"> <i class="fas fa-chart-bar"></i> หน้าหลัก</h3>
            
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                        
                                </div>
                                <div class="account-wrap" style="background-color:#131c29;">
                                    <div class="account-item clearfix js-item-menu" style="background-color:#131c29;">
                                        <div class="image">
                                            <img src="uploads/<?php echo $image?>" alt="Profile" />
                                        </div>
                                        <div class="content" style="background-color:#131c29;">
                                            <a class="js-acc-btn" href="#" style="color:white;"><?php echo $name?> <?php echo $surname?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown" style="background-color:#24344d;">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="uploads/<?php echo $image?>" alt="Profile" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name" >
                                                        <a href="#" style="color:white;"><?php echo $name?> <?php echo $surname?></a>
                                                    </h5>
                                                    <span class="email" style="color:white;"><?php $emailsession = $_SESSION['email']; echo $emailsession;?></span>
                                                </div>
                                            </div>  
                                            <div class="account-dropdown__item">
                                        <button style="width: 100%;text-align: left;">
                                      <a href="editprofile.php"  style="color:white;font-size: 103%;">
                                          <i class="zmdi zmdi-account"></i> บัญชีผู้ใช้งาน
                                        </a>
                                          </button>
                                  </div>
                                    <div class="account-dropdown__footer" >
                                        <button name="logout" style="width: 100%;text-align: left;">
                                            <a   style="color:white;font-size: 103%;">
                                            <i class="zmdi zmdi-power"></i> ออกจากระบบ
                                        </a>
                                        </buttton>
                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
  </form>
            <!-- END HEADER DESKTOP--> 
        
        
        <!----------------------------------------------------------------------------------------------------------------------->       
        <div class="main-content" style="background-color:#192231;">
            <div class="container">		
                
                    <!-- PAGE CONTENT-->
                    <!----------------------------------------------------------------------------------------------------------------------->
                        <!-- WELCOME-->
                        <section class="welcome p-t-10">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                    
                                    <!---- notification -------->
                                        <?php if(isset($_SESSION['success'])) : ?>
                                            <div class = "success">
                                                <h3 style="color:green">
                                                    <?php
                                                    echo $_SESSION['success'];
                                                    unset($_SESSION['success']);
                                                    ?>
                                                </h3>
                                            </div>
                                            <?php endif ?>
                                
                                        <?php if(isset($_SESSION['email'])) : ?>
                                            <p>ยินดีต้อนรับ <strong><?php echo $_SESSION['email']; ?></strong></p>
                                            <p><a herf = "profile.php?logout='1'" style="color: red;"></a></p>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- END WELCOME-->
                        <!--<?php echo "จำนวนเงินตอนนี้มี ".$money;?>-->
                <div class="card login-card">
                <div class="row no-gutters"  style="background-color:#222222;padding: 40px;">
                <div class="col-lg-4 col-md-5">
                <button type="submit" name="port1" class="btn btn-block login-btn mb-4 " style="font-size:97%;">พอรต์1</button>
                </div>
                <div class="col-lg-4 col-md-5">
                <button type="submit" name="port2" class="btn btn-block login-btn mb-4 " style="font-size:97%;">พอรต์2</button>
                </div>
                <div class="col-lg-4 col-md-5">
                <button type="submit" name="port3" class="btn btn-block login-btn mb-4 " style="font-size:97%;">พอรต์3</button>
                </div>
                </div>
                
                    <div class="row no-gutters"  style="background-color:#222222;padding: 40px;">
                        <div class="col-lg-8 col-md-5">
                        <?php
                        if(isset($_POST['port1'])){
                            echo "<iframe width=480 height=320 src=https://www.youtube.com/embed/$youtubeadmin1/live_stream?autoplay=1&mute=1 frameborder=0  allowfullscreen></iframe>";
                        }
                        else if(isset($_POST['port2'])){
                            echo "<iframe width=480 height=320 src=https://www.youtube.com/embed/$youtubeadmin2/live_stream?autoplay=1&mute=1 frameborder=0  allowfullscreen></iframe>";
                        }
                        else if(isset($_POST['port3'])){
                            echo "<iframe width=480 height=320 src=https://www.youtube.com/embed/$youtubeadmin3/live_stream?autoplay=1&mute=1 frameborder=0  allowfullscreen></iframe>";
                        }
                        else{
                            echo "<iframe width=480 height=320 src=https://www.youtube.com/embed/$youtubeadmin1/live_stream?autoplay=1&mute=1 frameborder=0  allowfullscreen></iframe>";
                        }
                        ?>
                            
                        </div>
                        <div class="col-lg-4 col-md-5">
                            <table>
                                <tr>
                                    <div class="overview-item overview-item--c1">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="zmdi zmdi-account-o"></i>
                                                </div>
                                                <div class="text">
                                                    <h2><?php echo $count;?></h2>
                                                    <span>จำนวนสมาชิก</span>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>                                   
                                </tr>
                                <tr>
                                    <div class="overview-item overview-item--c4">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="zmdi zmdi-money"></i>
                                                </div>
                                                <div class="text">
                                                    <h2><?php echo $results['MONEY']?></h2>
                                                    <span>จำนวนเงิน</span>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>                                    
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row no-gutters"  style="background-color:#222222;padding: 40px;">
                        <div class="col-lg-12 col-md-3">
                        <center><img src="images/underline3.png"></center>     
                        </div>              
                    </div>
                    <form method="post" action="userinvest.php">
                    <div class="row no-gutters"  style="background-color:#222222;padding: 40px;">
                        <div class="col-md-12">
                            <center>
                          <h1 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="100ms"><span class="text-color"> ร่วมลงทุน<span class="cursor" data-cursorDisplay="_" data-owner="some-id"></span></span></h1>		
                        </center>
                        
                          <br>
                          <h2 class="control-label mb-4">เงินลงทุน<span class="main-color">ขั้นต่ำ 1000 บาท</span> โดยแบ่งกลุ่มเงินลงทุนออกเป็น 3 ระดับดังนี้</h2>
                          <h2 class="control-label mb-2"><span class="main-color"><i class="fas fa-exclamation-circle"></i></span> เงินปันผลแต่ละกลุ่มรับเงินสูงสุดที่<span class="main-color"> 9%</span></h2>

                          <h3 class="control-label mb-2"> <span class="main-color"><i class="fas fa-plus-circle"></i></span> 100000 บาท ขึ้นไป<span class="main-color"> กลุ่มเงินทุนระดับ 1</span></h3>
                          <h3 class="control-label mb-2"> <span class="main-color"><i class="fas fa-plus-circle"></i></span> 10000 บาท ขึ้นไป<span class="main-color"> กลุ่มเงินทุนระดับ 2</span></h3>
                          <h3 class="control-label mb-2"> <span class="main-color"><i class="fas fa-plus-circle"></i></span> 1000 บาท ขึ้นไป<span class="main-color"> กลุ่มเงินทุนระดับ 3</span></h3>
                          <br>
                          <h3 class="control-label mb-2"><span class="main-color"><i class="fas fa-warning"></i></span> เมื่อ<span class="main-color">กดปุ่มยืนยัน</span>การร่วมลงทุนแล้ว จะ<span class="main-color">ไม่สามารถร่วมลงทุนใหม่ได้จนกว่าจะคืนเงินลงทุน</span></h3>
                        </div>
                    </div>
                    <div class="row no-gutters"  style="background-color:#222222;padding: 40px;">
                        <div class="col-lg-4 col-md-5">
                            <div class="overview-item overview-item--c2">
                                <div class="overview__inner">
                                    <div class="overview-box clearfix">
                                        <div class="icon">
                                            <i class="zmdi zmdi-money"></i>
                                        </div>
                                        <div class="text">
                                            <h2><?php echo $results['INVESTMONEY']?></h2>
                                            <span>เงินที่ร่วมลงทุน</span>
                                        </div>
                                    </div>
                                   <br>
                                </div>
                            </div>                            
                        </div>
                        <div class="col-lg-1 col-md-5">
                            
                        </div>

                        <div class="col-lg-5 col-md-5">

                        <?php if (isset($_SESSION['error'])) : ?>
                        <div class="error">
                        <h3 style="color:red;font-size: 92%;">
                            <?php 
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            ?>
                        </h3>
                        </div>
                        <?php endif ?>

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
                            <h4>ช่องกรอกเงินร่วมลงทุน</h4>
                            <input type="number" name="s" id="investmoney" class="form-control" placeholder="จำนวนเงิน">
                            <button type="submit" name="submits" class="btn btn-block login-btn mb-4 " style="font-size:97%;">ยืนยัน</button>
                        </div>
                    </div>
                    <div class="row no-gutters"  style="background-color:#222222;padding: 40px;">
                        <div class="col-lg-12 col-md-5">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container"></div>
                            <div class="tradingview-widget-copyright"><a href="https://in.tradingview.com/symbols/BTCUSD/?exchange=BITSTAMP" rel="noopener" target="_blank"></div>
                            <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                            <script type="text/javascript">
                            new TradingView.widget(
                            {
                            "width": 800,
                            "height": 420,
                            "symbol": "BITSTAMP:BTCUSD",
                            "interval": "5",
                            "timezone": "Asia/Bangkok",
                            "theme": "dark",
                            "style": "1",
                            "locale": "in",
                            "toolbar_bg": "#f1f3f6",
                            "enable_publishing": false,
                            "allow_symbol_change": true,
                            "details":true,
                            "container_id": "tradingview_097ac"
                            });
                            </script>
                            <!-- TradingView Widget END -->
                        </div>
                    </div>
                                 
                </div>
                </form>
            </div>    
        
            </div>
        </div>
        <!----------------------------------------------------------------------------------------------------------------------->
    </div>

    <!-----------------------------------------------------------------------------------------------------------------------
                                                BACK
    ----------------------------------------------------------------------------------------------------------------------->
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
    <script src="vendor/select2/select2.min.js"></script>
    <script src="js/news/all.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <!-----------------------------------------------------------------------------------------------------------------------
                                                END BACK
    ----------------------------------------------------------------------------------------------------------------------->

</body>
</html>