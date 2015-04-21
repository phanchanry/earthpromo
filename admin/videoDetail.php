<?php session_start(); ?>
<!DOCTYPE html>
<!--[if IE 8]><html lang="en" id="ie8" class="lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 9]><html lang="en" id="ie9" class="gt-ie8 lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en"> <!--<![endif]-->
<head>
    <title>Earthpromo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
       
	<?php 
		require("asset.php");
		require("../common/config.php");
		require("../common/DB_Connection.php");		
		require("../common/functions.php");
    	if( isset($_GET['id']) && $_GET['id'] != "" ){
			$videoId = $_GET['id'];
			$sql = "SELECT t1.ep_username, t2.*,t3.ep_title as category_name, t4.*
			    	  FROM ep_user t1, ep_video t2, ep_category t3, ep_city t4
			   		 WHERE t1.ep_user = t2.ep_user
			  		   AND t3.ep_category = t2.ep_category
			  		   AND t2.ep_city = t4.ep_city
					   AND t2.ep_video = $videoId
					 ORDER BY t2.ep_video asc";
			$dataVideo = $db->queryArray( $sql );
			$dataVideo = $dataVideo[0];
			$type = "Edit";
		}else{
			$type = "Add";
		}    	
    	$pageNo = 2; 
	?>
	<link rel="stylesheet" type="text/css" href="http://www.datatables.net/media/blog/bootstrap_2/DT_bootstrap.css">
	
	<script type="text/javascript" src="js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="js/DT_bootstrap.js"></script>
	<script type="text/javascript" src="js/videoDetail.js"></script>		
</head>
<body>
<?php require_once("top.php"); ?>
<div class="container" style="min-height: 530px;">     
    <div class="row">
	    <?php require_once("leftMenu.php"); ?>
	   	 <div class="col-md-9">
			<div class="panel panel-green margin-bottom-40">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="icon-user"></i> Video <?php echo $type;?></h3>
                </div>
                <div class="panel-body">
                	<div class="form-horizontal">
                		<input type="hidden" id="type" value="<?php echo $type;?>"/>
                		<input type="hidden" id="videoId" value="<?php echo $videoId?>"/>
                		
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Title</label>
                            <div class="col-lg-10">
                                <input type="text" value="<?php echo $dataVideo['ep_description']?>" class="form-control" id="title" placeholder="Username">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Category</label>
                           	<div class="col-lg-8">
                           		<select class="form-control" id="videoCategory">
                           			<option value="0">Select category</option>		
		                           <?php 
		                            $sql = "SELECT * FROM ep_category";
		                            $row = $db->queryArray($sql);
		                            for( $ii = 0 ; $ii < count( $row ) ; $ii ++ ){
										if ( $row[$ii]['ep_title'] == $dataVideo['category_name'] )
											echo "<option value='".$row[$ii]['ep_category']."' selected>".$row[$ii]['ep_title']  ."</option>";
										else
											echo "<option  value='".$row[$ii]['ep_category']."'>".$row[$ii]['ep_title']  ."</option>";
										
									}
		                           ?>
	                       		</select>
	                       	</div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">City</label>
                            <div class="col-lg-8">
                           		<select class="form-control" id="videoCity">
                           			<option value="0">Select City</option>		
		                           <?php 
		                            $sql = "SELECT * FROM ep_city";
		                            $row = $db->queryArray($sql);
		                            for( $ii = 0 ; $ii < count( $row ) ; $ii ++ ){
										if ( $row[$ii]['ep_city'] == $dataVideo['ep_city'] )
											echo "<option value='".$row[$ii]['ep_city']."' selected>".$row[$ii]['ep_city_name']  ."</option>";
										else
											echo "<option  value='".$row[$ii]['ep_city']."'>".$row[$ii]['ep_city_name']  ."</option>";
									}
		                           ?>
	                       		</select>
	                       	</div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Username</label>
                            <div class="col-lg-10">
                                <input type="text" value="<?php echo $dataVideo['ep_username']?>" class="form-control" id="username" readonly style="background:#FEFEFE; cursor: pointer;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Created Time</label>
                            <div class="col-lg-10">
                                <input type="text" value="<?php echo $dataVideo['ep_created_time']?>" class="form-control" readonly style="background:#FEFEFE; cursor: pointer;" >
                            </div>
                        </div>
                                                
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10" style="text-align:center;">
                                <button class="btn-u btn-u-green" style="margin-right: 20px;width:90px;" onclick="onVideoSave()"><i class="icon-edit"></i> Save</button>
                                <button class="btn-u btn-u-red" style="width:90px;" onclick="window.location.href='videoList.php'"><i class="icon-list"></i> List</button>
                            </div>
                        </div>                                                                        
					</div>
				</div>
			</div>
		</div>
    </div>
</div>
</body>
</html>