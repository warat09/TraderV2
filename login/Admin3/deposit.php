<?php
session_start();
include('server.php');

$email = mysqli_real_escape_string($conn, $_SESSION['email']);
$email_check_query = "SELECT * FROM users WHERE EMAIL = '$email'";
$query = mysqli_query($conn, $email_check_query);
$result = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Image Upload Using PHP</title>
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
</head>
<body>
     <form action="deposit_db.php"
           method="post"
           enctype="multipart/form-data">
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

			

            <label class="col-md-3 control-label">จำนวนเงิน</label>
            <div class="col-md-8">
            <input class="form-control" name = "payment" type="number"><br>
            <label class="col-md-3 control-label">วันที่ชำระ</label><br>
            <input type="date" name="your-date" class="wpcf7-form-control wpcf7-date wpcf7-validates-as-required wpcf7-validates-as-date" aria-required="true" aria-invalid="false" placeholder="วันที่ชำระ"><br>
            <label class="col-md-3 control-label">เวลาที่ชำระ</label><br>
            <select name="menu-h" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required" aria-required="true" aria-invalid="false"><option value="">--- ชั่วโมง ---</option><option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option></select>
            <select name="menu-n" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required" aria-required="true" aria-invalid="false"><option value="">--- นาที ---</option><option value="00 นาที">00 นาที</option><option value="01 นาที">01 นาที</option><option value="02 นาที">02 นาที</option><option value="03 นาที">03 นาที</option><option value="04 นาที">04 นาที</option><option value="05 นาที">05 นาที</option><option value="06 นาที">06 นาที</option><option value="07 นาที">07 นาที</option><option value="08 นาที">08 นาที</option><option value="09 นาที">09 นาที</option><option value="10 นาที">10 นาที</option><option value="11 นาที">11 นาที</option><option value="12 นาที">12 นาที</option><option value="13 นาที">13 นาที</option><option value="14 นาที">14 นาที</option><option value="15 นาที">15 นาที</option><option value="16 นาที">16 นาที</option><option value="17 นาที">17 นาที</option><option value="18 นาที">18 นาที</option><option value="19 นาที">19 นาที</option><option value="20 นาที">20 นาที</option><option value="21 นาที">21 นาที</option><option value="22 นาที">22 นาที</option><option value="23 นาที">23 นาที</option><option value="24 นาที">24 นาที</option><option value="25 นาที">25 นาที</option><option value="26 นาที">26 นาที</option><option value="27 นาที">27 นาที</option><option value="28 นาที">28 นาที</option><option value="29 นาที">29 นาที</option><option value="30 นาที">30 นาที</option><option value="31 นาที">31 นาที</option><option value="32 นาที">32 นาที</option><option value="33 นาที">33 นาที</option><option value="34 นาที">34 นาที</option><option value="35 นาที">35 นาที</option><option value="36 นาที">36 นาที</option><option value="37 นาที">37 นาที</option><option value="38 นาที">38 นาที</option><option value="39 นาที">39 นาที</option><option value="40 นาที">40 นาที</option><option value="41 นาที">41 นาที</option><option value="42 นาที">42 นาที</option><option value="43 นาที">43 นาที</option><option value="44 นาที">44 นาที</option><option value="45 นาที">45 นาที</option><option value="46 นาที">46 นาที</option><option value="47 นาที">47 นาที</option><option value="48 นาที">48 นาที</option><option value="49 นาที">49 นาที</option><option value="50 นาที">50 นาที</option><option value="51 นาที">51 นาที</option><option value="52 นาที">52 นาที</option><option value="53 นาที">53 นาที</option><option value="54 นาที">54 นาที</option><option value="55 นาที">55 นาที</option><option value="56 นาที">56 นาที</option><option value="57 นาที">57 นาที</option><option value="58 นาที">58 นาที</option><option value="59 นาที">59 นาที</option></select>
            </div>
            </div>

            <div class="form-group text-center" style="position: relative;" >
            <input type="file" name="payImage">
            </div>


           <input type="submit" 
                  name="submit"
                  value="Upload">
     	
     </form>
</body>
</html>