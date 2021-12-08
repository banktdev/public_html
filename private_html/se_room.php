<?php require 'database/session.php';
if($_SESSION['Credit'] <= 0) {
  header('location: lobby.php');
  exit();
}
if (!isset($_GET['id'])) {
    header('location: lobby.php');
    exit();
}
if ($_GET['id'] < 1 or $_GET['id'] > 21) {
    header('location: lobby.php');
    exit();
}

$asset_path = "asset/".$_SESSION['FormulaType'];
$v = '1.0.6';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>สูตรบาคาร่า AI - Bm-hacker | สูตรบาคาร่ามาแรงที่สุด และคำนวนแม่นยำ 99.99%</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"  crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css"  crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
  <script src="js/jquery-3.4.1.js"  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"  crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js"  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/df-number-format/2.1.6/jquery.number.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/common.css">
  <link rel="stylesheet" type="text/css" href="./css/sidebar.css?2">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
  <style type="text/css">
    .sidenav {
      background-image: none;
    }

    txtred {
      color: red;
    }

    .fixed_header {
      width: 100%;
      table-layout: fixed;
      border-collapse: collapse;
    }

    .fixed_header tbody {
      display: block;
      width: 100%;
      overflow: auto;
      height: 100px;
    }

    .fixed_header thead tr {
      width: 100%;
      display: block;
    }

    .fixed_header th,
    .fixed_header td {
      border-bottom: 1px solid rgba(255, 255, 255, 0.3);
      text-align: center;
      width: 200px;
    }

    .fixed_header thead {
      border-bottom: 1px solid rgba(255, 255, 255, 0.3);
    }

    inittext {
      color: Khaki;
      font-weight: normal;
    }

    #prestat {
      font-size: large;
      letter-spacing: 1.5px;
    }

    #countdown2 {
      font-size: large;
      letter-spacing: 2px;
    }

    #redbar {
      width: 0%;
      height: 6px;
      background-color: red;
    }

    #blubar {
      width: 0%;
      height: 6px;
      background-color: #0066ff;
    }

    #grnbar {
      width: 0%;
      height: 6px;
      background-color: lime;
    }

    img[src=""] {
      content: url("data:image/gif;base64,R0lGODlhAQABAPAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==");
    }

    .summary {
      font-family: 'Kanit';
      font-size: 50px;
    }

    .foottxt {
      font-family: 'Kanit';
      color: white;
      font-size: large;
      padding-right: .5em
    }

    .colhead {
      font-size: 40px;
    }

    .infotext {
      font-family: 'Kanit';
      font-size: 18px;
      margin-bottom: -5px;
    }

    .btnline {
      position: relative;
      text-align: center;
      height: 52px;
      width: 270px;
      background-image: url('resource/images/new/Frame_line.png');
      background-repeat: no-repeat;
      background-size: 100% 100%;
    }

    .linetxt {
      font-family: 'Kanit';
      font-size: 30px;
      letter-spacing: 2px
    }

    .lineheader {
      font-family: 'RSU';
      font-size: 27px;
      letter-spacing: 1px;
      margin-bottom: -5px;
      padding-top: 10px
    }

    @media only screen and (max-width: 400px) {
      .summary {
        font-size: 200%;
      }

      #prestat {
        font-size: small;
        letter-spacing: normal;
      }

      #countdown2 {
        letter-spacing: normal;
      }

      .foottxt {
        color: white;
        font-size: small;
        padding-right: .5em
      }

      .infotext {
        font-size: 12px;
        margin-bottom: -3px;
      }

      .btnline {
        position: relative;
        text-align: center;
        height: 52px;
        width: 240px;
        background-image: url('resource/images/new/Frame_line.png');
        background-repeat: no-repeat;
        background-size: 100% 100%;
      }

      .linetxt {
        font-size: 30px;
        letter-spacing: 1px;
      }

      .lineheader {
        font-size: 22px;
        letter-spacing: normal;
        margin-bottom: -3px;
      }
    }

    @media (min-width: 992px) {
      .sidenav {
        background-image: url('resource/images/new/<?php echo $asset_path ?>/side_bar.png');
      }
    }

  </style>

</head>

