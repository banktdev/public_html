<?php
   $file = fopen("contact.txt", "r") or die("Unable to open file!");
   $contact = fgets($file);
   fclose($file);
   ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <?php
      include_once 'header.php';
      ?>
   <style>
      body {
      font-family: 'Kanit', sans-serif;
      }
      .modal-content {
      position: relative;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: column;
      flex-direction: column;
      width: 100%;
      pointer-events: auto;
      background-color: #2b2b2b8f;
      background-clip: padding-box;
      border: 1px solid rgba(0, 0, 0, .2);
      border-radius: .3rem;
      outline: 0;
      -webkit-box-shadow: 0 0 15px rgba(0, 240, 255, 0.4);
      box-shadow: 0 0 20px 14px rgba(0, 240, 255, 0.4);
      }
      a:not([href]):not([tabindex]) {
      color: #f7931d;
      text-decoration: none;
      }
      a:not([href]):not([tabindex]):hover {
      color: #ffbd70;
      text-decoration: none;
      }
      .colorregister:hover {
      color: #9bcbff;
      text-decoration: blink;
      }
      .bg-blackx2 {
      background-color: #0000009e;
      color: #fff;
      border: 1px solid #ffdb2b;
      }
      .bg-blackx2:hover {
      background-color: #0000009e;
      color: #fff;
      border: 1px solid #fcff24;
      }
      .bg-blackx2:focus {
      background-color: #0000009e;
      color: #fff;
      border: 1px solid #ffdb2b;
      }
      .btn-danger {
      color: #000;
      background-color: #ffd800;
      border: 1px solid yellow;
      box-shadow: 0px 0px 5px 1px yellow;
      }
      .btn-danger:not(:disabled):not(.disabled).active,
      .btn-danger:not(:disabled):not(.disabled):active,
      .show>.btn-danger.dropdown-toggle {
      color: #fffb80 !important;
      background-color: #0a0a0a;
      border-color: #dcd735;
      }
      .btn-danger:active {
      background-color: yellow;
      color: #000;
      border: 1px solid #ffd800;
      }
      .btn-danger:hover {
      background-color: yellow;
      color: #000;
      border: 1px solid #ffd800;
      }
      .btn-danger:focus {
      background-color: yellow;
      color: #000;
      border: 1px solid #ffd800;
      }
   </style>
   <body class="bg_body bg_img">
      <div id="RegisModal" class="modal fade" role="dialog">
         <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content text-white">
               <h4 class="modal-title text-center">Register</h4>
               <div class="modal-body">
                  <div class="container">
                     <form id="regisform" method="post">
                        <div class="form-group">
                           <label>Username</label>
                           <input type="text" class="form-control" placeholder="ภาษาอังกฤษ หรือ ตัวเลข หรือ _ 6 - 32 ตัวอักษร" name="regUser" maxlength="32" minlength="6" pattern="^[a-zA-Z0-9_]+$" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                           <label>รหัสผ่าน</label>
                           <input type="password" class="form-control " placeholder="รหัสผ่านสำหรับเข้าใช้งาน" name="regPass" maxlength="32" minlength="6" pattern="^[a-zA-Z0-9_.-]+$" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                           <label>รหัสผ่านอีกครั้ง</label>
                           <input type="password" class="form-control" placeholder="ใส่รหัสผ่านอีกครั้ง" name="regRepass" maxlength="32" minlength="6" pattern="^[a-zA-Z0-9_.-]+$" autocomplete="off" required>
                        </div>
                        <div class="row text-center">
                           <div class="col text-right">
                              <div class="form-group">
                                 <input type="submit" class="btn btn-outline-success" value="ตกลง">
                              </div>
                           </div>
                           <div class="col text-left">
                              <div class="form-group">
                                 <button class="btn btn-outline-danger" data-toggle="modal" data-dismiss="modal">
                                 ยกเลิก
                                 </button>
                              </div>
                           </div>
                        </div>
                        <input type="hidden" name="action" value="Register">
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="container text-center">
         <div class="div-center">
            <div>
               <img class="logo-img animate__animated animate__bounceIn" src="resource/images/logoxx.png">
            </div>
            <div class="container text-center center-box">
               <div class="logheader" style="font-family: 'Kanit';letter-spacing: 1px;text-shadow: 5px 5px 10px #000">LOGIN / เข้าสู่ระบบ</div>
               <form id="loginform" method="post">
                  <div class="row mb-3 pr-1">
                     <div class="col-sm-4 p-0 text-center" style="font-family: 'Kanit';font-size: 20px;color:white;letter-spacing: 1px;text-shadow: 3px 5px 5px #000">USERNAME : &nbsp;</div>
                     <div class="col-sm-8 p-0">
                        <input type="text" id="txtUsername" class="form-control text-center bg-blackx2" placeholder="Username" maxlength="16" minlength="4" autocomplete="off" required>
                     </div>
                  </div>
                  <div class="row mb-3 pr-1">
                     <div class="col-sm-4 p-0 text-center" style="font-family: 'Kanit';font-size: 20px;color:white;letter-spacing: 1px;text-shadow: 3px 5px 5px #000">PASSWORD : &nbsp;</div>
                     <div class="col-sm-8 p-0">
                        <input type="password" id="txtPassword" class="form-control text-center bg-blackx2" placeholder="รหัสผ่าน" name="pass" autocomplete="off" required>
                     </div>
                  </div>
                  <div class="row mb-3 pr-1">
                     <div class="col-sm-6 p-0 text-center" id="secCode" style="font-family: 'Kanit';font-size: 30px;color:white;letter-spacing: 4px;text-shadow: 3px 5px 5px #000;"></div>
                     <div class="col-sm-6 p-0">
                        <input type="text" id="input_code" class="form-control-sm text-center bg-blackx2" placeholder="Security Code" maxlength="4" autocomplete="off" required>
                     </div>
                  </div>
                  <div class="row mt-b3">
                     <li class="login-btn btn-block"><a title="เข้าสู่ระบบ" onclick="do_login()">เข้าสู่ระบบ</a></li>
                  </div>
                  <div class="row mt-3">
                     <li class="register-btn btn-block"><a class="colorregister" href="#" data-toggle="modal" data-target="#RegisModal">สมัครสมาชิก</a></li>
                  </div>
               </form>
            </div>
            <br>
            <div class="container-fluid">
              <div style="font-family: 'Kanit';font-size: 24px;color:white;margin-bottom: -15px">ติดต่อเราได้ที่ไลน์</div>
              <br>
              <a href="http://line.me/ti/p/<?php echo $contact; ?>">
              <span style="font-family: 'Kanit';font-size: 30px;color: #fcff5d">
              <img src="resource/images/new/i_line.png" height="30" style="padding-bottom: 1%;">
              Line : <?php echo $contact; ?>
              </span>
              </a>
            </div>
         </div>
      </div>
  </body>
</html>