<?php
session_start();
include('server.php');

$email = mysqli_real_escape_string($conn, $_SESSION['email']);
$email_check_query = "SELECT * FROM users WHERE EMAIL = '$email'";
$query = mysqli_query($conn, $email_check_query);
$result = mysqli_fetch_assoc($query);
$image = $result['profile_image'];
$name = $result['NAME'];
$surname = $result['SURNAME'];

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
<html>
<head>
	<title>Deposit</title>
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			min-height: 100vh;
		}
		.form-div { margin-top: 100px; border: 1px solid #e0e0e0; }
#profileDisplay { display: block; height: 210px; width: 210px; margin: 0px auto; border-radius: 50%; }
.img-placeholder {
  width: 210px;;
  color: white;
  height: 210px;
  background: black;
  opacity: .7;
  height: 210px;
  border-radius: 50%;
  z-index: 2;
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  display: none;
}
.img-placeholder h4 {
  margin-top: 40%;
  color: white;
}
.img-div:hover .img-placeholder {
  display: block;
  cursor: pointer;
} 
	</style>

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


<!-- Google Font -->
  <!-- <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100&display=swap" rel="stylesheet" type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'> -->
<link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Charmonman&display=swap">
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Charmonman&family=Prompt:wght@300&display=swap" >
  
    <style>
      #home .carousel-inner h1,h2,p{
        font-family: 'Prompt', sans-serif;
        /* font-size: 48px; */
      }
	  #navigation .navbar-wrapper ul,a{
		font-family: 'Prompt', sans-serif;
        /* font-size: 48px; */
	  }
	  #news .news h1,h2,h3,p,span,a,p{
		font-family: 'Prompt', sans-serif;
        /* font-size: 48px; */ 
	  }
	  #news .itle-com h1,span{
		font-family: 'Prompt', sans-serif;
        /* font-size: 48px; */ 
	  }
	  #news .overlay h1,h2,h3,p,span,a,p,div{
		font-family: 'Prompt', sans-serif;
        /* font-size: 48px; */
	  }
	  #pricing .pricing h1,h2,h3,p,span,a,div{
		font-family: 'Prompt', sans-serif;
        /* font-size: 48px; */ 
	  }
	  #about .about-us h1,h2,h3,p,span,a,div{
		font-family: 'Prompt', sans-serif;
        /* font-size: 48px; */ 
	  }
	  #team .team h1,h2,h3,p,span,a,div{
		font-family: 'Prompt', sans-serif;
        /* font-size: 48px; */  
	  }
	  #home .item-active p{
        font-family: 'Prompt', sans-serif;
        /* font-size: 48px; */
      }
	  #home .item-active a{
        font-family: 'Prompt', sans-serif;
        /* font-size: 48px; */
      }
    </style>
 
	<!-- Favicons -->
  <link rel="apple-touch-icon" href="images/ico/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="images/ico/apple-touch-icon-72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="images/ico/apple-touch-icon-114.png">
  <link rel="apple-touch-icon" sizes="144x144" href="images/ico/apple-touch-icon-144.png">



  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css'>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="css/style.css">
  


<!-------->




    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">


        <!-- load CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300">  <!-- Google web font "Open Sans" -->
        <link rel="stylesheet" href="2097_pop/css/bootstrap.min.css">                                  <!-- https://getbootstrap.com/ -->
        <link rel="stylesheet" href="2097_pop/fontawesome/css/fontawesome-all.min.css">                <!-- https://fontawesome.com/ -->
        <link rel="stylesheet" type="text/css" href="2097_pop/slick/slick.css"/>                       <!-- http://kenwheeler.github.io/slick/ -->
        <link rel="stylesheet" type="text/css" href="2097_pop/slick/slick-theme.css"/>
        <link rel="stylesheet" href="2097_pop/css/tooplate-style.css">                               <!-- Templatemo style -->
        <script>document.documentElement.className="js";var supportsCssVars=function(){var e,t=document.createElement("style");return t.innerHTML="root: { --tmp-var: bold; }",document.head.appendChild(t),e=!!(window.CSS&&window.CSS.supports&&window.CSS.supports("font-weight","var(--tmp-var)")),t.parentNode.removeChild(t),e};supportsCssVars()||alert("Please view this in a modern browser such as latest version of Chrome or Microsoft Edge.");</script>
        <!--------->
        <link rel="shortcut icon" href="images/favicon1.png">	

