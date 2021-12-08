<?php require 'database/session.php';
    if ($_SESSION["Permit"] != '99') {
        header('location: main.php');
        exit();
    }
?>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Admin Panel | HackBaccaRat : Add Formula</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" type="text/css" href="./css/sidebar.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" integrity="sha256-39jKbsb/ty7s7+4WzbtELS4vq9udJ+MDjGTD5mtxHZ0=" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/sl-1.3.0/datatables.min.css" />
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/css/bootstrap4-toggle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./css/datatable.css">
  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/sl-1.3.0/datatables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/js/bootstrap4-toggle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script type="text/javascript" src="./js/sidebar.js"></script>
  <script type="text/javascript" src="./js/formula.js"></script>
  </script>
</head>
<style type="text/css">
  .col-left {
    width: 56%;
    margin-left: 1%;
    margin-right: 2%;
    background-color: rgba(0, 0, 0, 0.1)
  }

  .col-right {
    width: 40%;
    margin-right: 1%;
    background-color: rgba(0, 0, 0, 0.1)
  }

  .add-box {
    background-color: rgba(255, 255, 255, 0.1);
    border: 2px solid gold;
  }

  img[src=""] {
    content: url("data:image/gif;base64,R0lGODlhAQABAPAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==");
  }
</style>

<body>
  <div id="overlay">
    <div id="overlay-text">Processing..</div>
  </div>
  <?php include "navbar.php"; ?>

  <main class="content-wrapper">
    <div class="container-fluid">
      <div class="container bg-dark" style="padding: 2%;">
		<h1><font color="#fff">เพิ่มสูตรลงในระบบ</font></h1>
        <div class="row text-white">
          <div class="col-left">
            <div style="height: 500px;overflow-y:auto;">
              <table id="tblfor" align="center" style="border-collapse: separate;border-spacing:0px 10px;width: 95%;color: gold">
              </table>
            </div>
          </div>

          <div class="col-right">
            <div class="container text-center" style="padding: 3%;color: gold">
              <h4 class="text-left">Add+</h4><br>
              <div class="container" id="draw_box"></div>
              <br><br>
              <div class="container">
                <div class="row text-center">
                  <div class="col-4 text-right align-self-center">
                    <i class="fas fa-equals fa-lg"></i>
                  </div>
                  <div class="col text-center">
                    <img name="res_box" src="" width="60" height="60" style="background-color: rgba(255,255,255,0.1);border: 2px double gold;">
                  </div>
                  <div class="col-4 text-right">
                  </div>
                </div>
              </div>
              <br>
              <div class="container" style="width: 80%;">
                <div class="row text-center">
                  <div class="col-4">
                    <a href="#" onclick="addfor(event,'b')"><img src="resource/images/button_b.png"></a>
                  </div>
                  <div class="col-4">
                    <a href="#" onclick="addfor(event,'p')"><img src="resource/images/button_p.png"></a>
                  </div>
                  <div class="col-4">
                    <a href="#" onclick="addfor(event,'t')"><img src="resource/images/button_t.png"></a>
                  </div>
                </div>
              </div>
              <br><br>

              <div class="container" style="width: 90%;">
                <div class="row">
                  <div class="col-6">
                    <div class="container" style=" position: relative;text-align: center;color: white;width: 140px;">
                      <a href="#" onclick="submitfor(event)"><img src="./resource/images/button_yes.png" style="width:100%;">
                        <div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">SUBMIT</div>
                      </a>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="container" style=" position: relative;text-align: center;color: white;width: 140px;">
                      <a href="#" onclick="clearfor(event)"><img src="./resource/images/button_no.png" style="width:100%;">
                        <div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">CLEAR</div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

    </div>
  </main>


</body>

</html>

<!-- <script type="text/javascript">
  $(document).ready(function() {

  });
</script> -->
