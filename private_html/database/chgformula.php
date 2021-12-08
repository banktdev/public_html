<?php
  session_start();
  if( !isset($_SESSION["ID"])  ) {
    exit();
  }
  // {
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
  $u_id = $_SESSION['ID'];
  $type = mysqli_real_escape_string($db,$_GET['type']);

  if($type < 0 || $type > 10) {
    exit();
  }

  $sql = " UPDATE users SET fortype = '$type' WHERE id = '$u_id'";
  $result = mysqli_query($db, $sql);
  if ($result) {
    $_SESSION["FormulaType"] = $type;
    $sql = "SELECT `data` FROM `formula` WHERE `type` = ".$_SESSION["FormulaType"];
    $result = mysqli_query($db, $sql);
    $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
	$_SESSION["formula"] = json_encode($rows);
  } else {
    echo mysqli_error($result);
  }
  mysqli_close($db);

?>
<script type="text/javascript">
	sessionStorage.setItem('forType', <?php echo $type; ?> );
	x = JSON.stringify( <?php echo json_encode($rows); ?> );
	sessionStorage.setItem('formula',x);
	window.location.href = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
