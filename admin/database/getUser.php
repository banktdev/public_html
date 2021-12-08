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
} else {
    session_destroy();
    echo '<script type="text/javascript">';
    echo 'sessionStorage.clear();';
    echo '</script>';
    header("location: login.php");
    exit();
}

$getuser = mysqli_real_escape_string($db,$_POST['user']);
$gettype = mysqli_real_escape_string($db,$_POST['type']);
if($getuser != "") {
  $user = $getuser;
  $getpage = mysqli_real_escape_string($db,$_POST['page']);
  $page = ($getpage-1) * 50;
  switch ($gettype) {
    case 'Super':
      //$sql = "SELECT `id`,`uname`,`type`,`status`,`credit`,`last_login`,`created` FROM `users` WHERE `uname` = '$user' AND `status` >= '0' (`type` = '90' OR `type` = '99') ";
	  $sql = "SELECT `id`,`uname`,`type`,`status`,`credit`,`last_login`,`created` FROM `users` WHERE `uname` LIKE '%$user%' AND (`type` = '90' OR `type` = '99') ";
      break;
    default:
      //$sql = "SELECT `id`,`uname`,`type`,`status`,`credit`,`last_login`,`created` FROM `users` WHERE `uname` = '$user' AND `status` >= '0' AND `type` = '1' ";
	  $sql = "SELECT `id`,`uname`,`type`,`status`,`credit`,`last_login`,`created` FROM `users` WHERE `uname` LIKE '%$user%' AND `type` = '1' ORDER BY `created` DESC LIMIT $page , 50 ";
      break;
  }
} else {
  $getpage = mysqli_real_escape_string($db,$_POST['page']);
  $page = ($getpage-1) * 50;

  switch ($gettype) {
    case 'Super':
      //$sql = "SELECT `id`,`uname`,`type`,`status`,`credit`,`last_login`,`created` FROM `users` WHERE (`type` = '90' OR `type` = '99') AND `status` >= '0' LIMIT $page , 50 ";
	  $sql = "SELECT `id`,`uname`,`type`,`status`,`credit`,`last_login`,`created` FROM `users` WHERE (`type` = '90' OR `type` = '99') LIMIT $page , 50 ";
      break;
    default:
      //$sql = "SELECT `id`,`uname`,`type`,`status`,`credit`,`last_login`,`created` FROM `users` WHERE `type` = '1' AND `status` >= '0' ORDER BY `created` DESC LIMIT $page , 50 ";
	  $sql = "SELECT `id`,`uname`,`type`,`status`,`credit`,`last_login`,`created` FROM `users` WHERE `type` = '1' ORDER BY `created` DESC LIMIT $page , 50 ";
      break;
  }
}



$res = mysqli_query($db, $sql);
if ($res) {
    $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
    echo json_encode($rows);
} else {
    echo $sql;
}

mysqli_close($db);
?>
