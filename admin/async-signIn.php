<?php
	session_start();
	require_once("../common/DB_Connection.php");	
    require_once("../common/functions.php");

    $result = "success";
    $error = "";
    $data = array();
    
    $username = $_POST['username'];
    $password = $_POST['password'];    

    $sql = "select * 
              from ep_user 
     	     where ep_username = '$username'
               and ep_password = md5('$password')
    		   and ep_is_admin = 'Y'";
    $dataUser = $db->queryArray( $sql );
    if( $dataUser == null ){
    	$result = "failed";
    	$error = "INVALID_LOGIN_INFO";
    }else{
    	$adminId = $dataUser[0]['ep_user'];
    	$_SESSION['EP_ADMIN_ID'] = $adminId;
    }
    
    $data['result'] = $result;
    $data['error'] = $error;
    header('Content-Type: application/json');
    echo json_encode($data);    
?>
