<?php
	session_start();
	if ($_POST['action'] != 'Login') {
		header("location: ../login?no_login");
		exit();
	}
	require 'connection.php';
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
	$user   = mysqli_real_escape_string($db, $_POST['user']);
	$pass   = mysqli_real_escape_string($db, $_POST['pass']);
	$sql    = "  SELECT * FROM users WHERE pass = '$pass' AND uname = '$user' AND  type = '1' ";
	$result = mysqli_query($db, $sql);
	$data   = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if (!$data) {
		session_destroy();
		echo "1";
		exit();
	} else {
		if ($data["status"] != "0") {
			session_destroy();
			echo "2";
			exit();
		} else {
			$_SESSION["ID"]          = $data['id'];
			$_SESSION["Username"]    = $data['uname'];
			$_SESSION["Name"]        = $data['fname'];
			$_SESSION["Credit"]      = $data['credit'];
			// $_SESSION["Permit"] = $data['type'];
			$_SESSION["FormulaType"] = $data['fortype'];
			$rand_num                = (rand(10000000, 99999999));
			$token                   = md5($rand_num);
			$_SESSION["Session"]     = $token;
			$rows['result']          = 'success';
			$rows['sCode']           = $token;
			$rows['token']           = $token;
			$rows['Credit']          = $data['credit'];
			$rows['User']            = $data['uname'];
			$rows['fortype']         = $data['fortype'];
			$ip                      = get_client_ip();
			$sql                     = "UPDATE `users` SET `last_login` = CURRENT_TIMESTAMP , `token` = '$token' , `ip` = '$ip' WHERE `id` = " . $_SESSION["ID"];
			mysqli_query($db, $sql);
			if ($data['login_log'] != "") {
				$strlog = json_decode($data['login_log'], true);
				if (count($strlog) >= 20) {
					array_pop($strlog);
				}
			} else {
				$strlog = [];
			}
			$date = date('Y-m-d G:i:s');
			array_unshift($strlog, $date);
			$json_log            = json_encode($strlog, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
			$sql                 = " UPDATE `users` SET `login_log` = '$json_log' WHERE `id` = " . $data['id'];
			$result              = mysqli_query($db, $sql);
			$sql                 = "SELECT `data` FROM `formula` WHERE `type` = " . $_SESSION["FormulaType"];
			$result              = mysqli_query($db, $sql);
			$rows['data']        = mysqli_fetch_all($result, MYSQLI_ASSOC);
			$_SESSION["formula"] = json_encode($rows['data']);
			echo json_encode($rows);
		}
	}
	mysqli_close($db);
	//   }
	//   session_destroy();
?>

