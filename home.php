<?php
session_start();
include('server.php');

$id = "SELECT count(ID) AS total FROM users";
$result = mysqli_query($conn,$id);
$values = mysqli_fetch_assoc($result);
$count = $values['total'];

?>
<!DOCTYPE html>
	<html lang="th">
	<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <meta charset="utf-8">
    <title>BotPlus เว็บไซต์เปิด EA ที่ดีที่สุดในประเทศไทย</title>
    <meta name="description" content="Xlight Bootstrap Responsive HTML5/CSS3 Template">
    <meta name="author" content="Andsolutions.it">
    <meta name="description" content="">
	
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="css/animate.min.css" rel="stylesheet" >	
	<link href="css/font-awesome.min.css" rel="stylesheet">	
	<link href="css/prettyPhoto.css" rel="stylesheet">
	
	<link href="css/theme.css" rel="stylesheet">	
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/colors/blue.css" rel="stylesheet" class="colors">
	 <!-- Modernizer -->
	 <script src="js/modernizer.js"></script>


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
    <link rel="shortcut icon" href="images/ico/favicon1.png">	
    <link rel="apple-touch-icon" href="images/ico/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/ico/apple-touch-icon-72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/ico/apple-touch-icon-114.png">
    <link rel="apple-touch-icon" sizes="144x144" href="images/ico/apple-touch-icon-144.png">

</head>

<body data-spy="scroll" data-target="#mynav" data-offset="85">

<!-- Preloader --> 
<div id="preloader">
	<div id="status">
		<div class="spinner">
			  <div class="rect1"></div>
			  <div class="rect2"></div>
			  <div class="rect3"></div>
			  <div class="rect4"></div>
			  <div class="rect5"></div>
		</div>
	</div>
</div>
<!-- End Preloader -->

<header>
<!-- Bootstrap Menu -->
<div id="navigation">
	<div class="navbar-wrapper">
		<nav class="navbar-inverse navbar-static-top" role="navigation">
			<div class="container">
				<div class="row">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="http://mistersigz.thddns.net:7572/Beebas/"></a>
					</div>
					<div id="mynav" class="navbar-collapse collapse">
						<ul class="nav navbar-nav main-nav-list">
							<li><a href="#home">หน้าหลัก</a></li>
							<li><a href="#news">ข่าวสาร</a></li>
							<li><a href="#pricing">ราคา</a></li>
							<li><a href="#about">ข้อตกลงและกติกา</a></li>
							<li><a href="login/regis.php">สมัครสมาชิก</a></li>
							<li><a href="#team">ทีมงาน</a></li>
							<li><a href="#contacts">ติดต่อ</a></li>	

						
						</ul>
						<button class="btn btn-medium" onclick="location.href='login/login.php'">เข้าสู่ระบบ</button>
					</div>		
				</div>
			</div>
		</nav>
	</div>
</div>
<!-- End Bootstrap Menu -->
<!-- Slider -->
<section id="home">
    <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
			<div class="item active" style="background-image: url(images/slider/bg-1.jpg)"> <!-- Change Image -->
				<div class="caption">
					<h1 class="animated fadeInLeftBig">อยากลงทุน<strong> Forex </strong> ?</h1>
					<p class="animated fadeInRightBig">แต่ไม่มีเวลาซื้อ - ขายเอง</p>
					<a data-scroll class="learn-more animated fadeInUpBig" href="#about">สมัครสมาชิก</a>
				</div>
			</div>
			<div class="item" style="background-image: url(images/slider/bg-2.jpg)"> <!-- Change Image -->
				<div class="caption">
					<h1 class="animated fadeInLeftBig">ต้องการ <strong>EA</strong> ที่ไว้ใจได้</h1>
					<p class="animated fadeInRightBig"><strong>(Expert Advisors)</strong></p>
					<a data-scroll class="learn-more animated fadeInUpBig" href="#about">สมัครสมาชิก</a>
				</div>
			</div>
			<div class="item" style="background-image: url(images/slider/bg-3.jpg)"> <!-- Change Image -->
				<div class="caption">
					<h1 class="animated fadeInLeftBig">ร่วมลงทุนกับเรา <strong>BotPlus</strong></h1>
					<p class="animated fadeInRightBig"><strong>เว็บไซต์สำหรับลงทุน Forex ด้วย EA ที่ดีที่สุดในประเทศไทย</strong></p>
					<a data-scroll class="learn-more animated fadeInUpBig" href="#about">สมัครสมาชิก</a>
				</div>
			</div>
        </div>
        <a class="left-control" href="#home-slider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
        <a class="right-control" href="#home-slider" data-slide="next"><i class="fa fa-angle-right"></i></a>
    </div>	
