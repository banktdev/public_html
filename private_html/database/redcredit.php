<?php
session_start();
if ((!isset($_SESSION['ID'])) && (!isset($_SESSION['Credit']))) {
    $_SESSION['Credit'] = 0;
    exit();
}
if (!isset($_SESSION["ID"])) {
    $_SESSION['Credit'] = 0;
    exit();
}
if ($_SESSION['Credit'] <= 0) {
    //echo "Out";
    //exit();
}
require 'connection.php';
//   $sessionID = session_id();
//   $sql = " SELECT `token` FROM `users` WHERE `token` = '$sessionID' AND `type` = '1' AND `status` = '0' AND `id` = ".$_SESSION['ID'];
//   $result = mysqli_query($db,$sql);
//   $data = mysqli_fetch_array($result,MYSQLI_ASSOC);
//   if(!$data){
//     session_destroy();
//     echo '<script type="text/javascript">';
//     echo 'sessionStorage.clear();';
//     echo 'window.location.href = "login.php";';
//     echo '</script>';
//   }
// } else {
//   session_destroy();
//   echo '<script type="text/javascript">';
//   echo 'sessionStorage.clear();';
//   echo '</script>';
//   header("location: login.php");
// }
$u_id               = $_SESSION['ID'];
$sql                = " SELECT `credit` FROM `users` WHERE `id` = '$u_id' AND `type` = '1' AND `status` = '0'";
$result             = mysqli_query($db, $sql);
$udata              = mysqli_fetch_array($result, MYSQLI_ASSOC);
$credit             = $udata['credit'];
$_SESSION['Credit'] = $credit;
echo $credit;
//$sql = "UPDATE `users` SET `credit` = '$credit' WHERE `id` = '$u_id'";
//$result = mysqli_query($db,$sql);
/*
if ($result) {
$_SESSION['Credit'] = $credit;
echo $credit;
} else {
echo mysqli_error($result);
}
*/
mysqli_close($db);
?>
