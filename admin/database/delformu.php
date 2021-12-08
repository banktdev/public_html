<?php
session_start();
if (isset($_SESSION["ID"])) {
    require 'connection.php';
    $sessionID = session_id();
    $sql = " SELECT `token` FROM `users` WHERE `token` = '$sessionID' AND `type` >= '90' AND `status` = '0' AND `id` = ".$_SESSION['ID'];
    $result = mysqli_query($db, $sql);
    $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if (!$data) {
        session_destroy();
        echo "logout";
        exit();
    }
    // mysqli_close($db);
} else {
    session_destroy();
    echo '<script type="text/javascript">';
    echo 'sessionStorage.clear();';
    echo '</script>';
    header("location: login.php");
    exit();
}

  $id   =   mysqli_real_escape_string($db,$_POST['delid']);
  $typef  =  mysqli_real_escape_string($db,$_POST['typef']);

  $sql = " DELETE FROM `formula` WHERE `id` = '$id' ";
  $result = mysqli_query($db, $sql);
  if ($result) {
      echo "deleted";
  } else {
      echo mysqli_error($result);
      exit();
  }

  mysqli_close($db);