</section>
<!-- End Slider -->
</header>

<!-- News Section --> 
<section class="section-wrapper" id="news">
	<div class="news">
		<!-- Block Title -->	
		<div class="element-title">			
			<div class="row">	 		
				<div class="container">				
						<h1 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="100ms"><span class="text-color">ข่าวสารและเหตุการณ์</span></h1>		
						<h2>กิจกรรมล่าสุดจากบล็อกของเรา<span class="typer" id="some-id" data-delay="200" data-delim=":" data-words="จากบล็อกของเรา"></span>
						<span class="cursor" data-cursorDisplay="_" data-owner="some-id"></span></h2>
						<h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="300ms">ติดตาม<span class="main-color">ข่าวสาร</span>และเหตุการณ์</h3>	
			
				</div>
			</div>
		</div>
		<!-- End Block Title -->
		<div class="container">
			<div class="wrapper-news">	
				<div class="row">
					<div class="col-lg-6 col-sm-6">	
						<div class="news-content wow fadeInLeft" data-wow-duration="1s" data-wow-delay="300ms">	
							<div class="entry-header">	
								<div class="blog-image">
									<a href="https://www.kaohoon.com/content/436518"><img alt="" src="images/blog/post1.jpg" class="img-responsive"></a>
								</div>							
								<div class="post-date">
									<h2>18<span>ก.ค.</span></h2>
								</div>							
							</div>
							<div class="entry-content">	
								<h3 class="entry-title">
									<a href="https://www.kaohoon.com/content/436518">WP จัดงบ 50 ลบ.ปั้นธุรกิจอาหารประเดิมเปิดตัว“ผัดไทยไฟทะลุ”</a>
								</h3>							
								<ul class="entry-meta">
								<li><a href="#"><i class="fa fa-user"></i> โดย: ผู้ดูแล<span>/</span></a></li>
								<li><a href="#"><i class="fa fa-tags"></i> WP</a></li>
								</ul>	
								<p>	บริษัท ดับบลิวพี เอ็นเนอร์ยี่ จำกัด (มหาชน) หรือ WP เปิดเผยกลยุทธ์ในธุรกิจอาหารแบบครบวงจร หลังจากร่วมมือกับ วันเดอร์ฟู้ด อินเตอร์เนชันแนล
									WP
								</p>								
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-sm-6">	
						<div class="news-content wow fadeInRight" data-wow-duration="1s" data-wow-delay="300ms">	
							<div class="entry-header">	
								<div class="blog-image">
									<a href="https://www.kaohoon.com/content/431538"><img alt="" src="images/blog/post2.jpg" class="img-responsive"></a>
								</div>							
								<div class="post-date">
									<h2>18<span>มิ.ย.</span></h2>
								</div>							
							</div>
							<div class="entry-content">	
								<h3 class="entry-title">
									<a href="https://www.kaohoon.com/content/431538">NPS เผยผลประกอบการ 2563 “นิวไฮ”</a>
								</h3>							
								<ul class="entry-meta">
								<li><a href="#"><i class="fa fa-user"></i> โดย: ผู้ดูแล <span>/</span></a></li>
								<li><a href="#"><i class="fa fa-tags"></i> NPS</a></li>
								</ul>	
								<p>	นายโยธิน ดำเนินชาญวนิชย์ กรรมการผู้จัดการใหญ่ บริษัท เนชั่นแนล เพาเวอร์ ซัพพลาย จำกัด (มหาชน) 
									เปิดเผยว่า NPS เป็นผู้ให้บริการพลังงานและสาธารณูปโภค
								</p>								
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-sm-6">	
						<div class="news-content wow fadeInLeft" data-wow-duration="1s" data-wow-delay="600ms">	
							<div class="entry-header">	
								<div class="blog-image">
									<a href="https://www.kaohoon.com/content/432708"><img alt="" src="images/blog/post3.jpg" class="img-responsive"></a>
								</div>							
								<div class="post-date">
									<h2>15<span>เม.ย.</span></h2>
								</div>							
							</div>
							<div class="entry-content">	
								<h3 class="entry-title">
									<a href="https://www.kaohoon.com/content/432708">“สิงห์ เอสเตท” ได้สิทธิ์ซื้อหุ้น 30% โรงไฟฟ้า 3 โครงการใหญ่ กำลังผลิตรวม 400MW</a>
								</h3>							
								<ul class="entry-meta">
								<li><a href="#"><i class="fa fa-user"></i> โดย: ผู้ดูแล<span>/</span></a></li>
								<li><a href="#"><i class="fa fa-tags"></i> โรงไฟฟ้า</a></li>
								</ul>	
								<p>บริษัท สิงห์ เอสเตท จำกัด (มหาชน) หรือ S บริษัทผู้พัฒนาและลงทุนอสังหาริมทรัพย์ชั้นนำของไทย 
									ประกาศว่า บริษัทได้รับสิทธิ์แต่เพียงผู้เดียวในการเข้าซื้อหุ้น
								</p>								
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-sm-6">	
						<div class="news-content wow fadeInRight" data-wow-duration="1s" data-wow-delay="600ms">	
							<div class="entry-header">	
								<div class="blog-image">
									<a href="https://www.kaohoon.com/content/437238"><img alt="" src="images/blog/post4.jpg" class="img-responsive"></a>
								</div>							
								<div class="post-date">
									<h2>15<span>เม.ย.</span></h2>
								</div>							
							</div>
							<div class="entry-content">	
								<h3 class="entry-title">
									<a href="https://www.kaohoon.com/content/437238">HSI Apr 21 ลุ้นขึ้นฝ่าเส้น Downtrend ที่กดดัน เปลี่ยนแนวโน้มกลับเป็นขาขึ้น</a>
								</h3>							
								<ul class="entry-meta">
								<li><a href="#"><i class="fa fa-user"></i> โดย: ผู้ดูแล<span>/</span></a></li>
								<li><a href="#"><i class="fa fa-tags"></i> HSI</a></li>
								</ul>	
								<p>Hang Seng (Futures – Apr 21) คงลุ้นโอกาสขึ้นฝ่าเส้น Downtrend ที่กดดัน 
								เพื่อเปลี่ยนแนวโน้มกลับมาเป็นขาขึ้นเต็มตัว และหากยังล้าง Downtrend สะสมไม่ได้ทั้งหมด
								</p>								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
