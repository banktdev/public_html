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
    echo '<script type="text/javascript">';
    echo 'sessionStorage.clear();';
    echo 'window.location.href = "login.php";';
    echo '</script>';
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

  $userid = mysqli_real_escape_string($db,$_POST['u_id']);
  $fname = mysqli_real_escape_string($db,$_POST['ed_fname']);
  $lname = mysqli_real_escape_string($db,$_POST['ed_lname']);
  $phone = mysqli_real_escape_string($db,$_POST['ed_phone']);
  $mail= mysqli_real_escape_string($db,$_POST['ed_email']);
  $line = mysqli_real_escape_string($db,$_POST['ed_line']);
  $pass = mysqli_real_escape_string($db,$_POST['ed_pass']);

  $sql = " UPDATE `users` SET `fname` = '$fname' , `lname` = '$lname' ,
          `phone` = '$phone' , `email` = '$mail' , `line` = '$line' , `pass` = '$pass' WHERE `id` = '$userid'";
  $result = mysqli_query($db,$sql);
  if($result)
  {
    mysqli_close($db);
    header('Location: ../main.php');
  } else {
    mysqli_close($db);
    echo mysqli_error($result);
  }
?>
