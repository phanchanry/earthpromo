<?php
	session_start();
	require_once("./common/DB_Connection.php");	
    require_once("./common/functions.php");

    $result = "success";
    $error = "";
    $data = array();
    
    $city = $_POST['city'];
    if(isset($_POST['getType']) && $_POST['getType'] == "choose"){
    	$sql = "SELECT ep_city, CONCAT(ep_city_name, ', ', ep_state) as ep_city_name FROM ep_city";
    }else{
    	$sql = "SELECT ep_city, CONCAT(ep_city_name, ', ', ep_state) as ep_city_name 
    	 		  FROM ep_city
    			 where lower(ep_city_name) like '%$city%' limit 12";
    }
   	$cityResult = $db->queryArray( $sql );
    
   	$data['city'] = $cityResult; 
    $data['result'] = $result;
    $data['error'] = $error;
    header('Content-Type: application/json');
    echo json_encode($data);    
?>