<!-- Facts --> 
<div class="facts parallax">
	<div class="overlay">
		<div class="wrapper-block-facts">
			<div class="container">	  
				<div class="row">
					<div class="element-title">			
						<h1 class="main-color wow fadeInUp" data-wow-duration="1s" data-wow-delay="300ms">เกี่ยวกับเว็บไซต์</h1>
						<h3 class="white-color wow fadeInDown" data-wow-duration="1s" data-wow-delay="300ms">ข้อมูลของเว็บไซต์แสดงข้อมูลจำนวนเข้าชมเว็บไซต์และสมาชิกของเว็บไซต์</h3>
					</div>
				</div>
				<div class="row">
					<div class="wrapper-number">	
						<div class="col-lg-3 col-md-3">
							<div class="number wow fadeInRight" data-wow-duration="1s" data-wow-delay="450ms">	
							</div>
							<div class="number-title wow fadeInDown" data-wow-duration="1s" data-wow-delay="450ms">
							</div>
						</div>  
						<div class="col-lg-3 col-md-3">
							<div class="number wow fadeInRight" data-wow-duration="1s" data-wow-delay="300ms">
								<p class="refresh" id='count'>								
							</div>
							<div class="number-title wow fadeInDown" data-wow-duration="1s" data-wow-delay="300ms">
								จำนวนเข้าชม
							</div>
						</div>
						<div class="col-lg-3 col-md-3">
							<div class="number wow fadeInRight" data-wow-duration="1s" data-wow-delay="450ms">
								<p class="timer" data-from="0" data-to="<?php echo $count?>" data-speed="2000">0.5</p>		
							</div>
							<div class="number-title wow fadeInDown" data-wow-duration="1s" data-wow-delay="450ms">
								สมาชิก
							</div>
						</div>
						<div class="col-lg-3 col-md-3">
							<div class="number wow fadeInRight" data-wow-duration="1s" data-wow-delay="450ms">	
							</div>
							<div class="number-title wow fadeInDown" data-wow-duration="1s" data-wow-delay="450ms">
							</div>
						</div> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Facts --> 
