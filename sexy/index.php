<?php
	error_reporting(0);
	require_once('Sexy.php');
	require_once('MysqliDb.php');
	$api = new Sexy();
	
	$mysql_host = "localhost";
	$mysql_username = "root";
	$mysql_password = "";
	$mysql_database = "api";
	$baccarat_table = "se_baccarat";
	$db = new MysqliDb($mysql_host, $mysql_username, $mysql_password, $mysql_database);
	
		
		$previous_record;
		$table =  $api->Api();
		foreach ($table as $new_record) {
			if (isset($previous_record[$new_record["room_id"]]) && $previous_record[$new_record["room_id"]] === $new_record) continue;
			$new_record["timestamp"] = time();
			if ($db->where("room_id", $new_record["room_id"])->has($baccarat_table)) {
				$db->where("room_id", $new_record["room_id"])->update($baccarat_table, $new_record, 1);
				} else {
				$db->insert($baccarat_table, $new_record);
			}
		}
		
		
		
?>