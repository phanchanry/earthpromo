<?php 
	session_start();
	require_once("./common/DB_Connection.php");
	require_once("./common/functions.php");
	
	$result = "success";
	$error = "";
	$data = array();
	
	$userId = $_SESSION['EP_USER'];
	$categoryIndex = $_POST['categoryIndex']; 
	
	$sql = "SELECT * FROM ep_user WHERE ep_user  = '$userId'";
	$lastPayDay = $db->queryArray( $sql ); 
	$lastPayDay = $lastPayDay[0];
	
	$sql = "SELECT ep_title FROM ep_category WHERE ep_category = '$categoryIndex'";
	$videoCategory = $db->queryArray( $sql );
	$videoCategory = $videoCategory[0];
	
	if( $categoryIndex == 1 )
		$eachLastPayDay = $lastPayDay['ep_business_last_payday'];
	else if( $categoryIndex == 3 )
		$eachLastPayDay = $lastPayDay['ep_entertainment_last_payday'];
	else if( $categoryIndex == 4 )
		$eachLastPayDay = $lastPayDay['ep_tourist_last_payday'];
	else if( $categoryIndex == 6 )
		$eachLastPayDay = $lastPayDay['ep_investment_last_payday'];
	
	$nowToday=date("y-m-d");
	
	if( $eachLastPayDay == null )
		$paycount = null;
	else{
   		$date_diff = abs( strtotime($nowToday) - strtotime($eachLastPayDay) );
   		$paycount = floor(($date_diff)/(60*60*24));
	}
   		
	$data['countPayDay'] = $paycount;
	$data['videoCategory'] = $videoCategory['ep_title'];
	$data['result'] = $result;
	$data['error'] = $error;
	header('Content-Type: application/json');
	echo json_encode($data);
?>