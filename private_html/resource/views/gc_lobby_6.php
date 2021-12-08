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
        <table align="center" class="te6_tableblock">
          <tbody>
            <tr>
              <td style="width: 35%;">
                <img class="te6_gamelogo" src="resource/images/logo-wm.png">
                <p class="te6_roomtxt">ROOM</p>
                <p class="te6_numroomtxt"><?php echo str_pad($i + 1, 3, '0', STR_PAD_LEFT); ?></p>
              </td>
              <td style="height:100%;">
                <img id="trophy_0" class="te6_trophy" src="resource/images/theme/mayan/02_Mayan_Lobby_05.png">
              </td>
              <td style="padding-right: 10%;width: 35%;">
                <p class="te6_chancetxt">อัตราการถูก</p>
                <p id="<?php echo "winrate" . $i ?>" class="te6_winrate" style="color: khaki;">รอผล</p>
                <section>
                  <img class="te6_diamond bottom" src="resource/images/theme/mayan/02_Mayan_Lobby_09.png">
                  <img id="diamond_0" class="te6_diamond top" src="resource/images/theme/mayan/02_Mayan_Lobby_09.png">
                </section>
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