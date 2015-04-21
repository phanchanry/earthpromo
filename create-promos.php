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
	    
	    
	    $pageType="promos";
	    EP_isLogin_redirect();
	    $userId = $_SESSION['EP_USER'];
	    
	    $sql = "SELECT * FROM ep_category";
	    $categoryData = $db->queryArray($sql);
    ?>
    <script src="http://fgnass.github.io/spin.js/spin.js"></script>
    <script type="text/javascript" src="/js/create-promos.js"></script>
</head>
<body style="background: url(img/tiny_grid.png);">
 <?php  require  ("./common/header.php"); ?>
 <!--=== Breadcrumbs ===-->
 <div class="main_content">
	<div class="breadcrumbs margin-bottom-40">
	    <div class="container">
	        <h1 class="pull-left">Create your promos</h1>
	        <ul class="pull-right breadcrumb">
	            <li><a href="home.php">Home</a></li>
	            <li class="active">Creat your promos</li>
	        </ul>
	    </div>
	</div><!--/breadcrumbs-->
	<div class="container">
		<div class="tag-box tag-box-v2">
	    	<p>Most individuals and small businesses don’t have the budget to afford their own commercial or promotional advertisement.  Well that’s no longer the case.<br><br>
			   So whether you are looking for a job or trying to promote your talent or business, earthpromo.com exposes you or your organization to the world immediately.
	 		</p>
	    </div>
	    <div class="panel panel-green margin-bottom-40">
        	<div class="panel-heading">
            	<h3 class="panel-title"><i class="icon-tasks"></i>Upload Video</h3>
            </div>
                <div class="panel-body">     
                	<div class="video-package">
	                	<div class="video-package-title margin-bottom-20">                                                 
	                    	<h4>Packages: (Please click on the plan of your choice. Cancel at any time)</h4>
	                    </div>	
	                    <div class="col-md-8 col-md-offset-2">
	                    	<button class="btn-u btn-u-green btn-u-large btn-block margin-bottom-10" type="button" value="<?php echo $categoryData[0]['ep_category']; ?>"><?php echo ucfirst($categoryData[0]['ep_title']);?> $99.00 per year</button>
	                    	<button class="btn-u btn-u-red btn-u-large btn-block margin-bottom-10" type="button" value="<?php echo $categoryData[1]['ep_category']; ?>"><?php echo ucfirst($categoryData[1]['ep_title']);?> (free)</button>
	                    	<button class="btn-u btn-u-sea btn-u-large btn-block margin-bottom-10" type="button" value="<?php echo $categoryData[2]['ep_category']; ?>"><?php echo ucfirst($categoryData[2]['ep_title']);?> $99.00 per year</button>
	                    	<button class="btn-u btn-u-default btn-u-large btn-block margin-bottom-10" type="button" value="<?php echo $categoryData[3]['ep_category']; ?>"><?php echo ucfirst($categoryData[3]['ep_title']);?> $99.00 per year</button>
	                    	<button class="btn-u btn-u-blue btn-u-large btn-block margin-bottom-10" type="button" value="<?php echo $categoryData[4]['ep_category']; ?>"><?php echo ucfirst($categoryData[4]['ep_title']);?> (free)</button>
	                    	<button class="btn-u btn-u-yellow btn-u-large btn-block margin-bottom-10" type="button" value="<?php echo $categoryData[5]['ep_category']; ?>"><?php echo ucfirst($categoryData[5]['ep_title']);?> $99.00 per year</button>
	                    </div>
	                </div>   	
					<div id="hidePayRequest" class="hide">
						<button class="btn-u btn-u-small" onclick="reloadWindow();"><i class="icon-long-arrow-left"></i>&nbsp;Back</button>
						<h5 class="hide" id="newRequest">You have to pay 99.00$ for now.Then you can post your own promo free for 1 year.</h5>
						<h5 class="hide" id="expiredRequest">Your expiration date is not valid.You have to pay 99.00$ for now.Then you can post your own promo for 1 year.</h5>
						<button class="btn-u btn-u-sea" id="videoPay"><i class="icon-shopping-cart"></i>&nbsp;Pay Now</button>
					</div>
                </div>
         </div>
	</div>
	<?php $url = 'https://'.PAYPAL_SERVER.'/cgi-bin/webscr'; ?>
	<form id="createPromosForm" method="post" action="<?php echo $url; ?>">
		<input type="hidden" name="business" value="<?php echo htmlspecialchars(PAYPAL_BUSINESS); ?>">
		<input type="hidden" name="cmd" value="_xclick">
		<input type="hidden" name="item_name" value="Warn Me Sign Up">
		<input type="hidden" name="amount" id="amount" value="<?php echo PAY_AMOUNT; ?>" >
		<input type="hidden" name="currency_code" id="currency_code" value="USD">
		<input type="hidden" name="invoice" id="invoice" value="<?php echo $userId."_".EP_generateRandom(14);?>">
		<input type="hidden" name="notify_url" value="<?php echo "http://".HOST_SERVER."/ipn.php"; ?>">
		<input type="hidden" name="return" id="return" value="<?php echo "http://".HOST_SERVER; ?>/create-promos.php">
		<input type="hidden" name="cancel_return" value="<?php echo "http://".HOST_SERVER."/failed.php"; ?>">
		<input type="hidden" name="no_shipping" value="1">
		<input type="hidden" name="email">										
	</form>
	<div class="form-horizontal hide" id="cloneUploadVideoForm" role="form"></div>
</div>	
	<?php require_once './footer.php';?>
</body>
</html>