<?php
$user = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
$u_id  = $user;
if ($u_id == '') {
  exit;
}
$sql      = "SELECT `credit` FROM `users` WHERE `uname` = '$u_id'";
$result   = mysqli_query($db, $sql);
$rowcount = mysqli_num_rows($result);
if ($rowcount == 1) {
  $udata = mysqli_fetch_array($result, MYSQLI_ASSOC);
}
mysqli_close($db);

?>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
  <a class="navbar-brand" href="lobby.php"><img src="resource/images/logoxx.png" style="height: 100%;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarCollapse">

    <form class="form-inline ml-auto mt-2 d-none d-lg-block">
      <a href="#" data-toggle="modal" data-target="#UserModal">
        <span style="font-family: 'Kanit', sans-serif;display: inline-block;vertical-align: middle;font-size: 120%; letter-spacing: 2px;margin-right: 1em;height: 32px;color: #d0cb3f;background-color: black;border-radius: 5px;padding:1px;margin-top: -15px">
          <img src="resource/images/new/user.png" style="height:30px;">&nbsp; <?php echo $_SESSION['Username']; ?> &nbsp; </span>
      </a>
      <a href="#" data-toggle="modal" data-target="#RefillModal">
        <span id="navCredit" style="font-family: 'Kanit', sans-serif;display: inline-block;vertical-align: middle;font-size: 120%; letter-spacing: 2px;margin-right: 1em;height: 32px;color: #d0cb3f;background-color: black;border-radius: 5px;padding:1px;margin-top: -15px">
          <img src="resource/images/new/credit.png" style="height:30px;">&nbsp; <?= number_format($udata['credit']) ?> &nbsp; </span>
      </a>
      <a href="#" data-toggle="modal" data-target="#RefillModal" style="margin-right: 1em;">
        <img src="resource/images/topbar/refill_baccaratone.png?2" style="height:32px;margin-top: -15px">
      </a>
      <a href="#" data-toggle="modal" data-target="#OutModal" style="margin-right: 1em;">
        <img src="resource/images/topbar/logout_baccaratone.png?2" style="height:32px;margin-top: -15px">
      </a>
    </form>

    <ul class="navbar-nav mr-auto sidenav" id="navAccordion">

      <div class="d-lg-none">
        <div class="text-right mt-2 mb-2">
          <a class="btn btn-block" href="#" data-toggle="modal" data-target="#UserModal">
            <span style="font-family: 'Kanit', sans-serif;display: inline-block;vertical-align: middle;font-size: 120%; letter-spacing: 2px;height: 32px;border-radius: 5px;padding:1px;margin-top: 5px;">
              <img src="resource/images/new/user.png" style="height:30px;">&nbsp; <?php echo $_SESSION['Username']; ?> &nbsp; </span>
          </a>
          <a class="btn btn-block" href="#" data-toggle="modal" data-target="#RefillModal">
            <span id="navCredit2" style="font-family: 'Kanit', sans-serif;display: inline-block;vertical-align: middle;font-size: 120%; letter-spacing: 2px;height: 32px;border-radius: 5px;padding:1px;margin-top: 5px">
            <img src="resource/images/new/credit.png" style="height:30px;">&nbsp; <?=number_format($udata['credit'])?> &nbsp; </span>
          </a>
          <a class="btn btn-block" href="#" data-toggle="modal" data-target="#OutModal" style="margin-right: 1em;margin-top: 5px;">
            <img src="resource/images/topbar/logout_baccaratone.png?2" style="height:32px;margin-top: 5px">
          </a>
        </div>
        <div class="text-center">
          <a class="btn btn-block" href="#" data-toggle="modal" data-target="#RefillModal">
            <img src="resource/images/topbar/refill_baccaratone.png?2" style="height:32px;">
          </a>
        </div>
      </div>

      <div class="text-center">
        <img src="resource/images/new/formula_head.png" height="50">
      </div>

      <?php for ($i = 0; $i < 9; $i++) { ?>
        <li class="nav-item">
          <a class="nav-link" href="database/chgformula.php?type=<?php echo $i + 1; ?>" <?php if ($_SESSION['FormulaType'] == $i + 1) {
                                                                                          echo 'style=\'background-image: url("resource/images/new/Button.png");
            background-repeat: no-repeat;
            background-size: 130px 35px;
            background-position: center; \' ';
                                                                                        } ?>>
            <div class="row text-center text-white">
              <div class="col" <?php if ($_SESSION['FormulaType'] == $i + 1) {
                                  echo 'style="color: khaki"';
                                } ?>>
                <span style="font-family: 'Helvet';font-size: 150%;letter-spacing: 1px;">
                  สูตรที่ <?php echo $i + 1; ?> </span>
              </div>
            </div>
          </a>
        </li>
      <?php } ?>
      <br><br>
    </ul>

  </div>
