<?php 
require 'session.php';
require "../../database/TrueWallet.class.php";



if (isset($_GET["action"])){   
	$action = $_GET["action"];
    if($action == "get_otp"){
	    $username = $_POST["username"];
	    $password = $_POST["password"];
	    $tw = new TrueWallet($username, $password);
        $otp = $tw->RequestLoginOTP(); 
	    if($otp["code"] == "200"){
		    $res = array(
		        "code"          => "success",
	            "mobile_number" => $otp["data"]["mobile_number"],
		        "otp_reference" => $otp["data"]["otp_reference"]		
	        );	
	    }else{
		    $res = array("code" => "error",$otp); 
	    }
		die(json_encode($res,1));
    }
	
	if($action == "confirm_otp"){
		$username      = $_POST["username"];
	    $password      = $_POST["password"];
		$mobile_number = $_POST["mobile_number"];
	    $otp_reference = $_POST["otp_reference"];
	    $otp           = $_POST["otp"];
		
        $tw = new TrueWallet($username, $password); 		
        $confirm_otp = $tw->SubmitLoginOTP($otp,$mobile_number,$otp_reference);
        if($confirm_otp["code"] == "200"){
		    $res = array(
		        "code" => "success"
	            /*"access_token" => $confirm_otp["data"]["access_token"],
		        "reference_token" => $confirm_otp["data"]["reference_token"]*/		
	        );
			require 'connection.php';

			$sql1 = "UPDATE `tw_settings` SET `value` = '{$confirm_otp["data"]["access_token"]}' WHERE `name` = 'token_access'";
		    mysqli_query($db, $sql1);
			
		    $sql2 = "UPDATE `tw_settings` SET `value` = '{$confirm_otp["data"]["reference_token"]}' WHERE `name` = 'reference_token'";
		    mysqli_query($db, $sql2);
			
			$sql3 = "UPDATE `tw_settings` SET `value` = '{$mobile_number}' WHERE `name` = 'mobilephone'";
		    mysqli_query($db, $sql3);
			
			$sql4 = "UPDATE `tw_settings` SET `value` = '{$username}' WHERE `name` = 'username'";
		    mysqli_query($db, $sql4);
			
			$sql5 = "UPDATE `tw_settings` SET `value` = '{$password}' WHERE `name` = 'password'";
		    mysqli_query($db, $sql5);
	    }else{
		    $res = array("code" => "error",$confirm_otp); 
	    }
        die(json_encode($res,1));		
	}
}else{
	header("HTTP/1.0 404 Not Found");
}


?>