<body style="background-image: url('resource/images/new/<?php echo $asset_path ?>/BG.png');">

  <script type="text/javascript" src="./js/se_room.js?v=<?=$v ?>"></script>

  <?php
    include './resource/modal.php';
    include 'navbar.php';
  ?>

  <main class="content-wrapper">
    <div class="container-fluid">
      <div class="container-fluid">

        <div class="row text-white">

          <div class="col-md-6 mb-2">
            <div class="container frameA" style="background-image: url('resource/images/new/<?php echo $asset_path ?>/FrameD.png'), url('resource/images/new/<?php echo $asset_path ?>/FrameA-2.png');">
              <div class="row">
                <div class="col-auto pr-0">
                  <h1 style="margin-bottom: -8px;font-size:32px"><img height="60" src="resource/images/new/SexyBaccarat.png"> <?php echo str_pad(intval($_GET['id']), 3, '0', STR_PAD_LEFT); ?></h1>
                </div>
                <div class="col text-right" style="padding:0">
                  <a href="selobby">
                    <img class=" mt-2 mr-3" src="resource/images/new/Exit_btn.png" height="40">
                  </a>
                </div>
              </div>

              <!-- <div class="container">





                </div> -->

              <div class="row text-center text-white">
                <div class="col-6 col-sm-6 p-0">
                  <span style="font-family: 'kanit';font-size: 140%;">อัตราการชนะ</span>
                </div>
                <div class="col-6 col-sm-6 p-0">
                  <span id="nextPre" style="font-family: 'kanit';font-size: 140%;">ตาถัดไป</span>
                </div>
              </div>

              <div class="row text-white text-center" style="margin-top: -4px;">
                <div class="col" style="background-color: rgba(0,0,0,0.2);margin-left: 5%;padding: 5px;">
                  <div style="border: 1px solid #996633;border-radius: 10px">
                    <span class="summary" id="winrate" style="color: khaki;font-family: 'kanit';">
                      <inittext>รอผล</inittext>
                    </span>
                  </div>
                </div>
                <div class="col" style="margin-right: 5%;padding: 5px;">
                  <div id="predict" class="col summary" style="background-color: rgba(0,0,0,0.2);
                        vertical-align: middle; color: Khaki;border: 1px solid #996633;border-radius: 10px">
                  </div>
                </div>
              </div>
              <div class="text-center">
                <span id="countdown2" style="font-family: 'kanit';font-size: 24px;">รอผลสักครู่..</span>
              </div>
              <!-- <div class="row text-center text-white">
                <div class="col-6 col-sm-6 p-0">
                  <img src="./resource/images/deckse/255.png" id="pcard1" width="25%">
                  <img src="./resource/images/deckse/255.png" id="pcard2" width="25%">
                  <img src="./resource/images/deckse/255.png" id="pcard3" width="25%">
                  <h3>PLAYER</h3>
                </div>
                <div class="col-6 col-sm-6 p-0">
                  <img src="./resource/images/deckse/255.png" id="bcard1" width="25%">
                  <img src="./resource/images/deckse/255.png" id="bcard2" width="25%">
                  <img src="./resource/images/deckse/255.png" id="bcard3" width="25%">
                  <h3>BANKER</h3>
                </div>
              </div> -->

              <div class="container">
                <div style="overflow-x:auto;padding: 1%">
                  <table id="rtable" align="center" style="border-collapse: separate; border-spacing: 2px;">
                    <?php for ($i=0; $i < 6 ; $i++) { ?>
                    <tr>
                      <?php for ($j=0; $j < 14; $j++) { ?>
                      <td style="vertical-align: middle;background-color: #c09a5e;width: 28px;height: 28px;">
                        <img src="" style="height: 24px;width: 24px;">
                      </td>
                      <?php  } ?>
                    </tr>
                    <?php  } ?>
                  </table>
                </div>

                <div class="row text-white">
                  <div class="col" style="padding:0">
                    <span class="foottxt" id="bfoot" style="padding-left:10%;">B</span>
                    <span class="foottxt" id="pfoot">P</span>
                    <span class="foottxt" id="tfoot">T</span>
                  </div>
                  <div id="prestat" class="col-auto text-right" style="font-family: 'kanit';padding: 0;">
                    สถิติการถูกที่ผ่านมา 0%
                  </div>
                </div>

              </div>

              <div class="container">
                <table class="fixed_header" style="margin-bottom: 10px;">
                  <thead>
                    <tr>
                      <th>รอบที่</th>
                      <th>จำนวนไม้</th>
                      <th>ผลที่ได้</th>
                    </tr>
                  </thead>
                  <tbody id="tbl_stack"></tbody>
                </table>

                <table class="fixed_header">
                  <thead>
                    <tr>
                      <th>รวมผล</th>
                      <th>รวมชนะ</th>
                      <th>รวมแพ้</th>
                    </tr>
                  </thead>
                  <tbody style="height:40px;">
                    <tr>
                      <td id="total">0</td>
                      <td id="win" style="background-color: #28a745;">0</td>
                      <td id="lose" style="background-color: #dc3545;">0</td>
                    </tr>
                  </tbody>
                </table>
              </div>

            </div>

          </div>

          <div class="col-md-6 mb-1">
            <div class="container frameB" style="background-image: url('resource/images/new/<?php echo $asset_path ?>/FrameD.png'), url('resource/images/new/<?php echo $asset_path ?>/FrameB-2.png');">
              <span class="colhead pl-2"> Graph</span><br><br>
              <div class="text-center" style="font-size: 24px;">กราฟแสดงสถิติผล</div>
              <div style="overflow-x: auto;overflow: auto; height:69%;">
                <table id="graph_tbl" align="center" style="table-layout:fixed;padding:0;width: 80%;">

                </table>
              </div>
              <div class="text-center infotext">ลูกค้าสามารถดูกราฟเพื่อเป็นเทคนิคในการลงเดิมพัน</div>
            </div>

            <div class="container text-center" style="background-image: url('resource/images/new/<?php echo $asset_path ?>/FrameC.png');
                  background-repeat: no-repeat;background-size: 100% 100%;height: 150px;">

                  <div class="container text-left" style="width: 90%;padding-left:5%">

                    <div class="row pr-2">
                      <div class="col-10">
                        <span id="bstr" style="font-family: 'Kanit';font-size: 170%;color: red;">แบงค์เกอร์</span>
                      </div>
                      <div class="col-2 text-right">
                        <span id="countB" style="font-family: 'Kanit';font-size: 170%;color: white;"></span>
                      </div>
                    </div>
                    <div class="row text-center">
                      <table style="width:97%;padding: 0;margin-top: -10px;margin-bottom: -30px;">
                        <td style="height: 30px;width: 100%;vertical-align: top;padding:5px 0px 0px 18px;
                          background-image: url('resource/images/new/Frame_03_persent.png');
                          background-repeat: no-repeat;background-size: 100% 100%">
                          <div style="width: 95%;">
                            <div id="redbar"></div>
                          </div>
                        </td>
                      </table>
                    </div>


                    <div class="row pr-2">
                      <div class="col-10">
                        <span id="pstr" style="font-family: 'Kanit';font-size: 170%;color: #0066ff;">เพลย์เยอร์</span>
                      </div>
                      <div class="col-2 text-right">
                        <span id="countP" style="font-family: 'Kanit';font-size: 170%;color: white;"></span>
                      </div>
                    </div>
                    <div class="row text-center">
                      <table style="width:97%;padding: 0;margin-top: -10px;margin-bottom: -30px;">
                        <td style="height: 30px;width: 100%;vertical-align: top;padding:5px 0px 0px 18px;
                              background-image: url('resource/images/new/Frame_03_persent.png');
                              background-repeat: no-repeat;background-size: 100% 100%">
                          <div style="width: 95%;">
                            <div id="blubar"></div>
                          </div>
                        </td>
                      </table>
                    </div>

                    <div class="row pr-2">
                      <div class="col-10">
                        <span id="tstr" style="font-family: 'Kanit';font-size: 170%;color: lime;">เสมอ</span>
                      </div>
                      <!-- <span class="col-1">
                        <i class="fas fa-circle fa-xs"></i>
                      </span> -->
                      <div class="col-2 text-right">
                        <span id="countT" style="font-family: 'Kanit';font-size: 170%;color: white;"></span>
                      </div>
                    </div>
                    <div class="row text-center">
                      <table style="width:97%;padding: 0;margin-top: -10px;">
                        <td style="height: 30px;width: 100%;vertical-align: top;padding:5px 0px 0px 18px;
                          background-image: url('resource/images/new/Frame_03_persent.png');
                          background-repeat: no-repeat;background-size: 100% 100%">
                          <div style="width: 95%;">
                            <div id="grnbar"></div>
                          </div>
                        </td>
                      </table>
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
