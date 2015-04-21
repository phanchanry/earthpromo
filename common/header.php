<div class="top-navigation" style="background: #3e4753; border-bottom: solid 1px #777;">
	<div class="top">
	    <div class="container">         
	    	<div class="col-md-6 pull-right">
	        <ul class="loginbar pull-right">
	        	<?php if ( !EP_isLogin1() ){?>
	            <li><a href="signup.php">Sign up</a></li>  
	            <li class="devider"></li>   
	            <li><a href="login.php">Sign in</a></li>
	            <?php }else{ ?>
	            <li><a href="#" onclick="onUserLogOut()">Log out</a></li>
	            <?php }?>
	            <li class="devider"></li>
	            <li><a href="contact.php">Contact us</a></li>   
	            <li class="devider"></li>   
	            <li class=" <?php if($pageType == "promos") echo "active"; ?>"><a href="create-promos.php">Create your promos</a></li>   
	        </ul>
	        </div>
	    </div>      
	</div><!--/top-->
	<div class="header">
	    <div class="navbar navbar-default" role="navigation">
	        <div class="container">
	            <!-- Brand and toggle get grouped for better mobile display -->
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                <a class="navbar-brand" href="index.php" style="font-size: 20px; color: #E5E5E5;">
<!-- 	                    <img id="logo-header" src="/img/site-logo1.png" alt="Logo"> -->
	                Earthpromo.com
	                </a>
	            </div>
	            <!-- Collect the nav links, forms, and other content for toggling -->
	            <div class="collapse navbar-collapse navbar-responsive-collapse">
	                <ul class="nav navbar-nav navbar-right">
	                    <li class="dropdown <?php if($pageType == "home") echo "active"; ?>">
	                        <a href="home.php" class="dropdown-toggle" data-hover="dropdown" data-delay="0" data-close-others="false">
	                            Home
	                        </a>
	                    </li>
	                    <li class="dropdown <?php if($pageType == "business") echo "active"; ?>">
	                        <a href="business.php" class="dropdown-toggle" data-hover="dropdown" data-delay="0" data-close-others="false">
	                            Business
	                        </a>
	                    </li>
	                    <li class="dropdown <?php if($pageType == "jobseekers") echo "active"; ?>">
	                        <a href="jobseekers.php" class="dropdown-toggle" data-hover="dropdown" data-delay="0" data-close-others="false">
	                            Jobseekers
	                        </a>
	                    </li>
	                    <li class="dropdown <?php if($pageType == "entertainment") echo "active"; ?>">
	                        <a href="entertainment.php" class="dropdown-toggle" data-hover="dropdown" data-delay="0" data-close-others="false">
	                            Entertainment/Restaurants
	                        </a>
	                    </li>
	                    <li class="dropdown <?php if($pageType == "tourist") echo "active"; ?>">
	                        <a href="tourist.php" class="dropdown-toggle" data-hover="dropdown" data-delay="0" data-close-others="false">
	                            Tourist attractions
	                        </a>
	                    </li>
	                    <li class="dropdown <?php if($pageType == "talent") echo "active"; ?>">
	                        <a href="talent.php" class="dropdown-toggle" data-hover="dropdown" data-delay="0" data-close-others="false">
	                            Talent
	                        </a>
	                    </li>    
	                      <li class="dropdown <?php if($pageType == "invest") echo "active"; ?>">
	                        <a href="invest.php" class="dropdown-toggle" data-hover="dropdown" data-delay="0" data-close-others="false">
	                            Investment opportunities
	                        </a>
	                    </li>                    
	                </ul>
	            </div><!-- /navbar-collapse -->
	        </div>    
	    </div>    
	</div><!--/header-->
</div>