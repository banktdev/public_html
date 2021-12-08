<?php
require 'connection.php';
$u_id = isset($_GET['token']) ? $_GET['token'] : '';
if ($u_id == '') {
    exit;
}
$sql      = "SELECT `uname` FROM `users` WHERE `token` = '$u_id'";
$result   = mysqli_query($db, $sql);
$rowcount = mysqli_num_rows($result);
if ($rowcount == 1) {
    $udata = mysqli_fetch_array($result, MYSQLI_ASSOC);
    echo $udata['uname'];
} else {
    echo '0';
    exit;
}
mysqli_close($db);
?>