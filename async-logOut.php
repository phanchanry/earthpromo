<?php
	session_start();
	require_once("./common/DB_Connection.php");	
    require_once("./common/functions.php");

    $result = "success";
    $error = "";
    $data = array();
    
    unset( $_SESSION['EP_USER'] );
    $data['result'] = $result;
    $data['error'] = $error;
    header('Content-Type: application/json');
    echo json_encode($data);
?>
