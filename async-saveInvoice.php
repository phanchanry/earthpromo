<?php
	session_start();
	require_once("./common/DB_Connection.php");	
    require_once("./common/functions.php");

    $result = "success";
    $error = "";
    $data = array();
    
    $invoiceId = $_POST['invoiceId'];
    $payAmount = PAY_AMOUNT;
    
    $sql = "INSERT INTO ep_payment_history (ep_invoice, ep_pay_amount, ep_is_payment, ep_created_time, ep_updated_time ) 
     	   VALUES('$invoiceId', '$payAmount', 'N', now(), now())";
   	$db->query( $sql );
    
   	$data['payAmount'] = $payAmount;
    $data['result'] = $result;
    $data['error'] = $error;
    header('Content-Type: application/json');
    echo json_encode($data);    
?>
