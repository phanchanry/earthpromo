<?php
	session_start();
	require_once("../common/DB_Connection.php");	
    require_once("../common/functions.php");

    $result = "success";
    $error = "";
    $data = array();
    
    $userIds = $_POST['userIds'];
    $sql = "delete from ep_user where ep_user in ( $userIds )";
    $db->query( $sql );
    
    $data['result'] = $result;
    $data['error'] = $error;
    header('Content-Type: application/json');
    echo json_encode($data);
?>