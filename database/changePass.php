<?php
session_start();
if (!isset($_SESSION["ID"])) {
    exit();
}
require 'connection.php';
$sessionID = $_SESSION["Session"];
$u_id      = $_SESSION['ID'];
$sql       = " SELECT `pass`,`token` FROM `users` WHERE `token` = '$sessionID' AND `type` = '1' AND `status` = '0' AND `id` = '$u_id'";
$result    = mysqli_query($db, $sql);
$data      = mysqli_fetch_array($result, MYSQLI_ASSOC);
$oldpass   = mysqli_real_escape_string($db, $_POST['opass']);
if ($data['pass'] == $oldpass) {
    $newpass = mysqli_real_escape_string($db, $_POST['npass']);
    $sql     = " UPDATE `users` SET `pass` = '$newpass' WHERE `id` = '$u_id'";
    $result  = mysqli_query($db, $sql);
    if ($result) {
        echo "success";
    } else {
        echo mysqli_error($result);
    }
} else {
    echo "รหัสผ่านไม่ถูกต้อง!";
}
mysqli_close($db);
?>
