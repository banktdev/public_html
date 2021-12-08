<?php
	header('Content-Type: application/json');
	
	class Sexy{
		private $username =  'ufzka2123546487';
		private $password = 'aa123123';
		public function Curl($method, $url, $header, $data, $cookie)
		{
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36');
			//curl_setopt($ch, CURLOPT_USERAGENT, 'okhttp/3.8.0');
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
			curl_setopt($ch, CURLOPT_ENCODING,  'gzip');
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
			//$start_time = microtime(TRUE);
			//end_time = microtime(TRUE);
			//echo $end_time - $start_time ."\n";
			if ($data) {
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			}
			if ($cookie) {
				curl_setopt($ch, CURLOPT_COOKIESESSION, true);
				curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
				curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
			}
			return curl_exec($ch);
		}
		private function DOMXPath($html, $qry)
		{
			$doc = new DOMDocument();
			@$doc->loadHTML($html);
			$xpath = new DOMXPath($doc);
			$nodeList = $xpath->query($qry);
			
			return $nodeList;
		}
		public function Cookie($name){
			$cookie = file_get_contents($name);
			$line = explode("\n",$cookie);
			$cookie = '';
			foreach ($line as $key=>$value){
				$tokens = explode("\t",$value);
				if( count($tokens) == 7){
					
					$tokens = array_map(null,$tokens);
					//print_r($tokens);
					$cookie .= trim($tokens[5])."=".trim($tokens[6]).";";
				}									
			}
			return $cookie;
		}
		private function code($cookie)
		{
			$url = "https://ufa7777.com/Default8.aspx?lang=EN-GB";
			$header = array(
            "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
            "cache-control: no-cache",
            "sec-fetch-dest: document",
            "sec-fetch-mode: navigate",
            "sec-fetch-site: none",
            "sec-fetch-user: ?1",
            "upgrade-insecure-requests: 1",
            "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36"
			);
			$res =  $this->Curl('GET', $url, $header, false, $cookie);
			$__VIEWSTATE = $this->DOMXPath($res, "//input[@name='__VIEWSTATE']/@value");
			$__VIEWSTATEGENERATOR = $this->DOMXPath($res, "//input[@name='__VIEWSTATEGENERATOR']/@value");
			$key  = $__VIEWSTATE[0]->nodeValue;
			$key1 = $__VIEWSTATEGENERATOR[0]->nodeValue;
			return ['key' => urlencode($key), 'key1' => $key1];
		}
		
		public function genarate_cookie($name)
		{
			$cookie_name = $name;
			//file_put_contents(dirname(__FILE__).'/'.$cookie_name, "");
			file_put_contents($cookie_name, "");
			$this->cookie = realpath($cookie_name);
			return $this->cookie;
		}
		public function Login(){
			$username = $this->username;
			$password =  $this->password;
			$cookies = $this->genarate_cookie('cookie.txt');
			$code = $this->code($cookies);
			$cookie = $this->Cookie($cookies);
			$url = "https://ufa7777.com/Default8.aspx?lang=EN-GB";
			$header = array(
            "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
            "cache-control: no-cache",
            "sec-fetch-dest: document",
            "sec-fetch-mode: navigate",
            "sec-fetch-site: none",
            "sec-fetch-user: ?1",
            "upgrade-insecure-requests: 1",
            "Cookie: ".$cookie,
            "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36"
			);
			//print_r($header);
			$data = '__EVENTARGUMENT=&__EVENTTARGET=btnLogin&__VIEWSTATE=' . $code['key'] . '&__VIEWSTATEGENERATOR=' . $code['key1'] . '&lstLang=Default8.aspx?lang=EN-GB&password=' . $password . '&txtUserName=' . $username;
			$cookiess = $this->genarate_cookie('cookies.txt');
			$res =  $this->Curl('POST', $url, $header, ($data), $cookiess);
			
			
		}
		private function Check_Ufa($cookie){
			$url = "https://ufa7777.com/Main.aspx?lang=EN-GB";
			$header = array(
            "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
            "cache-control: no-cache",
            "sec-fetch-dest: document",
            "sec-fetch-mode: navigate",
            "sec-fetch-site: none",
            "sec-fetch-user: ?1",
            "upgrade-insecure-requests: 1",
			"Cookie: ".$cookie,
            "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36"
			);
			$res =  $this->Curl('GET', $url, $header, false, $cookie);
			if(strpos($res,'ufa7777') == false){
				return true;
				}else{
				return false;
			}
			
			
		}
		private function Check_Game($cookie){
			$url = "https://bpweb.bikimex.net/player/gamehall.jsp?dm=1&title=1&sgt=1";
			$header = array(
            "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
            "cache-control: no-cache",
            "sec-fetch-dest: document",
            "sec-fetch-mode: navigate",
            "sec-fetch-site: none",
            "sec-fetch-user: ?1",
            "upgrade-insecure-requests: 1",
			"Cookie: ".$cookie,
            "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36"
			);
			$res =  $this->Curl('GET', $url, $header, false, $cookie);
			if(strpos($res,'Auto Logout Relay') == true){
				return false;
				}else{
				return true;
			}
			
			
		}
		public function GetResult(){
			
			$cookie = $this->Cookie('cookies.txt');
			$check = $this->Check_Ufa($cookie);
			if($check == true){
				
				$header = array(
				"accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
				"cache-control: no-cache",
				"sec-fetch-dest: document",
				"sec-fetch-mode: navigate",
				"sec-fetch-site: none",
				"sec-fetch-user: ?1",
				"upgrade-insecure-requests: 1",
				"Cookie: ".$cookie,
				"user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36"
				);
				$res =  $this->Curl('GET', 'https://ufa7777.com/Header8.aspx', $header,false, false);
				
				if(strpos($res,$this->username) == true){
					if (preg_match("/'(https?:\/\/(?:.*?))\/txAllGame\.aspx\?(.*?)'/", $res, $matches)) {
						$data["api_domain"] = $matches[1];
						$data["api_query"] = $matches[2];
						
					}
					
					//$CheckGame = Check_Game()
					$url = $data["api_domain"]."/api.aspx?".$data["api_query"]."&game=39-101&action=login";
					$response = $this->Curl('GET',  $url, $header,false, false);
					$result = json_decode(json_encode(@simplexml_load_string($response, "SimpleXMLElement", LIBXML_NOCDATA)), true);
					$data["validate_url"] = $result["result"];
					$response = $this->Curl('GET',  $data["validate_url"], $header,false, false);
					$data = explode('?',$data["validate_url"]);								
					$response = $this->Curl('POST',  'https://www.22onlinegames.com/player/login/apiLogin', $header,$data[1], false);
					$ex1 = explode('goTo":"', $response);
					$ex1 = explode('","', $ex1[1]);
					
					$sexycookie = $this->genarate_cookie('sexycookie.txt');
					$response = $this->Curl('GET',  'https://bpweb.bikimex.net' . $ex1[0], $header,false, $sexycookie);
					
					
					
					
					
					
					}else{
					$this->Login();
					return $this->GetResult();
				}
				
				}else{
				$this->Login();
				return $this->GetResult();
			}
			
		}
		public function Api(){
			$time_start = microtime(true); 
			global $db, $baccarat_table, $cookie, $table_list, $previous_record, $event_delay_time;
			$include_maintenance = true; 
			$sexycookie = $this->Cookie('sexycookie.txt');				
			$header = array(
			"accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
			"cache-control: no-cache",
			"sec-fetch-dest: document",
			"sec-fetch-mode: navigate",
			"sec-fetch-site: none",
			"sec-fetch-user: ?1",
			"upgrade-insecure-requests: 1",
			"Cookie: ".$sexycookie,
			"user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36"
			);
			
			$response = $this->Curl('POST',  'https://bpweb.bikimex.net/player/query/queryGameHallTableListInfo', $header,'domainType=1', false);
			$room_list = $this->Curl('POST','https://bpweb.bikimex.net/player/query/queryTableListInfoV2',$header,'domainType=1',false);
			$result = json_decode($room_list, true);
			$table_list = array();
			$tableLists = array();
			foreach ($result["message"] as $table) {
				if ($table["tableSupportGame"] !== 0 || ($include_maintenance ? $table["dealerID"] === null : $table["maintenance"])) continue;
				
				$table_list[$table["tableID"]] = array(
				"room_id" => $table["tableID"],
				"room_name" => (string) $table["tableID"],
				"dealer_name" => explode("/", $table["dealerID"])[0],
				//"dealer_img" => 'https://bpweb.bikimex.net/images/player/dealers/1/'.  strtoupper( explode("/", $table["dealerID"])[0]).'.jpg'
				);
				$tableLists[] = array(
				"tableID" => $table["tableID"],
				"domainType" => "1",
				"stampTime" => 0
				);
				/*$this->Curl('GET','https://bpweb.bikimex.net/player/singleTable4.jsp?dm=1&t='.$table["tableID"].'&title=1',$header,false,false);
				$card = $this->Curl('POST','https://bpweb.bikimex.net/player/query/queryDealerEventV2',$header,'domainType=1&queryTableID='.$table["tableID"].'&dealerEventStampTime=0',false);
				$result = json_decode($card,true);
				$table = json_decode($result['message'],true);
				//print_r($result);
				@$table_list[@$table["tableID"]]["cards"] = str_replace("255", "x", implode("|", @$table["tableCards"]));
				switch (@$table["eventType"]) {
					case "GP_INIT":
					case "GP_GAME_SUMMARY":
					$table_list[$table["tableID"]]["status"] = "idle";
					break;
					case "GP_NEW_GAME_START":
					case "GP_VOID_ROUND":
					case "GP_BET_INSURANCE":
					$table_list[$table["tableID"]]["status"] = "waiting";
					break;
					case "GP_BET_TIME":
					case "GP_NEXT_TARGET":
					case "GP_ONE_CARD_DRAWN":
					$table_list[$table["tableID"]]["status"] = "dealing";
					break;
					case "GP_CHANGE_STATE":
					case "GP_WINNER":
					$table_list[$table["tableID"]]["status"] = $table["shuffle"] === 1 ? "shuffling" : ($table["winner"] === 1 ? "banker_win" : ($table["winner"] === 2 ? "player_win" : ($table["winner"] === 3 ? "tie_win" : "dealing")));
					if ($table["shuffle"] == 1) $table_list[$table["tableID"]]["cards"] = "x|x|x|x|x|x";
					break;
					case "GP_DISCONNECT":
					$table_list[$table["tableID"]]["status"] = "rest";
					break;
					default:
					$table_list[@$table["tableID"]]["status"] = "dealing";
					break;
				}*/
				
			
			}
			$data = http_build_query(['tableLists'=>json_encode($tableLists)]);
			$res = $this->Curl('POST','https://bpweb.bikimex.net/player/query/queryActiveTableResultTrend',$header,$data,false);
			$result = json_decode($res, true);
			$table_record = array();
			foreach ($result["message"]["countdown"] as $table) {
				if (!isset($table["tableID"]) || !isset($table_list[$table["tableID"]])) continue;
				$table_record[$table["tableID"]] = array(
				"room_id" => $table["tableID"],
				"room_name" => $table_list[$table["tableID"]]["room_name"],
				"dealer_name" => $table_list[$table["tableID"]]["dealer_name"],
				//"dealer_img"=> $table_list[$table["tableID"]]["dealer_img"],
				"records" => "",
				//"cards" => isset($table_list[$table["tableID"]]["cards"]) ? $table_list[$table["tableID"]]["cards"] : "x|x|x|x|x|x",
				//"remaining" => 0,
				//"status" => isset($table_list[$table["tableID"]]["status"]) ? $table_list[$table["tableID"]]["status"] : "unknown",
				);
				if ($table_record[$table["tableID"]]["status"] === "waiting"  && isset($table["betTime"]) && isset($table["roundStartTime"])) {
					$expected_countdown = $table["roundStartTime"] + $table["betTime"] + $event_delay_time;
					if ($result["timestamp"] < $expected_countdown) {
						$table_record[$table["tableID"]]["remaining"] = floor($expected_countdown / 1000);
					}
				}
			}
			foreach ($result["message"]["bigRoad"] as $table) {
				if (!isset($table["tableID"]) || !isset($table_record[$table["tableID"]])) continue;
				if (isset($table["mainRoads"]) && is_array($table["mainRoads"]) && count($table["mainRoads"]) > 0) {
					foreach (array_reverse($table["mainRoads"]) as $pos) {
						$add_record = "";
						$mainroad = $pos['road'];
						if ($mainroad >=0 and $mainroad <=7) {
								$add_record = "B";
								//break;
								} elseif ($mainroad >=8 and $mainroad <=15) {
								$add_record = "P";
								//break;
							}
						
						$add_record = $pos["showX"] === 0 && $pos["showY"] === 0 ? str_repeat("T", $pos["count"]).$add_record : $add_record.str_repeat("T", $pos["count"]);
						$table_record[$table["tableID"]]["records"] .= $add_record;
					}
				}
			}
			
			if(strpos($response,'Auto Logout Relay' )== true){
				$this->Login();
				$this->GetResult();
				return $this->Api();
				}else{
				print_r($table_record);
				echo 'Total execution time in seconds: ' . (microtime(true) - $time_start);

				return $table_record;
				
			}
			
		}
		
		
		
	}
	
	
?>