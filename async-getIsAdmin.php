<?php 
	session_start();
	require_once("./common/DB_Connection.php");
	require_once("./common/functions.php");
	
	$result = "success";
	$error = "";
	$data = array();
	
	$userId = $_SESSION['EP_USER'];
	$categoryIndex = $_POST['categoryIndex']; 
	
	$sql = "SELECT ep_is_admin FROM ep_user WHERE ep_user  = '$userId'";
	$isAdmin = $db->queryArray( $sql ); 
	$isAdmin = $isAdmin[0];
	
	
	$data['isAdmin'] = $isAdmin['ep_is_admin'];
	$data['result'] = $result;
	$data['error'] = $error;
	header('Content-Type: application/json');
	echo json_encode($data);
?>