</section> 
<!-- End News Section -->	
	
<!-- Price Section --> 
<section class="section-wrapper" id="pricing">
	<div class="pricing">
		<!-- Block Title -->	
		<div class="element-title">			
			<div class="row">	 		
				<div class="container">
					<h1 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="100ms"><span class="text-color">ราคา</span></h1>		
			
					<h1 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="300ms">ราคา BotPlus</h1>
					<h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="300ms">ระยะเวลาการใช้งาน AI จะขึ้นกับ<span class="main-color">BotPlus</span></h3>	
				</div>
			</div>
		</div>
		<!-- End Block Title -->
		<div class="row">
			<div class="container">	
				<div class="wrapper-pricing">
					<!-- Plan 1 -->				
					<div class="col-lg-3 col-md-3">
						<div class="single-table wow fadeInRight" data-wow-duration="1s" data-wow-delay="300ms">
						<h4>1 เดือน</h4>
							<div class="price-icon">
                                <i class="fa fa-paper-plane"></i>                                
                            </div>
							<span class="price">$19</span>
							<ul>
                                <li>ระยะเวลาการใช้งาน 1 เดือน</li>
                                <li>ฟรีคู่มือการใช้งาน</li>
                                <li>ไม่เปิดเผยข้อมูล</li>
                                <li>สนับสนุนการบริการ</li>
                                <li>สนับสนุนและพัฒนา AI</li>
                            </ul>
							<a class="btn-price" href="#">เลือกซื้อ</a>
						</div>
					</div>
					<!-- Plan 2 -->				
					<div class="col-lg-3 col-md-3">
						<div class="single-table wow fadeInRight" data-wow-duration="1s" data-wow-delay="500ms">
						<h4>3 เดือน</h4>
							<div class="price-icon">
                                <i class="fa fa-rocket"></i>                                
                            </div>
							<span class="price"> $54</span>
							<ul>
								<li>ระยะเวลาการใช้งาน 3 เดือน</li>
                                <li>แสดงข้อมูลสถิติ</li>
                                <li>ไม่เปิดเผยข้อมูลส่วนตัว</li>
                                <li>สนับสนุนการบริการ</li>
                                <li>สนับสนุนและพัฒนา AI</li>
                            </ul>
							<a class="btn-price" href="#">เลือกซื้อ</a>
						</div>
					</div>									
					<!-- Plan 3				 -->
					<div class="col-lg-3 col-md-3">
						<div class="single-table wow fadeInRight" data-wow-duration="1s" data-wow-delay="500ms">
						<h4>6 เดือน</h4>
							<div class="price-icon">
                                <i class="fa fa-rocket"></i>                                
                            </div>
							<span class="price">$110</span>
							<ul>
                                <li>ระยะเวลาการใช้งาน 6 เดือน</li>
                                <li>แสดงข้อมูลสถิติ</li>
                                <li>ไม่เปิดเผยข้อมูลส่วนตัว</li>
                                <li>สนับสนุนการบริการ</li>
                                <li>สนับสนุนและพัฒนา AI</li>
                            </ul>
							<a class="btn-price" href="#">เลือกซื้อ</a>
						</div>
					</div>	
					<!-- Plan 4 -->				
					<div class="col-lg-3 col-md-3">
						<div class="single-table wow fadeInRight" data-wow-duration="1s" data-wow-delay="900ms">
						<h4>1 ปี</h4>
							<div class="price-icon">
                                <i class="fa fa-road"></i>                                
                            </div>
							<span class="price">$219</span>
							<ul>
								<li>ระยะเวลาการใช้งาน 1 ปี</li>
                                <li>แสดงข้อมูลสถิติ</li>
                                <li>ไม่เปิดเผยข้อมูลส่วนตัว</li>
                                <li>สนับสนุนการบริการ</li>
                                <li>สนับสนุนและพัฒนา AI</li>
                            </ul>
							<a class="btn-price" href="#">เลือกซื้อ</a>
						</div>
					</div>						
				</div>
			</div>
		</div>		
	</div>

	<div class="clients parallax">
		<!-- Block Title -->
		<div class="overlay">
			<div class="wrapper-block-clients">
				<div class="element-title">	
					<div class="row">	 		
						<div class="container">	 		
							<h1 class="main-color wow fadeInDown" data-wow-duration="1s" data-wow-delay="300ms">ประสบการณ์ผู้ใช้งาน</h1>
							<h3 class="white-color wow fadeInUp" data-wow-duration="1s" data-wow-delay="300ms">ความคิดเห็นจากสมาชิกผู้ใช้งาน BotPlus</h3>
						</div>
					</div>
				</div>
				<!-- End Block Title -->
				<div class="row">
					<div class="container">	 		
						<div class="wrapper-clients wow fadeInDown" data-wow-duration="1s" data-wow-delay="500ms">
							<!-- Start Testimonial Slider -->
							<div class="carousel slide carousel-mod" data-ride="carousel" id="testimonial">
								<div class="carousel-inner">
									<!-- Testimonial #1  -->
									<div class="item">
										<div class="row">
											<div class="col-lg-12 col-sm-12">
												<div class="testimonial-inner">
													<img class="img-circle" src="images/clients/person_2.png" alt="" title="" />
													<p>ผมเริ่มต้นจากเงินเล็กน้อย จนตอนนี้ผมซื้อบ้านได้เเล้วครับ</p>
												</div>
												<h5>-- Warat Y. --</h5>
											</div>
										</div>
									</div>
									<!-- End Testimonial #1  -->
									<!-- Testimonial #2  -->
									<div class="item active">
										<div class="row">
											<div class="col-lg-12 col-sm-12">
												<div class="testimonial-inner">
													<img class="img-circle" src="images/clients/person_1.png" alt="" title="" /><!-- Testimonial Image  -->
													<p>ผลประกอบการดีมากเลยครับ ดีจริงๆที่ได้ร่วมลงทุนกับทาง BotPlus</p><!-- Tesimonial  -->
												</div>
												<h5>-- warittorn_benz --</h5>
											</div>
										</div>
									</div>
									<!-- End Testimonial #2  -->									
									<!-- Testimonial #3  -->
						
									<!-- End Testimonial #3  -->									
								</div>
								<ol class="carousel-indicators">
									<li data-target="#testimonial" data-slide-to="0" class="active"></li>
									<li data-target="#testimonial" data-slide-to="1"></li>
								</ol>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</section> 
