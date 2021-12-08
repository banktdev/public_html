<?php
  $file = fopen("../contact.txt", "r") or die("Unable to open file!");
  $contact = fgets($file);
  fclose($file);
?>
<html>
<head>
  <style>
    .modal-content {
       background-color: rgba(0,0,0,0.9);
       border: 1px solid #FFFF00;
       z-index: 100;
    }
  </style>
</head>
<!-- Logout Modal -->
<div id="OutModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content text-white">

      <h4 class="modal-title text-center">Are you sure to Log Out!</h4>
      <div class="modal-body">
        <div class="container">

          <div class="form-group">
            <div class="row">
              <div class="col">

                <div class="container" style=" position: relative;text-align: center;color: white;">
                  <a href="database/logout.php"><img src="./resource/images/button_yes.png" style="width:70%;">
                  <div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">Yes</div></a>
                </div>

              </div>
              <div class="col">

                <div class="container" style=" position: relative;text-align: center;color: white;">
                  <a href="#" data-dismiss="modal"><img src="./resource/images/button_no.png" style="width:70%;">
                  <div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">No</div></a>
                </div>

              </div>
            </div>
          </div>

        </div>

      </div>
    </div>

  </div>
</div>
<!-- End Logout Modal -->

<!-- Create User Modal -->
<div id="CreateModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content text-white">

      <h4 class="modal-title text-center">Create User</h4>
      <div class="modal-body">
        <div class="container">

          <form id="addUserform" method="post">

            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" placeholder="6 - 32 Character" name="addUser"  autocomplete="off">
            </div>

            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" placeholder="6 - 32 Character" name="addPass"  autocomplete="off">
            </div>

            <div class="form-group">
              <label>Re-Password</label>
              <input type="password" class="form-control" placeholder="Password Again" name="addRepass"  autocomplete="off">
            </div>
            <div class="form-group">
              <label>Credit</label>
              <input type="number" class="form-control" placeholder="User lnwbet888" name="addCredit" value="0" pattern="^[a-zA-Z0-9_.-]+$" autocomplete="off" required>
            </div>
          <!--  <div class="form-group">
              <label>user lnwbet888</label>
              <input type="text" class="form-control" placeholder="User lnwbet888" name="addPhone" pattern="^[a-zA-Z0-9_]+$" autocomplete="off">
            </div> -->

            <div class="form-group" style="padding-bottom: 5%;">
              <label>Type</label>
              <select class="form-control" name="addType">
                <?php if($_SESSION["Permit"] >= '90') echo '<option value="1" selected>User</option>';?>
                <?php if($_SESSION["Permit"] == '99') echo '<option value="90">Admin</option>';?>
                <?php if($_SESSION["Permit"] == '99') echo '<option value="99">Super Admin</option>';?>
              </select>
            </div>

            <div class="container" style=" position: relative;text-align: center;color: white;">
              <a href="#" onclick="addform()">
                <img src="./resource/images/button_yes.png" style="width:30%;">
              <div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">Submit</div></a>
            </div>

          </form>

        </div>

      </div>
    </div>

  </div>
</div>
<!-- End Create Modal -->

