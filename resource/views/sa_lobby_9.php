<div class="container">

<?php
       $room = "C";
       $J = "0";    
for ($i=0; $i < 19 ; $i++) {



    if (($i%2) == 0) {
        echo '<div class="row text-center">';
    }
	if (($i) == 19);{
  
    if ($i == 3){

      $room = "A";
      $J = "0";
    }
  }
   // echo $room . $J;
    
    $J++ 
?>
            <div class="col m-1 p-0 text-center">
            <a <?php if ($_SESSION['Credit'] > 0): ?>
      href="sa_room.php?id=<?php echo $i + 1; ?>"
    <?php else: ?>
      onclick="Swal.fire({ type: 'error',title: 'คุณมี Credit ไม่พอใช้บริการนี้',text: 'กรุณาเติมเงินก่อนเข้าใช้งานต่อไปค่ะ'})"
    <?php endif; ?>>
          <table align="center" class="te2_tableblock">
            <tbody>
              <tr>
                <td style="width: 35%;">
                  <img class="te2_gamelogo" src="resource/images/Home_Sagaming.png">
                  <div class="te2_roomtxt">ROOM</div>
                  <div class="te2_numroomtxt"><?php echo $room . str_pad($J , 2, '0', STR_PAD_LEFT); ?></div>
                </td>
                <td style="width: 35%;">
                  <div class="animated zoomIn">
                    <img id="status_game0" src="" class="pic500 blink_bb">
                  </div>
                </td>
                <td>
                  <p class="te2_chancetxt">อัตราการถูก</p>
                  <div id="<?php echo "winrate" . $i ?>" class="te2_winrate" style="color: khaki;">รอผล</div>
                  <div id="show_line0" class=""></div>
                </td>
              </tr>
            </tbody><tbody>
          </tbody></table>
        </a>
      </div>

      <?php if (($i % 2) != 0) {
        echo '</div>';
    }
} ?>
      </div>