<div class="container">

  <?php for ($i = 0; $i < 9; $i++) {
    if (($i % 2) == 0) {
      echo '<div class="row text-center">';
    } ?>
    <div class="col m-1 p-0 text-center">
      <a <?php if ($_SESSION['Credit'] > 0) : ?> href="seroom?id=<?php echo $i + 1; ?>" <?php else : ?> onclick="Swal.fire({ type: 'error',title: 'คุณมี Credit ไม่พอใช้บริการนี้',text: 'กรุณาเติมเงินก่อนเข้าใช้งานต่อไปค่ะ'})" <?php endif; ?>>
        <table align="center" class="te2_tableblock">
          <tbody>
            <tr>
              <td style="width: 30%;">
                <div class="animated bounceInUp">
                  <img id="status_game0" src="" class=" set_img blink_bb ">
                </div>
              </td>
              <td style="width: 30%;">
                <div class="te2_chancetxt">อัตราการถูก</div>
                <div id="<?php echo "winrate" . $i ?>" class="te2_winrate" style="color: khaki;">รอผล</div>
                <img id="status_count_game0" src="" class="count_game">
                <!-- <div id="status_game">
                    <img class="set_game"src="resource/images/theme/Space/02_Space_Lobby_02.png" alt="">
                  </div> -->
              </td>
              <td>
                <img class="te2_gamelogo" src="resource/images/new/SexyBaccarat.png">
                <div class="te2_roomtxt">ROOM<span class="te2_numroomtxt"><?php echo str_pad($i + 1, 3, '0', STR_PAD_LEFT); ?></span></div>
              </td>
            </tr>
          </tbody>
          <tbody>
          </tbody>
        </table>
      </a>
    </div>


  <?php if (($i % 2) != 0) {
      echo '</div>';
    }
  } ?>
</div>