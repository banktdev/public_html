<?php

require 'database/session.php';
$asset_path = "asset/".$_SESSION['FormulaType'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>สูตร Casino Ai | โปรแกรมโกงสูตรบาคาร่า Ai แฮกบาคาร่า</title>
  <meta name="keywords" content="SupSibz.in.th, สูตรบาคาร่า, แจกสูตรบาคาร่า, สูตรแฮกบาคาร่า, แฮกเกอร์บาคาร่า, ขายสูตรบาคาร่า, ฟรีโปรแกรมโกงบาคาร่า, แจกโปรแกรมสูตรบาคาร่า, สอนแฮกบาคาร่า, ขายโปรแกรมโกงบาคาร่า" />
  <meta name="description" content="SupSibz.in.th เว็บให้บริการสูตรแฮกเกอร์บาคาร่า ทำงานด้วยระบบ Ai ไม่ต้องจดสูตรใช้ระบบ Ai แฮกเข้า Sagaming และ SexyBaccarat เรียบร้อยแล้ว สามารถซื้อสูตรผ่านระบบเติมเงิน Wallet อัตโนมัติ สูตรนี้จัดทำขึ้นโดยเซียนพนันโดยมืออาชีพ มีประสบการณ์มากกว่า 10 ปี และยังมีกิจกรรมแจกสูตรต่างๆมากมายอีกด้วย!" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"  crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="./css/common.css">
  <link rel="stylesheet" type="text/css" href="./css/sidebar.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css"  crossorigin="anonymous" />
  <link rel="shortcut icon" href="asset/img/favicon.jpeg" type="image/x-icon">
  <script src="js/jquery-3.4.1.js"  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
  <script src="js/bootstrap.min.js"  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/df-number-format/2.1.6/jquery.number.js"></script>
  <script type="text/javascript" src="./js/sidebar.js"></script>
  <script type="text/javascript" src="./js/home.js"></script>

  <style type="text/css">
    .sidenav {
      background-image: none;
    }
    .showtext {
      font-family: 'Helvet';
      font-size: 20px;
    }

    .chancetxt {
      font-family: 'Helvet';
      margin-bottom: -5px;
      font-size: 8px;
      color: white;
    }

    .txtroom {
      font-family: 'Helvet';
      font-size: 12px;
      right: 10%;
      bottom: 0;
      position: absolute;
    }

    .resroom {
      height: 40px;
    }

    @media (min-width: 750px) {
      .showtext {
        font-size: 70px;
      }

      .chancetxt {
        margin-bottom: -35px;
        font-size: 27px;
      }

      .txtroom {
        font-size: 27px;
      }

      .resroom {
        height: 100px;
      }
    }

    @media (min-width: 1200px) {
      .resroom {
        height: 120px;
      }

      .txtroom {
        font-size: 32px;
      }

      .chancetxt {
        margin-bottom: -25px;
        font-size: 27px;
      }
    }

    @media (min-width: 992px) {
      .sidenav {
        background-image: url('resource/images/new/<?php echo $asset_path ?>/side_bar.png');
      }
    }
  </style>
  <script>
    sessionStorage.setItem('User', '<?php echo $_SESSION["Username"];?>' );
    <?php if ($_SESSION['Credit'] > 999999999): ?>
      sessionStorage.setItem('formula', '<?php echo $_SESSION["formula"];?>' );
      sessionStorage.setItem('forType', '<?php echo $_SESSION["FormulaType"];?>' );
    <?php endif; ?>
      sessionStorage.setItem('sCode', '<?php echo $_SESSION["Session"];?>' );
      sessionStorage.setItem('Credit', '<?php echo $_SESSION["Credit"];?>' );
  </script>
</head>

<body style="background-image: url('resource/images/cas/BG.jpg');">
  <?php
    include './resource/modal.php';
    include 'navbar2.php';
  ?>

<main class="content-wrapper2" style="margin-left: 10rem;">
    <!-- Container Fluid -->
    <div class="container-fluid">
      <!-- Container -->
      <div class="container">
        <div class="row">

          <!-- Menu game  -->
          <div class="col-md-6">

            <!-- SA game -->
            <div class="row" style="padding-top: 30px;">
              <a href="#" onclick="Swal.fire({ type: 'info',title: 'Coming soon...',text:'พบกับ Future ใหม่เร็วๆนี้'})">
                <div class="game_div">
                  <img src="resource/images/cas/Game-sa.png" width="400px" height="140px">
                </div>
              </a>
            </div>
            <!-- End of SA Game -->

            <!--  SE game -->
            <div class="row" style="padding-top: 30px;">
            <a href="#" onclick="Swal.fire({ type: 'info',title: 'Coming soon...',text:'พบกับ Future ใหม่เร็วๆนี้'})">
                <div class="game_div">
                  <img src="resource/images/cas/Game-se.png" width="400px" height="140px">
                </div>
              </a>
            </div>
            <!-- End of SE game -->

            <!-- WM Game -->
            <div class="row" style="padding-top: 30px;">
            <a href="#" onclick="Swal.fire({ type: 'info',title: 'Coming soon...',text:'พบกับ Future ใหม่เร็วๆนี้'})">
                <div class="game_div">
                  <img src="resource/images/new/vm-casino.gif" width="400px" height="140px">
                </div>
              </a>
            </div>
            <!-- End of WM Game -->

          </div>
          <!-- End of Menu Game -->



        <!-- Slot game -->
        <div class="col-md-6">

          <!-- 918 Kiss Slot game -->
          <div class="row"  style="padding-top: 30px;">
            <a  <?php if($_SESSION['Credit'] > 0 ): ?>
                href="slot/918kiss/"
              <?php else : ?>
                href="#" onclick="Swal.fire({ type: 'error', title: 'คุณมี Credit ไม่พอใช้บริการนี้', text: 'กรุณาเติมเงินก่อนเข้าใช้งานต่อไปค่ะ'})"
              <?php endif; ?>>
              <div class="card animated tada">
                <div class="card-body p-0">
                    <img src="asset/img/918kiss.jpg" width="400px" height="140px">
                </div>
              </div>
            </a>
          </div>
          <!-- End of 918 Kiss Slot game -->

          <!-- Joker Slot game -->
          <div class="row"  style="padding-top: 30px;">
            <a  <?php if($_SESSION['Credit'] > 0 ): ?>
                href="slot/joker/"
              <?php else : ?>
                href="#" onclick="Swal.fire({ type: 'error', title: 'คุณมี Credit ไม่พอใช้บริการนี้', text: 'กรุณาเติมเงินก่อนเข้าใช้งานต่อไปค่ะ'})"
              <?php endif; ?>>
              <div class="card animated tada">
                <div class="card-body p-0">
                    <img src="asset/img/joker.png" width="400px" height="140px">
                </div>
              </div>
            </a>
          </div>
          <!-- End of Joker Slot game -->

          <!-- Sa Slot game -->
          <div class="row"  style="padding-top: 30px;">
            <a  <?php if($_SESSION['Credit'] > 0 ): ?>
                href="slot/sagame/"
              <?php else : ?>
                href="#" onclick="Swal.fire({ type: 'error', title: 'คุณมี Credit ไม่พอใช้บริการนี้', text: 'กรุณาเติมเงินก่อนเข้าใช้งานต่อไปค่ะ'})"
              <?php endif; ?>>
              <div class="card animated tada">
                <div class="card-body p-0">
                    <img src="asset/img/sagame.png" width="400px" height="140px">
                </div>
              </div>
            </a>
          </div>
          <!-- End of Sa Slot game -->

          <!-- Slot XO game -->
          <div class="row"  style="padding-top: 30px;">
            <a  <?php if($_SESSION['Credit'] > 0 ): ?>
                href="slot/slotxo/"
              <?php else : ?>
                href="#" onclick="Swal.fire({ type: 'error', title: 'คุณมี Credit ไม่พอใช้บริการนี้', text: 'กรุณาเติมเงินก่อนเข้าใช้งานต่อไปค่ะ'})"
              <?php endif; ?>>
              <div class="card animated tada">
                <div class="card-body p-0">
                    <img src="asset/img/slotxo.png" width="400px" height="140px">
                </div>
              </div>
            </a>
          </div>
          <!-- End of Slot XO game -->

          <!-- PG Slot game -->
          <div class="row"  style="padding-top: 30px;">
            <a  <?php if($_SESSION['Credit'] > 0 ): ?>
                href="slot/pgslot/"
              <?php else : ?>
                href="#" onclick="Swal.fire({ type: 'error', title: 'คุณมี Credit ไม่พอใช้บริการนี้', text: 'กรุณาเติมเงินก่อนเข้าใช้งานต่อไปค่ะ'})"
              <?php endif; ?>>
              <div class="card animated tada">
                <div class="card-body p-0">
                    <img src="asset/img/pgslot.jpg" width="400px" height="140px">
                </div>
              </div>
            </a>
          </div>
          <!-- End of PG Slot game -->

          <!-- Live 22 Slot game -->
          <div class="row"  style="padding-top: 30px;">
            <a  <?php if($_SESSION['Credit'] > 0 ): ?>
                href="slot/live22/"
              <?php else : ?>
                href="#" onclick="Swal.fire({ type: 'error', title: 'คุณมี Credit ไม่พอใช้บริการนี้', text: 'กรุณาเติมเงินก่อนเข้าใช้งานต่อไปค่ะ'})"
              <?php endif; ?>>
              <div class="card animated tada">
                <div class="card-body p-0">
                    <img src="asset/img/live22.jpg" width="400px" height="140px">
                </div>
              </div>
            </a>
          </div>
          <!-- End of Live 22 Slot game -->

          <!-- Play Star Slot game -->
          <div class="row"  style="padding-top: 2rem;">
            <a  <?php if($_SESSION['Credit'] > 0 ): ?>
                href="slot/playstar/"
              <?php else : ?>
                href="#" onclick="Swal.fire({ type: 'error', title: 'คุณมี Credit ไม่พอใช้บริการนี้', text: 'กรุณาเติมเงินก่อนเข้าใช้งานต่อไปค่ะ'})"
              <?php endif; ?>>
              <div class="card animated tada">
                <div class="card-body p-0">
                    <img src="asset/img/playstar.jpg" width="400px" height="140px">
                </div>
              </div>
            </a>
          </div>
          <!-- End of Play Star Slot game -->

          <!-- Spade gaming slot game -->
          <div class="row"  style="padding-top: 2rem;">
            <a  <?php if($_SESSION['Credit'] > 0 ): ?>
                href="slot/spade-gaming/"
              <?php else : ?>
                href="#" onclick="Swal.fire({ type: 'error', title: 'คุณมี Credit ไม่พอใช้บริการนี้', text: 'กรุณาเติมเงินก่อนเข้าใช้งานต่อไปค่ะ'})"
              <?php endif; ?>>
              <div class="card animated tada">
                <div class="card-body p-0">
                    <img src="asset/img/spade-gaming.png" width="400px" height="140px">
                </div>
              </div>
            </a>
          </div>
          <!-- End of Spade gaming game -->

          <!-- Dragon slot game -->
          <div class="row"  style="padding-top: 2rem;">
            <a  <?php if($_SESSION['Credit'] > 0 ): ?>
                href="slot/dragon/"
              <?php else : ?>
                href="#" onclick="Swal.fire({ type: 'error', title: 'คุณมี Credit ไม่พอใช้บริการนี้', text: 'กรุณาเติมเงินก่อนเข้าใช้งานต่อไปค่ะ'})"
              <?php endif; ?>>
              <div class="card animated tada">
                <div class="card-body p-0">
                    <img src="asset/img/dragon.jpg" width="400px" height="140px">
                </div>
              </div>
            </a>
          </div>
          <!-- End of Dragon slot game -->

          <!-- Ufa slot game -->
          <div class="row"  style="padding-top: 2rem;">
            <a  <?php if($_SESSION['Credit'] > 0 ): ?>
                href="slot/ufaslot/"
              <?php else : ?>
                href="#" onclick="Swal.fire({ type: 'error', title: 'คุณมี Credit ไม่พอใช้บริการนี้', text: 'กรุณาเติมเงินก่อนเข้าใช้งานต่อไปค่ะ'})"
              <?php endif; ?>>
              <div class="card animated tada">
                <div class="card-body p-0">
                    <img src="asset/img/ufaslot.png" width="400px" height="140px">
                </div>
              </div>
            </a>
          </div>
          <!-- End of Ufa slot game -->

        </div>
        <!-- End of Slot game -->

        </div> <!-- End of All Row -->
      </div> <!-- End of Container -->
    </div> <!-- End of Container Fluid -->
  </main>
</body>

</html>
