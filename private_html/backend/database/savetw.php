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


 if(isset($_GET["edit"])){
	  $min     =   mysqli_real_escape_string($db,$_POST['tw_min']);
  $rate     =   mysqli_real_escape_string($db,$_POST['tw_rate']);
 

 	$sql1 = "UPDATE `tw_settings` SET `value` = '{$min}' WHERE `name` = 'min'";
	mysqli_query($db, $sql1);
			
	$sql2 = "UPDATE `tw_settings` SET `value` = '{$rate}' WHERE `name` = 'rate'";
	mysqli_query($db, $sql2);
	
	
  if($result){
    echo "success";
  } else {
    echo mysqli_error($result);
  }

  mysqli_close($db); 
 }

 if(isset($_GET["enable"])){
	 
	$enable     =   mysqli_real_escape_string($db,$_POST['enable']);

	 
	$sql2 = "UPDATE `tw_settings` SET `value` = '{$enable}' WHERE `name` = 'enable'";
	mysqli_query($db, $sql2);
	
	
  if($result){
    echo "success";
  } else {
    echo mysqli_error($result);
  } 
 }

?>
