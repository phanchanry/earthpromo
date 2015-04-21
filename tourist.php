<?php session_start(); ?>
<!DOCTYPE html>
<!--[if IE 8]><html lang="en" id="ie8" class="lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 9]><html lang="en" id="ie9" class="gt-ie8 lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en"> <!--<![endif]-->
<head>
    <?php
    	$pageType="tourist";
	    require_once("./common/config.php"); 
	    require_once("./common/DB_Connection.php"); 
	    require_once ("./common/asset.php");
	    require_once("./common/functions.php"); 
	    $sql = "SELECT t1.ep_city, t2.*
			     FROM ep_user t1, ep_video t2, ep_category t3, ep_city t4
			    WHERE t1.ep_user = t2.ep_user
			      AND t3.ep_category = t2.ep_category
				  AND t2.ep_city = t4.ep_city 
			      AND t2.ep_category = 4";
	    $sql1 = $sql;
	    $formSubmit = false;
	    if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
			require 'get-searchInfo.php';
			if ($_POST['city'] != "" || $_POST['keywords'] != "")
			    $formSubmit = true;
		}
		if( $_POST['videoId'] != "" ){
			$getVideoId = $_POST['videoId'];
			$sql1.=" AND t2.ep_video  = '$getVideoId'";
		} else {
		    echo "<script type='text/javascript'>
                    videoPlayer = true;
                  </script>";
		}
	    $videoData = $db->queryArray( $sql );
	    $oneVideoData = $db->queryArray( $sql1 );
	    $oneVideoDataPath = $oneVideoData[0]['ep_video_url'];
	    $oneVideoDataThumb = $oneVideoData[0]['ep_video_thumb_large'];
    ?>
</head>
<body style="background: url(img/tiny_grid.png);">
 <?php  require  ("./common/header.php"); ?>
 <div class="main_content">
 <!--=== Breadcrumbs ===-->
	<div class="breadcrumbs margin-bottom-40">
	    <div class="container">
	        <h1 class="pull-left">Tourist attractions</h1>
	        <ul class="pull-right breadcrumb">
	            <li><a href="home.php">Home</a></li>
	            <li class="active">Tourist attractions</li>
	        </ul>
	    </div>
	</div><!--/breadcrumbs-->
	<div class="col-md-12">
	<div class="container">
    	<div class="col-md-3">
			<div class="panel panel-green margin-bottom-40">
	        	<div class="panel-heading">
	            	<h3 class="panel-title"><i class="icon-search"></i> Search</h3>
	            </div>
	            <div class="panel-body">                                                      
	            	<form class="form-horizontal" method="post">
	            		<input type="hidden" id="videoId" name="videoId" />
                        <div class="form-group">
                        	<div class="col-lg-12">
                        		<label class="control-label">City</label>
                        	</div>
                            <div class="col-lg-12">
                                <input type="text" class="form-control" id="city" name="city" placeholder="City" maxlength="30" value="<?php echo $city;?>">
                            </div>
                        </div>	             
                        <div class="form-group">
                        	<div class="col-lg-12">
                        		<label class="control-label">Keywords</label>
                        	</div>
                            <div class="col-lg-12">
                                <input type="text" class="form-control" id="keywords" name="keywords" placeholder="Keywords" maxlength="30" value="<?php echo $keywords;?>">
                            </div>
                        </div>                                   
                        <div class="form-group">
                            <div class="col-lg-6">
                                <button class="btn-u btn-u-green btn-block" onclick="return onVideoSearch();"><i class="icon-search"></i> Search</button>
                            </div>
                            <div class="col-lg-6">
                                <button class="btn-u btn-u-red btn-block" onclick="onClear();"><i class="icon-eraser"></i> Clear</button>
                            </div>	                            	                            
                        </div>
	               </form>
	        	</div>
	    	</div>			
		</div>
		<?php if($videoData == null ){?>
		<div class="alert alert-danger fade in col-md-9">
        	<button type="button" class="close" data-dismiss="alert">×</button>
        	<?php   if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){?>
           There is no result!!
            <?php } else {?> 
            <strong>Sorry!</strong> There is NOT any video related to Tourist attraction category right now.
            <?php }?>
        </div>
        <?php } else{?>
		<div class="col-md-5 col-md-offset-2 ">
		    <?php if ($formSubmit) {?>
			<div class="row margin-bottom-20" id="videoThumbnail">
				<video id="main_video_screen" class="video-js vjs-default-skin" controls preload="none" width="100%" height="264"
			      poster="<?php if($oneVideoDataThumb != "") echo $oneVideoDataThumb; else echo 'img/black_thumb.png';?>" 
			       data-setup='{"plugins":{"addThis":{"website_url": "http://www.google.com", "embed": true, "reddit":false,"delicious":false}}}'>
				    <source src="<?php if( isset($oneVideoDataPath) && $_POST['videoId'] != "") echo $oneVideoDataPath; else echo ''; ?>" type='video/mp4' />
				    <track kind="captions" src="demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
				    <track kind="subtitles" src="demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
				    <input type="hidden" id="countFlag" />
				    <input type="hidden" id="countVideoId" value="<?php echo $getVideoId?>" />
			  	</video>
		    </div>
		    <?php }?>
		</div>
		</div>
		<div class="container">
			<div class="row">
			<?php
			if ($formSubmit) {
			    for( $i = 0 ; $i < count( $videoData ) ; $i ++ ){ ?>
				<div class="col-md-3">
                    <div class="thumbnail margin-bottom-10" id="videoThumbnail">
                    	<form id="viewVideoForm" method="post">
	                    	<input type="hidden" id="referVideoId" name="referVideoId" value="<?php echo $videoData[$i]['ep_video']; ?>" />
	                </form>   
                        <div class="fancybox-button zoomer" onclick="onPlayVideo(this)">
                        	<input type="hidden" id="videoPath" value="<?php echo $videoData[$i]['ep_video_url']; ?>"/>
                            <span class="overlay-zoom" id="videoThumb">  
                                <img class="img-responsive" src="<?php echo $videoData[$i]['ep_video_thumb_large'];?>" alt="">
                                <div class="zoom-icon"></div>                   
                            </span>                                              
                        </div>                    
                        <div class="caption team">
                        	<p><?php echo $videoData[$i]['ep_description']; ?></p>
                            <p><?php echo $videoData[$i]['ep_view_count']; ?>&nbsp; views</p>
                        </div>
                    </div>
                </div>
             <?php } }?>
              </div>
           <?php }?>     
		</div>
	</div>
</div>	
<?php require_once './footer.php';?>	
</body>