<!-- Create Code Modal -->
<script type="text/javascript">
function gencode() {
    var incredit = $('#creditcode').val();
    var do_multi = $('#multiple').val();
    if( isNaN(incredit) || incredit==""){
        Swal.fire(
          'ข้อมูลไม่ถูกต้อง',
          'อนุญาติให้กรอกตัวเลขเท่านั้น',
          'question'
        );
    } else if (incredit < 10) {
        Swal.fire(
          'ข้อมูลไม่ถูกต้อง',
          'เติมขั้นต่ำ 10 บาทขึ้นไป',
          'question'
        );
    } else if (do_multi < 1 || do_multi > 1001) {
        Swal.fire(
          'ข้อมูลไม่ถูกต้อง',
          'สร้าง Code ได้ครั้งละไม่เกิน 1000 Code',
          'warning'
        );
    } else {
      $.ajax({
             type: "POST",
             url: "database/gencode.php",
             data: {
               credit : incredit,
               multi : do_multi
              }, // serializes the form's elements.
             beforeSend: function(){
               document.getElementById("genbut").disabled = true;
               Swal.fire({
                 title: 'Creating Code..',
                 allowOutsideClick: false
               });
               swal.showLoading();
             },
             success: function(data)
             {
               swal.close();
               if (data == 'logout') {
                 window.location.href = "database/logout.php";
               }
               document.getElementById("genbut").disabled = false;
               arr = JSON.parse(data);
               if(arr.length == 1) {
                 $('#code').val(arr[0]);
                 $('#creditcode').val("");
                 $('#multiple').val('1');
               } else {
                 $('#creditcode').val("");
                 $('#multiple').val('1');
                 obj = {
                   by : '<?php echo $_SESSION['Username']; ?>',
                   credit : incredit,
                   data : arr
                 }
                 document.getElementById('div_multi').style.display = 'none';
                 var newWindow = window.open('multicode.php');
                 newWindow.passdata = obj;
               }
             },
             error: function (jqXHR, textStatus, errorThrown) {
                  swal.close();
                 window.location.href = "login.php";
             }
           });
    }
};

function copycode() {
  var copyText = document.getElementById("code");
  copyText.select();
  document.execCommand("copy");
  Swal.fire({
                 type: 'success',
                 title: 'Completed!',
                 text: 'Copied the text: ' + copyText.value
               });
};

function multi_btn() {
  document.getElementById('multiple').value = 1;
  var input = document.getElementById("div_multi");
  input.style.display = input.style.display === 'none' ? '' : 'none';
}
</script>
<div id="CodeModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content text-white">

      <h4 class="modal-title text-center">Generate Code</h4>
      <div class="modal-body">
        <div class="container">

          <div class="text-center">
            <button type="button" class="btn btn-outline-danger" onclick="multi_btn()">Multi Code Generater</button>
          </div>

          <div id="div_multi" class="form-group" style="display: none;">
            <label>Multiple</label>
            <input id="multiple" type="number" class="form-control" name="" value="1" autocomplete="off">
          </div>

          <div class="form-group">
            <label>Credit</label>
            <div class="input-group">
              <input id="creditcode" type="number" class="form-control" name="" value="" autocomplete="off">
              <span id="genbut" class="input-group-btn">
                <button type="button" class="btn btn-info" onclick="gencode()">Generate</button>
              </span>
            </div>
          </div>


          <div class="form-group" style="padding-bottom: 5%;">
            <label>Code</label>
            <input id="code" type="text" class="form-control text-center" placeholder="Generated Code" name="" value="" autocomplete="off" readonly>
          </div>

          <div class="container" style=" position: relative;text-align: center;color: white;">
            <a href="#" onclick="copycode()"><img src="./resource/images/button_yes.png" style="width:30%;">
            <div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">Copy</div></a>
          </div>

        </div>

      </div>
    </div>

  </div>
</div>
<!-- End Code Modal -->

<!-- Footer Modal -->
<?php if ($_SESSION["Permit"]==99): ?>
<div id="FootModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content text-white">

      <h4 class="modal-title text-center">Contact</h4>
      <div class="modal-body">
        <div class="container">

          <form id="footform" action="database/chgfooter.php" method="post">
            <div class="form-group">
              <label>@Line</label>
              <div class="input-group">
                <input id="footinput" type="text" class="form-control" name="ed_line" value="<?php echo $contact ?>" autocomplete="off" readonly>
                <span class="input-group-btn">
                      <button id='footbtn' type="button" class="btn btn-info" name="button">Edit</button>
                </span>
              </div>
            </div>

            <div class="container" style=" position: relative;text-align: center;color: white;">
              <a id="footapply" href="#"><img src="./resource/images/button_yes.png" style="width:30%;">
              <div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">Apply</div></a>
            </div>
          </form>


        </div>

      </div>
    </div>

  </div>
</div>
<?php endif; ?>
<!-- End Footer Modal -->
<?php
			require 'database/connection.php';	
		$config = array();
    $twsql  = "SELECT * FROM tw_settings";
    $result = mysqli_query($db, $twsql);
    $twdata = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach($twdata AS $row) {
      $config[$row["name"]] = $row["value"];
    }
		?>	

