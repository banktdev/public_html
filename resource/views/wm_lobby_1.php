<div class="container" style="padding: 1%">


<?php for ($i = 0; $i < 19; $i++) {
    if (($i % 2) == 0) {
        echo '<div class="row text-center">';
    } ?>

        <div class="col-6">
            <div class="m-1">
                <a <?php if ($_SESSION['Credit'] > 0): ?>
                    href="wm_room.php?id=<?php echo $i + 1; ?>"
                  <?php else: ?>
                    onclick="Swal.fire({ type: 'error',title: 'คุณมี Credit ไม่พอใช้บริการนี้',text: 'กรุณาเติมเงินก่อนเข้าใช้งานต่อไปค่ะ'})"
                  <?php endif; ?> >
                    <div class="row resroom"
                        style="padding: 2%; background-size: 100% 100%; background-color: rgba(0, 0, 0, 0.3); background-image: url(&quot;resource/images/new/asset/1/Frame_Lobby.png&quot;);">
                        <div class="col" style="height: 100%;
                  background-image: url('resource/images/logo-wm.png');
                  background-repeat: no-repeat;
                  background-size: 85% 75%;
                  background-position: center center;
                  padding-right:4% ">
                            <span class="txtroom">ROOM : <?php echo str_pad($i + 1, 3, '0', STR_PAD_LEFT); ?></span>
                        </div>
                        <div class="col-6 col-md-5 text-center" style="background-image: url('resource/images/new/tb_line.png');
                  background-repeat: no-repeat;
                  background-size: 2px 100%;
                  background-position: center left;height: 100%;position:relative;">
                            <div class="chancetxt">อัตราการชนะ</div>
                            <span id="<?php echo "winrate".$i ?>" class="showtext" style="color: khaki;">รอผล</span>
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