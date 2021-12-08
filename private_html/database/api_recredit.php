<?php
require 'connection.php';
$token = isset($_GET['token']) ? $_GET['token'] : '';
$u_id  = mysqli_real_escape_string($db, $token);

if ($u_id == '') {
    exit;
}
$sql      = "SELECT `credit` FROM `users` WHERE `token` = '$u_id'";
$result   = mysqli_query($db, $sql);
$rowcount = mysqli_num_rows($result);
if ($rowcount == 1) {
    $udata = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if ($udata['credit'] <= 0) {
        echo '0';
        exit();
    }
    $credit = $udata['credit'] - 1;
    $sql    = "UPDATE `users` SET `credit` = '$credit' WHERE `token` = '$u_id'";
    $result = mysqli_query($db, $sql);
    if ($result) {
        echo $credit;
    } else {
        echo '0';
        //echo mysqli_error($result);
    }
} else {
    echo '0';
    exit;
}
mysqli_close($db);
?>