</nav>
<!-- 
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
  <a class="navbar-brand" href="lobby.php"><img src="resource/images/logo.png" style="height: 100%;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarCollapse">
    <?php
    $user = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
    $u_id  = $user;
    if ($u_id == '') {
      exit;
    }
    $sql      = "SELECT `credit` FROM `users` WHERE `uname` = '$u_id'";
    $result   = mysqli_query($db, $sql);
    $rowcount = mysqli_num_rows($result);
    if ($rowcount == 1) {
      $udata = mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
    mysqli_close($db);

    ?>
    <form class="form-inline ml-auto mt-2 d-none d-lg-block">
      <a href="#" data-toggle="modal" data-target="#UserModal">
        <span style="font-family: 'Kanit', sans-serif;display: inline-block;vertical-align: middle;font-size: 120%; letter-spacing: 2px;margin-right: 1em;height: 32px;color: #d0cb3f;background-color: black;border-radius: 5px;padding:1px;margin-top: -15px">
          <img src="resource/images/new/user.png" style="height:30px;">&nbsp; <?php echo $_SESSION['Username']; ?> &nbsp; </span>
      </a>
      <a href="#" data-toggle="modal" data-target="#RefillModal">
        <span id="navCredit" style="font-family: 'Kanit', sans-serif;display: inline-block;vertical-align: middle;font-size: 120%; letter-spacing: 2px;margin-right: 1em;height: 32px;color: #d0cb3f;background-color: black;border-radius: 5px;padding:1px;margin-top: -15px">
          <img src="resource/images/new/credit.png" style="height:30px;">&nbsp; <?= number_format($udata['credit']) ?> &nbsp; </span>
      </a>
      <a href="#" data-toggle="modal" data-target="#RefillModal" style="margin-right: 1em;">
        <img src="resource/images/Topbar/Refill_baccaratone.png" style="height:32px;margin-top: -15px">
      </a>
      <a href="#" data-toggle="modal" data-target="#OutModal" style="margin-right: 1em;">
        <img src="resource/images/Topbar/Logout_baccaratone.png" style="height:32px;margin-top: -15px">
      </a>
    </form>

    <ul class="navbar-nav mr-auto sidenav" id="navAccordion">

      <div class="d-lg-none">
        <div class="text-right mt-2 mb-2">
          <a href="#" data-toggle="modal" data-target="#UserModal">
            <span style="display: inline-block;vertical-align: middle;font-size: 120%; letter-spacing: 2px;height: 32px;border-radius: 5px;padding:1px;margin-top: 5px">
              <img src="resource/images/new/user.png" style="height:30px;">&nbsp; <?php echo $_SESSION['Username']; ?> &nbsp; </span>
          </a>
          <a href="#" data-toggle="modal" data-target="#RefillModal">
            <span id="navCredit2" style="display: inline-block;vertical-align: middle;font-size: 120%; letter-spacing: 2px;height: 32px;border-radius: 5px;padding:1px;margin-top: 5px">
              <img src="resource/images/new/credit.png" style="height:30px;">&nbsp; <?= number_format($udata['credit']) ?> &nbsp; </span>
          </a>
          <a href="#" data-toggle="modal" data-target="#OutModal" style="margin-right: 1em;margin-top: 5px;">
            <img src="resource/images/Topbar/Logout_baccaratone.png" style="height:32px;margin-top: 5px">
          </a>
        </div>          
        <div class="text-center">
          <a href="#" data-toggle="modal" data-target="#RefillModal">
            <img src="resource/images/Topbar/Refill_baccaratone.png" style="height:32px;">
          </a>
        </div>
      </div>

      <div class="text-center">
        <img src="resource/images/new/formula_head.png" height="50">
      </div>

      <?php for ($i = 0; $i < 9; $i++) { ?>
      <li class="nav-item">
        <a class="nav-link" href="database/chgformula.php?type=<?php echo $i + 1; ?>" <?php if ($_SESSION['FormulaType'] == $i + 1) {
                                                                                        echo 'style=\'background-image: url("resource/images/new/Button.png");
                  background-repeat: no-repeat;
                  background-size: 130px 35px;
                  background-position: center; \' ';
                                                                                      } ?>>
          <div class="row text-center text-white">
            <div class="col" <?php if ($_SESSION['FormulaType'] == $i + 1) {
                                echo 'style="color: khaki"';
                              } ?>>
              <span style="font-family: 'Helvet';font-size: 150%;letter-spacing: 1px;">
                สูตรที่ <?php echo $i + 1; ?> </span>
            </div>
          </div>
        </a>
      </li>
      <?php } ?>
      <br><br>
    </ul>
  </div>
</nav> -->