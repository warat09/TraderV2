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
	<title>Contact</title>
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

</header>
 <!-- HEADER DESKTOP-->
  
 <header class="header-desktop" style="background-color:#131c29;">
 <form method ="post">
    <div class="section__content section__content--p30" >
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" action="" method="POST">
                  <h3><i class="fas fa-comments"></i> ติดต่อ</h3>

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
                                  <a href="editprofile.php"  style="color:white;">
                                      <i class="zmdi zmdi-account"></i>บัญชีผู้ใช้งาน</a>
                              </div>
                                <div class="account-dropdown__footer">
                                    <button name="logout" style="color:white;">
                                        <i class="zmdi zmdi-power"></i>ออกจากระบบ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</header>
    
<!-- END HEADER DESKTOP--> 
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
                  <li class="active has-sub">
                    <a href="contact.php">
                        <i class="fas fa-comments"></i>ติดต่อ</a>
                  </li>
                </ul>
            </nav>
        </div>
    </aside>
    <!-- END MENU SIDEBAR--> 

<!-- Contact Section --> 
<section class="section-wrapper" id="contacts">
	<!-- Contacts -->	
	<div class="contacts"> 
	
		<!-- Block Title -->	
		<div class="element-title">			
			<div class="row">	 		
				<div class="container">
						<h1 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="100ms"><span class="text-color">ติดต่อพวกเรา</span></h1><br>						
							
					<h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="300ms">ติดต่อ <span class="main-color">ผู้ดูแล </span> ติดต่อสอบถาม</h3>	
				</div>
			</div>
		</div>
		<!-- End Block Title -->	
	
		<div class="container">
			<div class="row">	
				<div class="wrapper-contacts col-xs-12">		
					<div class="contact_form ">
						<div class="row">
							<div class="wrapper-contacts-icons">	
								<div class="col-xs-4 wow fadeInRight" data-wow-duration="1s" data-wow-delay="300ms"> 	
									<i class="fa fa-map-marker"></i>
									<div class="">1112 บ้านไอ้เติ้ล</div>
									<div class="">1150191 ดอทเนท</div>
								</div>								
								<div class="col-xs-4 wow fadeInRight" data-wow-duration="1s" data-wow-delay="450ms">	
									<i class="fa fa-mobile-phone"></i>
									<div class="">จันทร์ - ศุกร์ -999:99 999:99</div>
									<div class="">+1150 1112 191</div>
								</div>
								<div class="col-xs-4 wow fadeInRight" data-wow-duration="1s" data-wow-delay="600ms">	
									<i class="fa fa-envelope-o"></i>
									<div class="">อีเมลของพวกเรา</div>
									<div class="">tle.com & tle.net</div>
								</div>								
								
							</div>								
						</div><br>							
						<div class="row wow fadeInRight" data-wow-duration="1s" data-wow-delay="800ms">
							<form action = "sentweb.php" method = "post">
								<div>				
									<div>
										<input type="text" name="names" class="form-control" placeholder="ชื่อ">
									</div>
									<div>
										<input type="email" name="emails" class="form-control" placeholder="อีเมล">
									</div>
									<div>
										<input type="text" name="phones" class="form-control" placeholder="เบอร์โทรศัพท์">
									</div>
								</div>
								<div>				
									<div>
										<textarea  name="message" class="form-control" placeholder="ข้อความ" rows="8"></textarea>
									</div>
									
									<input type="submit" name="submit" class="" value="ส่งข้อความ">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contacts -->	
	
</section> 
<!-- End Contact Section -->	


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
	<script>
	const countEl = document.getElementById('count');
	updateVisitCount();
	function updateVisitCount(){
		fetch('https://api.countapi.xyz/update/Botplus/website/?amount=1')
			.then(res => res.json())
			.then(res =>{
				countEl.innerHTML = res.value;
			});
	}
	</script>

	
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
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

</body>
</html>

