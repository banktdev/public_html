<div class="container">
    <?php for ($i = 0; $i < 9; $i++) {
        if (($i % 2) == 0) {
            echo '<div class="row text-center">';
        } ?>

 
    <div class="col m-1 p-0 text-center">
        <a <?php if ($_SESSION['Credit'] > 0): ?>
            href="se_room.php?id=<?php echo $i+1; ?>"
          <?php else : ?>
            onclick="Swal.fire({ type: 'error',title: 'คุณมี Credit ไม่พอใช้บริการนี้',text: 'กรุณาเติมเงินก่อนเข้าใช้งานต่อไปค่ะ'})"
          <?php endif;  ?>>
        <table align="center" class="te4_tableblock">
          <tbody>
            <tr>
              <td style="width: 35%;">
                <img class="te4_gamelogo" src="resource/images/new/SexyBaccarat.png">
                <div class="te4_linep_bar">
                  <div class="te4_progbar_bg">
                    <div id="progbar_0" class="te4_progbar">
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <p class="te4_chancetxt">อัตราการถูก</p>
                <p id="<?php echo "winrate".$i ?>" class="te4_winrate" style="color: khaki;">รอผล</p>
              </td>
              <td style="width: 35%;">
                <p class="te4_roomtxt">ROOM</p>
                <p class="te4_numroomtxt"><?php echo str_pad($i+1, 3, '0', STR_PAD_LEFT); ?></p>
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