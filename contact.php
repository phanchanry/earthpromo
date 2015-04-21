<?php session_start(); ?>
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
	  
    ?>
   
</head>
<body style="background: url(img/tiny_grid.png);">
 <?php  require  ("./common/header.php"); ?>
 <!--=== Breadcrumbs ===-->
 <div class="main_content">
	<div class="breadcrumbs margin-bottom-40">
	    <div class="container">
	        <h1 class="pull-left">Contact us</h1>
	        <ul class="pull-right breadcrumb">
	            <li><a href="home.php">Home</a></li>
	            <li class="active">Contact us</li>
	        </ul>
	    </div>
	</div><!--/breadcrumbs-->
	<div class="col-md-offset-1 col-md-10 mb-margin-bottom-30">
		<div class="tag-box tag-box-v6">
            <div class="headline"><h2>Contact</h2></div>
			<h4>If you should have any questions or comments, please contact us at <strong>customerservice@earthpromo.com.</strong></h4>
    	</div>
    </div>

</div>	
	<?php require_once './footer.php';?>
</body>
</html>