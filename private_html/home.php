<?php
require 'database/session.php';
$asset_path = "asset/" . $_SESSION['FormulaType'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
include_once 'header.php';
?>
<script>
  sessionStorage.setItem('User', '<?php echo $_SESSION["Username"]; ?>');
  <?php if ($_SESSION['Credit'] > 999999999) : ?>
    sessionStorage.setItem('formula', '<?php echo $_SESSION["formula"]; ?>');
    sessionStorage.setItem('forType', '<?php echo $_SESSION["FormulaType"]; ?>');
  <?php endif; ?>
  sessionStorage.setItem('sCode', '<?php echo $_SESSION["Session"]; ?>');
  sessionStorage.setItem('Credit', '<?php echo $_SESSION["Credit"]; ?>');
</script>
<body>
<style>
  .btn-block {
    display: flex;
    width: 100%;
    color: #fff;
    background-color: #cccccc26;
    margin-left: -7%;
}
</style>
  <?php
  include './resource/modal.php';
  include 'navbar2.php';
  ?>
  <div class="container mt-4">
    <div class="row justify-content-md-center mb-4">
    </div>
    <hr class="style mb-3 mt-0">
    <?php
    $game_list = array();
    $xx = 0;
    for ($i = 0; $i < 16; $i++) {
      $game_list[$xx] = 'SAgaming #' . ($i + 1);
      $xx++;
    }
    for ($i = 0; $i < 21; $i++) {
      $game_list[$xx] = 'Sexygame #' . ($i + 1);
      $xx++;
    }
    ?>
    <div class="row">
      <main class="content-wrapper2">
        <div class="container-fluid">

          <div class="container">
            <div class="row">
              <div class="col-12 col-sm-6 game_colum mb-3">
                <a <?php if ($_SESSION['Credit'] > 0) : ?> href="salobby" <?php else : ?> href="#" onclick="Swal.fire({ type: 'error',title: 'คุณมี Credit ไม่พอใช้บริการนี้',text: 'กรุณาเติมเงินก่อนเข้าใช้งานต่อไปค่ะ'})" <?php endif;  ?>>
                  <div class="game_div">
                    <img src="resource/images/cas/Game-sa.jpg" style="width: 100%;">
                  </div>
                </a>
              </div>
              <div class="col-12 col-sm-6 game_colum mb-3">
                <a <?php if ($_SESSION['Credit'] > 0) : ?> href="selobby" <?php else : ?> href="#" onclick="Swal.fire({ type: 'error',title: 'คุณมี Credit ไม่พอใช้บริการนี้',text: 'กรุณาเติมเงินก่อนเข้าใช้งานต่อไปค่ะ'})" <?php endif;  ?>>
                  <div class="game_div">
                    <img src="resource/images/cas/Game-se.jpg" style="width: 100%;">
                  </div>
                </a>
              </div>
			  <div class="col-12 col-sm-6 game_colum mb-3">
                <a <?php if ($_SESSION['Credit'] > 0) : ?> href="wmlobby" <?php else : ?> href="#" onclick="Swal.fire({ type: 'error',title: 'คุณมี Credit ไม่พอใช้บริการนี้',text: 'กรุณาเติมเงินก่อนเข้าใช้งานต่อไปค่ะ'})" <?php endif;  ?>>
                  <div class="game_div">
                    <img src="resource/images/cas/wm-hack.jpg" style="width: 100%;">
                  </div>
                </a>
              </div>
			  <div class="col-12 col-sm-6 game_colum mb-3">
                <a <?php if ($_SESSION['Credit'] > 0) : ?> href="slot" <?php else : ?> href="#" onclick="Swal.fire({ type: 'error',title: 'คุณมี Credit ไม่พอใช้บริการนี้',text: 'กรุณาเติมเงินก่อนเข้าใช้งานต่อไปค่ะ'})" <?php endif;  ?>>
                  <div class="game_div">
                    <img src="resource/images/cas/Game-slot.jpg" style="width: 100%;">
                  </div>
                </a>
              </div>
			   <div class="col-12 col-sm-6 game_colum mb-3">
                <a <?php if ($_SESSION['Credit'] > 0) : ?> href="dglobby" <?php else : ?> href="#" onclick="Swal.fire({ type: 'error',title: 'คุณมี Credit ไม่พอใช้บริการนี้',text: 'กรุณาเติมเงินก่อนเข้าใช้งานต่อไปค่ะ'})" <?php endif;  ?>>
                  <div class="game_div">
                    <img src="resource/images/cas/dg.jpg" style="width: 100%;">
                  </div>
                </a>
              </div>
			  <div class="col-12 col-sm-6 game_colum mb-3">
                <a <?php if ($_SESSION['Credit'] > 0) : ?> href="gclublobby" <?php else : ?> href="#" onclick="Swal.fire({ type: 'error',title: 'คุณมี Credit ไม่พอใช้บริการนี้',text: 'กรุณาเติมเงินก่อนเข้าใช้งานต่อไปค่ะ'})" <?php endif;  ?>>
                  <div class="game_div">
                    <img src="resource/images/cas/gclub.png" style="width: 100%;">
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
    </div>
    </main>
    <script type="text/javascript">
      window.onload = function() {
        document.addEventListener("contextmenu", function(e) {
          e.preventDefault();
        }, false);
        document.addEventListener("keydown", function(e) {
          if (event.keyCode == 123) {
            disabledEvent(e);
          }
        }, false);
        function disabledEvent(e) {
          if (e.stopPropagation) {
            e.stopPropagation();
          } else if (window.event) {
            window.event.cancelBubble = true;
          }
          e.preventDefault();
          return false;
        }
      };
    </script>
     <script type="text/javascript">
        let div = document.createElement('div');
        let loop = setInterval(() => {
            console.log(div);
            console.clear();
        });
        Object.defineProperty(div, "id", {
            get: () => {
                clearInterval(loop);
                window.location = "./database/logout.php";
            }
        });
    </script>
<script type="text/javascript">
             var IDLE_TIMEOUT = 600; //seconds
                var _idleSecondsCounter = 0;
                document.onclick = function() {
                _idleSecondsCounter = 0;
                };
                document.onmousemove = function() {
                _idleSecondsCounter = 0;
                };
                document.onkeypress = function() {
                _idleSecondsCounter = 0;
                };
                window.setInterval(CheckIdleTime, 1000);

                function CheckIdleTime() {
                _idleSecondsCounter++;
                var oPanel = document.getElementById("SecondsUntilExpire");
                if (oPanel)
                oPanel.innerHTML = (IDLE_TIMEOUT - _idleSecondsCounter) + "";
                if (_idleSecondsCounter >= IDLE_TIMEOUT) {
                alert("หมดเวลาในการเชื่อมต่อ !");
                document.location.href = "./database/logout.php";
                }
                }
        </script> 
</body>

</html>