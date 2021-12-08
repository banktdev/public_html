<div class="container">

    <?php for ($i = 0; $i < 9; $i++) {
    if (($i % 2) == 0) {
        echo '<div class="row text-center">';
    } ?>

    <div class="col m-1 p-0 text-center">
      <a <?php if ($_SESSION['Credit'] > 0): ?>
        href="seroom?id=<?php echo $i + 1; ?>"
      <?php else: ?>
        onclick="Swal.fire({ type: 'error',title: 'คุณมี Credit ไม่พอใช้บริการนี้',text: 'กรุณาเติมเงินก่อนเข้าใช้งานต่อไปค่ะ'})"
      <?php endif; ?>>
        <table align="center" class="te2_tableblock">
          <tbody>
            <tr>
              <td style="width: 35%;">
                <img class="te2_gamelogo" src="resource/images/new/SexyBaccarat.png">
                <p class="te2_roomtxt">ROOM</p>
                <p class="te2_numroomtxt"><?php echo str_pad($i + 1, 3, '0', STR_PAD_LEFT); ?></p>
              </td>
              <td>
                <p class="te2_chancetxt">อัตราการถูก</p>
                <span id="<?php echo "winrate" . $i ?>" class="showtext" style="color: khaki;">รอผล</span>
              </td>
              <td class="cell_left_col" style="width: 35%;">
                <div id="<?php echo "accel_" . $i ?>" class="spin_div">
                  <img class="pointer" src="resource/images/theme/racing/02_Racing_Lobby_02.png">
                </div>

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