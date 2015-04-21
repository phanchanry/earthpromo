<?php session_start(); ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
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
		$pageNo = 2;
	?>
	<link rel="stylesheet" type="text/css" href="http://www.datatables.net/media/blog/bootstrap_2/DT_bootstrap.css">
	
	<script type="text/javascript" src="js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="js/DT_bootstrap.js"></script>
	<script type="text/javascript" src="js/videoList.js"></script>		
</head>

<body>

<?php require_once("top.php"); ?>

<div class="container" style="min-height: 530px;">     
    <div class="row">
		<?php require_once("leftMenu.php"); ?>
        <div class="col-md-9">
			<div class="panel panel-sea margin-bottom-40">
				<div class="panel-heading">
					<h3 class="panel-title floatleft" style="line-height:30px;"><i class="icon-user"></i> Video List</h3>
					<button class="floatright btn-u btn-u-red" onclick="onDeleteVideo()" style="width: 90px;"><i class="icon-trash"></i> Delete</button>
					<!-- button class="floatright btn-u btn-u-blue" onclick="onAddVideo()" style="margin-right:10px;width: 90px;"><i class="icon-plus"></i> Add</button -->
					<div class="clearboth"></div>
				</div>
				<?php
				$sql = "SELECT t1.ep_username, t2.*, t3.ep_title as category_name, t4.*
			    		  FROM ep_user t1, ep_video t2, ep_category t3, ep_city t4
			   			 WHERE t1.ep_user = t2.ep_user
			  		       AND t3.ep_category = t2.ep_category 
						   AND t2.ep_city = t4.ep_city
						ORDER BY t2.ep_video asc";
					$dataVideo = $db->queryArray( $sql ); 
				?>
				<table class="table table-striped" id="example">
					<thead>
						<tr>
							<th><input type="checkbox" id="checkAll" onclick="onCheckAll( this )"/></th>
							<th>No</th>
							<th>Title</th>
							<th>Category</th>
							<th>City</th>
							<th>Username</th>
							<th>Created Time</th>
						</tr>
					</thead>
					<tbody>
					<?php for( $i = 0 ; $i < count($dataVideo) ; $i ++ ){?>
						<tr>
							<td><input type="checkbox" id="chkVideoId" value="<?php echo $dataVideo[$i]['ep_video']; ?>"/></td>
							<td><?php echo $i + 1; ?></td>
							<td><a href="videoDetail.php?id=<?php echo $dataVideo[$i]['ep_video']; ?>"><?php echo $dataVideo[$i]['ep_description']; ?></a></td>
							<td><a href="videoDetail.php?id=<?php echo $dataVideo[$i]['ep_video']; ?>"><?php echo $dataVideo[$i]['category_name']; ?></a></td>
							<td><a href="videoDetail.php?id=<?php echo $dataVideo[$i]['ep_video']; ?>"><?php echo $dataVideo[$i]['ep_city_name']; ?></a></td>
							<td><a href="videoDetail.php?id=<?php echo $dataVideo[$i]['ep_video']; ?>"><?php echo $dataVideo[$i]['ep_username']; ?></a></td>
							<td><a href="videoDetail.php?id=<?php echo $dataVideo[$i]['ep_video']; ?>"><?php echo $dataVideo[$i]['ep_created_time']; ?></a></td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>        			       
        </div>
    </div>          
</div>     
<?php require_once("footer.php"); ?>
</body>
</html> 