<!-- End Price Section -->








<!-- About -->
<section class="section-wrapper" id="about">
	<div class="about-us">
		<div class="why-us">	  
			<div class="container">	  
				<div class="row">
					<!-- Block Title -->			
						<h1 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="100ms"><span class="text-color">ข้อตกลงและกติกา</span></h1>		
			
					<div class="element-title wow fadeInDown" data-wow-duration="1s" data-wow-delay="300ms">			
						<h1>ข้อตกลงการเป็นสมาชิกกับเว็บไซต์</h1>
						<h3>เว็บไซต์ <span class="main-color">BotPlus</span> มีข้อตกลงในการเป็นสมาชิกซื้อขายเพื่อความถูกต้องตาม<span class="main-color">กฎหมาย</span></h3>
					</div>
					<!-- End Block Title -->
					<!-- About Us Icons -->
					<div class="wrapper-why-us">
						<div class="col-lg-4 col-sm-4 wow fadeInDown" data-wow-duration="1s" data-wow-delay="300ms">
							<i class="hovicon effect-1 sub-a"><b class="fa fa-flask"></b></i>
							<h2>เพื่อการศึกษาเท่านั้น</h2>
							<p>เว็บไซต์นี้ทำเพื่อการศึกษา การเขียนโปรแกรม ทดลอง และฝึกทำตามความต้องการของลูกค้าเท่านั้น</p>
						</div>
						<div class="col-lg-4 col-sm-4 wow fadeInDown" data-wow-duration="1s" data-wow-delay="450ms">
							<i class="hovicon effect-1 sub-a"><b class="fa fa-heart-o"></b></i>
							<h2>ซื้อขาย BotPlus</h2>
							<p>BotPlus สามารถเลือกซื้อได้เพียงเว็บไซต์นี้เท่านั้น และจำเป็นต้องเป็นสมาชิกของเว็บไซต์ก่อน จึงจะสามารถซื้อ BotPlus ได้</p>
						</div>
						<div class="col-lg-4 col-sm-4 wow fadeInDown" data-wow-duration="1s" data-wow-delay="600ms">
							<i class="hovicon effect-1 sub-a"><b class="fa fa-tablet"></b></i>
							<h2>เว็บไซต์</h2>
							<p>เว็บไซต์นี้ใช้ Template Andsolutions เพื่อความสะดวกในการออกแบบ ทันสมัย และใช้งานได้ง่ายมากขึ้น</p>
						</div>
					</div>
					<!-- End About Us Icons -->
				</div>
			</div>
		</div>
	</div>
	<!-- End About Xlight -->


	<!-- Facts --> 

	<div class="stay-in parallax">
		<!-- Block Title -->
		<div class="overlay">
			<div class="wrapper-block-stay-in">
				<div class="element-title">	
					<div class="row">	 		
						<div class="container">	 		
							<h1 class="main-color wow fadeInDown" data-wow-duration="1s" data-wow-delay="300ms">เอกสารข้อตกลงและกติกา</h1>
						</div>
					</div>
				</div>
				<!-- End Block Title -->
				<div class="signup"> 
					<div class="row">
						<div class="container">	 	
							<div class="sign_form wow fadeInLeft" data-wow-duration="1s" data-wow-delay="300ms">
								<!-- SUBSCRIPTION FORM -->
								<form id="sign-form" method="post" action="#">
							
									<a href="doc/condition.pdf"><img src="images/download/doccon.png" alt=""></a> <!-- Change Image -->
									<a onclick="pdf()" class="loginhere-link">
										<input type="submit" value="ดาวน์โหลด">
									</a>
								</form>
								<!-- / END SUBSCRIPTION FORM -->
							</div>
						</div>
					</div>			
				</div>	
							
				<div class="row">		
					<div class="container">	 
						<div class="wrapper-tweet">
							<!-- Twitter -->
							<div class="tweet wow fadeInRight" data-wow-duration="1s" data-wow-delay="700ms">
								<div class="col-sm-8 col-sm-offset-2">
									
							
									<div id="twitter-carousel" class="carousel slide" data-ride="carousel">
										<ol class="carousel-indicators">
											<li data-target="#twitter-carousel" data-slide-to="0" class="active"></li>
											<li data-target="#twitter-carousel" data-slide-to="1"></li>
											<li data-target="#twitter-carousel" data-slide-to="2"></li>
										</ol><!-- /.carousel-indicators -->

										<div class="carousel-inner">
											<div class="item active">
												<p>เว็บไซต์นี้ทำเพื่อการศึกษาและการทดลองเท่านั้น <a href="#"><span>#ทดลอง</span> #การศึกษา</a></p>
											</div>
											<div class="item">
												<p>ผู้ดูแลพร้อมให้บริการ <a href="#"><span>#forex #หุ้น</span> #ทองคำ</a></p>
											</div>
											<div class="item">                                
												<p>BotPlus พร้อมให้บริการสมาชิก <a href="#"><span>#การลงทุนมีความเสี่ยง</span> #หุ้นGameStock</a></p>
											</div>
										</div>                        
									</div>
								</div>			
							</div>
							<!-- End Twitter -->	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Facts --> 

