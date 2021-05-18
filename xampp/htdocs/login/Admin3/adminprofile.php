<?php
session_start();
include('db_conn.php');
    //id admin warat
$emailadmin1 = "beebacorporation@gmail.com";
$emailwarat = mysqli_real_escape_string($conn , $emailadmin1);
$sqladmin1 =  "SELECT * FROM admins WHERE EMAIL='$emailadmin1'";
$resultadmin1 = mysqli_query($conn, $sqladmin1);
$resultsadmin1 = mysqli_fetch_assoc($resultadmin1);

//id admin opal
$emailadmin2 = "afterlevisp@hotmail.com";
$emailopal = mysqli_real_escape_string($conn , $emailadmin2);
$sqladmin2 =  "SELECT * FROM admins WHERE EMAIL='$emailadmin2'";
$resultadmin2 = mysqli_query($conn, $sqladmin2);
$resultsadmin2 = mysqli_fetch_assoc($resultadmin2);

//id admin SiGz
$emailadmin3 = "mrsilent7797@gmail.com";
$emailsigz = mysqli_real_escape_string($conn , $emailadmin3);
$sqladmin3 =  "SELECT * FROM admins WHERE EMAIL='$emailadmin3'";
$resultadmin3 = mysqli_query($conn, $sqladmin3);
$resultsadmin3 = mysqli_fetch_assoc($resultadmin3);

$investall = $resultsadmin1['money']+$resultsadmin2['money']+$resultsadmin3['money'];

$resultsum = mysqli_query($conn, "SELECT SUM(MONEY) AS total FROM users"); 
$row = mysqli_fetch_assoc($resultsum); 
$sum = $row['total'];

//count1
$idport1 = "SELECT count(*) AS totalport1 FROM users WHERE INVESTMONEY >='100000'";
$resultport1 = mysqli_query($conn,$idport1);
$valuesport1 = mysqli_fetch_assoc($resultport1);
$countport1 = $valuesport1['totalport1'];

//count2
$idport2 = "SELECT count(*) AS totalport2 FROM users WHERE INVESTMONEY >='10000'AND INVESTMONEY<'100000'";
$resultport2 = mysqli_query($conn,$idport2);
$valuesport2 = mysqli_fetch_assoc($resultport2);
$countport2 = $valuesport2['totalport2'];

//count3
$idport3 = "SELECT count(*) AS totalport3 FROM users WHERE INVESTMONEY >='1000'AND INVESTMONEY<'10000'";
$resultport3 = mysqli_query($conn,$idport3);
$valuesport3 = mysqli_fetch_assoc($resultport3);
$countport3 = $valuesport3['totalport3'];

//กำไรสูงสุดสุดport1
$profitport1009 = "SELECT SUM(INVESTMONEY*0.09) AS profitport1009 FROM users WHERE INVESTMONEY >='100000'";
$resultprofitport1009 = mysqli_query($conn,$profitport1009);
$valuesprofitport1009 = mysqli_fetch_assoc($resultprofitport1009);
$countprofitport1009 = $valuesprofitport1009['profitport1009'];

//กำไรสูงสุดสุดport2
$profitport2009 = "SELECT SUM(INVESTMONEY*0.09) AS profitport2009 FROM users WHERE INVESTMONEY >='10000'AND INVESTMONEY<'100000'";
$resultprofitport2009 = mysqli_query($conn,$profitport2009);
$valuesprofitport2009 = mysqli_fetch_assoc($resultprofitport2009);
$countprofitport2009 = $valuesprofitport2009['profitport2009'];

//กำไรสูงสุดสุดport3
$profitport3009 = "SELECT SUM(INVESTMONEY*0.09) AS profitport3009 FROM users WHERE INVESTMONEY >='1000'AND INVESTMONEY<'10000'";
$resultprofitport3009 = mysqli_query($conn,$profitport3009);
$valuesprofitport3009 = mysqli_fetch_assoc($resultprofitport3009);
$countprofitport3009 = $valuesprofitport3009['profitport3009'];

//Lossport1
$lossport1 = "SELECT SUM(INVESTMONEY*0.02) AS lossport1 FROM users WHERE INVESTMONEY >='100000'";
$resultlossport1 = mysqli_query($conn,$lossport1);
$valuesLossport1 = mysqli_fetch_assoc($resultlossport1);
$countlossport1 = $valuesLossport1['lossport1'];

