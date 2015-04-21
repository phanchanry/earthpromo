<?php
	session_start();
	require_once("./common/DB_Connection.php");	
    require_once("./common/functions.php");

    $result = "success";
    $error = "";
    $data = array();
    
    $state = $_POST['state'];
    $sql = "SELECT DISTINCT ep_state 
    	 	  FROM ep_city
    		 WHERE lower(ep_state) like '%$state%' limit 12";
   	$stateResult = $db->queryArray( $sql );
    
   	$data['state'] = $stateResult; 
    $data['result'] = $result;
    $data['error'] = $error;
    header('Content-Type: application/json');
    echo json_encode($data);    
?>
