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
	
	$transaction   = $_POST['tid'];
	
	$sql    = "SELECT transaction FROM `tw_log` WHERE transaction = '$transaction'";
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
	require 'TrueWallet.class.php';	

	$tw         = new TrueWallet($config["token_access"]);
	$balance    = $tw->GetBalance();
    
	if ($balance['code'] == "UPC-200") {
    	$login1 = $tw->Login();
	} else {
    	$tw    = new TrueWallet($config["username"],$config["password"],$config["reference_token"]);
    	$login = $tw->Login();   		
    	$token_access  = $login['data']['access_token'];		
		$sql = "UPDATE `tw_settings` SET `value` = '{$token_access}' WHERE `name` = 'token_access'";
		mysqli_query($db, $sql);
	}
		
	$transactions = $tw->getTransaction(50)["data"]["activities"];
	foreach ($transactions as $reports) {
    	if ($reports['original_action'] == 'creditor') {
        	$txData                = $tw->GetTransactionReport($reports['report_id']);
        	$tx['id']              = $txData['data']['section4']['column2']['cell1']['value'];
        	$tx['message']         = $txData['data']['personal_message']['value'];
        	$tx['fee']             = $txData['data']['section3']['column2']['cell1']['value'];
        	$tx['date']            = $txData['data']['section4']['column1']['cell1']['value'];
        	$tx['sender']['name']  = $txData['data']['section2']['column1']['cell2']['value'];
        	$tx['sender']['phone'] = $txData['data']['ref1'];
        	$tx['amount']     = $txData['data']['section3']['column1']['cell1']['value'];
        	$tx['amount']     = str_replace(',', '', $tx['amount']);
        	if($tx['id'] == $transaction){
			break;
		    }
        }
    }
	if ($tx['id'] == $transaction) {

        if ($tx['amount'] >= $config["min"]) {
            
			$credit =  $tx['amount'] * $config["rate"];
			
			$sql = "INSERT INTO `tw_log` (`transaction`, `sender_name`, `sender_phone`, `sender_message`, `sender_date`, `sender_amount`, `u_rate`, `u_credit`, `uid`, `created_at`) VALUES ('{$tx['id']}', '{$tx['sender']['name']}', '{$tx['sender']['phone']}', '{$tx['message']}', '{$tx['date']}', '{$tx['amount']}', '{$config["rate"]}', '{$credit}', '{$u_id}', NOW())";
			$result   = mysqli_query($db, $sql); 
			
			
			$sql      = "UPDATE `users` SET `credit` = credit+{$credit} WHERE `id` = {$u_id};";
		    $result   = mysqli_query($db, $sql);
			
			$returnValue['result'] = true;
			$returnValue['str']    = $credit;
			$_SESSION['Credit']    = $credit;			
            
        }else{
			$returnValue['result'] = false;
		    $returnValue['str']    = "เติมเงินขั้นต่ำ " . $config["min"] . "บาท";
		}
		
    }else{		
		$returnValue['result'] = false;
		$returnValue['str']    = "ไม่พบรายการโอนเงิน กรุณาใส่ข้อมูลให้ถูกต้อง";
	}
		
	echo json_encode($returnValue);
	mysqli_close($db);
?>
