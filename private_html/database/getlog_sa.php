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
		    	$url = "sa_empty.php";
		    } else {
		    	$url = "http://103.141.69.106/sa/joe.php?tab=sagame";
		    }
		}else{
		    	$url = "https://botz.in.th/satest/database/se_empty.php";
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

	/*session_start();
    $response = null;
	require_once 'connection.php';
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {	    
	    if(!empty($_SESSION['Session'])){
		    $user = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
		    $u_id  = $user;
		    $sql      = "SELECT `credit` FROM `users` WHERE `uname` = '$u_id'";
		    $result   = mysqli_query($db, $sql);
		    $rowcount = mysqli_num_rows($result);
		    if ($rowcount == 1) {
		        $udata = mysqli_fetch_array($result, MYSQLI_ASSOC);
		        if ($udata['credit'] != 0) {
				    $curl = curl_init();
				    curl_setopt_array($curl, array(
					    CURLOPT_URL            => "https://hackcasinovip.com/api/sa/sa",
					    CURLOPT_RETURNTRANSFER => true,
					    CURLOPT_MAXREDIRS      => 10,
					    CURLOPT_TIMEOUT        => 30,
					    CURLOPT_FOLLOWLOCATION => true,
					    CURLOPT_SSL_VERIFYPEER => false,
					    CURLOPT_HTTPHEADER     => array(
						    "X-Licenses-ID: d3d9446802a44259755d38e6d163e820",
						    "X-Secret-Key: 494f37a5b59e2d0cbcd0e36f512189e32a8265429cf7c1aaa662026fe816bb34",
					    ),
				    ));
				    $response = curl_exec($curl);
		        }
		    }else{
		        $response = "";
		    }		
	    }else{
		    header('Location: ../index.php');
	    }
	    echo $response; 
	}else{
		header('Location: ../index.php');
	}
	die();*/

?>