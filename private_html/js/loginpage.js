$( document ).ready(function() {
  $("#regisform").submit(function(e) {

      e.preventDefault(); // avoid to execute the actual submit of the form.

      var form = $("#regisform");

      $.ajax({
             type: "POST",
             url: "database/register.php",
             data: form.serialize(), // serializes the form's elements.
             success: function(data)
             {
               if(data == "success")
               {
                 Swal.fire(
                    'ลงทะเบียนเรียบร้อย!',
                    'คุณสามารถเข้าสู่ระบบด้วยแอคเค้านี้ได้ทันที',
                    'success'
                  );
                  $('#regisform').trigger("reset");
                  $('#RegisModal').modal('toggle');
               } else {
                 Swal.fire({
                    type: 'error',
                    title: data,
                    text: 'ลงทะเบียนไม่สำเร็จ',
                  });
               }

             },
             error: function (jqXHR, textStatus, errorThrown) {
                 alert("ไม่สามารถเชื่อมต่อกับฐานข้อมูลได้");
                 window.location.href = "login.php";
             }
           });
  });



});
var sec_code = [];
$( document ).ready(function() {
  var gen_code = [];
  for (var i = 0; i < 4; i++) {
    gen_code[i] = Math.floor(Math.random() * 9)
  }
  $('#secCode').html(gen_code);
  sec_code = gen_code;
});
  document.querySelector('#loginform').addEventListener('keypress', function(e) {
    var key = e.which || e.keyCode;
    if (key === 13) {
      do_login();
    }
  });

  function showSeccode() {
  let gen_code = [];
  for (var i = 0; i < 4; i++) {
    gen_code[i] = Math.floor(Math.random() * 9)
  }
  $('#secCode').html(gen_code);
  sec_code = gen_code;
}

  function check_Code() {
//	return true;
    let inputCode = $("#input_code").val();
    let checkCode = inputCode.split("");
    for (var i = 0; i < 4; i++) {
      if (checkCode[i] != sec_code[i]) {
        showSeccode();
        return false;
      }
    }
    return true;
  }

  function do_login() {
    if(check_Code()) {
      var format = /[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
      var username = $("#txtUsername").val();
      var password = $("#txtPassword").val();
	  
	  
      if (username != "" && password != "") {
        // $("#loading_spinner").css({"display":"block"});
        $.ajax({
          type: 'post',
          url: 'database/chklogin.php',
          timeout: 30000,
          data: {
            user: username,
            pass: password,
            action: "Login"
          },
          beforeSend: function(){
            Swal.fire({
              title: 'Connecting...',
              allowOutsideClick: false
            });
            swal.showLoading();
          },
          success: function(response) {
            swal.close();
            if (response == "1") {
              Swal.fire({
                type: 'error',
                title: 'เข้าสู่ระบบไม่ได้',
                text: 'Username หรือ Password ไม่ถูกต้อง!'
              });
              showSeccode();
            } else if (response == "2") {
              Swal.fire({
                type: 'error',
                title: 'เข้าสู่ระบบไม่ได้',
                text: "บัญชีถูกระงับการใช้งาน กรุณาติดต่อเจ้าหน้าที่"
              });
            } else {
              res = JSON.parse(response);
              if (res['result'] == 'success'){
              Swal.fire({
                type: 'success',
                title: 'เข้าสู่ระบบสำเร็จ',
                text: 'กำลังเข้าสู่ระบบ โปรดรอสักครู่'
              });
              sessionStorage.setItem('User', ( res['User'] ) );
			  sessionStorage.setItem('formula', JSON.stringify( res['data'] ) );
			  sessionStorage.setItem('forType', ( res['fortype'] ) );
			  sessionStorage.setItem('sCode', ( res['sCode'] ) );
			  sessionStorage.setItem('Credit', JSON.stringify( res['Credit'] ) );
              setTimeout(function() {
                window.location.href = "lobby.php";
              }, 1000);
            } else {
              Swal.fire({
                type: 'error',
                title: response,
                text: 'กรุณาลองใหม่อีกครั้งค่ะ'
              });
            }
          }
        },
          error: function(jqXHR, textStatus, errorThrown) {
            swal.close();
            Swal.fire({
              type: 'error',
              title: 'ไม่สามารถเข้าสู่ระบบได้'
            });
          }
        });
      } else {
        Swal.fire({
          type: 'error',
          title: 'คุณกรอกข้อมูลไม่ครบถ้วน',
		  text: 'กรุณาตรวจสอบข้อมูลอีกครั้ง'
        });
		showSeccode();
      }
      return false;
    } else {
      Swal.fire({
        type: 'error',
        title: 'Security Code ไม่ถูกต้อง',
        text: 'กรุณาลองใหม่อีกครั้งค่ะ'
      });
      showSeccode();
    }
  }

