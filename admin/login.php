<?php
  // session_start();
  // if( isset($_SESSION["ID"])  )
  // {
  //   require 'database/connection.php';
  //   $sessionID = session_id();
  //   $sql = " SELECT `token` FROM `users` WHERE `token` = '$sessionID' AND `type` = '99' AND `id` = ".$_SESSION['ID'];
  //   $result = mysqli_query($db,$sql);
  //   $data = mysqli_fetch_array($result,MYSQLI_ASSOC);
  //   if($data){
  //     header( "location: member.php" );
  //   }
  //   mysqli_close($db);
  // }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/userlogin.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>

<body>

  <div class="container text-center">

    <div class="div-center">


      <img src="resource/images/New/asset/Login/LogoSAhacker.png" width="280px" style="margin-bottom: 10px;">


      <div class="container" style="border: 3px solid #cc9933;padding: 7%;">
        <p style="font-size: 150%; font-weight: bold; color: White;font-family: 'Times New Roman', 'Times', 'serif';">Admin Login</p>

        <form id="adlogin" action="database/adminlogin.php" method="post">

          <div class="form-group">
            <input id="txtUsername" type="text" class="form-control text-center" placeholder="Username" name="user" value="" pattern="^[a-zA-Z0-9_.-]+$" required>
          </div>

          <div class="form-group">
            <input id="txtPassword" type="password" class="form-control text-center" placeholder="Password" name="pass" value="" pattern="^[a-zA-Z0-9_.-]+$" required>
          </div>
		<!--
          <table align="center" style="margin-bottom: 1em;">
            <tr>
              <td id="secCode" style="font-family: 'Helvet';font-size: 30px;color:white;letter-spacing: 4px;text-shadow: 3px 5px 5px #000;"></td>
              <td><input type="text" id="input_code" class="form-control-sm text-center" placeholder="Security Code" autocomplete="off" required></td>
            </tr>
          </table>
		  -->

          <div class="form-group">
            <div class="container" style=" position: relative;text-align: center;color: white;">
              <a href="#" onclick="do_login()"><img src="../resource/images/button_yes.png" style="width:35%;">
                <div style=" position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">Login</div>
              </a>
            </div>
          </div>
          <input type="hidden" name="action" value="Login">
        </form>
      </div>



    </div>
  </div>

</body>

</html>
<script type="text/javascript">
  var sec_code = [];
  $( document ).ready(function() {
    var gen_code = [];
    for (var i = 0; i < 4; i++) {
      gen_code[i] = Math.floor(Math.random() * 9)
    }
    $('#secCode').html(gen_code);
    sec_code = gen_code;
  });

  function check_Code() {
	return true;
    let inputCode = $("#input_code").val();
    let checkCode = inputCode.split("");
    for (var i = 0; i < 4; i++) {
      if (checkCode[i] != sec_code[i]) {
        return false;
      }
    }
    return true;
  }

  function do_login() {
    if (check_Code()) {
      var format = /[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
      var username = $("#txtUsername").val();
      var password = $("#txtPassword").val();
      if (format.test(username) || format.test(password)) {
        Swal.fire({
          type: 'error',
          title: 'เข้าสู่ระบบไม่ได้',
          text: 'กรุกรุณาลองใหม่อีกครั้งค่ะ'
        });
        $("#txtUsername").val('');
        $("#txtPassword").val('');
      } else {
        document.getElementById('adlogin').submit();
      }
    } else {
      Swal.fire({
        type: 'error',
        title: 'Security Code ไม่ถูกต้อง',
        text: 'กรุณาลองใหม่อีกครั้งค่ะ'
      });
    }
  }
  document.querySelector('#adlogin').addEventListener('keypress', function(e) {
    var key = e.which || e.keyCode;
    if (key === 13) {
      do_login();
      // this.submit();
    }
  });
</script>
