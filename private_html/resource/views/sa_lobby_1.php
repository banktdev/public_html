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
    for ($i = 0; $i < 10; $i++) {

        if (($i % 2) == 0) {
            echo '<div class="row text-center">';
        }
        // if (($i) == 30); {

        // }
        // echo $room . $J;

        $J++
    ?>

        <div class="col-6">
            <div class="m-1">
                <a <?php if ($_SESSION['Credit'] > 0) : ?> href="saroom?id=<?php echo $i + 1; ?>&title=<?php echo $room . str_pad($J, 2, '0', STR_PAD_LEFT); ?>" <?php else : ?> onclick="Swal.fire({ type: 'error',title: 'คุณมี Credit ไม่พอใช้บริการนี้',text: 'กรุณาเติมเงินก่อนเข้าใช้งานต่อไปค่ะ'})" <?php endif; ?>>
                    <div class="row resroom" style="padding: 2%; background-size: 100% 100%; background-color: rgba(0, 0, 0, 0.3); background-image: url(&quot;resource/images/new/asset/1/Frame_Lobby.png&quot;);">
                        <div class="col" style="height: 100%;
                  background-image: url('resource/images/new/SAgaming.png');
                  background-repeat: no-repeat;
                  background-size: 85% 75%;
                  background-position: center center;
                  padding-right:4% ">

                            <span class="txtroom">ROOM : <?php echo $room . str_pad($J, 2, '0', STR_PAD_LEFT); ?></span>
                        </div>
                        <div class="col-6 col-md-5 text-center" style="background-image: url('resource/images/new/tb_line.png');
                  background-repeat: no-repeat;
                  background-size: 2px 100%;
                  background-position: center left;height: 100%;position:relative;">
                            <div class="chancetxt">อัตราการชนะ</div>
                            <span id="<?php echo "winrate" . $i ?>" class="showtext" style="color: khaki;">รอผล</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>


    <?php if (($i % 2) != 0) {
            echo '</div>';
        }
    } ?>


   

    

</div>

</div>







   



<!-- 

    <div class="container">
        <div class="row mt-3">
            <div class="col mb-3" style="background-color: rgb(255,255,255,0.2);vertical-align: middle;border-radius: 15px;">
                <span style="color:white; font-size: 2rem;"><img class="icon_855" src="resource/images/new/SAgaming.png" style="width: 100px;"> โซน A</span>
            </div>
        </div>
        <div class="row">
        <?php

// Start Room with Name "C"
$room = "A";
$J = "0";
for ($i = 19; $i < 34; $i++) {

    if (($i % 2) == 0) {
        echo '';
    }
    // if (($i) == 30); {

    // }
    // echo $room . $J;

    $J++
?>

    <div class="col-6">
        <div class="m-1">
            <a <?php if ($_SESSION['Credit'] > 0) : ?> href="saroom?id=<?php echo $i + 1; ?>&title=<?php echo $room . str_pad($J, 2, '0', STR_PAD_LEFT); ?>" <?php else : ?> onclick="Swal.fire({ type: 'error',title: 'คุณมี Credit ไม่พอใช้บริการนี้',text: 'กรุณาเติมเงินก่อนเข้าใช้งานต่อไปค่ะ'})" <?php endif; ?>>
                <div class="row resroom" style="padding: 2%; background-size: 100% 100%; background-color: rgba(0, 0, 0, 0.3); background-image: url(&quot;resource/images/new/asset/1/Frame_Lobby.png&quot;);">
                    <div class="col" style="height: 100%;
              background-image: url('resource/images/new/SAgaming.png');
              background-repeat: no-repeat;
              background-size: 85% 75%;
              background-position: center center;
              padding-right:4% ">

                        <span class="txtroom">ROOM : <?php echo $room . str_pad($J, 2, '0', STR_PAD_LEFT); ?></span>
                    </div>
                    <div class="col-6 col-md-5 text-center" style="background-image: url('resource/images/new/tb_line.png');
              background-repeat: no-repeat;
              background-size: 2px 100%;
              background-position: center left;height: 100%;position:relative;">
                        <div class="chancetxt">อัตราการชนะ</div>
                        <span id="<?php echo "winrate" . $i ?>" class="showtext" style="color: khaki;">รอผล</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
    
<?php if (($i % 2) != 0) {
        echo '';
    }
} ?> 
        </div>
    </div>

 
 -->
