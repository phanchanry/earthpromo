<!DOCTYPE html>
<!--[if IE 8]><html lang="en" id="ie8" class="lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 9]><html lang="en" id="ie9" class="gt-ie8 lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en"> <!--<![endif]-->
<head>
    <?php
    	$pageType = "home";
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
		require_once("common/config.php"); 
	    require_once("common/DB_Connection.php"); 
	    require_once ("./common/asset.php");
	    require_once("./common/functions.php"); 
	    
	    $sql = "SELECT * FROM ep_category";
	    $categoryData = $db->queryArray($sql);
    ?>
   <script type="text/javascript" src="js/home.js"></script>
</head>
<body style="line-height: 0px; background-color: #000; background-image: url(img/back2.png); background-repeat:no-repeat;background-position: 0px 50px; background-size: 100%;">
<?php  require  ("./common/header.php"); ?>
<!-- main image -->
<div class="main_content">
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
			<div class="tag-box tag-box-v3" style="margin-top: 14%; background: url(img/tiny.png)" >
				<p class="home-title">	
				Welcome to earthpromo.com!<br>	
				The first ever website dedicated to uniting & promoting the world through web based media.  
				Whether you live in Atlanta Georgia and are trying to find an attorney or 
				if you are in Montego Bay Jamaica trying to find a good restaurant earthpromo.com is the answer to your question.
				</p>
				<div class="margin-bottom-20"></div>
				<div class="col-md-offset-2">
					<form class="form-horizontal" role="form" id="homeSearchForm" method="post" action="">
<!-- 						<div class="form-group"> -->
<!-- 				            <div class="col-lg-10"> -->
<!-- 				            	<input type="text" id="state" name="state" class="form-control" placeholder="Input the State"> -->
<!-- 				            </div> -->
<!-- 			        	</div> -->
<!-- 						<div class="form-group"> -->
<!-- 				            <div class="col-lg-10"> -->
<!-- 				            	<input type="text" id="city" name="city" class="form-control" placeholder="Input the city"> -->
<!-- 				            </div> -->
<!-- 			        	</div> -->
<!-- 						<div class="form-group"> -->
<!-- 				            <div class="col-lg-10"> -->
<!-- 				            	<select class="form-control" id="videoCategory"> -->
<!-- 	                            	<option value="0">Please select category</option> -->
		                            <?php // for( $ii = 0 ; $ii < count( $categoryData ) ; $ii ++ )
// 										 //echo  "<option  value='".$categoryData[$ii]['ep_category']."'>".ucfirst($categoryData[$ii]['ep_title'])  ."</option>";
// 		                            ?>
<!-- 	                       		</select> -->
<!-- 				            </div> -->
<!-- 			        	</div> -->
<!-- 			        	<div class="form-group"> -->
<!-- 							<div class="input-group col-lg-10"> -->
<!-- 		                    	<input type="text" class="form-control" id="keywords" name="keywords" placeholder="Input the keywords"> -->
<!-- 					            <span class="input-group-btn"> -->
		                        	<!-- <button class="btn btn-danger" type="button" onclick="onSearchVideo()">Search!</button> -->
<!-- 					        	</span> -->
<!-- 				        	</div> -->
<!-- 			        	</div> -->
				    </form>
		    	</div>
		   	</div>
	    </div>
	    <div class="col-md-10 col-md-offset-1">
	    	<div class="tag-box tag-box-v3" style="background: url(img/tiny.png)" >
	    		<div class="row servive-block margin-bottom-10">
	    			<div class="col-md-12 margin-bottom-10">
	    			<p style="color: #E5E5E5; font-size: 16px;">
<!-- 	    			Earthpromo.com connects you with the world by providing media promos of businesses, jobseekers, -->
<!-- 	    			entertainment, tourist attractions, talents and investment opportunities from around the world. -->
<!--             		Please click on the links below to see how earthpromo.com can be used to promote businesses and people around the world. -->
<!-- 	    			</p> -->
	    			</div>
		    		<div class="col-md-2 col-sm-6">
		    			<a href="business.php">
			            	<div class="servive-block-in servive-block-colored servive-block-green" style="padding: 20px 0px;">
		                        <div><img src="img/business.png" class="category-size"></div>
		                        <div style="display: inline-block; height: 37px">
		                       <h5>Business</h5>                        
		                       </div>
		                    </div>
		                 </a>
		           </div>
		           <div class="col-md-2 col-sm-6">
		           		<a href="jobseekers.php">
		                    <div class="servive-block-in servive-block-colored servive-block-red" style="padding: 20px 0px;">
		                        <div><img src="img/jobseekers.png" class="category-size"></div>
		                        <div style="display: inline-block; height: 37px">
		                        <h5>Jobseekers</h5>
		                        </div>
		                    </div>
	                    </a>
	                </div>
	                <div class="col-md-2 col-sm-6">
	                	<a href="entertainment.php">
		                    <div class="servive-block-in servive-block-colored servive-block-sea" style="padding: 20px 0px;">            
		                        <div><img src="img/entertainment.png" class="category-size"></div>
		                        <div style="display: inline-block; height: 37px">
		                        <h5>Entertainment Restaurants</h5>
		                        </div>
		                    </div>
		                 </a>
	                </div>
	                <div class="col-md-2 col-sm-6">
	                	<a href="tourist.php">
		                    <div class="servive-block-in servive-block-colored servive-block-grey" style="padding: 20px 0px;">            
		                        <div><img src="img/tourist.png" class="category-size"></div>
		                        <div style="display: inline-block; height: 37px">
		                        <h5>Tourist<br>attractions</h5>
		                        </div>
		                    </div>
		                </a>
	                </div>
	                <div class="col-md-2 col-sm-6">
	                	<a href="talent.php">
		                    <div class="servive-block-in servive-block-colored servive-block-blue" style="padding: 20px 0px;">            
		                        <div><img src="img/talent.png" class="category-size"></div>
		                        <div style="display: inline-block; height: 37px">
		                        <h5>Talents</h5>
		                        </div>
		                    </div>
		                </a>
	                </div>
	                <div class="col-md-2 col-sm-6">
	                	<a href="invest.php">
		                    <div class="servive-block-in servive-block-colored servive-block-orange" style="padding: 20px 0px;">            
		                        <div><img src="img/investment.png" class="category-size"></div>
		                        <div style="display: inline-block; height: 37px">
		                        <h5>Investment<br>Opportunities</h5>
		                        </div>
		                    </div>
		                 </a>   
	                </div>
	           </div>
	    	</div>
	    </div> 
	</div>
</div>
<?php require_once './footer.php';?>
</body>