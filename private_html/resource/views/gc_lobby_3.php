<div class="container">
<?php for ($i = 0; $i < 19; $i++) {
    if (($i % 2) == 0) {
        echo '<div class="row text-center">';
    } ?>
            <div class="col m-1 p-0 text-center">
            <a <?php if ($_SESSION['Credit'] > 0): ?>
      href="gc_room.php?id=<?php echo $i + 1; ?>"
    <?php else: ?>
      onclick="Swal.fire({ type: 'error',title: 'คุณมี Credit ไม่พอใช้บริการนี้',text: 'กรุณาเติมเงินก่อนเข้าใช้งานต่อไปค่ะ'})"
    <?php endif; ?>>
          <table align="center" class="te2_tableblock">
            <tbody>
              <tr>
                <td style="width: 35%;">
                  <img class="te2_gamelogo" src="resource/images/logo-wm.png">
                  <p class="te2_roomtxt">ROOM</p>
                  <p class="te2_numroomtxt"><?php echo str_pad($i + 1, 3, '0', STR_PAD_LEFT); ?></p>
                </td>
                <td style="width: 35%;">
                  <div style="position: relative; left: 0; top: 0;">
                    <img src="resource/images/theme/space/02_Space_Lobby_02.png" class="back_game">
                    <img id="<?php echo "status_game" . $i ?>" src="" class="ontop_game blink_bb">
                  </div>
                  <!-- <div id="status_game">
                    <img class="set_game"src="resource/images/theme/Space/02_Space_Lobby_02.png" alt="">
                  </div> -->
                </td>
                <td>
                  <p class="te2_chancetxt">อัตราการถูก</p>
                  <p id="<?php echo "winrate" . $i ?>" class="te2_winrate" style="color: khaki;">รอผล</p>
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