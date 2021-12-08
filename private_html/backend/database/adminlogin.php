<?php
	session_start();
	if ($_POST['action'] != 'Login') {
		header("location: ../login.php");
		exit();
	}
	require_once 'connection.php';
	$user   = mysqli_real_escape_string($db, $_POST['user']);
	$pass   = mysqli_real_escape_string($db, $_POST['pass']);
	$sql    = "  SELECT * FROM users WHERE pass = '$pass' AND uname = '$user' AND  type >= '90' ";
	$result = mysqli_query($db, $sql);
	$data   = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if (!$data) {
		echo '<script type="text/javascript">';
		echo 'alert("ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง");';
		echo 'window.history.back();';
		echo '</script>';
		exit();
	} else {
		if ($data["status"] != "0") {
			session_destroy();
			echo '<script type="text/javascript">';
			echo 'alert("ชื่อผู้ใช้ถูกระงับการใช้งาน");';
			echo 'window.history.back();';
			echo '</script>';
			exit();
		} else {
			$_SESSION["ID"]             = $data['id'];
			$_SESSION["Username"]       = $data['uname'];
			$_SESSION["Permit"]         = $data['type'];
			$_SESSION["CurrentSession"] = session_id();
			$token                      = session_id();
			$sql                        = "UPDATE `users` SET `last_login` = CURRENT_TIMESTAMP , `token` = '$token' WHERE `id` = " . $_SESSION["ID"];
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
			$json_log = json_encode($strlog, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
			$sql      = " UPDATE `users` SET `login_log` = '$json_log' WHERE `id` = " . $data['id'];
			$result   = mysqli_query($db, $sql);
			header("location: ../main.php");
		}
	}
	mysqli_close($db);
?>