//Lossport2
$lossport2 = "SELECT SUM(INVESTMONEY*0.02) AS lossport2 FROM users WHERE INVESTMONEY >='10000'AND INVESTMONEY<'100000'";
$resultlossport2 = mysqli_query($conn,$lossport2);
$valuesLossport2 = mysqli_fetch_assoc($resultlossport2);
$countlossport2 = $valuesLossport2['lossport2'];

//Lossport3
$lossport3 = "SELECT SUM(INVESTMONEY*0.02) AS lossport3 FROM users WHERE INVESTMONEY >='1000'AND INVESTMONEY<'10000'";
$resultlossport3 = mysqli_query($conn,$lossport3);
$valuesLossport3 = mysqli_fetch_assoc($resultlossport3);
$countlossport3 = $valuesLossport3['lossport3'];

$idbilling = "SELECT count(EMAIL) AS totalbilling FROM billing_information";
$resultbilling = mysqli_query($conn,$idbilling);
$valuesbilling = mysqli_fetch_assoc($resultbilling);
$countbilling = $valuesbilling['totalbilling'];

$idwithdrawn = "SELECT count(EMAIL) AS totalwithdrawn FROM withdrawn_information";
$resultwithdrawn = mysqli_query($conn,$idwithdrawn);
$valueswithdrawn = mysqli_fetch_assoc($resultwithdrawn);
$countwithdrawn = $valueswithdrawn['totalwithdrawn'];

    
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
$query = "SELECT * FROM users WHERE CONCAT(ID, NAME, SURNAME, EMAIL, PASSWORD, PHONE,MONEY) LIKE '%".$valueToSearch."%'";
$search_result = filterTable($query);

}

