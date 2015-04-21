<?php
	session_start();
	require_once("../common/DB_Connection.php");	
    require_once("../common/functions.php");

    $result = "success";
    $error = "";
    $data = array();

    $city = $_POST['city'];
    $realCity = strtolower($city);
    $userId = $_POST['userId'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $adminYn = $_POST['adminYn'];
    $referredBy = $_POST['referredBy'];
    $phoneNumber = $_POST['phoneNumber'];
    
    if( $userId == "" ){
    	$sql = "insert ep_user( ep_referred_by, ep_phone_number, ep_city ep_username, ep_password, ep_email, ep_is_admin, ep_created_time, ep_updated_time)
    			         value('$referredBy', '$phoneNumber',  '$realCity', '$username', md5('$password'), '$email', '$adminYn', now(), now() )";
    	$db->queryInsert( $sql );
    }else{
    	$sql = "update ep_user
    			   set ep_referred_by = '$referredBy'
    			     , ep_phone_number = '$phoneNumber'
    			   	 , ep_city = '$city'
    			   	 , ep_username = '$username'
    			     , ep_email = '$email'
    				 , ep_is_admin = '$adminYn'
    				 , ep_updated_time = now()";
    	if( $password != "" )
    		$sql.= " , ep_password = md5('$password')"; 
    	$sql .= " where ep_user = $userId";
    	$db->query( $sql );
    }
    
    $data['result'] = $result;
    $data['error'] = $error;
    header('Content-Type: application/json');
    echo json_encode($data);    
?>
