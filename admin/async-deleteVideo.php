<?php
	session_start();
	require_once("../common/DB_Connection.php");	
    require_once("../common/functions.php");

    $result = "success";
    $error = "";
    $data = array();
    
    $videoIds = $_POST['videoIds'];
    
    $sql1 = "SELECT * FROM ep_video WHERE ep_video in ($videoIds)";
    $deleteData = $db->queryArray( $sql1 );
    $serverUrl = $_SERVER['DOCUMENT_ROOT'];
    for( $i = 0 ; $i < count($deleteData) ; $i ++){
    	$delete_video_url = $serverUrl . "/" . $deleteData[$i]['ep_video_url'];
    	$delete_thumb_url = $serverUrl . $deleteData[$i]['ep_video_thumb_large'];
    	unlink($delete_video_url);
    	unlink($delete_thumb_url);
    }
    $sql2 = "delete from ep_video where ep_video in ( $videoIds )";
    $db->query($sql2);
    
    $data['result'] = $result;
    $data['error'] = $error;
    header('Content-Type: application/json');
    echo json_encode($data);
?>