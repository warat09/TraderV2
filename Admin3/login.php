<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login AutoBot</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
  
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="images/login.jpg" alt="FeeIgsi" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="image"></a>
              </div>
              <p class="login-card-description">เข้าสู่ระบบ</p>
              <form action="#!">
                  <div class="form-group">
                    <label for="email" class="sr-only">อีเมล</label>
                    <input type="email" name="loginusername" id="loginusername" class="form-control" placeholder="ชื่อผู้ใช้">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">รหัสผ่าน</label>
                    <input type="password" name="loginpassword" id="loginpassword" class="form-control" placeholder="รหัสผ่าน">
                  </div>
                  <div>
                    <button name="Btlogin" id="Btlogin" class="btn btn-block login-btn mb-4" type="button" value="ล็อคอิน">ล็อคอิน</button>
                  </div>
                </form>
                <a href="forget-pass1.html" class="forgot-password-link">ลืมรหัสผ่าน?</a>
                <p class="login-card-footer-text"> <a href="regis.php" class="text-reset">สมัครสมาชิก</a></p>
                
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="./funtionlogin.js"></script>
</body>
</html>
