<?php
	session_start();
    require_once("./common/DB_Connection.php");
    require_once("./common/functions.php");

    $result = "success";
    $error = "";
    $data = array();
	    
    $countVideoId = $_POST['countVideoId'];
    
	$sql = "UPDATE ep_video 
			   SET ep_view_count = ep_view_count + 1 
			 WHERE ep_video = '$countVideoId'";
	$db->query( $sql );
    
    $data['result'] = $result;
    $data['error'] = $error;
    header('Content-Type: application/json');
    echo json_encode($data);    
?>

