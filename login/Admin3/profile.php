<?php 
    include('db_conn.php');
    session_start();
    $email = mysqli_real_escape_string($conn , $_SESSION['email']);
    $sql =  "SELECT * FROM users WHERE EMAIL='$email'";
    $result = mysqli_query($conn, $sql);
    $results = mysqli_fetch_assoc($result);
    if(!isset($_SESSION['email'])){
        $_SESSION['error'] = "กรุณาเข้าสู่ระบบ";
        header('location: ../login.php');
    }
    if(isset($_POST['logout'])){
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

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <style>
    .button3 {
  background-color: white; 
  color: black; 
  border: 2px solid #f44336;
}
    </style>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
   <!-----------------------------------------------------------------------------------------------------------------------
                                              THEME
----------------------------------------------------------------------------------------------------------------------->
<form method="post">
<header class="header-desktop3 d-none d-lg-block">
    <div class="section__content section__content--p35">
        <div class="header3-wrap">
            <div class="header__logo">
                <a href="../index.html">
                    <img src="images/icon/logo_1.png" alt="AutoBot-Trader">
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
                            <li class="button button3">
                            &nbsp &nbsp &nbsp <button name = "logout" style = "color:red">ออกจากระบบ</button>
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
                                <a href="<?php echo "editprofile.php"; ?>">แก้ไขโปรไฟล์</a>
                            </li>
                            <li>
                                <a href="deposit.php">ฝากเงิน</a>
                            </li>
                            <li>
                                <a href="withdrawn.php">ถอนเงิน</a>
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
                 <?php $image = $results['profile_image'];?>
             
                <div class="account-wrap">
                    <div class="account-item account-item--style2">
                        <div class="image">
                            <img src="uploads/<?php echo $image ;?>" alt="Beeba">
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
                                <p>welcome <strong><?php echo $_SESSION['email']; ?></strong></p>
                                <p><a herf = "profile.php?logout='1'" style="color: red;"></a></p>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END WELCOME-->
            
            <!-- STATISTIC--> 
    
            <!-- END STATISTIC-->
            

            <!-- DATA TABLE-->
            <table>
            <tr>
                <td>
                                <!-- TradingView Widget BEGIN -->
            <div class="tradingview-widget-container">
            <div id="tradingview_097ac"></div>
            <div class="tradingview-widget-copyright"><a href="https://in.tradingview.com/symbols/BTCUSD/?exchange=BITSTAMP" rel="noopener" target="_blank"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
            <script type="text/javascript">
            new TradingView.widget(
            {
            "width": 980,
            "height": 610,
            "symbol": "BITSTAMP:BTCUSD",
            "interval": "5",
            "timezone": "Asia/Bangkok",
            "theme": "light",
            "style": "1",
            "locale": "in",
            "toolbar_bg": "#f1f3f6",
            "enable_publishing": false,
            "allow_symbol_change": true,
            "details":true,
            "container_id": "tradingview_097ac"
            }
            );
            </script>
            </div>
<!-- TradingView Widget END -->
                </td>
                <td>
                   <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"><a href="https://th.tradingview.com/markets/stocks-thailand/" rel="noopener" target="_blank"><span class="blue-text">ราคาหุ้น</span></a> โดย TradingView</div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
  {
  "title": "หุ้น",
  "tabs": [
    {
      "title": "การเงิน",
      "symbols": [
        {
          "s": "NYSE:JPM",
          "d": "เจพีมอร์แกน เชสแอนด์โค"
        },
        {
          "s": "NYSE:WFC",
          "d": "เวล ฟาร์โก โค ใหม่"
        },
        {
          "s": "NYSE:BAC",
          "d": "แบงค์ อเมอ คอร์ป"
        },
        {
          "s": "NYSE:HSBC",
          "d": "เฮชเอสบีซี โฮลดิ้ง พีแอลซี"
        },
        {
          "s": "NYSE:C",
          "d": "ซิติกรุ๊ป อิงค์"
        },
        {
          "s": "NYSE:MA",
          "d": "มาสเตอร์การ์ด อินคอร์ปอเรท"
        }
      ]
    },
    {
      "title": "เทคโนโลยี",
      "symbols": [
        {
          "s": "NASDAQ:AAPL",
          "d": "แอปเปิ้ล"
        },
        {
          "s": "NASDAQ:GOOGL",
          "d": "กูเกิ้ล อิงค์"
        },
        {
          "s": "NASDAQ:MSFT",
          "d": "ไมโครซอฟต์ คอร์ป"
        },
        {
          "s": "NASDAQ:FB",
          "d": "เฟสบุ๊ค อิงค์"
        },
        {
          "s": "NYSE:ORCL",
          "d": "ออราเคิล คอร์ป"
        },
        {
          "s": "NASDAQ:INTC",
          "d": "อินเทล คอร์ป"
        }
      ]
    },
    {
      "title": "บริการ",
      "symbols": [
        {
          "s": "NASDAQ:AMZN",
          "d": "อเมซอน คอม อิงค์"
        },
        {
          "s": "NYSE:BABA",
          "d": "อาลีบาบา โฮสดิ้ง ลิมิตเต็ด"
        },
        {
          "s": "NYSE:T",
          "d": "เอทีแอนด์ที อิงค์"
        },
        {
          "s": "NYSE:WMT",
          "d": "วอลมาร์ต สโตร์ อิงค์"
        },
        {
          "s": "NYSE:V",
          "d": "วีซ่า อิงค์"
        }
      ]
    }
  ],
  "width": 400,
  "height": 660,
  "showChart": true,
  "locale": "th_TH",
  "plotLineColorGrowing": "rgba(33, 150, 243, 1)",
  "plotLineColorFalling": "rgba(33, 150, 243, 1)",
  "belowLineFillColorGrowing": "rgba(33, 150, 243, 0.12)",
  "belowLineFillColorFalling": "rgba(33, 150, 243, 0.12)",
  "gridLineColor": "#F0F3FA",
  "scaleFontColor": "rgba(120, 123, 134, 1)",
  "showSymbolLogo": true,
  "symbolActiveColor": "rgba(33, 150, 243, 0.12)",
  "colorTheme": "light"
}
  </script>
</div>
<!-- TradingView Widget END --> 
                </td>
            </tr>
            <iframe width="1600" height="900" src="https://www.youtube.com/embed/SsJWUJ0ymvc/live_stream?autoplay=1&mute=1" frameborder="0"  allowfullscreen></iframe>
            </table>
            
        
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
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>


        
        </form>

</body>

</html>