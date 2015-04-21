<?php
	session_start( );
	if( isset($_SESSION['EP_ADMIN_ID']) && $_SESSION['EP_ADMIN_ID'] != "" ){
		header("location: userList.php");
	}else{
		header("location: signIn.php");
	}
	 
?>