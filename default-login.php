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
  <title>SupSibz.in.th | โปรแกรมโกงสูตรบาคาร่า Ai แฮกบาคาร่า | Lobby : Baccarat</title>
  <meta name="keywords" content="SupSibz.in.th, สูตรบาคาร่า, แจกสูตรบาคาร่า, สูตรแฮกบาคาร่า, แฮกเกอร์บาคาร่า, ขายสูตรบาคาร่า, ฟรีโปรแกรมโกงบาคาร่า, แจกโปรแกรมสูตรบาคาร่า, สอนแฮกบาคาร่า, ขายโปรแกรมโกงบาคาร่า" />
  <meta name="description" content="SupSibz.in.th เว็บให้บริการสูตรแฮกเกอร์บาคาร่า ทำงานด้วยระบบ Ai ไม่ต้องจดสูตรใช้ระบบ Ai แฮกเข้า Sagaming และ SexyBaccarat เรียบร้อยแล้ว สามารถซื้อสูตรผ่านระบบเติมเงิน Wallet อัตโนมัติ สูตรนี้จัดทำขึ้นโดยเซียนพนันโดยมืออาชีพ มีประสบการณ์มากกว่า 10 ปี และยังมีกิจกรรมแจกสูตรต่างๆมากมายอีกด้วย!" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"  crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="./css/common.css">
  <link rel="stylesheet" type="text/css" href="./css/userlogin.css">
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
    .center-box {
      padding: 5% 12% 7% 9%;
      background-image:url('resource/images/new/asset/Login/Frame_Login.png');
      background-size:100% 100%;
    }
    .modal-content {
      background-color: rgba(0, 0, 0, 0.9);
      border: 1px solid green;
    }

    .responsive {
      width: 100%;
      height: auto;
    }

    .bgimage1 {
      width: 350px;
      position: absolute;
      bottom: -5%;
      left: 5%;
      z-index: -99;
    }

    .bgimage2 {
      width: 350px;
      position: absolute;
      bottom: -12%;
      right: 5%;
      z-index: -99;
    }

    .logheader {
      font-family: 'Helvet';
      color: white;
      font-weight: bold;
      font-size: 32px;
      margin-bottom: 1em;
    }

    .btnimg {
      height: 65px;
    }

    @media only screen and (max-width: 600px) {
      .center-box {
        padding: 5% 10% 7% 10%;
      }

      .bgimage2 {
        width: 150px;
      }

      .logoimg {
        width: 180px;
      }

      .loginimg {
        width: 30%;
      }

      .logheader {
        margin-bottom: 0;
      }

      .btnimg {
        height: 50px;
      }
      button .btn-login{
        padding: 10px;
        padding-left: 40px;
        padding-right: 40px;
        background: #000;
        color: #ffff00;
        border: 2px solid #ffff00;
        border-radius: 20px;
        font-size: 22px;
        font-weight: bold;
      }
    }

    @media only screen and (max-width: 370px) {}
  </style>
</head>
<!-- <?php echo rand(1,9);?> -->
<body class="bg_body bg_img" style="background-image: url('resource/images/cas/BG.jpg');">
  
<!-- Create Register Modal -->
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
                <input type="password" class="form-control" placeholder="รหัสผ่านสำหรับเข้าใช้งาน" name="regPass" maxlength="32" minlength="6" pattern="^[a-zA-Z0-9_.-]+$" autocomplete="off" required>
              </div>

              <div class="form-group">
                <label>รหัสผ่านอีกครั้ง</label>
                <input type="password" class="form-control" placeholder="ใส่รหัสผ่านอีกครั้ง" name="regRepass" maxlength="32" minlength="6" pattern="^[a-zA-Z0-9_.-]+$" autocomplete="off" required>
              </div>

              <div class="row text-center">
                <div class="col text-right">
                  <div class="form-group">
                    <input type="submit" class="btn btn-outline-success" value="Submit">
                  </div>
                </div>
                <div class="col text-left">
                  <div class="form-group">
                    <button class="btn btn-outline-danger" data-toggle="modal" data-dismiss="modal">
                      Close
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
  <!-- End Register Modal -->

  <div class="container text-center">
    <div class="div-center">

      <!-- <div>
        <img class="logoimg" src="resource/images/new/asset/Login/logosa.png" width="400px">
      </div> --> 


      <div class="container text-center center-box">
        <div class="logheader" style="letter-spacing: 1px;text-shadow: 5px 5px 10px #000; padding-top: 2rem;">LOGIN / ระบบล๊อคอิน</div>

        <form id="loginform" method="post">
          <div class="row mb-3 pr-1">
            <div class="col-sm-4 p-0 text-center" style="font-family: 'Helvet';font-size: 20px;color:white;letter-spacing: 1px;text-shadow: 3px 5px 5px #000">USERNAME : &nbsp;</div>
            <div class="col-sm-8 p-0">
              <input type="text" id="txtUsername" class="form-control text-center" placeholder="Username" maxlength="16" minlength="4" autocomplete="off" required>
            </div>
          </div>

          <div class="row mb-3 pr-1">
            <div class="col-sm-4 p-0 text-center" style="font-family: 'Helvet';font-size: 20px;color:white;letter-spacing: 1px;text-shadow: 3px 5px 5px #000">รหัสผ่าน : &nbsp;</div>
            <div class="col-sm-8 p-0">
              <input type="password" id="txtPassword" class="form-control text-center" placeholder="รหัสผ่าน" name="pass" autocomplete="off" required>
            </div>
          </div>

          <!-- <div class="row mb-1 pr-1">
            <div id="secCode" class="col-sm-4 p-0 text-right" style="font-family: 'Helvet';font-size: 30px;color:white;letter-spacing: 4px;text-shadow: 3px 5px 5px #000"> </div>
            <div class="col-sm-8 p-0">
              <input type="text" id="input_code" class="form-control-sm text-center" placeholder="Security Code" autocomplete="off" required>
            </div>
          </div> 
          <table align="center">
            <tr>
              <td id="secCode" style="font-family: 'Helvet';font-size: 30px;color:white;letter-spacing: 4px;text-shadow: 3px 5px 5px #000;"></td>
              <td><input type="text" id="input_code" class="form-control-sm text-center" placeholder="ใส่ตัวเลขด้านซ้าย 4 หลัก" autocomplete="off" required></td>
            </tr>
          </table>
		  -->

          <div class="row">
            <div class="col-6">
              <button class="btn-login" style="">เข้าสู่ระบบ</button>
            </div>
            <div class="col-6">
              <button class="btn-login">สมัครสมาชิก</button>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col text-center pl-0">
              <a href="#" onclick="do_login()"><img class="btnimg" src="https://sv1.picz.in.th/images/2021/08/24/2IKPDR.png"></a> <!-- login button -->
            </div>
			<!-- 
			<div class="col text-left pr-0">
              <a href="http://line.me/ti/p/~<?php echo $contact; ?>"><img class="btnimg" src="./resource/images/new/asset/login/btn_register.png"></a>
            </div>
			-->
			
            <div class="col text-center pr-0">
              <a href="#" data-toggle="modal" data-target="#RegisModal"><img class="btnimg" src="https://sv1.picz.in.th/images/2021/08/24/2IKqh9.png"></a> <!-- register button -->
            </div>
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
