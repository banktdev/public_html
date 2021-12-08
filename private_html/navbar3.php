<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
  <a class="navbar-brand" href="lobby.php"><img src="resource/images/new/Logo_SAhackerxx.png" style="height: 100%;"></a>
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
        <span style="display: inline-block;vertical-align: middle;font-size: 120%; letter-spacing: 2px;margin-right: 1em;height: 32px;background-color: black;border-radius: 5px;padding:1px;margin-top: 5px">
          <img src="resource/images/new/user.png" style="height:30px;">&nbsp; <?php echo $_SESSION['Username']; ?> &nbsp; </span>
      </a>
      <a href="#" data-toggle="modal" data-target="#RefillModal">
        <span id="navCredit" style="display: inline-block;vertical-align: middle;font-size: 120%; letter-spacing: 2px;margin-right: 1em;height: 32px;background-color: black;border-radius: 5px;padding:1px;margin-top: 5px">
          <img src="resource/images/new/credit.png" style="height:30px;">&nbsp; <?=number_format($udata['credit'])?> &nbsp; </span>
      </a> 
      <a href="#" data-toggle="modal" data-target="#RefillModal" style="margin-right: 1em;">
        <img src="resource/images/new/re_Credit.png" style="height:32px;margin-top: 5px">
      </a>
      <a href="#" data-toggle="modal" data-target="#OutModal" style="margin-right: 1em;">
        <img src="resource/images/new/Icon_Logout.png" style="height:32px;margin-top: 5px">
      </a>
    </form>

    <ul id="navAccordion">

      <div class="d-lg-none">
        <div class="text-right mt-2 mb-2">
          <a href="#" data-toggle="modal" data-target="#UserModal">
            <span style="display: inline-block;vertical-align: middle;font-size: 120%; letter-spacing: 2px;height: 32px;border-radius: 5px;padding:1px;margin-top: 5px">
              <img src="resource/images/new/user.png" style="height:30px;">&nbsp; <?php echo $_SESSION['Username']; ?> &nbsp; </span>
          </a>
          <a href="#" data-toggle="modal" data-target="#RefillModal">
            <span id="navCredit2" style="display: inline-block;vertical-align: middle;font-size: 120%; letter-spacing: 2px;height: 32px;border-radius: 5px;padding:1px;margin-top: 5px">
              <img src="resource/images/new/credit.png" style="height:30px;">&nbsp; <?=number_format($udata['credit'])?> &nbsp; </span>
          </a>
		  
          <a href="#" data-toggle="modal" data-target="#OutModal" style="margin-right: 1em;margin-top: 5px;">
            <img src="resource/images/new/Icon_Logout.png" style="height:32px;margin-top: 5px">
          </a>
        </div>

        <div class="text-center">
          <a href="#" data-toggle="modal" data-target="#RefillModal">
            <img src="resource/images/new/re_Credit.png" style="height:32px;">
          </a>
        </div>
      </div>
	<br>
    </ul>
  </div>

</nav>