</head>
<body style="background-color:#192231;">
    <div class="page-wrapper" style="background-color:#192231;">
      <!-- MENU SIDEBAR-->
      <aside class="menu-sidebar d-none d-lg-block"style="background-color:#131c29;" >
                <div class="logo" style="background-color:#131c29;">
               
                    <a href="location:../login.html">
                        <br>
                        <img src="images/logo_1.png" alt="Beeba" />
                        <br><br>
                    </a>
                </div>
                <div class="menu-sidebar__content js-scrollbar1" style="background-color:#131c29;">
                    <nav class="navbar-sidebar">
                        <ul class="list-unstyled navbar__list">
                            <li>
                                <a href="profile.php">
                                    <i class="fas fa-chart-bar"></i>หน้าหลัก</a>
                            </li>
                            <li class="active has-sub">
                              <a class="js-arrow" href="#">
                                  <i class="fas fa-table"></i>เกี่ยวกับการเงิน</a>
                              <ul class="list-unstyled navbar__sub-list js-sub-list">
                                  <li>
                                    <a href="history.php"><i class="fas fa-archive"></i>ประวัติ</a>
                                  </li>
                                  <li class="active has-sub">
                                    <a href="deposit.php"><i class="fas fa-dollar"></i>ฝากเงิน</a>
                                  </li>
                                  <li>
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
      <!-- Container-->
      <form method = "post">
      <div class="page-container" style="background-color:#192231;" >

        <!-- HEADER DESKTOP-->
        <header class="header-desktop" style="background-color:#131c29;">
        <div class="section__content section__content--p30" >
            <div class="container-fluid">
                <div class="header-wrap">
                    <form class="form-header" action="" method="POST">
                      <h3><i class="fas fa-dollar"></i> ฝากเงิน</h3>
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

        <!--MAIN-->
        <!----------------------------------------------------------------------------------------------------------------------->       
        <div class="main-content" style="background-color:#192231;" >  
            <div class="row">
              <div class="container">	
                <div class="wrapper-pricing">
                  <!-- Plan 1 -->				
                  <div class="col-lg-4 col-md-5">
                    <div class="single-table wow fadeInRight" data-wow-duration="1s" data-wow-delay="300ms">
                      <center>
                      <h4>กรุงเทพ</h4>
                        <div class="price-icon">
                          <img src="images/bkk.png">                            
                        </div>
                      <span class="price" style="font-size:120%;">907-737-9767</span>
                      <ul>
                          <li style="font-size:90%;">นายเศรษฐธร โสมรักษ์</li>
                      </ul>
                      </center>
                    </div>
                  </div>							
                  <!-- Plan 2 -->				
                  <div class="col-lg-4 col-md-5">
                    <div class="single-table wow fadeInRight" data-wow-duration="1s" data-wow-delay="300ms">
                      <center>
                      <h4>ทหารไทย</h4>
                        <div class="price-icon">
                          <img src="images/image2s.png">                            
                        </div>
                      <span class="price" style="font-size:120%;">230-276-5827</span>
                      <ul>
                          <li style="font-size:90%;">นายเจนวิทย์ มุงสูงเนิน</li>
                      </ul>
                      </center>
                    </div>
                  </div>			
                  <!-- Plan 3				 -->
                  <div class="col-lg-4 col-md-5">
                                      <div class="single-table wow fadeInRight" data-wow-duration="1s" data-wow-delay="300ms">
                                        <center>
                                        <h4>ไทยพาณิชย์</h4>
                                          <div class="price-icon">
                                            <img src="images/tLDin.jpg">                            
                                          </div>
                                        <span class="price" style="font-size:120%;">264-2839-320</span>
                                        <ul>
                                            <li style="font-size:90%;">นายวริทธิ์ธร ปรียวัฒนา</li>
                                        </ul>
                                        </center>
                                      </div>
                  </div>					
                </div>
              </div>
            </div>
            <br>
            <div class="col-lg-12 col-md-5">

              <!--iTle do it!!-->
              <form action="deposit_db.php" method="post"enctype="multipart/form-data" style="background-color:#192231;">
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
         
                <div class="container">		
                  <div class="card login-card">	
                    <div class="row no-gutters"  style="background-color:#222222;padding: 40px;">
                    
                    <div class="col-md-6">
                      <center>
                    <h1 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="100ms"><span class="text-color"> ลงทุน<span class="cursor" data-cursorDisplay="_" data-owner="some-id"></span></span></h1>		
                  </center>
                    <br>
                    <h2 class="control-label mb-4">เงินลงทุน<span class="main-color">ขั้นต่ำ 1000 บาท</span> โดยแบ่งกลุ่มเงินลงทุนออกเป็น 3 ระดับดังนี้</h2>
                    <h3 class="control-label mb-2"> <span class="main-color"><i class="fas fa-plus-circle"></i></span> 100000 บาท ขึ้นไป<span class="main-color"> กลุ่มเงินทุนระดับ 1</span></h3>
                    <h3 class="control-label mb-2"> <span class="main-color"><i class="fas fa-plus-circle"></i></span> 10000 บาท ขึ้นไป<span class="main-color"> กลุ่มเงินทุนระดับ 2</span></h3>
                    <h3 class="control-label mb-2"> <span class="main-color"><i class="fas fa-plus-circle"></i></span> 1000 บาท ขึ้นไป<span class="main-color"> กลุ่มเงินทุนระดับ 3</span></h3>
                    <br>
                    <h2 class="control-label mb-2"><span class="main-color"><i class="fas fa-warning"></i></span> เงินปันผลแต่ละกลุ่มรับเงินสูงสุดที่<span class="main-color"> 9%</span></h2>
                    </div>
                    <div class="col-md-1">
                      <img src="images/underline1.png">
                    </div>
                    <div class="col-md-5" >
                      <table>
    <tr>
      <h2>จำนวนเงิน</h2>
    </tr>
    <tr>
      <div class="form-group">
        <input type="number" name="payment" id="email" class="form-control" placeholder="บาท"  style="font-size:95%;">
      </div>             
    </tr>
    <tr>
      <h2>วัน/เวลาที่ชำระ</h2>
    </tr>
    <tr>
      <table>
