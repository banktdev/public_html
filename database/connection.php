<?php

    $servername = "localhost";
    $servname = "root";
    $servpass = "";
    $serv_db = "net1_slot";
    $db = mysqli_connect($servername, $servname, $servpass, $serv_db);
    mysqli_set_charset($db, 'utf8');


	date_default_timezone_set("Asia/Bangkok");
 ?>
