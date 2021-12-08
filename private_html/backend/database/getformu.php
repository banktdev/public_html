<?php
  session_start();
  if( isset($_SESSION["ID"])  )
  {
    require 'connection.php';
    $sessionID = session_id();
    $sql = " SELECT `token` FROM `users` WHERE `token` = '$sessionID' AND `type` >= '90' AND `status` = '0' AND `id` = ".$_SESSION['ID'];
    $result = mysqli_query($db,$sql);
    $data = mysqli_fetch_array($result,MYSQLI_ASSOC);
    if(!$data){
      session_destroy();
      echo "logout";
      exit();
    }
  } else {
    session_destroy();
    echo '<script type="text/javascript">';
    echo 'sessionStorage.clear();';
    echo '</script>';
    header("location: login.php");
    exit();
  }

  $forType = mysqli_real_escape_string($db,$_POST['forType']);

  $sql = " SELECT `id`,`data` FROM `formula` WHERE `type` = '$forType' ";
  $result = mysqli_query($db, $sql);
  if($result) {
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($row);
  } else {
    echo "error";
  }

  mysqli_close($db);
?>