<!-- WalletModal Modal -->
<?php if ($_SESSION["Permit"]==99): ?>
<div id="WalletModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content text-white">

      <h4 class="modal-title text-center">GETTOKEN TrueWallet</h4>
      <div class="modal-body">
        <div class="container">
		<form method="post" name="tw-enable" id="tw-enable" class="" autocomplete="off">
		    <?php if( $config["enable"] == "true") { ?>
		    <input type="hidden" name="enable" id="enable" value="false"> 
            <button type="submit" class="btn btn-success btn-block"> สถานะ : กำลังใช้งานอยู่ (กดเพื่อปิด)</button> 
			<?php } else { ?>
			<input type="hidden" name="enable" id="enable" value="true"> 
            <button type="submit" class="btn btn-danger btn-block"> สถานะ :  ปิดการใช้งาน (กดเพื่อเปิด)</button> 
			<?php } ?>
			</form>
           <hr/>
		   <form method="post" name="get-token" id="get-token" class="" autocomplete="off">
                    <div class="form-group">
					    <label>Username</label>
                        <input type="text" class="form-control" placeholder="Username" id="username" name="username" aria-label="Username" required>
                    </div>
                    <div class="form-group">
					    <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" id="password" name="password" aria-label="Password" required>
                    </div>
                    <input type="hidden" name="action" id="action" value="get_otp">
					<div id="gg">
					</div>					
                    <button type="submit" id="submit" class="btn btn-success btn-block">รับ OTP</button>
                </form>
				<hr//>
		
 <form method="post" name="tw-setting" id="tw-setting" autocomplete="off">
                  <table style="text-align: center;" class="table table-striped table-light">
                                            <thead>
                                                <tr>
                                                    <th width="40%">อัตราแลกเปลี่ยนวอเลท</th>
                                                    <th width="25%">ยอดต่ำสุด</th>
                                                    <th width="25%">เรทเติมเงิน</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1 บาท</td>
                                                    <td><input name="tw_min" style="text-align: center;" type="number" class="form-control form-control-sm" value="<?php echo $config["min"] ;?>" required="">
                                                    </td>
                                                    <td><input name="tw_rate" style="text-align: center;" type="number" class="form-control form-control-sm" value="<?php echo $config["rate"] ;?>" required="">

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
					<br/>
					  <div class="container" style=" position: relative;text-align: center;color: white;">
              <a href="#" onclick="savetw()">
                <img src="./resource/images/button_yes.png" style="width:30%;">
              <div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">บันทึก</div></a>
            </div>
                </form>

        </div>

      </div>
    </div>

  </div>
