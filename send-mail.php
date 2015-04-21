<?php
require_once("./common/config.php"); 
require_once("./common/DB_Connection.php");
require_once("./common/functions.php"); 
require_once   './phpmailer.php';

$subject = $_POST['subject'];
$emailAddress = $_POST['emailAddress'];
$msgContent = $_POST['msgContent'];

//mail("jenistar90@earthpromo.com", $subject, $msgContent, "From: $emailAddress\n");
$mail = new PHPMailer();
$body = 'body template';
$mail->IsSMTP();     // telling the class to use SMTP
$mail->SMTPDebug = 2;           // enables SMTP debug information (for testing)

$mail->SMTPAuth   = true;                    // enable SMTP authentication
//$mail->SMTPSecure = "ssl";                   // sets the prefix to the servier
$mail->Host       = "relay-hosting.secureserver.net";        // sets GMAIL as the SMTP server
$mail->Port       = 25;                     // set the SMTP port for the GMAIL server
$mail->Username   = "jenistar90@earthpromo.com";  // GMAIL username
$mail->Password   = "flygare10";            // GMAIL password

$mail->SetFrom('jenistar90@earthpromo.com', 'Email Title');
$mail->Subject    = "Test message";
$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";     // optional, comment out and test
$mail->MsgHTML($msgContent);

$address = "jenistar90@gmail.com";
$mail->AddAddress($address, "First name  Lastname");

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
	//echo "Mailer Error: " . $mail->ErrorInfo;
	header('Location: ./contact.php');
} else {
	header('Location: ./contact.php');
}

?>