<?php
session_start();
if ((isset($_SESSION['ID'])) && (isset($_SESSION['Session']))) {
    require 'connection.php';
    $u_id      = $_SESSION['ID'];
    $sessionID = $_SESSION["Session"];
    $sql       = " SELECT * FROM `users` WHERE `token` = '$sessionID' AND `id` = '$u_id' AND `type` = '1' AND `status` = '0'";
    $result    = mysqli_query($db, $sql);
    $data      = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if (mysqli_num_rows($result) == 1) {
        $_SESSION["Username"]    = $data['uname'];
        $_SESSION["FormulaType"] = $data['fortype'];
        $_SESSION["Session"]     = $data['token'];
        $_SESSION["Credit"]      = $data['credit'];
        mysqli_close($db);
    } else {
        session_destroy();
        echo '<script type="text/javascript">';
        echo 'sessionStorage.clear();';
        echo '</script>';
        header("location: login");
    }
} else {
    session_destroy();
    echo '<script type="text/javascript">';
    echo 'sessionStorage.clear();';
    echo '</script>';
    header("location: login");
}
?>