<?php
  session_start();
  echo '<script type="text/javascript">';
  echo 'sessionStorage.clear();';
  echo '</script>';
  session_destroy();
  header( "location: ../index.php" );
?>
