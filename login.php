<!DOCTYPE html>
<!--[if IE 8]><html lang="en" id="ie8" class="lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 9]><html lang="en" id="ie9" class="gt-ie8 lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en"> <!--<![endif]-->
<head>
    <?php 
	    require_once("./common/config.php"); 
	    require_once("./common/DB_Connection.php"); 
	    require_once ("./common/asset.php");
	    require_once("./common/functions.php"); 
	    $pageType="promos";
    ?>
    <!-- CSS Style Page -->    
     <link rel="stylesheet" href="assets/css/pages/page_log_reg_v2.css">
     <script src="js/login.js"></script>    
</head>
<body>
<div class="container">
    <!--Reg Block-->
    <div class="reg-block" style="margin: 20% auto;">
        <div class="reg-block-header">
            <h2>Login to your account</h2>
            <ul class="list-inline style-icons text-center">
                <li><a href="home.php"><i class="icon-home icon-round icon-round-sm icon-color-grey"></i></a></li>
            </ul>
        </div>

        <div class="input-group margin-bottom-20">
            <span class="input-group-addon"><i class="icon-user"></i></span>
            <input type="text" id="username" class="form-control" placeholder="Username">
        </div>
        <div class="input-group margin-bottom-20">
            <span class="input-group-addon"><i class="icon-lock"></i></span>
            <input type="password" id="password" class="form-control" placeholder="Password">
        </div>
        <hr>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <a onclick="onLoginSubmit()" class="btn-u btn-block" style="text-align: center;">Log In</a>
            </div>
        </div>
    </div>
    <!--End Reg Block-->
</div><!--/container-->
<script type="text/javascript" src="assets/plugins/countdown/jquery.countdown.js"></script>
<script type="text/javascript" src="assets/plugins/backstretch/jquery.backstretch.min.js"></script>
<script type="text/javascript">
    $.backstretch([
      "assets/img/bg/5.jpg",
      "assets/img/bg/4.jpg",
      ], {
        fade: 1000,
        duration: 7000
    });
</script>
<!-- JS Page Level -->           
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
    });
</script>
</body>