<tr>
<input type="date"  style="background-color:#353541;"  name="your-date" class="wpcf7-form-control wpcf7-date wpcf7-validates-as-required wpcf7-validates-as-date" aria-required="true" aria-invalid="false" placeholder="วันที่ชำระ">
</tr>
<tr>
  <table>
    <tr>
      <td>
        <select name="menu-h" style="background-color:#353541;"class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required" aria-required="true" aria-invalid="false">
        <option value="">--- ชั่วโมง ---</option><option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option>
        <option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option>
        <option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option>
        <option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option>
        <option value="23">23</option><option value="24">24</option></select>
        </td>
        <td>
        <select name="menu-n" style="background-color:#353541;"class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required" aria-required="true" aria-invalid="false"><option value="">--- นาที ---</option>
        <option value="00นาที">00 นาที</option><option value="01นาที">01 นาที</option><option value="02นาที">02 นาที</option><option value="03นาที">03 นาที</option><option value="04นาที">04 นาที</option>
        <option value="05นาที">05 นาที</option><option value="06นาที">06 นาที</option><option value="07นาที">07 นาที</option><option value="08นาที">08 นาที</option><option value="09นาที">09 นาที</option>
        <option value="10นาที">10 นาที</option><option value="11นาที">11 นาที</option><option value="12นาที">12 นาที</option><option value="13นาที">13 นาที</option><option value="14นาที">14 นาที</option>
        <option value="15นาที">15 นาที</option><option value="16นาที">16 นาที</option><option value="17นาที">17 นาที</option><option value="18นาที">18 นาที</option><option value="19นาที">19 นาที</option>
        <option value="20นาที">20 นาที</option><option value="21นาที">21 นาที</option><option value="22นาที">22 นาที</option><option value="23นาที">23 นาที</option><option value="24นาที">24 นาที</option>
        <option value="25นาที">25 นาที</option><option value="26นาที">26 นาที</option><option value="27นาที">27 นาที</option><option value="28นาที">28 นาที</option><option value="29นาที">29 นาที</option>
        <option value="30นาที">30 นาที</option><option value="31นาที">31 นาที</option><option value="32นาที">32 นาที</option><option value="33นาที">33 นาที</option><option value="34นาที">34 นาที</option>
        <option value="35นาที">35 นาที</option><option value="36นาที">36 นาที</option><option value="37นาที">37 นาที</option><option value="38นาที">38 นาที</option><option value="39นาที">39 นาที</option>
        <option value="40นาที">40 นาที</option><option value="41นาที">41 นาที</option><option value="42นาที">42 นาที</option><option value="43นาที">43 นาที</option><option value="44นาที">44 นาที</option>
        <option value="45นาที">45 นาที</option><option value="46นาที">46 นาที</option><option value="47นาที">47 นาที</option><option value="48นาที">48 นาที</option><option value="49นาที">49 นาที</option>
        <option value="50นาที">50 นาที</option><option value="51นาที">51 นาที</option><option value="52นาที">52 นาที</option><option value="53นาที">53 นาที</option><option value="54นาที">54 นาที</option>
        <option value="55นาที">55 นาที</option><option value="56นาที">56 นาที</option><option value="57นาที">57 นาที</option><option value="58นาที">58 นาที</option><option value="59นาที">59 นาที</option></select>
        </td>
    </tr>
  </table>  
