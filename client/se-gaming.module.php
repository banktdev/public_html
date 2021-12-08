<?php

$mysql_host = "localhost";
$mysql_username = "root";
$mysql_password = "";
$mysql_database = "api";
$baccarat_table = "se_baccarat";

$api_keys = array(
	"GET" => array(
		123123
	)
);
//print_r($api_keys);

if (!isset($version)) {
	$version = 1;
}

if ($version === 1) {
	if (isset($argv[0])) {
		if (!preg_match("/^(?:[0-9]+,?)+$/", $argv[0])) {
			$type = strtolower($argv[0]);
			array_shift($argv);
		} else {
			$type = "baccarat";
		}
	} else {
		$type = "baccarat";
	}
	if ($type === "baccarat") {
		if ($method === "GET") {
			
				
					
						$mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password);
						$mysqli->select_db($mysql_database);
						$query = $mysqli->query("SELECT `timestamp` FROM `".$baccarat_table."` WHERE `timestamp` >= ".(time() - 60)." LIMIT 1;");
						if ($query->num_rows > 0) {
							if (isset($argv[0]) && preg_match("/^(?:[0-9]+,?)+$/", $argv[0], $room_ids)) {
								$room_ids = array_filter(explode(",", $room_ids[0]));
								$query = $mysqli->query("SELECT `room_id`, `room_name`, `dealer_name`, `records`, `cards`, `remaining`, `status` FROM `".$baccarat_table."` WHERE `timestamp` >= ".(time() - 3600)." AND `room_id` IN (".implode(", ", $room_ids).");");
								$mysqli->close();
								$data = array();
								if ($query->num_rows > 0) {
									while ($fetch = $query->fetch_assoc()) {
										$fetch["room_id"] = (int) $fetch["room_id"];
										$fetch["remaining"] = (int) $fetch["remaining"] - time();
										if ($fetch["remaining"] < 0) $fetch["remaining"] = 0;
										$data[] = $fetch;
									}
								}
								$query->free();
							} elseif (isset($argv[0])) {
								$mysqli->close();
								$query->free();
								$data = null;
							} else {
								$query = $mysqli->query("SELECT `room_id`, `room_name`, `dealer_name`, `records`, `cards`, `remaining`, `status` FROM `".$baccarat_table."` WHERE `timestamp` >= ".(time() - 3600).";");
								$mysqli->close();
								$data = array();
								//echo "SELECT `room_id`, `room_name`, `dealer_name`, `records`, `cards`, `remaining`, `status` FROM `".$baccarat_table."` WHERE `timestamp` >= ".(time() - 3600).";";
								if ($query->num_rows > 0) {
									while ($fetch = $query->fetch_assoc()) {
										$fetch["room_id"] = (int) $fetch["room_id"];
										$fetch["remaining"] = (int) $fetch["remaining"] - time();
										if ($fetch["remaining"] < 0) $fetch["remaining"] = 0;
										$data[] = $fetch;
									}
								}
								$query->free();
							}
							$response = array(
								"status" => "200",
								"data" => $data
							);
						} else {
							$mysqli->close();
							$query->free();
							$response = array(
								"status" => "503",
								"error" => "ServiceUnavailableException",
								"message" => "Service Currently Unavailable."
							);
						}
					
				
			
		} else {
			$response = array(
				"status" => "405",
				"error" => "MethodNotAllowedException",
				"message" => "Method Not Allowed."
			);
		}
	} else {
		$response = array(
			"status" => "401",
			"error" => "InvalidModuleTypeException",
			"message" => "Invalid Module Type."
		);
	}
} else {
	$response = array(
		"status" => "401",
		"error" => "InvalidApiVersionException",
		"message" => "Invalid API Version."
	);
}

?>