<?php
    session_start();
    include('server.php');
    $errors = array();
    $noterrors = array();
    
    if (isset($_POST['reg_user'])){
        $name = mysqli_real_escape_string($conn, $_POST['names']);
        $surname = mysqli_real_escape_string($conn, $_POST['surnames']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $con_password = mysqli_real_escape_string($conn, $_POST['con_password']);
        $phone = mysqli_real_escape_string($conn, $_POST['tell']);
        ///variable recap
        $recap1 = mysqli_real_escape_string($conn, $_POST['textinput']);
        $recap2 = mysqli_real_escape_string($conn, $_POST['capt']);
        $token = bin2hex(random_bytes(50));

        if (empty($name)||empty($surname)||empty($email)||empty($password)||empty($con_password)||empty($phone)){
            array_push($errors, "กรุณากรอกข้อมูลให้ครบ");
            $_SESSION['error'] = "กรุณากรอกข้อมูลให้ครบ";
        }
        else if($password != $con_password){
            array_push($errors, "รหัสผ่านไม่ตรงกันกรุณากรอกใหม่");
            $_SESSION['error'] = "รหัสผ่านไม่ตรงกันกรุณากรอกใหม่";
          
        }
        else if(empty($_POST['box'])){
          array_push($errors, "กรุณากรอกติก");
          $_SESSION['error'] = "กรุณากรอกติก";
        
      }
        else if(empty($recap1)){
          array_push($errors, "กรุณากรอกCaptcha");
          $_SESSION['error'] = "กรุณากรอกCaptcha";
        
      }
        else if($recap1 != $recap2){
            array_push($errors, "กรุณากรอกCaptchaให้ถูกต้อง");
            $_SESSION['error'] = "กรุณากรอกCaptchaให้ถูกต้อง";
  
        }

        
        $email_check_query = "SELECT * FROM users WHERE EMAIL = '$email'";
        $query = mysqli_query($conn, $email_check_query);
        $result = mysqli_fetch_assoc($query);

    
        if(count($errors) == 0){
           
            if($result){
              if($result['EMAIL'] === $email){
                  array_push($errors ,"อีเมล์นี่มีแล้ว") ;
                  $_SESSION['error'] = "อีเมล์นี่มีแล้ว";
                  header('location: regis.php');
              }
  
          }

           else if(mysqli_num_rows($query)==0){
                $query = mysqli_query($conn,"SELECT * FROM users WHERE V_EMAIL='$email'");
            
            require("phpmailer/class.phpmailer.php"); // path to the PHPMailer class.
 
            $fm = "beebacorporation@gmail.com"; // *** ต้องใช้อีเมล์ @gmail.com เท่านั้น ***
            $to = $email; // อีเมล์ที่ใช้รับข้อมูลจากแบบฟอร์ม
            $custemail = $_POST['email']; // อีเมล์ของผู้ติดต่อที่กรอกผ่านแบบฟอร์ม

            $mail = new PHPMailer();
            $mail->CharSet = "utf-8"; 
            
            
            $mail->IsSMTP();
            $mail->Mailer = "smtp";
            $mail->IsSMTP(); // telling the class to use SMTP
            $mail->SMTPAuth = true;                  // enable SMTP authentication
            $mail->SMTPSecure = "tls";                 // sets the prefix to the servier
            $mail->Host = "smtp.gmail.com";      // sets GMAIL as the SMTP server
            $mail->Port = 587;                   // set the SMTP port for the GMAIL server
            $mail->Username = "beebacorporation@gmail.com";  // Gmail Email username
            $mail->Password = "mistersigz";            // App Password not Gmail password
           
            
            $mail->setFrom($fm, "BeeBaCorporation");
            $mail->AddAddress($to);
            $mail->AddReplyTo($custemail);
            $mail->Subject = "Please verify email!";
            $mail->isHTML(true);
            $mail->Body     = "
            <!DOCTYPE html PUBLIC   -//W3C//DTD XHTML 1.0 Transitional//EN     http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd  >
<html xmlns=  http://www.w3.org/1999/xhtml  >
<head>
  <meta name=  x-apple-disable-message-reformatting   />
  <meta http-equiv=  Content-Type   content=  text/html; charset=utf-8   />
  <meta name=  viewport   content=  width=device-width, initial-scale=1.0   />
  <link rel=  icon   href=  https://growth.lyft.com.s3.amazonaws.com/lyft%20favicon.ico   type=  image/gif   sizes=  32x32  >
  <link href= http://mistersigz.thddns.net:7572/Beebas/login/css/veri.css rel=stylesheet>
  <title>Lyft</title>
  <style type=  text/css  >
    /*******************FONT STYLING LYFT*********************/
    @import url('https://fonts.googleapis.com/css2?family=Prompt:wght@300;400&display=swap');
    @font-face {
      src: url(fonts/Prompt-Regular.ttf);
      font-family: 'Prompt', sans-serif;
    }
/* 
    @import url(http://lyft-assets.s3.amazonaws.com/font/Lyft%20Pro/LyftPro-Regular.otf);
    @font-face {
      font-family: 'LyftPro-Regular';
      src: url(https://lyft-assets.s3.amazonaws.com/font/Lyft%20Pro/LyftPro-Regular.otf) format(  opentype  );
      font-weight: normal;
      font-style: normal;
    }
    @import url(https://lyft-assets.s3.amazonaws.com/font/Lyft%20Pro/LyftPro-SemiBold.otf);
    @font-face {
      font-family: 'LyftPro-SemiBold';
      src: url(https://lyft-assets.s3.amazonaws.com/font/Lyft%20Pro/LyftPro-SemiBold.otf) format(  opentype  );
      font-weight: normal;
      font-style: normal;
    } */
    /************************* END FONT STYLING ************************************/
    body {
      width: 100%;
      background-color: #FFFFFF;
      margin: 0;
      padding: 0;
      -webkit-font-smoothing: antialiased;
      font-family: 'Prompt', sans-serif;
    }
    table {
      border-collapse: collapse;
    }
    img {
      border: 0;
      outline: none !important;
    }
    .hideDesktop {
      display: none;
    }
    /********* CTA Style - fixed padding *********/
    .cta-shadow {
      padding: 14px 35px;
      -webkit-box-shadow: 0px 5px 0px rgba(0, 0, 0, 0.2);
      -moz-box-shadow: 0px 5px 0px rgba(0, 0, 0, 0.2);
      box-shadow: 0px 5px 0px rgba(0, 0, 0, 0.2);
      -moz-border-radius: 25px;
      -webkit-border-radius: 25px;
      font-size: 16px;
      font-weight: normal;
      letter-spacing: 0px;
      text-decoration: none;
      display: block;
    }
    body[yahoo] .hideDeviceDesktop {
      display: none;
    }
    @media only screen and (max-width: 640px) {
      div[class=mobilecontent] {
        display: block !important;
        max-height: none !important;
      }
      body[yahoo] .fullScreen {
        width: 100% !important;
        padding: 0px;
        height: auto;
      }
      body[yahoo] .halfScreen {
        width: 50% !important;
        padding: 0px;
        height: auto;
      }
      body[yahoo] .mobileView {
        width: 100% !important;
        padding: 0 4px;
        height: auto;
      }
      body[yahoo] .center {
        text-align: center !important;
        height: auto;
      }
      body[yahoo] .hideDevice {
        display: none;
      }
      body[yahoo] .hideDevice640 {
        display: none;
      }
      body[yahoo] .showDevice {
        display: table-cell !important;
      }
      body[yahoo] .showDevice640 {
        display: table !important;
      }
      body[yahoo] .googleCenter {
        margin: 0 auto;
      }
      .mobile-LR-padding-reset {
        padding-left: 0 !important;
        padding-right: 0 !important;
      }
      .side-padding-mobile {
        padding-left: 40px;
        padding-right: 40px;
      }
      .RF-padding-mobile {
        padding-top: 0 !important;
        padding-bottom: 25px !important;
      }
      .wrapper {
        width: 100% !important;
      }
      .two-col-above {
        display: table-header-group;
      }
      .two-col-below {
        display: table-footer-group;
      }
      .hideDesktop {
        display: block !important;
      }
    }
    @media only screen and (max-width: 520px) {
      .mobileHeader {
        font-size: 50px !important;
      }
      .mobileBody {
        font-size: 16px !important;
      }
      .mobileSubheader {
        font-size: 30px !important;
      }
    }
    @media only screen and (max-width: 479px) {
      body[yahoo] .fullScreen {
        width: 100% !important;
        padding: 0px;
        height: auto;
      }
      body[yahoo] .mobileView {
        width: 100% !important;
        padding: 0 4px;
        height: auto;
      }
      body[yahoo] .center {
        text-align: center !important;
        height: auto;
      }
      body[yahoo] .hideDevice {
        display: none;
      }
      body[yahoo] .hideDevice479 {
        display: none;
      }
      body[yahoo] .showDevice {
        display: table-cell !important;
      }
      body[yahoo] .showDevice479 {
        display: table !important;
      }
      .mobile-LR-padding-reset {
        padding-left: 0 !important;
        padding-right: 0 !important;
      }
      .side-padding-mobile {
        padding-left: 40px;
        padding-right: 40px;
      }
      .RF-padding-mobile {
        padding-top: 0 !important;
        padding-bottom: 25px !important;
      }
      .wrapper {
        width: 100% !important;
      }
      .two-col-above {
        display: table-header-group;
      }
      .two-col-below {
        display: table-footer-group;
      }
      .mobileButton {
        width: 150px !important !
      }
    }
    @media only screen and (max-width: 385px) {
      .mobileHeaderSmall {
        font-size: 18px !important;
        padding-right: none;
      }
      .mobileBodySmall {
        font-size: 14px !important;
        padding-right: none;
      }
    }
    /* Stops automatic email inks in iOS */
    a[x-apple-data-detectors] {
      color: inherit !important;
      text-decoration: none !important;
      font-size: inherit !important;
      font-family: inherit !important;
      font-weight: inherit !important;
      line-height: inherit !important;
    }
    a[href^=  x-apple-data-detectors:  ] {
      color: inherit;
      text-decoration: inherit;
    }
    .footerLinks {
      text-decoration: none;
      color: #384049;
      font-family: 'LyftPro-Regular', 'Helvetica Neue', Helvetica, Arial, sans-serif;
      font-size: 12px;
      line-height: 18px;
      font-weight: normal;
    }
    /*******Some Clients do not support rounded borders (example: older versions of Outlook)**********/
    .roundButton {
      border-radius: 5px;
    }
    /************************* Fixing Auto Styling for Gmail*********************/
    .contact a {
      color: #00000 !important !;
      text-decoration: none;
    }
    u+#body a {
      color: inherit;
      text-decoration: none;
      font-size: inherit;
      font-family: inherit;
      font-weight: inherit;
      line-height: inherit;
    }
  </style>
  <!-- Fall-back font for Outlook (Arial) -->
  <!--[if (gte mso 9)|(IE)]>
    <style type=  text/css  >
    a, body, div, li, p, strong, td, span {font-family: Arial, Helvetica, sans-serif !important;}
    
    </style>
  <![endif]-->
  <!-- <link rel=  stylesheet  
          href=  https://fonts.googleapis.com/css2?family=Charmonman&display=swap  >
  <link rel=  stylesheet  
      href=  https://fonts.googleapis.com/css2?family=Charmonman&family=Prompt:wght@300&display=swap   >
      <Style> -->
      </Style>
</head>
<body leftmargin=  0   topmargin=  0   marginwidth=  0   marginheight=  0   yahoo=  fix   style=  font-family: 'Prompt', sans-serif;   align=  center   id=  body  >
  <custom type=  content   name=  ampscript  >
    <!-- FULL PAGE WIDTH WRAPPER WITH TINT -->
    <table align=  center   border=  0   cellpadding=  0   cellspacing=  0   width=  100%  >
      <tr>
        <td align=  center   bgcolor=  #f3f3f5   valign=  top   width=  100%  >
          <!--========= WHITE PAGE BODY CONTAINER/WRAPPER========-->
          <table align=  center   border=  0   cellpadding=  0   cellspacing=  0   class=  mobileView   width=  600   style=    >
            <tr>
              <td align=  center   bgcolor=  #222222   style=  padding:0px;   width=  100%  >
                <!--================================SECTION 0==========================-->
                <table align=  center   bgcolor=     border=  0   cellpadding=  0   cellspacing=  0   class=  fullScreen   style=  width:100% !important;background-color:#625a9c;   width=  600  >
                  <tr>
                    <td bgcolor=  #FFD6E5   class=     style=  width:100% !important; padding: 0;background-color:#222222;  >
                      <!--========Paste your Content below=================-->
                      <table cellspacing=  0   cellpadding=  0   align=  center   border=  0   width=  100%   bgcolor=  #222222  >
                        <tr>
                          
                        </tr>
                      </table>
                      <table cellspacing=  0   cellpadding=  0   align=  center   border=  0   width=  100%   bgcolor=  #222222  >
                        <tr>
                          <td align=  center   height=  20px   style=  background-color: #222222;  >
                          </td>
                        </tr>
                      </table>
                      <!-- BEGIN LOGO -->
                      <table cellspacing=  0   cellpadding=  0   align=  left   border=  0   width=  100%   bgcolor=  #222222  >
                        <tr>
                          <td valign=  top   align=  left   width=  100%   style=  padding-left: 25px;  >
                          <a class=navbar-brand href=http://localhost> <img style=  max-width: 180px; height: auto   src=  http://mistersigz.thddns.net:7572/login/logo_1.png   alt=  logo_1   /></a>
                          </td>
                        </tr>
                      </table>
                      <table cellspacing=  0   cellpadding=  0   align=  center   border=  0   width=  100%   bgcolor=  #222222  >
                        <tr>
                          <td align=  center   height=  25px   style=  background-color: #222222;  >
                          </td>
                        </tr>
                      </table>
                      <!-- END LOGO -->
                      <!-- nothing -->
                      <!--=======End your Content here=====================-->
                    </td>
                  </tr>
                </table>
                <!--=======END SECTION==========-->
                <table align=  center   bgcolor=     border=  0   cellpadding=  0   cellspacing=  0   class=  fullScreen   style=  width:100% !important;   width=  600  >
                  <tr>
                    <td bgcolor=     class=     style=  width:100% !important; padding: 0;  >
                      <custom type=  content   name=  hero_image  >
                        <!--========Paste your Content below=================-->
                        <!-- nothing -->
                        <!--BEGIN HERO IMAGE -->
                        <table cellspacing=  0   cellpadding=  0   align=  left   border=  0   width=  100%   bgcolor=  #222222  >
                          <tr>
                            <td valign=  top   align=  center   width=  100%   style=  padding-right: 25px; padding-left: 25px;  >
                              <img width=  100%   style=  max-width: 600px; height: auto   src=  http://mistersigz.thddns.net:7572/login/icon-co.png  alt=  Lyft business profile   />
                            </td>
                          </tr>
                        </table>
                        <!--END HERO IMAGE-->
                        <table cellspacing=  0   cellpadding=  0   align=  center   border=  0   width=  100%   bgcolor=  #222222  >
                          <tr>
                            <td align=  center   height=  25px   style=  background-color: #222222;  >
                            </td>
                          </tr>
                        </table>
                        <!--BEGIN TEXT SECTION-->
                        <table width=  100%   align=  center   cellpadding=  0   cellspacing=  0   border=  0   style=  max-width: 600px;  bgcolor=  #222222>
                          <tr>
                            <td style=  font-family: 'Prompt', sans-serif; font-size: 25px; line-height: 1.0; color: #00CEEE; font-weight: bolder; text-transform: uppercase; padding: 25px 25px 5px 25px;   class=  mso-line-solid  >
                            <font style=color:#00CEEE face = WildWest size = 5><dd>เรียนคุณลูกค้า $name $surname</dd></font>
                            </td>
                          </tr>
                          <tr>
                            <td style=  font-family: 'Prompt', sans-serif; font-size: 20px; line-height: 1.0; color: #00CEEE; font-weight: bolder; padding: 0 25px 25px 25px;   class=  mso-line-solid mobile-headline  >
                            <font style=color:#00CEEE face = WildWest size = 4><dd> กรุณากดปุ่ม   ยืนยัน   ด้านล่าง เพื่อยืนยันตัวตนและเข้าสู่ระบบ</dd></font>
                            </td>
                          </tr>
                          <tr>
                            <td style=  font-family: 'Prompt', sans-serif; font-size: 18px; line-height: 1.0; color: #00CEEE; padding: 0 25px 15px 25px;  >
                            <font style=color:#00CEEE face = WildWest size = 3.5><dd><br>ขอบคุณ<br><br>จากบริษัท Beeba Co.</dd></font> 
                          </tr>
                          <!-- CTA -->
                          <tr>
                            <td align=  center   style=  padding: 0 25px 30px 25px; background-color: #00000;  >
                              <table align=  center   cellpadding=  0   cellspacing=  0   border=  0   class=  full-width  >
                                <tr><br>
                                  <td class=  cta-shadow   align=  center   bgcolor=  #00CEEE   style=  border-radius: 40px; -webkit-border-radius: 40px; -moz-border-radius: 40px;  >
                                    <a href='http://localhost/login/emailcontrol.php?name=$name&surname=$surname&email=$email&success=$password&phone=$phone&token=$token'   target=  _blank   style=  font-family: 'Prompt', sans-serif; font-size: 16px; line-height: 1.0; font-weight: bold; color: #ffffff; text-transform: uppercase; text-decoration: none; border-radius: 30px; -webkit-border-radius: 30px; -moz-border-radius: 30px; display: block; padding: 12px 25px 12px 25px;  >
                                                ยืนยัน
                                            </a>
                                  </td>
                                </tr>
                              </table>
                              <br>
                            </td>
                          </tr>
                        </table>
                     
                        <!--========Paste your Content below=================-->
                        <!-- nothing -->
                        <!-- nothing -->
                        <!--BEGIN HELP SECTION -->
                       
                           
                        <!--END HELP SECTION -->
                        <table cellspacing=  0   cellpadding=  0   align=  center   border=  0   width=  100%   bgcolor=  #00000  >
                         
                        </table>
                        <!--=======End your Content here=====================-->
                    </td>
                  </tr>
                </table>
                <table align=  center   bgcolor=     border=  0   cellpadding=  0   cellspacing=  0   class=  fullScreen   style=  width:100% !important;   width=  600  >
                  <tr>
                    <td bgcolor=     class=     style=  width:100% !important; padding: 0;  >
                      <!--========Paste your Content below=================-->
                      <!-- nothing -->
                      <!--END TEXT SECTION -->
                      <!--=======End your Content here=====================-->
                    </td>
                  </tr>
                </table>
                <table align=  center   bgcolor=     border=  0   cellpadding=  0   cellspacing=  0   class=  fullScreen   style=  width:100% !important;   width=  600  >
                  <tr>
                    <td bgcolor=     class=     style=  width:100% !important; padding: 0;  >
                      <!--========Paste your Content below=================-->
                      <custom type=  content   name=  section-02  >
                        <!--=======End your Content here=====================-->
                    </td>
                  </tr>
                </table>
                <table align=  center   bgcolor=     border=  0   cellpadding=  0   cellspacing=  0   class=  fullScreen   style=  width:100% !important;   width=  600  >
                  <tr>
                    <td bgcolor=     class=     style=  width:100% !important; padding: 0;  >
                      <!--========Paste your Content below=================-->
                      <custom type=  content   name=  section-03  >
                        <!--=======End your Content here=====================-->
                    </td>
                  </tr>
                </table>
                <table align=  center   bgcolor=     border=  0   cellpadding=  0   cellspacing=  0   class=  fullScreen   style=  width:100% !important;   width=  600  >
                  <tr>
                    <td bgcolor=     class=     style=  width:100% !important; padding: 0;  >
                      <!--========Paste your Content below=================-->
                      <custom type=  content   name=  section-04  >
                        <!--=======End your Content here=====================-->
                    </td>
                  </tr>
                </table>
                <table align=  center   bgcolor=     border=  0   cellpadding=  0   cellspacing=  0   class=  fullScreen   style=  width:100% !important;   width=  600  >
                  <tr>
                    <td bgcolor=     class=     style=  width:100% !important; padding: 0;  >
                      <!--========Paste your Content below=================-->
                      <custom type=  content   name=  section-05  >
                        <!--=======End your Content here=====================-->
                    </td>
                  </tr>
                </table>
                <table align=  center   bgcolor=     border=  0   cellpadding=  0   cellspacing=  0   class=  fullScreen   style=  width:100% !important;   width=  600  >
                  <tr>
                    <td bgcolor=     class=     style=  width:100% !important; padding: 0;  >
                      <!--========Paste your Content below=================-->
                      <custom type=  content   name=  section-06  >
                        <!--=======End your Content here=====================-->
                    </td>
                  </tr>
                </table>
                <table align=  center   bgcolor=     border=  0   cellpadding=  0   cellspacing=  0   class=  fullScreen   style=  width:100% !important;   width=  600  >
                  <tr>
                    <td bgcolor=     class=     style=  width:100% !important; padding: 0;  >
                      <!--========Paste your Content below=================-->
                      <custom type=  content   name=  section-07  >
                        <!--=======End your Content here=====================-->
                    </td>
                  </tr>
                </table>
                <table align=  center   bgcolor=     border=  0   cellpadding=  0   cellspacing=  0   class=  fullScreen   style=  width:100% !important;   width=  600  >
                  <tr>
                    <td bgcolor=     class=     style=  width:100% !important; padding: 0;  >
                      <!--========Paste your Content below=================-->
                      <custom type=  content   name=  section-08  >
                        <!--=======End your Content here=====================-->
                    </td>
                  </tr>
                </table>
                <table align=  center   bgcolor=     border=  0   cellpadding=  0   cellspacing=  0   class=  fullScreen   style=  width:100% !important;   width=  600  >
                  <tr>
                    <td bgcolor=     class=     style=  width:100% !important; padding: 0;  >
                      <!--========Paste your Content below=================-->
                      <custom type=  content   name=  section-09  >
                        <!--=======End your Content here=====================-->
                    </td>
                  </tr>
                </table>
                <table align=  center   bgcolor=     border=  0   cellpadding=  0   cellspacing=  0   class=  fullScreen   style=  width:100% !important;   width=  600  >
                  <tr>
                    <td bgcolor=     class=     style=  width:100% !important; padding: 0;  >
                      <!--========Paste your Content below=================-->
                      <custom type=  content   name=  section-10  >
                        <!--=======End your Content here=====================-->
                    </td>
                  </tr>
                </table>
                
              </td>
            </tr>
          </table>
          
    <custom name=  opencounter   type=  tracking   style=  display:none;  >
     
      <script data-cfasync=  false   src=  /cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js  ></script></body>
</html>
            ";
            $mail->WordWrap = 50;
                if(!$mail->Send()) {
                    array_push($errors, "ส่งอีเมลผิดพลาดกรุณากรอกข้อมูลใหม่");
                    $_SESSION['error'] = "ส่งอีเมลผิดพลาดกรุณากรอกข้อมูลใหม่";
                    header('location: regis.php');
                    exit;
                    } 
                    else {
                    array_push($noterrors, "ส่งอีเมลสำเร็จ");
                    $_SESSION['noterror'] = "ส่งอีเมลสำเร็จ";
                    
                        
                    $_SESSION['name'] = $name;
                    $_SESSION['surname'] = $surname;
                    $_SESSION['email'] = $email;
                    $_SESSION['success'] = $password;
                    $_SESSION['phone'] = $phone;
               

                    
                    header('location: regis.php');
                    }
            }
            else{
                array_push($errors, "ผิดพลาด");
                $_SESSION['error'] = "ผิดพลาด";
                 header('location: regis.php');
            }    
        }
        else{
            header('location: regis.php');
        }
    }
    
?>