</section> 
<!-- End About Section --> 

<!-- Team Section --> 
<section class="section-wrapper" id="team">
	<div class="team">
		<!-- Block Title -->
		<div class="meet-the-team">			
			<div class="element-title">			
				<div class="row">	 		
					<div class="container">	 
						<h1 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="100ms"><span class="text-color">ทีมงาน</span></h1>						
						<h1 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="300ms">ทีมงานสุดสร้างสรรค์</h1>
						<h3 class=" wow fadeInUp" data-wow-duration="1s" data-wow-delay="300ms">นี้คือทีมของ<span class="main-color">พวกเรา</span></h3>
					</div>
				</div>
			</div>
			<!-- End Block Title -->
			<div class="row">
				<div class="container">	
					<div class="wrapper-team">				
						<div class="col-lg-3 col-md-3">
							<div class="team-member">
								<div class="team-member-holder wow flipInY" data-wow-duration="1s" data-wow-delay="500ms">
									<div class="team-member-image">
										<img src="images/team/tle.png" alt="" /> <!-- Change Image -->	
										<div class="team-overlay">
											<div class="img-overlay"></div>
										</div>
										<div class="overlay-content"> 
											<div class="team-member-social-list">
												<a class="team-member-social-list-item" href="https://www.facebook.com/y.title"><i class="fa fa-facebook"></i></a>
												<a class="team-member-social-list-item" href="https://www.instagram.com/tle_warat/"><i class="fa fa-instagram"></i></a>
												<a class="team-member-social-list-item" href="#"><i class="fa fa-envelope"></i></a>
											</div>
											<a class="view-profile profile-read-more" href="#" data-single_url="profile2.html">โปรไฟล์</a>										
										</div>
									</div>
									<div class="team-member-meta">
										<h4 class="team-member-name"><span class="main-color">M</span>isterzsig<span class="main-color"></span></h4>
										<div class="team-member-role">CEO</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3">
							<div class="team-member">
								<div class="team-member-holder wow flipInY" data-wow-duration="1s" data-wow-delay="500ms">
									<div class="team-member-image">
										<img src="images/team/Js.png" alt="" /> <!-- Change Image -->	
										<div class="team-overlay">
											<div class="img-overlay"></div>
										</div>
										<div class="overlay-content"> 
											<div class="team-member-social-list">
												<a class="team-member-social-list-item" href="https://www.facebook.com/sstt.sr/"><i class="fa fa-facebook"></i></a>
												<a class="team-member-social-list-item" href="https://www.instagram.com/stt_sr/"><i class="fa fa-instagram"></i></a>
												<a class="team-member-social-list-item" href="#"><i class="fa fa-envelope"></i></a>
											</div>
											<a class="view-profile profile-read-more" href="#" data-single_url="profile2.html">โปรไฟล์</a>										
										</div>
									</div>
									<div class="team-member-meta">
										<h4 class="team-member-name"><span class="main-color">J</span>s<span class="main-color"></span></h4>
										<div class="team-member-role">ผู้จัดการ</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3">
							<div class="team-member">
								<div class="team-member-holder wow flipInY" data-wow-duration="1s" data-wow-delay="500ms">
									<div class="team-member-image">
										<img src="images/team/isun.png" alt="" /> <!-- Change Image -->	
										<div class="team-overlay">
											<div class="img-overlay"></div>
										</div>
										<div class="overlay-content"> 
											<div class="team-member-social-list">
												<a class="team-member-social-list-item" href="https://www.facebook.com/SunnyzBoyz"><i class="fa fa-facebook"></i></a>
												<a class="team-member-social-list-item" href="https://www.instagram.com/jwmsn_/"><i class="fa fa-instagram"></i></a>
												<a class="team-member-social-list-item" href="#"><i class="fa fa-envelope"></i></a>
											</div>
											<a class="view-profile profile-read-more" href="#" data-single_url="profile2.html">โปรไฟล์</a>										
										</div>
									</div>
									<div class="team-member-meta">
										<h4 class="team-member-name"><span class="main-color">I</span>sun<span class="main-color"></span></h4>
										<div class="team-member-role">ผู้ออกแบบ</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3">
							<div class="team-member">
								<div class="team-member-holder wow flipInY" data-wow-duration="1s" data-wow-delay="500ms">
									<div class="team-member-image">
										<img src="images/team/benz.png" alt="" /> <!-- Change Image -->	
										<div class="team-overlay">
											<div class="img-overlay"></div>
										</div>
										<div class="overlay-content"> 
											<div class="team-member-social-list">
												<a class="team-member-social-list-item" href="https://www.facebook.com/blackmagician.benz"><i class="fa fa-facebook"></i></a>
												<a class="team-member-social-list-item" href="https://www.instagram.com/warittorn_benz/"><i class="fa fa-instagram"></i></a>
												<a class="team-member-social-list-item" href="#"><i class="fa fa-envelope"></i></a>
											</div>
											<a class="view-profile profile-read-more" href="#" data-single_url="profile2.html">โปรไฟล์</a>										
										</div>
									</div>
									<div class="team-member-meta">
										<h4 class="team-member-name"><span class="main-color">เ</span>บนซ์<span class="main-color"></span></h4>
										<div class="team-member-role">นักวิเคราะห์ระบบ</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3">
							<div class="team-member">
								<div class="team-member-holder wow flipInY" data-wow-duration="1s" data-wow-delay="500ms">
									<div class="team-member-image">
										<img src="images/team/opor.png" alt="" /> <!-- Change Image -->	
										<div class="team-overlay">
											<div class="img-overlay"></div>
										</div>
										<div class="overlay-content"> 
											<div class="team-member-social-list">
												<a class="team-member-social-list-item" href="https://www.facebook.com/profile.php?id=100017566500051"><i class="fa fa-facebook"></i></a>
												<a class="team-member-social-list-item" href="https://www.instagram.com/donkey_._5/"><i class="fa fa-instagram"></i></a>
												<a class="team-member-social-list-item" href="#"><i class="fa fa-envelope"></i></a>
											</div>
											<a class="view-profile profile-read-more" href="#" data-single_url="profile2.html">โปรไฟล์</a>										
										</div>
									</div>
									<div class="team-member-meta">
										<h4 class="team-member-name"><span class="main-color">เ</span>ลวี่คุง ฟินนาเล่<span class="main-color"></span></h4>
										<div class="team-member-role">โปรแกรมเมอร์</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Profile Team -->
		<div id="team-single-wrap">
			<div id="team-single">
			</div>
		</div>
		<!-- End Profile Team -->	
	</div>
	
	<!-- Skills -->
	<div class="skills parallax">
		<div class="overlay">
			<div class="wrapper-block-skills">
				<!-- Block Title -->
				<div class="element-title">	
					<div class="row">	 		
						<div class="container">	 		
							<h1 class="main-color wow fadeInDown" data-wow-duration="1s" data-wow-delay="300ms">สกิลสุดบ้าคลั่งของเรา</h1>
							<h3 class="white-color wow fadeInUp" data-wow-duration="1s" data-wow-delay="300ms">ดูสกิลแล้วปราบปลื้มซะ!!</h3>
						</div>
					</div>
				</div>
				<!-- End Block Title -->
				<div class="row">
					<div class="container">	 		
						<div class="wrapper-count">
							<div class="col-lg-3 col-md-3">
								<!-- SKILL ONE -->
								<div class="skill wow fadeInRight" data-wow-duration="1s" data-wow-delay="300ms">
									<input type="text" class="knob" value="1">
									<h4>Web Design</h4>
								</div>
							</div>
							<div class="col-lg-3 col-md-3">
								<!-- SKILL TWO -->
								<div class="skill wow fadeInRight" data-wow-duration="1s" data-wow-delay="500ms">
									<input type="text" class="knob" value="100">
									<h4>Html5</h4>
								</div>
							</div>
							<div class="col-lg-3 col-md-3">
								<!-- SKILL THREE -->
								<div class="skill wow fadeInRight" data-wow-duration="1s" data-wow-delay="800ms">
									<input type="text" class="knob" value="100">
									<h4>PHP</h4>
								</div>
							</div>
							<div class="col-lg-3 col-md-3">
								<!-- SKILL Four -->
								<div class="skill wow fadeInRight" data-wow-duration="1s" data-wow-delay="1100ms">
									<input type="text" class="knob" value="100">
									<h4>CSS</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Skills -->
	
