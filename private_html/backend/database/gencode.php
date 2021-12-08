<?php
	session_start();
	if (isset($_SESSION["ID"])) {
		require 'connection.php';
		$sessionID = session_id();
		$sql       = " SELECT `token` FROM `users` WHERE `token` = '$sessionID' AND `type` >= '90' AND `status` = '0' AND `id` = " . $_SESSION['ID'];
		$result    = mysqli_query($db, $sql);
		$data      = mysqli_fetch_array($result, MYSQLI_ASSOC);
		if (!$data) {
			session_destroy();
			echo "logout";
			exit();
		}
		// mysqli_close($db);
	} else {
		session_destroy();
		echo '<script type="text/javascript">';
		echo 'sessionStorage.clear();';
		echo '</script>';
		header("location: login.php");
		exit();
	}
	$credit = mysqli_real_escape_string($db, $_POST['credit']);
	$multi  = mysqli_real_escape_string($db, $_POST['multi']);
	$by     = $_SESSION['Username'];
	if (($multi < 1 || $multi > 1000) || $credit < 10) {
		echo '["กรอกข้อมูลไม่ถูกต้อง"]';
		mysqli_close($db);
		exit();
	}
	function get_client_ip()
	{
		$ip = '';
		if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
			$_SERVER['REMOTE_ADDR']    = $_SERVER["HTTP_CF_CONNECTING_IP"];
			$_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
		}
		$client  = @$_SERVER['HTTP_CLIENT_IP'];
		$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
		$remote  = $_SERVER['REMOTE_ADDR'];
		if (filter_var($client, FILTER_VALIDATE_IP)) {
			$ip = $client;
		} elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
			$ip = $forward;
		} else {
			$ip = $remote;
		}
		return $ip;
	}
	function randomString($length)
	{
		$str        = "";
		$characters = array_merge(range('A', 'Z'), range('0', '9'));
		$max        = count($characters) - 1;
		for ($i = 0; $i < $length; $i++) {
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}
		return $str;
	}
	$userIP = get_client_ip();
	for ($i = 0; $i < $multi; $i++) {
		do {
			$code[$i] = randomString(16);
			$sendcode = $code[$i];
			$sql      = " SELECT `code_credit` FROM `code` WHERE `code_credit` = '$sendcode'";
			$result   = mysqli_query($db, $sql);
			$data     = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$row      = mysqli_num_rows($result);
		} while ($row > 0);
		$sql    = " INSERT INTO `code`(`code_credit`, `credit`, `user` , `gen_by` , `gen_ip` ) VALUES ( '$sendcode','$credit','0','$by','$userIP') ";
		$result = mysqli_query($db, $sql);
	}
	mysqli_close($db);
	echo json_encode($code);
?>
