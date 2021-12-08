<nav class="navbar navbar-expand-lg navbar-dark fixed-top">

  <a class="navbar-brand" href="lobby.php"><img src="asset/img/logo.png" height="60px" style="margin-left: 50px;"></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarCollapse">

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
      <?php if($config["enable"] == "true" || $config["bank_ennable"] == "true") { ?>
	   <a href="#" data-toggle="modal" data-target="#BankModal" style="margin-right: 1em;">
        <img src="resource/images/topup_Credit.png" style="height:32px;margin-top: 5px">
      </a>
      <?php } ?>
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
        <?php if($config["enable"] == "true" || $config["bank_ennable"] == "true") { ?>
<div class="text-center">
          <a href="#" data-toggle="modal" data-target="#BankModal">
            <img src="resource/images/topup_Credit.png" style="height:32px;">
          </a>
        </div>
        <?php } ?>
      </div>
	<br>
    </ul>
  </div>
</nav>
