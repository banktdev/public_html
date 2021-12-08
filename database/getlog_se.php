<?php
	session_start();
	require_once 'connection.php';
	if(!empty($_SESSION['Session'])){
		$user = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
		$u_id  = $user;
		$sql      = "SELECT `credit` FROM `users` WHERE `uname` = '$u_id'";
		$result   = mysqli_query($db, $sql);
		$rowcount = mysqli_num_rows($result);
		if ($rowcount == 1) {
		    $udata = mysqli_fetch_array($result, MYSQLI_ASSOC);
		    if ($udata['credit'] <= 0) {
		    	$url = "se_empty.php";
		    } else {
		    	$url = "http://27.254.173.127/API/sexy/client/se-gaming";
		    }
		}else{
		    	$url = "https://127.0.0.1/database/se_empty.php";
		}
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		));
		$response = curl_exec($curl);
		curl_close($curl);
	}else{
		header('Location: ../index.php');
	}

	echo $response;
?>