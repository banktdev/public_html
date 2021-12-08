<?php
  session_start();
  echo '<script type="text/javascript">';
  echo 'sessionStorage.clear();';
  echo 'window.location.href="../index.php";';
  echo '</script>';
  session_destroy();
//header( "location: ../index.php" );
?>