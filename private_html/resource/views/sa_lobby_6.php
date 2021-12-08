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
        <table align="center" class="te6_tableblock">
          <tbody>
            <tr>
              <td style="width: 35%;">
                <img class="te6_gamelogo" src="resource/images/Home_Sagaming.png">
                <p class="te6_roomtxt">ROOM</p>
                <p class="te6_numroomtxt"><?php echo $room . str_pad($J , 2, '0', STR_PAD_LEFT); ?></p>
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
        <table align="center" class="te6_tableblock">
          <tbody>
            <tr>
              <td style="width: 35%;">
                <img class="te6_gamelogo" src="resource/images/Home_Sagaming.png">
                <p class="te6_roomtxt">ROOM</p>
                <p class="te6_numroomtxt"><?php echo $room . str_pad($J , 2, '0', STR_PAD_LEFT); ?></p>
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
        <table align="center" class="te6_tableblock">
          <tbody>
            <tr>
              <td style="width: 35%;">
                <img class="te6_gamelogo" src="resource/images/Home_Sagaming.png">
                <p class="te6_roomtxt">ROOM</p>
                <p class="te6_numroomtxt"><?php echo $room . str_pad($J , 2, '0', STR_PAD_LEFT); ?></p>
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