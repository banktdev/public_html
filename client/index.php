<?php

date_default_timezone_set("Asia/Bangkok");

header("Access-Control-Allow-Origin: *");
header("Content-type: application/json; charset=utf-8");
header("X-Powered-By: S32-REST-API/1.0");

$argv = explode("/", preg_replace("!/+!", "/", $_GET["argv"]));
if (end($argv) === "") array_pop($argv);

if (isset($argv[0]) && preg_match("/^[Vv]([0-9]{1,})$/", $argv[0], $version)) {
	$version = intval($version[1]);
	array_shift($argv);
} else {
	unset($version);
}

$method = isset($_REQUEST["method"]) ? strtoupper($_REQUEST["method"]) : $_SERVER["REQUEST_METHOD"];

$response = array(
	"status" => "500",
	"error" => "InternalServerErrorException",
	"message" => "Internal Server Error."
);

$modules_list = glob("*.module.php");
if (isset($argv[0])) {
	if (in_array(strtolower($argv[0]).".module.php", $modules_list)) {
		$module = strtolower($argv[0]);
		array_shift($argv);
		require($module.".module.php");
	} else {
		$response = array(
			"status" => "404",
			"error" => "ModuleNotFoundException",
			"message" => "The specified module could not be found."
		);
	}
} else {
	$response = array(
		"status" => "503",
		"error" => "ServiceDisabledException",
		"message" => "Module Listing is currently disabled."
	);
}

http_response_code(floor($response["status"]));
echo json_encode($response);

?>