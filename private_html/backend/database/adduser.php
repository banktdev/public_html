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

  $user     =   mysqli_real_escape_string($db,$_POST['addUser']);
  $pass     =   mysqli_real_escape_string($db,$_POST['addPass']);
  $repass   =   mysqli_real_escape_string($db,$_POST['addRepass']);
  $credit   =   mysqli_real_escape_string($db, $_POST['addCredit']);
  $type     =   mysqli_real_escape_string($db,$_POST['addType']);

  if($pass != $repass) {
    echo 'Re-Password not match';
    exit();
  }
  if( !( strlen($user) >= 6 AND strlen($user) <= 32 ) ){
    echo "Username invalid format";
    exit();
  }
  if( !( preg_match("/^[a-zA-Z0-9_]+$/", $user) ) ) {
    echo "Username invalid format";
    exit();
  }
  if( !( strlen($pass) >= 6 AND strlen($pass) <= 32 ) ){
    echo "Password invalid format";
    exit();
  }
  if( !( preg_match("/^[a-zA-Z0-9_]+$/", $pass) ) ) {
    echo "Password invalid format";
    exit();
  }
  if (!is_numeric($credit)) {
    echo "Error Add Credit";
    exit();
  }

  $sql = " SELECT `uname`,`phone` FROM `users` WHERE `uname` = '$user' ";
  $result = mysqli_query($db,$sql);
  $row = mysqli_num_rows($result);
  if($row != 0) {
    echo 'Username already exists';
    exit();
  }

  $sql = "  INSERT INTO `users`(`uname`, `pass`, `type`, `status` , `credit`, `fortype`)
            VALUES ('$user','$pass','$type','0','$credit','1') ";
  $result = mysqli_query($db,$sql);
  if($result){
    echo "success";
  } else {
    echo mysqli_error($result);
  }

  mysqli_close($db);
?>
