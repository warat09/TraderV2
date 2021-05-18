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

$oldbilling = "SELECT * FROM oldbilling_information WHERE EMAIL = '$email'";
$queryoldbilling = mysqli_query($conn, $oldbilling);

$oldwithdrawn = "SELECT * FROM oldwithdrawn_information WHERE EMAIL = '$email'";
$queryoldwithdrawn = mysqli_query($conn, $oldwithdrawn);

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
	<title>History</title>
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
                                  <li class="active has-sub"> 
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
      <!-- Container-->
      <form method ="post">
      <div class="page-container" style="background-color:#192231;" >

        <!-- HEADER DESKTOP-->
        <header class="header-desktop" style="background-color:#131c29;">
            <div class="section__content section__content--p30" >
                <div class="container-fluid">
                    <div class="header-wrap">
                        <form class="form-header" action="" method="POST">
                          <h3><i class="fas fa-archive"></i> ประวัติ</h3>
    
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
                <div class="container">
                    <h1 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="100ms"> ฝากเงิน<span class="cursor" data-cursorDisplay="_" data-owner="some-id"></span></h1>		
                    <!--iTle do it!!-->
                    <div class="row">
                                <div class="col-md-12">
                                    <!-- DATA TABLE-->
                                    <div class="table-responsive m-b-40">
                                        <table class="table table-borderless table-data3" style ="text-align: center;">
                                            <thead style ="text-align: center;">
                                                <tr>
                                                    <th>เวลา</th>
                                                    <th>อีเมล</th>
                                                    <th>เงิน</th>
                                                    <th>วันที่ชำระ</th>
                                                    <th>เวลาที่ชำระ</th>
                                                    <th>รูปภาพ</th>
                                                    <th>สถานะ</th>
                                                </tr>
                                            </thead>
                                            <tbody style ="text-align: center;">
                                            <?php while($row = mysqli_fetch_array($queryoldbilling)):?>
                                                
                                            <tr>
                                                <td><?php echo $row['DATEANDHR'];?></td>
                                                <td><label><?php echo $row['EMAIL'];?></label></td>
                                                <td><label><?php echo $row['MONEY'];?></label></td>
                                                <td><label><?php echo $row['DATE'];?></label></td>
                                                <td><label><?php echo $row['HM'];?></label></td>
                                                <td><label><?php echo $row['IMAGE'];?></label></td>
                                                <?php 
                                                $status = $row['STATUS'];
                                                if($row['STATUS']=='อนุมัติ'){
                                                    echo "<td class='process'><label>$status</label></td>";
                                                    }
                                                    else{
                                                    echo "<td class='denied'><label>$status</label></td>";
                                                    }
                                                ?>  
                                            
                                                
                                            </tr>
                                            <?php endwhile;?>
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- END DATA TABLE                  -->
                                </div>
                    </div>
                    <!------------>
                    <h1 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="100ms"> ถอนเงิน<span class="cursor1" data-cursorDisplay="_" data-owner="some-id"></span></h1>
                    <!--iTle do it!!-->
                    <div class="row">
                                <div class="col-md-12">
                                    <!-- DATA TABLE-->
                                    <div class="table-responsive m-b-40">
                                        <table class="table table-borderless table-data3" style ="text-align: center;">
                                            <thead style ="text-align: center;">
                                                <tr>
                                                    <th>เวลา</th>
                                                    <th>อีเมล</th>
                                                    <th>ชื่อธนาคาร</th>
                                                    <th>หมายเลขบัญชี</th>
                                                    <th>เงิน</th>
                                                    <th>สถานะ</th>
                                                </tr>
                                            </thead>
                                            <tbody style ="text-align: center;">
                                            <?php while($row = mysqli_fetch_array($queryoldwithdrawn)):?>
                                            <tr>
                                                <td><?php echo  $row['DATEANDHR'];?></td>
                                                <td><label><?php echo $row['EMAIL'];?></label></td>
                                                <td><label><?php echo $row['BANK'];?></label></td>
                                                <td><label><?php echo $row['IDBANK'];?></label></td>
                                                <td><label><?php echo $row['MONEY'];?></label></td>
                                                <?php 
                                                $status = $row['STATUS'];
                                                if($row['STATUS']=='อนุมัติ'){
                                                    echo "<td class='process'><label>$status</label></td>";
                                                    }
                                                    else{
                                                    echo "<td class='denied'><label>$status</label></td>";
                                                    }
                                                ?>                               
                                            </tr>
                                            <?php endwhile;?>
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- END DATA TABLE                  -->
                                </div>
                    </div>
                    <!------------>
                </div>
      
         </div>
        <!----------------------------------------------------------------------------------------------------------------------->
        <!-- END MAIN-->

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
    <script src="js/news/all1.js"></script>

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
<!-- end document-->
