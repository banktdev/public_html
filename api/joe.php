<?php
//include $_SERVER['DOCUMENT_ROOT']."/database.php";
include("./database.php");

header("Content-Type: text/plain");

if ($_GET["tab"] == "sagame") {
    if (isset($_POST["dealer"])) {
	
        if (empty($_POST["Records"])) {
            $_POST["Records"] = "";
        }
        
        $stmt = $engine -> prepare("UPDATE sagame SET table_name = :joe, state = :state, dealer = :dealer, remain = :remain, img = :img,player1 = :player1, player2 = :player2, player3 = :player3,banker1 = :banker1, banker2 = :banker2, banker3 = :banker3 WHERE id = :id");
        $stmt->execute([':joe' => $_POST["table_name"], ':state' => $_POST["Records"] , ':dealer' => $_POST["dealer"] , ':player1' => $_POST["player1"] , ':player2' => $_POST["player2"] , ':player3' => $_POST["player3"] , ':banker1' => $_POST["banker1"] , ':banker2' => $_POST["banker2"] , ':banker3' => $_POST["banker3"] , ':img' => $_POST["image"] , ':remain' => $_POST["remain"] , ':id' => $_POST["id"]]);
    
    } else if (isset($_POST["delete"])) {
        $sql = 'DELETE FROM sagame';
        $stmt = $engine->prepare($sql);
        $stmt->execute();
    } else {
        
    $posts_array = [];
        $query = $engine->prepare("SELECT * FROM sagame");
        $execute = $query->execute();
        while ($data = $query->fetch()) {
           $post_data = [
                'room_id' => $data['id'],
                'room_name' => $data['table_name'],
                'dealer_name' => $data['dealer'],
                //'img' => $data['img'],
                'records' => $data['state'],
                'remaining' => $data['remain'],
                /*'player1' => $data['player1'],
                'player2' => $data['player2'],
                'player3' => $data['player3'],
                'banker1' => $data['banker1'],
                'banker2' => $data['banker2'],
                'banker3' => $data['banker3']*/
            ];
            $sss= ['status'=>"200",'data'=>$posts_array];
            array_push($posts_array, $post_data);
        }
        //echo json_encode($posts_array);
        
	echo json_encode($sss);
        
    }
} else if ($_GET["tab"] == "wmcasino") {

    if (isset($_POST["dealer"])) {

        if (empty($_POST["Records"])) {
            $_POST["Records"] = "";
        }
    
        $stmt = $engine -> prepare("UPDATE wmcasino SET dealer = :state, img = :dealer, remain = :remain, record = :record, timestamp = :timestamp,player1 = :player1, player2 = :player2, player3 = :player3,banker1 = :banker1, banker2 = :banker2, banker3 = :banker3 WHERE id = :id");
        $stmt->execute([':state' => $_POST["dealer"] , ':dealer' => $_POST["image"] , ':record' => $_POST["record"] , ':remain' => $_POST["remain"], ':banker1' => $_POST["banker1"] , ':banker2' => $_POST["banker2"] , ':banker3' => $_POST["banker3"]  , ':player1' => $_POST["player1"] , ':player2' => $_POST["player2"] , ':player3' => $_POST["player3"] , ':timestamp' => time() , ':id' => $_POST["id"]]);
    
    } else {
    
        $posts_array = [];
        $query = $engine->prepare("SELECT * FROM wmcasino");
        $execute = $query->execute();
        while ($data = $query->fetch()) {
        $post_data = [
                'room_id' => $data['id'],
                'dealer_name' => $data['dealer'],
                //'img' => $data['img'],
                'records' => $data['record'],
                'remaining' => $data['remain'],
                /*'player1' => $data['player1'],
                'player2' => $data['player2'],
                'player3' => $data['player3'],
                'banker1' => $data['banker1'],
                'banker2' => $data['banker2'],
                'banker3' => $data['banker3']*/

            ];
            $sss= ['status'=>"200",'data'=>$posts_array];
            array_push($posts_array, $post_data);
        }
        echo json_encode($sss);
    }
}
	


?>