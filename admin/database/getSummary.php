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

$sql = "SELECT code.gen_by AS user ,  COUNT(code.gen_by) AS count , SUM(code.credit) AS sumCredit , users.type AS type
        FROM `code` INNER JOIN `users` ON code.gen_by = users.uname
        GROUP BY code.gen_by ORDER BY sumCredit DESC";
$result = mysqli_query($db, $sql);
if ($result) {
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($data);
} else {
    echo mysqil_error();
}

mysqli_close($db);

?>