</div>
<!-- KbankModal Modal --> 
<div id="KbankModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content text-white">

      <h4 class="modal-title text-center">KASIKORNBANK SETTING</h4>
      <div class="modal-body">
        <div class="container">
		<form method="post" name="kb-enable" id="kb-enable" class="" autocomplete="off">
		    <?php if( $config["bank_ennable"] == "true") { ?>
		    <input type="hidden" name="enable" id="enable" value="false"> 
            <button type="submit" class="btn btn-success btn-block"> สถานะ : กำลังใช้งานอยู่ (กดเพื่อปิด)</button> 
			<?php } else { ?>
			<input type="hidden" name="enable" id="enable" value="true"> 
            <button type="submit" class="btn btn-danger btn-block"> สถานะ :  ปิดการใช้งาน (กดเพื่อเปิด)</button> 
			<?php } ?>
			</form>
           <hr/>
		
		
 <form method="post" name="kb-setting" id="kb-setting" autocomplete="off">
 <div class="form-group">
					    <label>Username</label>
                        <input type="text" class="form-control" placeholder="Username" id="Kbusername" name="Kbusername" aria-label="Username" value="<?php echo $config["bank_user"] ;?>" required>
						<small>Username สำหรับ <a href="https://online.kasikornbankgroup.com/K-Online/">K-Cyber</a></small>
                    </div>
                    <div class="form-group">
					    <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" id="Kbpassword" name="Kbpassword" aria-label="Password" value="<?php echo $config["bank_pass"] ;?>" required>
						<small>Password สำหรับ <a href="https://online.kasikornbankgroup.com/K-Online/">K-Cyber</a></small>
                    </div>
					 <div class="form-group">
					    <label>ชื่อบัญชีธนาคาร</label>
                        <input type="text" class="form-control" placeholder="ชื่อบัญชีธนาคาร" id="accountName" name="accountName" aria-label="ชื่อบัญชีธนาคาร" value="<?php echo $config["bank_name"] ;?>" required>
                    </div>
					 <div class="form-group">
					    <label>เลขบัญชีธนาคาร </label>
                        <input type="text" class="form-control" placeholder="XXX-X-XXXXX-X" id="accountNumber" name="accountNumber" aria-label="เลขบัญชีธนาคาร" value="<?php echo $config["bank_accno"] ;?>" required>
						<small>เลขบัญชีธนาคารต้องเป็นรูปแบบ XXX-X-XXXXX-X เท่านั้น!</small>
                    </div>
                  <table style="text-align: center;" class="table table-striped table-light">
                                            <thead>
                                                <tr>
                                                    <th width="40%">อัตราแลกเปลี่ยน(บาท)</th>
                                                    <th width="25%">ยอดต่ำสุด</th>
                                                    <th width="25%">เรทเติมเงิน</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1 บาท</td>
                                                    <td><input name="kb_min" style="text-align: center;" type="number" class="form-control form-control-sm" value="<?php echo $config["bank_min"] ;?>" required="">
                                                    </td>
                                                    <td><input name="kb_rate" style="text-align: center;" type="number" class="form-control form-control-sm" value="<?php echo $config["bank_rate"] ;?>" required="">

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
					<br/>
					  <div class="container" style=" position: relative;text-align: center;color: white;">
              <a href="#" onclick="savekb()">
                <img src="./resource/images/button_yes.png" style="width:30%;">
              <div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">บันทึก</div></a>
            </div>
                </form>

        </div>

      </div>
    </div>

  </div>
</div>
<?php endif; ?>
<!-- End KbankModal Modal --> 

</html>
<script type="text/javascript">

function addform() {
    var form = $("#addUserform");

    $.ajax({
           type: "POST",
           url: "database/adduser.php",
           data: form.serialize(), // serializes the form's elements.
           beforeSend: function(){
             Swal.fire({
               title: 'Creating User..',
               allowOutsideClick: false
             });
             swal.showLoading();
           },
           success: function(data)
           {
             swal.close();
             if(data == "success")
             {
               Swal.fire({
                 type: 'success',
                 title: 'Completed!',
                 text: 'User Created'
               });
               setTimeout(function() {
                 window.location.href = "member.php";
               }, 1000);
             } else if (data == 'logout') {
               window.location.href = "database/logout.php";
             } else {
               Swal.fire({
                  type: 'error',
                  title: data
                });
             }

           },
           error: function (jqXHR, textStatus, errorThrown) {
              swal.close();
               window.location.href = "login.php";
           }
         });
};

function savetw() {
    var form = $("#tw-setting");

    $.ajax({
           type: "POST",
           url: "database/savetw.php?edit",
           data: form.serialize(), // serializes the form's elements.
           beforeSend: function(){
             Swal.fire({
               title: 'กำลังบันทึกข้อมูล',
               allowOutsideClick: false
             });
             swal.showLoading();
           },
           success: function(data)
           {
             swal.close();
             if(data == "success")
             {
               Swal.fire({
                 type: 'success',
                 title: 'Completed!',
                 text: 'บันทึกข้อมูลสำเร็จ'
               });
               setTimeout(function() {
                 window.location.href = "member.php";
               }, 1000);
             } else if (data == 'logout') {
               window.location.href = "database/logout.php";
             } else {
               Swal.fire({
                  type: 'error',
                  title: data
                });
             }

           },
           error: function (jqXHR, textStatus, errorThrown) {
              swal.close();
               window.location.href = "login.php";
           }
         });
};

