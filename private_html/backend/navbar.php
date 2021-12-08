<?php include "resource/modal.php"; ?>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
  <a class="navbar-brand" href="main.php"><img src="resource/images/new/Logo_SAhacker.png" style="height: 100%;"></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarCollapse">
    <form class="form-inline ml-auto">

      <a class="menu" href="#" data-toggle="modal" data-target="#CodeModal">
        <i class="fas fa-barcode"></i> Create Code</a>
      <a class="menu" href="member.php">
        <i class="fas fa-users"></i> Member</a>
      <a class="menu" href="#" data-toggle="modal" data-target="#CreateModal">
        <i class="fas fa-user-plus"></i> Create User</a>
        <?php if ($_SESSION['Permit'] == 99): ?>
          <a class="menu" href="formula.php">
            <i class="fas fa-coins"></i> Formula</a>
          <a class="menu" href="Summary.php">
            <i class="fas fa-poll"></i> Summary</a>
          <a class="menu" href="summary.php" data-toggle="modal" data-target="#FootModal">
            <i class="fas fa-mobile-alt"></i> Contact</a>
        <?php endif; ?>

      <a href="#" data-toggle="modal" data-target="#OutModal" style="margin-right: 1em;">
        <img src="resource/images/new/Icon_Logout.png" style="height:32px;margin-top: 5px">
      </a>
    </form>

    <ul class="navbar-nav mr-auto sidenav" id="navAccordion">

      <div class="text-center">
        <img src="resource/images/new/formula_head.png" height="50">
      </div>

    </ul>

  </div>
</nav>
<script type="text/javascript">
  function changeForType(type) {
    sessionStorage.forType = type;
    window.location.replace("formula.php");
  }
</script>