else {
$query = "SELECT * FROM users";
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
                        <form method="post">
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
                    </div>
                </div>
            </div>
        </div>
        </form>
      
        </header>
        
        <!-- END HEADER DESKTOP-->
        <br><br>        
        <div class="main-content" style="background-color:#192231;" >  
            <div class="container">		
                <div class="card login-card">
                    <form method="post" action="adminprofile_db.php">
                        <div class="row no-gutters"  style="background-color:#222222;padding: 40px;">
                            <div class="col-lg-12 col-md-5" style="text-align: left;">
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
                            <?php 
                            if($_SESSION['email'] == $emailadmin1){
                                echo "<h2 class='control-label mb-4'>ยินดีต้อนรับ!!<span class='main-color'> $emailadmin1 </span></h2>";
                                echo "<h3 class='control-label mb-2'>สมาชิกลงทุนพอรต์ 1 จำนวน ".$countport1." คน </h3>";
                                echo "<h3 class='control-label mb-2'><span class='main-color'>กำไรสูงสุด </span>".$countprofitport1009." บาท </h3>";
                                echo "<h3 class='control-label mb-2'><span class='main-color'>ขาดทุนไม่เกิน </span>".$countlossport1." บาท </h3>";
                            }
                            else if($_SESSION['email'] == $emailadmin2){
                                echo "<h2 class='control-label mb-4'>ยินดีต้อนรับ!! $emailadmin2</h2>";
                                echo "<h3 class='control-label mb-2'>สมาชิกลงทุนพอรต์ 2 จำนวน ".$countport2." คน </h3>";
                                echo "<h3 class='control-label mb-2'><span class='main-color'>กำไรสูงสุด </span>".$countprofitport2009." บาท </h3>";
                                echo "<h3 class='control-label mb-2'><span class='main-color'>ขาดทุนไม่เกิน </span>".$countlossport2." บาท </h3>";
                            }
                            else if($_SESSION['email'] == $emailadmin3){
                                echo "<h2 class='control-label mb-4'>ยินดีต้อนรับ!! $emailadmin3</h2>";
                                echo "<h3 class='control-label mb-2'>สมาชิกลงทุนพอรต์ 3 จำนวน ".$countport3." คน </h3>";
                                echo "<h3 class='control-label mb-2'><span class='main-color'>กำไรสูงสุด </span>".$countprofitport3009." บาท </h3>";
                                echo "<h3 class='control-label mb-2'><span class='main-color'>ขาดทุนไม่เกิน </span>".$countlossport3." บาท </h3>";
                            }
                            ?>       
                            </div>        
                        </div>
                        
                        <div class="row no-gutters"  style="background-color:#222222;padding: 40px;">
                            <div class="col-lg-5 col-md-5" style="text-align: left;">
        <!--------------แจ้งerror-------------------->
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
        <!------------------------------------------>
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
        <!------------------------------------------>

        <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">สถานะบอท</label>
                    <select style="font-size: 98%;"  size="1"  name="statusbot" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                    <option value="">------------เลือกสถานะบอท-------------------</option><option value="ON">เปิด</option><option value="OFF">ปิด</option></select>
                    <input type="submit" name="submitstatus" value="ยืนยันสถานะบอท" class="btn btn-block login-btn mb-4 ">
                </div>
                                
                                <h3 class="control-label mb-1">ช่องกรอกกำไร</h3>
                                <input style="background-color:#192231" type="number" name="profit" placeholder="กำไรที่ได้">
                                <br><br>
                                <h3 class="control-label mb-1">ยืนยันกำไร-กรอกรหัสแอดมิน</h3>
                                <input style="background-color:#192231" type="text" name="password" placeholder="รหัสแอดมิน">
                                <br><br>
                                <?php 
                                if($_SESSION['email'] == $emailadmin1){
                                    echo "<h3 class='control-label mb-2'><span class='main-color'>ขาดทุนไม่เกิน </span>".$countlossport1." บาท </h3>";
                                }
                                else if($_SESSION['email'] == $emailadmin2){
                                    echo "<h3 class='control-label mb-2'><span class='main-color'>ขาดทุนไม่เกิน </span>".$countlossport2." บาท </h3>";
                                }else if($_SESSION['email'] == $emailadmin3){
                                    echo "<label class='control-label mb-2'><span class='main-color'>ขาดทุนไม่เกิน </span>".$countlossport3." บาท </label>";
                                }
                                ?>   
                                <input type="submit" name="submitloss" value="ขาดทุน" class="btn btn-block login-btn mb-4 ">
                                <input type="submit" name="submitprofit" value="ยืนยัน" class="btn btn-block login-btn mb-4 "><br>
                                <input style="background-color:#192231" type="text" name="tokenyoutube" placeholder="ใส่โทเคนช่อง youtube"><br><br>
                                <input type="submit" name="submityoutube" value="ยืนยัน" style="background-color:#FF0000;" class="btn btn-block login-btn mb-4 ">
                            </div>
                            <div class="col-lg-1 col-md-5" style="text-align: left;">
                            </div>
                            <div class="col-lg-6 col-md-5" style="text-align: left;">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3" style ="text-align: center;">
                                        <thead style ="text-align: center;">
                                            <tr>
                                                <th>หมายเลขพอรต์</th>
                                                <th>จำนวนเงินที่ลงทุน</th>
                                                <th>สถานะพอรต์</th>
                                            </tr>
                                        </thead>
                                        <tbody style ="text-align: center;">
                                        <?php
                                        if($_SESSION['email'] == $emailadmin1){
                                            echo "<h3 class='control-label mb-2'><span class='main-color'>ขาดทุนไม่เกิน </span>".$countlossport1." บาท </h3>";
                                        }
                                        else if($_SESSION['email'] == $emailadmin2){
                                            echo "<h3 class='control-label mb-2'><span class='main-color'>ขาดทุนไม่เกิน </span>".$countlossport2." บาท </h3>";
                                        }else if($_SESSION['email'] == $emailadmin3){
                                            echo "<label class='control-label mb-2'><span class='main-color'>ขาดทุนไม่เกิน </span>".$countlossport3." บาท </label>";
                                        }
                                        ?>
                                            <tr>
                                                <td><h4>1</h4></td>
                                                <td ><?php echo $resultsadmin1['money'];?></td>
                                                <?php
                                                if($resultsadmin1['STATUSBOT'] == "ON"){
                                                    echo "<td style=color:#33CC33>เปิดรับเงินลงทุน</td>";
                                                }
                                                else{
                                                    echo "<td style=color:red>ปิดรับเงินลงทุนหรือกำลังรันบอท</td>";
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td><h4>2</h4></td>
                                                <td><?php echo $resultsadmin2['money'];?></td>
                                                <?php
                                                if($resultsadmin2['STATUSBOT'] == "ON"){
                                                    echo "<td style=color:#33CC33>เปิดรับเงินลงทุน</td>";
                                                }
                                                else{
                                                    echo "<td style=color:red>ปิดรับเงินลงทุนหรือกำลังรันบอท</td>";
                                                }
                                                ?>

                                            </tr>
                                            <tr>
                                                <td><h4>3</h4></td>
                                                <td><?php echo $resultsadmin3['money'];?></td>
                                                <?php
                                                if($resultsadmin3['STATUSBOT'] == "ON"){
                                                    echo "<td style=color:#33CC33>เปิดรับเงินลงทุน</td>";
                                                }
                                                else{
                                                    echo "<td style=color:red>ปิดรับเงินลงทุนหรือกำลังรันบอท</td>";
                                                }
                                                ?>
                                            
                                            </tr>            
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                                <?php echo "<h2 class='control-label mb-4'>จำนวนเงินที่จะลงทุนทั้งหมด<span class='main-color'> " .$investall. "</span> บาท</h2>";?><br>
                                <?php echo "<h2 class='control-label mb-4'>จำนวนเงินที่ฝาก <span class='main-color'> " .$sum. "</span> บาท</h2>";?><br>
                            </div>
                        </div>
                        <div class="row no-gutters"  style="background-color:#222222;padding: 40px;">
                       
                            <div class="col-lg-3 col-md-5" style="text-align: center;">
                                <input type="submit" name="userall" value="รายการผู้ใช้งานทั้งหมด" class="btn btn-block login-btn mb-4 " >
                            </div>
                            <div class="col-lg-1 col-md-5" style="text-align: center;"> </div> 
                            <div class="col-lg-3 col-md-5" style="text-align: center;">   
                            <div class="noti__item js-item-menu" style="width:100%;"> 
                            <span class="quantity"><?php echo $countbilling?></span>
                            </div>
                            <input type="submit" name="deposit" value="รายการฝากเงิน" class="btn btn-block login-btn mb-4 " >
                           
                            </div>
                            <div class="col-lg-1 col-md-5" style="text-align: center;"> </div> 
                            <div class="col-lg-3 col-md-5" style="text-align: center;">
                            <div class="noti__item js-item-menu" style="width:100%;"> 
                            <span class="quantity"><?php echo $countwithdrawn?></span></div>
                                <input type="submit" name="withdrawn" value="รายการถอนเงิน" class="btn btn-block login-btn mb-4 " >     
                            </div>                       
                            </div>
                            
                   
                        <div class="row no-gutters"  style="background-color:#222222;padding: 40px;">
                        <div class="col-lg-12 col-md-5" style="text-align: left;">




                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3" style ="text-align: center;">
                                        <thead style ="text-align: center;">
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Surename</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>เงินในบัญชี</th>
                                                <th>เงินลงทุน</th>
                                                <th>Port</th>
                                            </tr>
                                        </thead>
                                        <tbody style ="text-align: center;">
                                        <?php while($row = mysqli_fetch_array($search_result)):?>
                                        <tr>
                                            <td><?php echo $row['ID'];?></td>
                                            <td><label><?php echo $row['NAME'];?></label></td>
                                            <td><label><?php echo $row['SURNAME'];?></label></td>
                                            <td><label><?php echo $row['EMAIL'];?></label></td>
                                            <td><label><?php echo $row['PHONE'];?></label></td>
                                            <td><label><?php echo $row['MONEY'];?></label></td>
                                            <td><label><?php echo $row['INVESTMONEY'];?></label></td>
                                            <?php
                                                $port1 = "ลงทุนพอรต์1";
                                                $port2 = "ลงทุนพอรต์2";
                                                $port3 = "ลงทุนพอรต์3";
                                                $no = "ยังไม่ลงทุน";
                                                if($row['INVESTMONEY']>=100000){
                                                    echo "<td><label>$port1</label></td>";
                                                }
                                                if($row['INVESTMONEY']>=10000&&$row['INVESTMONEY']<100000){
                                                    echo "<td><label>$port2</label></td>";
                                                }
                                                if($row['INVESTMONEY']>=1000&&$row['INVESTMONEY']<10000){
                                                    echo "<td><label>$port3</label></td>";
                                                }
                                                if($row['INVESTMONEY']>=0&&$row['INVESTMONEY']<1000){
                                                    echo "<td><label>$no</label></td>";
                                                }
                    
                                            ?>             
            
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