function savekb() {
    var form = $("#kb-setting");

    $.ajax({
           type: "POST",
           url: "database/savekb.php?edit",
           data: form.serialize(), // serializes the form's elements.
           beforeSend: function(){
             Swal.fire({
               title: 'กำลังบันทึกข้อมูล',
               allowOutsideClick: false
             });
             swal.showLoading();
           },
           success: function(data)
           {
             swal.close();
             if(data == "success")
             {
               Swal.fire({
                 type: 'success',
                 title: 'Completed!',
                 text: 'บันทึกข้อมูลสำเร็จ'
               });
               setTimeout(function() {
                 window.location.href = "member.php";
               }, 1000);
             } else if (data == 'logout') {
               window.location.href = "database/logout.php";
             } else {
               Swal.fire({
                  type: 'error',
                  title: data
                });
             }

           },
           error: function (jqXHR, textStatus, errorThrown) {
              swal.close();
               window.location.href = "login.php";
           }
         });
};

$('#get-token').on('submit', function (e) {
        e.preventDefault();
        var action = $("#action").val();
        $.ajax({
            type: 'post',
            url: 'database/get-token.php?action=' + action,
            data: $('form#get-token').serialize(),
            success: function (result) {
                var obj = JSON.parse(result);
                console.log(obj);
                if (obj.code == "success") {
                    if (action == "get_otp") {
                        $('#action').val("confirm_otp");
                        $("#submit").html('ยืนยัน OTP');
                        $("#gg").empty();
                        $("#gg").append('<div class="form-group"><label>OTP</label><input type="text" class="form-control" placeholder="OTP ที่ได้รับจาก SMS" id="otp" name="otp"></div>');
                        $("#gg").append('<input type="hidden" name="mobile_number" id="mobile_number" value="' + obj.mobile_number + '">');
                        $("#gg").append('<input type="hidden" name="otp_reference" id="otp_reference" value="' + obj.otp_reference + '">');
                    } else if (action == "confirm_otp") {                     
                        $('#gettoken').modal('toggle');
                        $("#gg").empty();
                        $("#submit").html('รับ OTP');
                        $('#action').val("get_otp");
                        alert("สร้าง TOKEN TrueWallet แล้ว");                    
                    }
                } else if (obj.code == "error") {
                    alert("ไม่สามารถสร้าง TOKEN TrueWallet ได้กรุณาลองใหม่อีกครั้ง");
                    $("#gg").empty();
                    $("#submit").html('รับ OTP');
                    $('#action').val("get_otp");
                }
            }
        });
    });



$('#tw-enable').on('submit', function (e) {
        e.preventDefault();
        var action = $("#enable").val();
        $.ajax({
            type: 'post',
            url: 'database/savetw.php?enable',
            data: $('form#tw-enable').serialize(),
            success: function (data) {
                swal.close();
             if(data == "success")
             {
               Swal.fire({
                 type: 'success',
                 title: 'Completed!',
                 text: 'บันทึกข้อมูลสำเร็จ'
               });
               setTimeout(function() {
                 window.location.href = "member.php";
               }, 1000);
             } else if (data == 'logout') {
               window.location.href = "database/logout.php";
             } else {
               Swal.fire({
                  type: 'error',
                  title: data
                });
             } 
            }
        });
    });
	
	$('#kb-enable').on('submit', function (e) {
        e.preventDefault();
        var action = $("#enable").val();
        $.ajax({
            type: 'post',
            url: 'database/savekb.php?enable',
            data: $('form#kb-enable').serialize(),
            success: function (data) {
                swal.close();
             if(data == "success")
             {
               Swal.fire({
                 type: 'success',
                 title: 'Completed!',
                 text: 'บันทึกข้อมูลสำเร็จ'
               });
               setTimeout(function() {
                 window.location.href = "member.php";
               }, 1000);
             } else if (data == 'logout') {
               window.location.href = "database/logout.php";
             } else {
               Swal.fire({
                  type: 'error',
                  title: data
                });
             } 
            }
        });
    });

$('#footapply').click(function(){
    $("#footform").submit();
});

$('#footbtn').click(function(){
    $("#footinput").prop('readonly', false);
});
</script>
