<?php
	session_start();
	require_once("./common/DB_Connection.php");	
    require_once("./common/functions.php");

    $result = "success";
    $error = "";
    $data = array();
    
    //$username = $_POST['username'];
    //$password = $_POST['password'];    
	$username = mysql_escape_string($_POST['username']);
    $password = mysql_escape_string($_POST['password']);
   
    $sql = "select * 
              from ep_user 
     	     where ep_username = '$username'
               and ep_password = md5('$password')
               and ep_is_locked = '0'";
    $dataUser = $db->queryArray( $sql );
    if( $dataUser == null ){
    	$result = "failed";
    }else{
    	$dataUser = $dataUser[0];
    	//EP_setCookie("EP_USER", $dataUser["ep_user"]);		
		$_SESSION["EP_USER"] = $dataUser['ep_user'];		
    }
    
    $data['result'] = $result;
    $data['error'] = $error;
    header('Content-Type: application/json');
    echo json_encode($data);    
?>
