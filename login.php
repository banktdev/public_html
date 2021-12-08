<?php
  $file = fopen("contact.txt", "r") or die("Unable to open file!");
  $contact = fgets($file);
  fclose($file);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>สูตร Casino Ai | โปรแกรมโกงสูตรบาคาร่า Ai แฮกบาคาร่า</title>
  <meta name="keywords" content="สูตร Casino Ai, สูตรบาคาร่า, แจกสูตรบาคาร่า, สูตรแฮกบาคาร่า, แฮกเกอร์บาคาร่า, ขายสูตรบาคาร่า, ฟรีโปรแกรมโกงบาคาร่า, แจกโปรแกรมสูตรบาคาร่า, สอนแฮกบาคาร่า, ขายโปรแกรมโกงบาคาร่า" />
  <meta name="description" content="สูตร Casino Ai เว็บให้บริการสูตรแฮกเกอร์บาคาร่า ทำงานด้วยระบบ Ai ไม่ต้องจดสูตรใช้ระบบ Ai แฮกเข้า Sagaming และ SexyBaccarat เรียบร้อยแล้ว สามารถซื้อสูตรผ่านระบบเติมเงิน Wallet อัตโนมัติ สูตรนี้จัดทำขึ้นโดยเซียนพนันโดยมืออาชีพ มีประสบการณ์มากกว่า 10 ปี และยังมีกิจกรรมแจกสูตรต่างๆมากมายอีกด้วย!" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"  crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="./css/common.css">
  <link rel="stylesheet" type="text/css" href="./css/userlogin.css">
  <link rel="shortcut icon" href="asset/img/favicon.jpeg" type="image/x-icon">
  <script src="js/jquery-3.4.1.js"  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js"  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script type="text/javascript" src="./js/loginpage.js"></script>
  <script type="text/javascript" src="./js/test.js"></script>
  
  <script language="JavaScript">

  /* ################### For Disable Inspect ################### */
      //  window.onload = function () {
      //      document.addEventListener("contextmenu", function (e) {
      //          e.preventDefault();
      //      }, false);
      //      document.addEventListener("keydown", function (e) {
      //          //document.onkeydown = function(e) {
      //          // "I" key
      //          if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
      //              disabledEvent(e);
      //          }
      //          // "J" key
      //          if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
      //              disabledEvent(e);
      //          }
      //          // "S" key + macOS
      //          if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
      //              disabledEvent(e);
      //          }
      //          // "U" key
      //          if (e.ctrlKey && e.keyCode == 85) {
      //              disabledEvent(e);
      //          }
      //          // "F12" key
      //          if (event.keyCode == 123) {
      //              disabledEvent(e);
      //          }
      //      }, false);
      //      function disabledEvent(e) {
      //          if (e.stopPropagation) {
      //              e.stopPropagation();
      //          } else if (window.event) {
      //              window.event.cancelBubble = true;
      //          }
      //          e.preventDefault();
      //          return false;
      //      }
      //  }
//edit: removed ";" from last "}" because of javascript error
</script>
  <style>
  </style>
</head>
<!-- <?php echo rand(1,9);?> -->
<body class="bg_body bg_img" style="background-image: url('resource/images/cas/BG.jpg');">

<div id="RegisModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered  modal-lg">
      <div class="modal-content" style="padding: 2rem;">
        <h2 class="modal-title text-center">Register / สมัครสมาชิก</h2>
        <div class="modal-body">
          <div class="container">
            <form id="regisform" method="post">

			  <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" placeholder="ภาษาอังกฤษ หรือ ตัวเลข หรือ _ 6 - 32 ตัวอักษร" name="regUser" maxlength="32" minlength="6" pattern="^[a-zA-Z0-9_]+$" autocomplete="off" required>
              </div>

              <div class="form-group">
                <label>รหัสผ่าน</label>
                <input type="password" class="form-control" placeholder="รหัสผ่านสำหรับเข้าใช้งาน" name="regPass" maxlength="32" minlength="6" pattern="^[a-zA-Z0-9_.-]+$" autocomplete="off" required>
              </div>

              <div class="form-group">
                <label>รหัสผ่านอีกครั้ง</label>
                <input type="password" class="form-control" placeholder="ใส่รหัสผ่านอีกครั้ง" name="regRepass" maxlength="32" minlength="6" pattern="^[a-zA-Z0-9_.-]+$" autocomplete="off" required>
              </div>

            <div class="form-grop row" style="justify-content: space-around;">
                <button type="submit" class="btn btn-success">สมัครสมาชิก</button>
                <button type="button" class="btn btn-outline-danger" data-togle="modal" data-dismiss="modal">ยกเลิก</button>
            </div>
            <input type="hidden" name="action" value="Register">
            </form>

          </div>

        </div>
      </div>

    </div>
  </div>

    <!-- Body -->
  <div class="container">
    <div class="div-center">
        <div class="card" style="padding: 2rem;margin-top: 7rem;">
        <img src="./img/banner.jpeg" alt="">
        <h2>LOGIN / ระบบล็อกอิน</h2>
        <form id="loginform" method="post">
            <div class="form-group row">
            <label for="username" class="col-sm-3 col-form-label">Username</label>
            <div class="col-sm-9">
                <input type="text" id="txtUsername" class="form-control" placeholder="Username" minlength="4" maxlength="16" autocomplete="off" required>
            </div>
            </div>
            <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
                <input type="text" id="txtPassword" class="form-control" placeholder="Password" autocomplete="off" required>
            </div>
            </div>
            <div class="form-group" style="display: flex; justify-content: space-around;">
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#RegisModal">สมัครสมาชิก</button>
                <button type="button" class="btn btn-success" onclick="do_login()">เข้าสู่ระบบ</button>
            </div>
        </form>
    </div>

      <!-- <div class="container-fluid" style="margin-top: -15px">
        <div style="font-family: 'Helvet';font-size: 24px;color:white;margin-bottom: -15px">ติดต่อเราได้ที่ไลน์</div>
        <a href="http://line.me/ti/p/~<?php echo $contact; ?>">
          <span style="font-family: 'Helvet';font-size: 34px;">
            <img src="resource/images/new/i_line.png" height="30" style="padding-bottom: 1%;">
            Line : <?php echo $contact; ?>
          </span>
        </a>
      </div> -->

    </div>
  </div>
  <script id="_wauewy">var _wau = _wau || []; _wau.push(["tab", "yqgubm6jns", "ewy", "right-middle"]);</script><script async src="//waust.at/t.js"></script>
</body>
</html>
