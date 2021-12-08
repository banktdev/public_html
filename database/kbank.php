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
		header("location: ../login.php");
	}
	
	$date   = $_POST['date'];
	$time   = $_POST['time'];
	$amount   = number_format($_POST['amount'],2);
	
	
	$sql    = "SELECT id FROM `kbank_log` WHERE bank_date = '$date' AND bank_time = '$time' AND bank_amount = '$amount'";
	$result = mysqli_query($db, $sql);
	$data   = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if (isset($data)) {	
		$returnValue['result'] = false;
		$returnValue['str']    = "ไม่พบรายการโอนเงิน กรุณาใส่ข้อมูลให้ถูกต้อง";
		echo json_encode($returnValue);
	    mysqli_close($db);
	    die();
	}
	
	///----------------------------------///
	
	$config = array();
    $twsql  = "SELECT * FROM tw_settings";
    $result = mysqli_query($db, $twsql);
    $twdata = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach($twdata AS $row) {
      $config[$row["name"]] = $row["value"];
    }
	
	
	
	
	
	$u_id   = $_SESSION['ID'];
	
	$uname  = $_SESSION['Username'];
	
	require_once("KasikornBank.class.php");
	$kbank = new KasikornBank($config["bank_user"], $config["bank_pass"] , "./kbank.cookie");
	if (!$kbank->CheckSession()) {
        $kbank->Login();
    }
	
	$transactions = $kbank->GetTodayStatement($config["bank_accno"]);
	
	$in_date = $date;
		
	
	$kb = array();
	
		
	foreach($transactions as $transaction) {
        if($transaction['Deposit (THB)'] > 0){
            $timestamp = strtotime($transaction['Date/Time']);
            $bank_date = date("Y-d-m", $timestamp);
            $bank_time = date("H:i", $timestamp);
            $bank_amount = $transaction['Deposit (THB)']; 
            //echo "BANK : " . $bank_date . " - " . $bank_time  . " - " . $bank_amount  . PHP_EOL;	
            if($in_date == $bank_date && $bank_time == $time && $bank_amount == $amount){
				$kb["DateTime"]  = $transaction['Date/Time'];
				$kb["Channel"]   = $transaction['Channel'];
				$kb["Details"]   = $transaction['Details'];
				$kb["Deposit"]   = $transaction['Deposit (THB)'];
				$kb["Type"]      = $transaction['Transaction Type'];			
                break;
            }   
        } 
    }
	
	
	
	$timestamp = strtotime($kb['DateTime']);
    $bank_date = date("Y-d-m", $timestamp);
    $bank_time = date("H:i", $timestamp);
	if($in_date == $bank_date && $bank_time == $time && $kb["Deposit"] == $amount){
		
		$sql    = "SELECT id FROM `kbank_log` WHERE bank_date = '$date' AND bank_time = '$time' AND bank_amount = '$amount' AND bank_chanel = '{$kb["Channel"]}' AND bank_type = '{$kb["Type"]}'";
	    $result = mysqli_query($db, $sql);
	    $data   = mysqli_fetch_array($result, MYSQLI_ASSOC);
	    if (isset($data)) {	
		    $returnValue['result'] = false;
		    $returnValue['str']    = "ไม่พบรายการโอนเงิน กรุณาใส่ข้อมูลให้ถูกต้อง";
		    echo json_encode($returnValue);
	        mysqli_close($db);
	        die();
	    }
		
		if ($kb['Deposit'] >= $config["bank_min"]) {
			$credit = floor ( $kb["Deposit"] * $config["bank_rate"] );
			$sql = "INSERT INTO `kbank_log` (`bank_account_number`, `bank_amount`, `bank_chanel`, `bank_date`, `bank_time`, `bank_type`, `uid`, `u_rate`, `u_credit`, `create_at`) VALUES ('{$config["bank_accno"]}', '{$kb["Deposit"]}', '{$kb["Channel"]}', '{$bank_date}', '{$bank_time}', '{$kb["Type"]}', '{$u_id}', '{$config["bank_rate"]}', '{$credit}', NOW())";
			$result   = mysqli_query($db, $sql);
			
			$sql      = "UPDATE `users` SET `credit` = credit+{$credit} WHERE `id` = {$u_id};";
		    $result   = mysqli_query($db, $sql);
			
			$returnValue['result'] = true;
			$returnValue['str']    = $credit;
			$_SESSION['Credit']    = $credit;	
			
		}else{
			$returnValue['result'] = false;
		    $returnValue['str']    = "เติมเงินขั้นต่ำ " . $config["bank_min"] . "บาท";
		}
	}else{		
		$returnValue['result'] = false;
		$returnValue['str']    = "ไม่พบรายการโอนเงิน กรุณาใส่ข้อมูลให้ถูกต้อง";
	}
     
		
	echo json_encode($returnValue);
	mysqli_close($db);
?>
