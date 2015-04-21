<?php
	session_start();
	require_once("./common/DB_Connection.php");	
    require_once("./common/functions.php");

    $result = "success";
    $error = "";
    $data = array();
    
   
    $city = "-1";
    $username = $_POST['username'];
    $email = $_POST['email'];
    $referredBy = $_POST['referredBy'];
    $phoneNumber = $_POST['phoneNumber'];
    $password = $_POST['password'];
    
    $sql = "select * from ep_user where (ep_email = '$email') or (ep_username = '$username')";
    $dataUser = $db->queryArray( $sql );
    if( $dataUser == null ){
    	$sql = "insert into ep_user( ep_username, ep_email, ep_password, ep_referred_by, 
    								 ep_phone_number, ep_city, ep_created_time, ep_updated_time ) 
    			values( '$username', '$email', md5('$password'), '$referredBy', '$phoneNumber', '$city', now(), now())";
    	$db->queryInsert( $sql );
    	$userId = $db->getPrevInsertId();
    }else{
    	$result = "exits";
    }
    $data['result'] = $result;
    $data['error'] = $error;
    header('Content-Type: application/json');
    echo json_encode($data);    
?>
