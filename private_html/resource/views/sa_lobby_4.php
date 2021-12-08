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
            href="saroom?id=<?php echo $i+1; ?>"
          <?php else : ?>
            onclick="Swal.fire({ type: 'error',title: 'คุณมี Credit ไม่พอใช้บริการนี้',text: 'กรุณาเติมเงินก่อนเข้าใช้งานต่อไปค่ะ'})"
          <?php endif;  ?>>
        <table align="center" class="te4_tableblock">
          <tbody>
            <tr>
              <td style="width: 35%;">
                <img class="te4_gamelogo" src="resource/images/Home_Sagaming.png">
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
                <p class="te4_numroomtxt"><?php echo $room . str_pad($J , 2, '0', STR_PAD_LEFT); ?></p>
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
            href="saroom?id=<?php echo $i+1; ?>"
          <?php else : ?>
            onclick="Swal.fire({ type: 'error',title: 'คุณมี Credit ไม่พอใช้บริการนี้',text: 'กรุณาเติมเงินก่อนเข้าใช้งานต่อไปค่ะ'})"
          <?php endif;  ?>>
        <table align="center" class="te4_tableblock">
          <tbody>
            <tr>
              <td style="width: 35%;">
                <img class="te4_gamelogo" src="resource/images/Home_Sagaming.png">
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
                <p class="te4_numroomtxt"><?php echo $room . str_pad($J , 2, '0', STR_PAD_LEFT); ?></p>
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
            href="saroom?id=<?php echo $i+1; ?>"
          <?php else : ?>
            onclick="Swal.fire({ type: 'error',title: 'คุณมี Credit ไม่พอใช้บริการนี้',text: 'กรุณาเติมเงินก่อนเข้าใช้งานต่อไปค่ะ'})"
          <?php endif;  ?>>
        <table align="center" class="te4_tableblock">
          <tbody>
            <tr>
              <td style="width: 35%;">
                <img class="te4_gamelogo" src="resource/images/Home_Sagaming.png">
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
                <p class="te4_numroomtxt"><?php echo $room . str_pad($J , 2, '0', STR_PAD_LEFT); ?></p>
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