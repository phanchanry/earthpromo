<?php
	session_start();
	require_once("../common/DB_Connection.php");	
    require_once("../common/functions.php");

    $result = "success";
    $error = "";
    $data = array();

    $videoId = $_POST['videoId'];
	$videoCategory = $_POST['videoCategory'];
	$title = $_POST['title'];
	$videoCity = $_POST['videoCity'];
	
    $sql = "update ep_video
    		   set ep_category = '$videoCategory'
    		   	 , ep_description = '$title'
    		   	 , ep_city = '$videoCity'
    			 , ep_updated_time = now() 
    		 where ep_video = $videoId";
    $db->query( $sql );
    
    $data['result'] = $result;
    $data['error'] = $error;
    header('Content-Type: application/json');
    echo json_encode($data);    
?>
