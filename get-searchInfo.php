<?php 
	if(isset($_POST['city'])) 
		$city = $_POST['city'];
	$cityArray = explode(',', $city );
	$realCity = trim($cityArray[0]);
	if(isset($_POST['keywords']))
		$keywords = $_POST['keywords'];
	if(isset($_POST['state']))
		$state = trim($_POST['state']);
	
	if( $city != "" ){ $sql.= " AND t4.ep_city_name = '$realCity'"; }
	if( $keywords != "" ){ $sql.= " AND t2.ep_description like '%$keywords%'"; }
	if( $state != "" ){ $sql.= " AND t4.ep_state = '$state'"; }
	$sql.= "  ORDER BY t2.ep_video ASC";
	
?>