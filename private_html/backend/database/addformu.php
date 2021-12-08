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

  $strf   =   mysqli_real_escape_string($db,$_POST['strf']);
  $typef  =   mysqli_real_escape_string($db,$_POST['typef']);
  $dataf = substr($strf, 0, -1);

  $sql = " SELECT `data` FROM `formula` WHERE `data` LIKE '$dataf%' AND `type` = '$typef' ";
  $result = mysqli_query($db,$sql);
  $row = mysqli_num_rows($result);
  if($row != 0) {
    echo 'Added';
    exit();
  }

  $sql = "  INSERT INTO `formula`(`type`, `data`)
            VALUES ('$typef','$strf') ";
  $result = mysqli_query($db,$sql);
  if($result){
    $last_id = $db->insert_id;
  } else {
    echo mysqli_error($result);
    exit();
  }

  mysqli_close($db);
?>

<tr style="background-color: rgba(255,255,255,0.3);vertical-align: middle;">
  <td align="center" style="background-color: SaddleBrown;">&nbsp<?php echo $last_id; ?>&nbsp</td>
  <td>
    <?php
      $cha = str_split( $strf );
      for($i=0 ; $i < (sizeof($cha)-1) ; $i++)
      {
        switch ( $cha[$i] ) {
          case 'b': echo '&nbsp<img src="resource\images\symbol_b_small.png">&nbsp' ; break;
          case 'p': echo '&nbsp<img src="resource\images\symbol_p_small.png">&nbsp' ; break;
          case 't': echo '&nbsp<img src="resource\images\symbol_t_small.png">&nbsp' ; break;
          default: break;
        }
      }
      switch ( $cha[sizeof($cha)-1] ) {
        case 'b': echo '&nbsp&nbsp = &nbsp&nbsp&nbsp<img src="resource\images\symbol_b_small.png">' ; break;
        case 'p': echo '&nbsp&nbsp = &nbsp&nbsp&nbsp<img src="resource\images\symbol_p_small.png">' ; break;
        case 't': echo '&nbsp&nbsp = &nbsp&nbsp&nbsp<img src="resource\images\symbol_t_small.png">' ; break;
        default: break;
      }
    ?>
  </td>
  <td align="right" style="padding-right: 2%;"> <a href="#" onclick="deletefor(event,this,<?php echo $last_id; ?>)"><i class="fas fa-trash-alt"></i></a> </td>
</tr>
