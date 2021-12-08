<div class="container" style="padding: 1%">
    <div class="row mt-3">
        <div class="col mb-3" style="background-color: rgb(255,255,255,0.2);vertical-align: middle;border-radius: 15px;">
            <span style="color:white; font-size: 2rem;"><img class="icon_855" src="resource/images/new/SAgaming.png" style="width: 100px;"> โซน C</span>
        </div>
    </div>
    <?php

    // Start Room with Name "C"
    $room = "C";
    $J = "0";
    for ($i = 0; $i < 6; $i++) {

        if (($i % 2) == 0) {
            echo '<div class="row text-center">';
        }
        // if (($i) == 30); {

        // }
        // echo $room . $J;

        $J++
    ?>
    <div class="col m-1 p-0 text-center">
    <a <?php if ($_SESSION['Credit'] > 0): ?>
      href="saroom?id=<?php echo $i + 1; ?>"
    <?php else: ?>
      onclick="Swal.fire({ type: 'error',title: 'คุณมี Credit ไม่พอใช้บริการนี้',text: 'กรุณาเติมเงินก่อนเข้าใช้งานต่อไปค่ะ'})"
    <?php endif; ?>>
        <table align="center" class="te8_tableblock">
          <tbody>
            <tr>
              <td style="width: 10%;"></td>
              <td style="width: 25%;">
                <img class="te8_gamelogo" src="resource/images/Home_Sagaming.png">
                <p class="te8_roomtxt">ROOM</p>
                <p class="te8_numroomtxt"><?php echo $room . str_pad($J , 2, '0', STR_PAD_LEFT); ?></p>
              </td>
              <td style="height:100%;padding: 0;margin: 0;">
                <table align="center" style="width:70%;height:80%;border-collapse: separate;border-spacing: 2px;">
                  <tbody id="bitrate0">

                  </tbody>
                </table>
              </td>
              <td style="padding-right: 5%;width: 25%;">
                <p class="te8_chancetxt">อัตราการถูก</p>
                <p id="<?php echo "winrate" . $i ?>" class="te8_winrate" style="color: khaki;">รอผล</p>
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


<div class="container" style="padding: 1%">
    <div class="row mt-3">
        <div class="col mb-3" style="background-color: rgb(255,255,255,0.2);vertical-align: middle;border-radius: 15px;">
            <span style="color:white; font-size: 2rem;"><img class="icon_855" src="resource/images/new/SAgaming.png" style="width: 100px;"> โซน E</span>
        </div>
    </div>
    <?php

    // Start Room with Name "C"
    $room = "E";
    $J = "0";
    for ($i = 6; $i < 11; $i++) {

        if (($i % 2) == 0) {
            echo '<div class="row text-center">';
        }
        // if (($i) == 30); {

        // }
        // echo $room . $J;

        $J++
    ?>
    <div class="col m-1 p-0 text-center">
    <a <?php if ($_SESSION['Credit'] > 0): ?>
      href="saroom?id=<?php echo $i + 1; ?>"
    <?php else: ?>
      onclick="Swal.fire({ type: 'error',title: 'คุณมี Credit ไม่พอใช้บริการนี้',text: 'กรุณาเติมเงินก่อนเข้าใช้งานต่อไปค่ะ'})"
    <?php endif; ?>>
        <table align="center" class="te8_tableblock">
          <tbody>
            <tr>
              <td style="width: 10%;"></td>
              <td style="width: 25%;">
                <img class="te8_gamelogo" src="resource/images/Home_Sagaming.png">
                <p class="te8_roomtxt">ROOM</p>
                <p class="te8_numroomtxt"><?php echo $room . str_pad($J , 2, '0', STR_PAD_LEFT); ?></p>
              </td>
              <td style="height:100%;padding: 0;margin: 0;">
                <table align="center" style="width:70%;height:80%;border-collapse: separate;border-spacing: 2px;">
                  <tbody id="bitrate0">

                  </tbody>
                </table>
              </td>
              <td style="padding-right: 5%;width: 25%;">
                <p class="te8_chancetxt">อัตราการถูก</p>
                <p id="<?php echo "winrate" . $i ?>" class="te8_winrate" style="color: khaki;">รอผล</p>
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


<div class="container" style="padding: 1%">
    <div class="row mt-3">
        <div class="col mb-3" style="background-color: rgb(255,255,255,0.2);vertical-align: middle;border-radius: 15px;">
            <span style="color:white; font-size: 2rem;"><img class="icon_855" src="resource/images/new/SAgaming.png" style="width: 100px;"> โซน P</span>
        </div>
    </div>
    <?php

    // Start Room with Name "C"
    $room = "P";
    $J = "0";
    for ($i = 11; $i < 19; $i++) {

        if (($i % 2) == 0) {
            echo '<div class="row text-center">';
        }
        // if (($i) == 30); {

        // }
        // echo $room . $J;

        $J++
    ?>
    <div class="col m-1 p-0 text-center">
    <a <?php if ($_SESSION['Credit'] > 0): ?>
      href="saroom?id=<?php echo $i + 1; ?>"
    <?php else: ?>
      onclick="Swal.fire({ type: 'error',title: 'คุณมี Credit ไม่พอใช้บริการนี้',text: 'กรุณาเติมเงินก่อนเข้าใช้งานต่อไปค่ะ'})"
    <?php endif; ?>>
        <table align="center" class="te8_tableblock">
          <tbody>
            <tr>
              <td style="width: 10%;"></td>
              <td style="width: 25%;">
                <img class="te8_gamelogo" src="resource/images/Home_Sagaming.png">
                <p class="te8_roomtxt">ROOM</p>
                <p class="te8_numroomtxt"><?php echo $room . str_pad($J , 2, '0', STR_PAD_LEFT); ?></p>
              </td>
              <td style="height:100%;padding: 0;margin: 0;">
                <table align="center" style="width:70%;height:80%;border-collapse: separate;border-spacing: 2px;">
                  <tbody id="bitrate0">

                  </tbody>
                </table>
              </td>
              <td style="padding-right: 5%;width: 25%;">
                <p class="te8_chancetxt">อัตราการถูก</p>
                <p id="<?php echo "winrate" . $i ?>" class="te8_winrate" style="color: khaki;">รอผล</p>
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