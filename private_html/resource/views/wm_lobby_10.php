<div class="container">
<?php for ($i = 0; $i < 19; $i++) {
    if (($i % 2) == 0) {
        echo '<div class="row text-center">';
    } ?>

    <div class="col m-1 p-0 text-center">
    <a <?php if ($_SESSION['Credit'] > 0): ?>
      href="wm_room.php?id=<?php echo $i + 1; ?>"
    <?php else: ?>
      onclick="Swal.fire({ type: 'error',title: 'คุณมี Credit ไม่พอใช้บริการนี้',text: 'กรุณาเติมเงินก่อนเข้าใช้งานต่อไปค่ะ'})"
    <?php endif; ?>>
        <table align="center" class="te1_tableblock">
          <tbody>
            <tr>
              <td class="col_top_left">
                <img class="te1_gamelogo" src="resource/images/logo-wm.png">
                <table id="left_bar_0" class="tbl_bar tbl_bar_left">
                  <tbody><tr style="width:100%">
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                  </tr>
                </tbody></table>
              </td>
              <td class="col_top_center">
                <p class="te1_chancetxt">อัตราการถูก</p>
                <span id="<?php echo "winrate" . $i ?>" class="te1_showtext" style="color: khaki;">รอผล</span>
              </td>
              <td class="col_top_right">
                <p class="te1_roomtxt">ROOM</p>
                <p class="te1_numroomtxt"><?php echo str_pad($i + 1, 3, '0', STR_PAD_LEFT); ?></p>
                <table id="right_bar_0" class="tbl_bar tbl_bar_right" align="right">
                  <tbody><tr style="width:100%">
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                    <td class="bar_color_0"></td>
                  </tr>
                </tbody></table>
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