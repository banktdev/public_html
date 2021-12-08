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
          <!-- <img src="resource/images/new/credit.png" style="height:30px;">&nbsp; <?=number_format($udata['credit'])?> &nbsp; </span> -->
      </a>
      <a href="#" data-toggle="modal" data-target="#RefillModal" style="margin-right: 1em;">
        <img src="resource/images/topbar/refill_baccaratone.png" style="height:32px;margin-top: -15px">
      </a>
      <a href="#" data-toggle="modal" data-target="#OutModal" style="margin-right: 1em;">
        <img src="resource/images/topbar/logout_baccaratone.png" style="height:32px;margin-top: -15px">
      </a>
    </form>

    <ul id="navAccordion">

      <div class="d-lg-none">
        <div class="mt-2 mb-2">
          <a class="btn btn-block" href="#" data-toggle="modal" data-target="#UserModal">
            <span style="font-family: 'Kanit', sans-serif;display: inline-block;vertical-align: middle;font-size: 120%; letter-spacing: 2px;height: 32px;border-radius: 5px;padding:1px;margin-top: 5px;">
              <img src="resource/images/new/user.png" style="height:30px;">&nbsp; <?php echo $_SESSION['Username']; ?> &nbsp; </span>
          </a>
          <a class="btn btn-block" href="#" data-toggle="modal" data-target="#RefillModal">
            <span id="navCredit2" style="font-family: 'Kanit', sans-serif;display: inline-block;vertical-align: middle;font-size: 120%; letter-spacing: 2px;height: 32px;border-radius: 5px;padding:1px;margin-top: 5px">
              <img src="resource/images/new/credit.png" style="height:30px;">&nbsp; <?=number_format($udata['credit'])?> &nbsp; </span>
          </a>
		  
          <a class="btn btn-block" href="#" data-toggle="modal" data-target="#OutModal" style="margin-right: 1em">
            <img src="resource/images/topbar/logout_baccaratone.png" style="height:32px;">
          </a>
        </div>

        <div class="btn btn-block">
          <a href="#" data-toggle="modal" data-target="#RefillModal">
            <img src="resource/images/topbar/refill_baccaratone.png" style="height:32px;">
          </a>
        </div>
      </div>
	<br>
    </ul>
  </div>
</nav>
