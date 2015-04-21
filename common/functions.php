<?php
	require_once dirname(__FILE__) . '/config.php';
	
	function logToFile($filename, $msg)
	{
		// open file
		$fd = fopen($filename, "a");
		// append date/time to message
		$str = "[" . date("Y/m/d h:i:s", time()) . "] " . $msg;
		// write string
		fwrite($fd, $str . "\n");
		// close file
		fclose($fd);
	}
	function EP_generateRandom( $len ){
		$strpattern = "123456789";
		$result = "";
		for( $i = 0 ; $i < $len; $i ++ ){
			$rand = rand( 0, strlen($strpattern) - 1 );
			$result = $result.$strpattern[$rand];
		}
		return $result;
	}
	function EP_isLogin(){
		if( isset($_COOKIE['EP_USER'])){
			return true;
		}else{
			return false;
		}
	}
	function EP_isLogin1(){
		if( isset( $_SESSION['EP_USER']) && $_SESSION['EP_USER'] != "" )
			return true;
		else return false;
	}
	function EP_setCookie( $name, $value){
		setcookie( $name, $value, time() + ( 2 * 7 * 24 * 60 * 60) );
		
	}
	function EP_getCookie( $name ){
		return $_COOKIE[$name];
	}
	function EP_deleteCookie( $name ){
		setcookie($name, "", time() - 3600);
	}
	function EP_isAdmin(){
		if( !isset($_SESSION['EP_ADMIN_ID']) )
			echo "<script>window.location.href='/admin/signIn.php'</script>";
		return true;
	}
	function EP_isLogin_redirect(){
		if( isset( $_SESSION['EP_USER']) && $_SESSION['EP_USER'] != "" )
			return true;
		else{
			echo "<script>window.location.href='./login.php'</script>";
		}
	}
	
?>