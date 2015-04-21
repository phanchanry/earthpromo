<?php @session_start(); ?>   
    <title><?php echo SITE_NAME?></title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/headers/header1.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">
    <link rel="shortcut icon" href="favicon.ico">        
    <!-- CSS Implementing Plugins -->    
    <link rel="stylesheet" href="/assets/plugins/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="/assets/plugins/flexslider/flexslider.css">    	
    <!-- CSS Theme -->    
    <link rel="stylesheet" href="/assets/css/default.css" id="style_color">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  	<!-- JS Global Compulsory -->			
	<script type="text/javascript" src="/assets/plugins/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="/assets/plugins/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script> 
	<script type="text/javascript" src="/assets/plugins/hover-dropdown.min.js"></script> 
	<script type="text/javascript" src="/assets/plugins/back-to-top.js"></script>
	<!-- JS Implementing Plugins -->           
	<script type="text/javascript" src="/assets/plugins/flexslider/jquery.flexslider-min.js"></script>
	
	<!-- JS Page Level -->           
	<script type="text/javascript" src="/assets/js/app.js"></script>
<!-- 	<script type="text/javascript" src="/assets/js/pages/index.js"></script> -->
	<script type="text/javascript">
	    jQuery(document).ready(function() {
	      	App.init();
	        App.initSliders();
	    });
	</script>
	
	
  	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	
	<script src="js/jquery.form.js"></script>
	<script src="js/common.js"></script>
	<?php if( $pageType != "home" ){?>
	<link href="css/video-js.css" rel="stylesheet" type="text/css">
 	<!-- video.js must be in the <head> for older IEs to work. -->
  	<script src="js/video.dev.js"></script>
  	<link href="css/videojs.addThis.css" rel="stylesheet" />
  	<script src="js/videojs.addThis.js"></script>
  	<script src="js/category.js"></script>
  	<script>
    	videojs.options.flash.swf = "/swf/video-js.swf";
  	</script>
  	<?php }?>
	<!--[if lt IE 9]>
	    <script src="assets/plugins/respond.js"></script>
	    <script src="assets/plugins/layer_slider/assets/js/html5.js"></script>
	<![endif]-->