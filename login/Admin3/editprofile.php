<?php
session_start();
include('db_conn.php');

$token = mysqli_real_escape_string($conn, $_SESSION['email']);
$token_check_query = "SELECT * FROM users WHERE EMAIL = '$token'";
$query = mysqli_query($conn, $token_check_query);
$result = mysqli_fetch_assoc($query);
$name = $result['NAME'];
$email = $result['EMAIL'];
$surname = $result['SURNAME'];
$phone = $result['PHONE'];
$password = $result['PASSWORD'];
$image = $result['profile_image'];
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
     <form action="editprofile_db.php"
           method="post"
           enctype="multipart/form-data">

		   <div class="form-group text-center" style="position: relative;" >
            <span class="img-div">
            <div class="text-center img-placeholder"  onClick="triggerClick()">
            <h4>อัพรูปภาพ</h4>
            </div>
            <img src="uploads/<?php echo $image; ?>" onClick="triggerClick()" id="profileDisplay">
            </span>
            <input type="file" name="my_image" onChange="displayImage(this)" style="display: none;" id="profileImage">
            <label>Profile Image</label>
            </div>

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
            <label class="col-lg-3 control-label">ชื่อ:</label>
            <div class="col-lg-8">
            <input class="form-control" name = "names" type="text" value="<?php echo $name; ?>">
            </div>
            </div>

			<div class="form-group">
            <label class="col-lg-3 control-label">นามสกุล</label>
            <div class="col-lg-8">
            <input class="form-control" name = "surname" type="text" value="<?php echo $surname; ?>">
                </div>
            </div>

			<div class="form-group">
            <label class="col-md-3 control-label">เบอร์:</label>
            <div class="col-md-8">
            <input class="form-control" name = "phone" type="number" value="<?php echo $phone?>">
            </div>
            </div>

			<div class="form-group">
			<label class="col-md-3 control-label">รหัสผ่านใหม่: </label>
            <div class="col-md-8">
            <input class="form-control" name = "newpassword" type="password" value="">
            </div>
            </div>
                              
			<div class="form-group">
            <label class="col-md-3 control-label">ยืนยันรหัสผ่านใหม่</label>
            <div class="col-md-8">
            <input class="form-control" name = "con_newpassword" type="password" value="">
            </div>
            </div>

            <div class="form-group">
            <label class="col-md-3 control-label">กรอกรหัสผ่านเดิม</label>
            <div class="col-md-8">
            <input class="form-control" name = "password" type="password" value="">
            </div>
            </div>

           <input type="submit" 
                  name="submit"
                  value="Upload">
     	
     </form>
</body>

<script>
        function triggerClick(e) {
  document.querySelector('#profileImage').click();
}
function displayImage(e) {
  if (e.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e){
      document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}
    </script>
</html>