</section> 
<!-- End Team Section --> 


	
<!-- Contact Section --> 
<section class="section-wrapper" id="contacts">
	<!-- Contacts -->	
	<div class="contacts"> 
	
		<!-- Block Title -->	
		<div class="element-title">			
			<div class="row">	 		
				<div class="container">
						<h1 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="100ms"><span class="text-color">ติดต่อพวกเรา</span></h1>						
							
					<h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="300ms">ติดต่อ <span class="main-color">ผู้ดูแล </span> ติดต่อสอบถาม</h3>	
				</div>
			</div>
		</div>
		<!-- End Block Title -->	
	
		<div class="container">
			<div class="row">	
				<div class="wrapper-contacts">		
					<div class="contact_form">
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
						</div>	
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
	
<!-- Footer -->
<div class="bottom-footer">
	<div class="container"> 
		<div class="bottom-footer-center wow fadeInDown" data-wow-duration="1s" data-wow-delay="300ms">
			<ul class="bottom-social-icons">
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram"></i></a></li>
				<li><a href="#"><i class="fa fa-flickr"></i></a></li>
			</ul>
		</div>	
		<div class="bottom-footer-left wow fadeInUp" data-wow-duration="1s" data-wow-delay="450ms">
			<p><span>&#169; Copyright 2017 Xlight Template by</span>  <a href="https://www.andsolutions.it">Andsolutions</a></p>
		</div>		  
	</div>
</div>
<!-- End Footer -->		

<!-- Scroll to Top  -->
<a href="#" class="scroll-up"><i class="fa fa-arrow-up"></i></a>
<!-- End Scroll To Top  -->
	
	
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

</body>
</html>