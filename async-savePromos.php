<?php
	session_start();
    require_once("./common/DB_Connection.php");
    require_once("./common/functions.php");

    $result = "success";
    $error = "";
    $data = array();

    $description = $_POST['description'];
    $videoCategory = $_POST['videoCategory'];
    $videoCity = $_POST['videoCity'];
    $uploadFilePath = $_POST['uploadFilePath'];
    $videoImage = $_POST['videoImage'];
    $ep_user = $_SESSION['EP_USER'];
    $uploadFilePath = trim( $uploadFilePath );
    //$videoCategory = strtolower( $videoCategory );
    
    $sql = "SELECT *  
    		  FROM ep_category 
    		 WHERE ep_category = '$videoCategory'";
    $ep_category = $db->queryArray( $sql );
    $category = $ep_category[0]['ep_category'];
    
    $sql = "SELECT * FROM ep_city where ep_city = '$videoCity'";
    $ep_city = $db->queryArray( $sql );
    $city = $ep_city[0]['ep_city'];
	$sql = "INSERT INTO ep_video ( ep_user, ep_category, ep_description, ep_video_url, ep_video_thumb_large, ep_created_time, ep_updated_time, ep_city ) 
		   VALUES( '$ep_user', '$category', '$description', '$uploadFilePath', '$videoImage', now(), now(), '$city' )";
	$db->queryInsert( $sql );
    
    $data['result'] = $result;
    $data['error'] = $error;
    header('Content-Type: application/json');
    echo json_encode($data);    
?>

