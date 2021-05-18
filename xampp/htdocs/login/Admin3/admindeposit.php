<?php
session_start();
if(!isset($_SESSION['email'])){
    $_SESSION['error'] = "กรุณาเข้าสู่ระบบ";
    header('location: ../login.php');
}
if(isset($_POST['logout'])){
    session_destroy();
    unset($_SESSION['email']);
    header('location: ../login.php');
}

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM billing_information WHERE CONCAT(DATEANDHR,EMAIL,DATE, HM,IMAGE) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
else if(isset($_POST['userall']))
{
    header('location: adminprofile.php');
    
}
else if(isset($_POST['deposit']))
{
    header('location: admindeposit.php');
    
}
else if(isset($_POST['withdrawn']))
{
    header('location: adminwithdrawn.php');
    
}
 else {
    $query = "SELECT * FROM billing_information";
    $search_result = filterTable($query);
}


// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "mistersig", "TraderV2", "beebacop");
    $filter_Result = mysqli_query($connect, $query);
    if(mysqli_num_rows($filter_Result)==0){ 
        $_SESSION['error'] = "หาข้อมูลไม่พบ";
        return $filter_Result;
    }
    else{
        return $filter_Result;
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
    <title>Admin Profile</title>
    <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style></style>

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
    <style>
             tr{cursor: pointer; transition: all .25s ease-in-out}
            .selected{background-color: red; font-weight: bold; color: #fff;}
            
        </style>
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
        
        </aside>
        <!-- END MENU SIDEBAR-->
        <div class="page-container" style="background-color:#192231;" >
            <!-- HEADER DESKTOP-->
            <header class="header-desktop" style="background-color:#131c29;">
            <div class="section__content section__content--p30" >
                <div class="container-fluid">
                    <div class="header-wrap">
                        <form class="form-header" action="" method="POST">
                            <input style="background-color: #222222;" class="au-input au-input--xl" type="text" name="valueToSearch" placeholder="Search for datas &amp; reports..." />
                            <button class="au-btn--submit" type="submit" name="search">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>
                        <div class="header-button">
                            <div class="noti-wrap">
                            
                            </div>
                            <form method ="post">
                            <div class="account-wrap" style="background-color:#131c29;">
                                <div class="account-item clearfix js-item-menu" style="background-color:#131c29;">
                                    <div class="content" style="background-color:#131c29;">
                                        <a class="js-acc-btn" href="#" style="color:white;"><?php $emailsession = $_SESSION['email']; echo $emailsession;?></a>
                                    </div>
                                    <div class="account-dropdown js-dropdown" style="background-color:#24344d;">
                                        <div class="info clearfix">
                                            <div class="content">
    
                                                <span class="email" style="color:white;"><?php $emailsession = $_SESSION['email']; echo $emailsession;?></span>
                                            </div>
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </header>
            <!-- END HEADER DESKTOP-->
            <br><br>        
            <div class="main-content" style="background-color:#192231;" >  
                <div class="container">		
                    <div class="card login-card">
                        <form method="post">
                        <div class="row no-gutters"  style="background-color:#222222;padding: 40px;">
                                <div class="col-lg-4 col-md-5" style="text-align: center;">
                                    <input type="submit" name="userall" value="รายการผู้ใช้งานทั้งหมด" class="btn btn-block login-btn mb-4 " >
                                </div>
                                <div class="col-lg-4 col-md-5" style="text-align: center;">    
                                    <input type="submit" name="deposit" value="รายการฝากเงิน" class="btn btn-block login-btn mb-4 " >
                                </div>
                                <div class="col-lg-4 col-md-5" style="text-align: center;">
                                    <input type="submit" name="withdrawn" value="รายการถอนเงิน" class="btn btn-block login-btn mb-4 " >                            
                                </div>
                            </div>
           
                            <div class="row no-gutters"  style="background-color:#222222;padding: 40px;">
                            <div class="col-lg-12 col-md-5" style="text-align: left;">
    
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


                                    <!-- DATA TABLE-->
                                    <div class="table-responsive m-b-40">
                                        <table class="table table-borderless table-data3" style ="text-align: center;">
                                            <thead style ="text-align: center;">
                                                <tr>
                                                    <th>DATEANDHR</th>
                                                    <th>EMAIL</th>
                                                    <th>MONEY</th>
                                                    <th>DATE</th>
                                                    <th>HM</th>
                                                    <th>IMAGE</th>
                                                    <th>ยืนยัน</th>
                                                    <th>ลบข้อมูล</th>
                                    
                                                </tr>
                                            </thead>
                                            <tbody style ="text-align: center;">
                                            <?php while($row = mysqli_fetch_array($search_result)):?>
                    <?php $nameimage = $row['IMAGE'];
                    $TT = "%20"
                    ?>
                <tr>
                    <td><label><?php echo $row['DATEANDHR'];?></label></td>
                    <td><label><?php echo $row['EMAIL'];?></label></td>
                    <td><label><?php echo $row['MONEY'];?></label></td>
                    <td><label><?php echo $row['DATE'];?></label></td>
                    <td><label><?php echo $row['HM'];?></label></td>
                    <td><p onclick="window.location.href='payment/<?php echo  $TT . $nameimage;?>'"><?php echo $row['IMAGE'];?></p></td>
                    <td><a href ="admindeposit_pc.php?datehr=<?php echo $row['DATEANDHR'];?>&email=<?php echo $row['EMAIL'];?>&money=<?php echo $row['MONEY'];?>&date=<?php echo $row['DATE'];?>&hm=<?php echo $row['HM'];?>&image=<?php echo $nameimage;?>"  >ยืนยัน</a></td>
                    <td><a href ="admindeposit_pc_Delete.php?datehr=<?php echo $row['DATEANDHR'];?>&email=<?php echo $row['EMAIL'];?>&money=<?php echo $row['MONEY'];?>&date=<?php echo $row['DATE'];?>&hm=<?php echo $row['HM'];?>&image=<?php echo $nameimage;?>"  >ลบข้อมูล</a></td>
                    
    
                    
                </tr>
                <?php endwhile;?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- END DATA TABLE -->            
                                </div>              
                            </div>
                        </form>
                    </div>
                </div>
            </div>    
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