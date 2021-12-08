<?php
	session_start();
	if ((isset($_SESSION['ID'])) && (isset($_SESSION['Session']))) {
		require 'connection.php';
		$sessionID = $_SESSION["Session"];
		$sql       = " SELECT `token` FROM `users` WHERE `token` = '$sessionID' AND `type` = '1' AND `status` = '0' AND `id` = " . $_SESSION['ID'];
		$result    = mysqli_query($db, $sql);
		$data      = mysqli_fetch_array($result, MYSQLI_ASSOC);
		if (!$data) {
			$returnValue['result'] = false;
			$returnValue['str']    = "เข้าสู่ระบบอีกครั้ง! ";
			echo json_encode($returnValue);
			session_destroy();
			exit;
		}
	} else {
		session_destroy();
		echo '<script type="text/javascript">';
		echo 'sessionStorage.clear();';
		echo '</script>';
		header("location: login");
	}
	$u_id   = $_SESSION['ID'];
	$code   = mysqli_real_escape_string($db, $_POST['recode']);
	$uname  = $_SESSION['Username'];
	$sql    = " SELECT `code_credit`,`credit`,`user` FROM `code` WHERE `code_credit` = '$code' ";
	$result = mysqli_query($db, $sql);
	$data   = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if (!$data) {
		$returnValue['result'] = false;
		$returnValue['str']    = "รหัสเติมเงินไม่ถูกต้อง!";
	} else if ($data['user'] != '0') {
		$returnValue['result'] = false;
		$returnValue['str']    = "รหัสเติมเงินนี้ ถูกใช้งานไปแล้ว";
	} else {
		$sql    = " SELECT `credit`,`refill_log` FROM `users` WHERE `id` = '$u_id'";
		$result = mysqli_query($db, $sql);
		$udata  = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$credit = $data['credit'] + $udata['credit'];
		$sql    = "UPDATE `code` SET `user` = '$uname' WHERE `code_credit` = '$code' ";
		mysqli_query($db, $sql);
		if ($udata['refill_log'] != "") {
			$strlog = json_decode($udata['refill_log'], true);
			if (count($strlog) >= 20) {
				array_pop($strlog);
			}
		} else {
			$strlog = [];
		}
		$datalog['credit'] = $data['credit'];
		$datalog['time']   = date('Y-m-d G:i:s');
		array_unshift($strlog, $datalog);
		$json_log = json_encode($strlog, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
		$sql      = " UPDATE `users` SET `refill_log` = '$json_log' WHERE `id` = '$u_id'";
		$result   = mysqli_query($db, $sql);
		$sql      = "UPDATE `users` SET `credit` = '$credit' WHERE `id` = '$u_id'";
		$result   = mysqli_query($db, $sql);
		if ($result) {
			$returnValue['result'] = true;
			$returnValue['str']    = $credit;
			$_SESSION['Credit']    = $credit;
		} else {
			$returnValue['result'] = false;
			$returnValue['str']    = mysqli_error($result);
		}
	}
	echo json_encode($returnValue);
	mysqli_close($db);
?>