</tr>
      </table>
      <br>
    </tr>
    <tr>
      <h2>แนบหลักฐาน</h2>
    </tr>
    <tr>
      <div class="form-group text-center" style="position: relative;" >
        <input type="file" name="payImage" >
      </div>
    </tr>
    <tr>
        <input type="submit" name="submit"value="ยืนยัน" class="btn btn-block login-btn mb-4 "  style="font-size:97%;">
    </tr>
                      </table>

                    </div>
                  </div>
                  </div>
                </div>
               
       

              </form>
              <!------------>
     
         </div>
        <!----------------------------------------------------------------------------------------------------------------------->
        <!-- END MAIN-->

        </div>
        <!----------------------------------------------------------------------------------------------------------------------->       
      <!-- END Container-->
    </div>
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
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>


   <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/retina.min.js"></script>
	<script src="js/jquery.easing.min.js"></script>
	<script src="js/wow.min.js"></script>	
	<script src="js/waypoints.min.js"></script>	
	<script src="js/jquery.countTo.js"></script>
	<script src="js/jquery.mixitup.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>	
	<script src="js/jquery.knob.min.js"></script>	
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/openpdf.js"></script>



<script src="js/news/jquery.min.js"></script>
<script src="js/news/bootstrap.min.js"></script>
<script src="js/news/retina.min.js"></script>
<script src="js/news/jquery.easing.min.js"></script>
<script src="js/news/wow.min.js"></script>	
<script src="js/news/waypoints.min.js"></script>	
<script src="js/news/jquery.countTo.js"></script>
<script src="js/news/jquery.mixitup.min.js"></script>
<script src="js/news/jquery.prettyPhoto.js"></script>	
<script src="js/news/jquery.knob.min.js"></script>	
<script src="js/news/jquery.validate.min.js"></script>
<script src="js/news/custom.js"></script>
<script src="js/news/openpdf.js"></script>
<script src="js/news/all.js"></script>


<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js'></script>
<script  src="js/script.js"></script>




    <!-----------------------------------------------------------------------------------------------------------------------
                                                END BACK
    ----------------------------------------------------------------------------------------------------------------------->













</body>
</html>
