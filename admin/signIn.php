<?php
	session_start();
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"> <!--<![endif]-->
<head>
    <?php require_once("asset.php"); ?>
	  <link rel="stylesheet" href="../assets/css/pages/page_log_reg_v1.css">
	  <link rel="stylesheet" href="../assets/css/pages/page_log_reg_v2.css">
    <?php require_once("../common/DB_Connection.php"); ?>	
    <?php require_once("../common/functions.php"); ?>	
	<script type="text/javascript" src="js/signIn.js"></script>
</head>
<body style="background:#FFF;">
	<div id="mainHeader1">
		<div id="mainHeaderTitle" class="floatleft margin-bottom-40">
			EARTHPROMO BACKEND
		</div>	
	</div>
	<div class="container">
		<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3" style="margin-top: 5%" >
            <div class="reg-page">
                <div class="reg-header">            
                    <h2>Sign In to your account</h2>
                </div>

                <div class="input-group margin-bottom-20">
                    <span class="input-group-addon"><i class="icon-user"></i></span>
                    <input type="text" placeholder="Username" class="form-control" id="username">
                </div>
                <div class="input-group margin-bottom-20">
                    <span class="input-group-addon"><i class="icon-lock"></i></span>
                    <input type="password" placeholder="Password" class="form-control" id="password">
                </div>
                <hr>                    
                <div class="row" style="text-align:center;">
                    <div class="col-md-10 col-md-offset-1">
                    	<button class="btn-u btn-block marginRight10" onclick="onSignInSubmit();">Sign In</button>
                    </div>
                </div>
            </div> 
        </div>              
		<div class="clearboth"></div>
	</div>

</body>
</html>	