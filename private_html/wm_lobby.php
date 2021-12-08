<?php require 'database/session.php';
if($_SESSION['Credit'] <= 0) {
  header('location: lobby.php');
  exit();
}

$asset_path = "asset/" . $_SESSION['FormulaType'];
$views_page = array(
    1  => array("page" => "resource/views/wm_lobby_1.php"),
    2  => array("page" => "resource/views/wm_lobby_2.php"),
    3  => array("page" => "resource/views/wm_lobby_3.php"),
    4  => array("page" => "resource/views/wm_lobby_4.php"),
    5  => array("page" => "resource/views/wm_lobby_5.php"),
    6  => array("page" => "resource/views/wm_lobby_6.php"),
    7  => array("page" => "resource/views/wm_lobby_7.php"),
    8  => array("page" => "resource/views/wm_lobby_8.php"),
    9  => array("page" => "resource/views/wm_lobby_9.php"),
);
$for_type = $_SESSION['FormulaType'];
if (isset($views_page[$for_type])) {

}
$v = '1.0.2';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>สูตรบาคาร่า AI - Bm-hacker | สูตรบาคาร่ามาแรงที่สุด และคำนวนแม่นยำ 99.99%</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"  crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="./css/common.css">
  <link rel="stylesheet" type="text/css" href="./css/sidebar.css?2">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css"  crossorigin="anonymous" />
  <script src="js/jquery-3.4.1.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
  <script src="js/bootstrap.min.js"  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/df-number-format/2.1.6/jquery.number.js"></script>
  <script type="text/javascript" src="./js/sidebar.js"></script>
  <script type="text/javascript" src="./js/wm_lobby.js?v=<?=$v ?>"></script>

  <style type="text/css">
    .sidenav {
      background-image: none;
    }
    .showtext {
      font-family: 'Kanit';
      font-size: 20px;
    }

    .chancetxt {
      font-family: 'Kanit';
      margin-bottom: -5px;
      font-size: 8px;
      color: white;
    }

    .txtroom {
      font-family: 'Kanit';
      font-size: 12px;
      right: 10%;
      bottom: 35%;
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
  <?php if ($_SESSION['Credit'] > 10): ?>
  sessionStorage.setItem('formula', '<?php echo $_SESSION["formula"];?>' );
  sessionStorage.setItem('forType', '<?php echo $_SESSION["FormulaType"];?>' );
  <?php endif; ?>
  sessionStorage.setItem('sCode', '<?php echo $_SESSION["Session"];?>' );
  sessionStorage.setItem('Credit', '<?php echo $_SESSION["Credit"];?>' );
  </script>
</head>

<body style="background-image: url('resource/images/new/<?php echo $asset_path ?>/BG.png');">
  <?php
    include './resource/modal.php';
    include 'navbar.php';
  ?>



<main class="content-wrapper">
    <div class="container-fluid">

    <?php
if (isset($views_page[$for_type])) {
    include $views_page[$for_type]["page"];
}
?>



    </div>
  </main>
  <!-- <script type="text/javascript">
    window.onload = function() {
        document.addEventListener("contextmenu", function(e){
            e.preventDefault();
        }, false);
        document.addEventListener("keydown", function(e) {
            //document.onkeydown = function(e) {
            // "F12" key
            if (event.keyCode == 123) {
                disabledEvent(e);
            }
        }, false);
        function disabledEvent(e){
            if (e.stopPropagation){
                e.stopPropagation();
            } else if (window.event){
                window.event.cancelBubble = true;
            }
            e.preventDefault();
            return false;
        }
    };
    </script> -->
<!-- <script type="text/javascript">
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
    </script> -->
<!-- <script type="text/javascript">
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
        </script> -->
</body>

</html>



