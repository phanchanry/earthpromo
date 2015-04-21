<?php 
	session_start();
	require_once("./common/config.php");
	require_once("./common/DB_Connection.php");
	require_once("./common/functions.php");
	// read the post from PayPal system and add 'cmd' 
	$req = 'cmd=_notify-validate'; 
	
	foreach ($_POST as $key => $value) { 
	    $value = urlencode(stripslashes($value)); 
	    $req .= "&$key=$value"; 
	} 
	
	//post back to PayPal system to validate 
	$header = "POST /cgi-bin/webscr HTTP/1.1\r\n"; 
	$header .= "Content-Type: application/x-www-form-urlencoded\r\n"; 
	$header .= "Host: ".PAYPAL_SERVER."\r\n"; 
	$header .= "Connection: close\r\n"; 
	$header .= "Content-Length: " . strlen($req) . "\r\n\r\n"; 
	$fp = fsockopen ('ssl://'.PAYPAL_SERVER, 443, $errno, $errstr, 30);  

	//error connecting to paypal 
	if (!$fp) { 
	    // 
	} 
	//successful connection     
	if ($fp) { 
	    fputs ($fp, $header . $req); 
	     
	    while (!feof($fp)) { 
	        $res = fgets ($fp, 1024); 
	        $res = trim($res); //NEW & IMPORTANT 
	                 
	        if (strcmp($res, "VERIFIED") == 0) { 
	            //insert order into database
	            $invoiceTemp = array();
	            $invoiceId = $_POST['invoice'];
	            $invoiceTemp = explode("_", $invoiceId);
	            $videoCategory = $invoiceTemp[0]; 
	            $userId = $invoiceTemp[1];
	            $sql1 = "UPDATE ep_payment_history 
	            		   SET ep_is_payment = 'Y'  
	            		     , ep_updated_time = now()
	             		 WHERE ep_invoice = '$invoiceId'";
	            $db->query($sql1);
	            $sql2 = "UPDATE ep_user ";
	           
	            if( $videoCategory == 1 ){
	            	$sql2.= "SET ep_business_last_payday = now() WHERE ep_user = '$userId'";
	            logToFile("data.log", "$videoCategory : $userId");
	            }
	            else if( $videoCategory == 3 )
	            	$sql2.= "SET ep_entertainment_last_payday = now() WHERE ep_user = '$userId'";
	            else if( $videoCategory == 4 )
	            	$sql2.= "SET ep_tourist_last_payday = now() WHERE ep_user = '$userId'";
	            else if( $videoCategory == 6 )
	            	$sql2.= "SET ep_investment_last_payday = now() WHERE ep_user = '$userId'";
	            $db->query($sql2);
	        } 
	     
	        if (strcmp ($res, "INVALID") == 0) { 
	            //insert into DB in a table for bad payments for you to process later 
	        } 
	    } 
	
	    fclose($fp); 
	} 

?> 