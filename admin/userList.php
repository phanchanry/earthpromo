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
		$pageNo = 1;
		EP_isAdmin();
	?>
	<link rel="stylesheet" type="text/css" href="http://www.datatables.net/media/blog/bootstrap_2/DT_bootstrap.css">

	<script type="text/javascript" src="js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="js/DT_bootstrap.js"></script>
	<script type="text/javascript" src="js/userList.js"></script>		
</head>

<body>

<?php require_once("top.php"); ?>

<div class="container" style="min-height: 530px;">     
    <div class="row">
		<?php require_once("leftMenu.php"); ?>
        <div class="col-md-9">
			<div class="panel panel-sea margin-bottom-40">
				<div class="panel-heading">
					<h3 class="panel-title floatleft" style="line-height:30px;"><i class="icon-user"></i> User List</h3>
					<button class="floatright btn-u btn-u-red" onclick="onDeleteUser()" style="width: 90px;"><i class="icon-trash"></i> Delete</button>
					<button class="floatright btn-u btn-u-blue" onclick="onAddUser()" style="margin-right:10px;width: 90px;"><i class="icon-plus"></i> Add</button>
					<div class="clearboth"></div>
				</div>
				<?php
					$sql = "select * 
							  from ep_user";
					$dataUser = $db->queryArray( $sql ); 
				?>
				<table class="table table-striped" id="example">
					<thead>
						<tr>
							<th><input type="checkbox" id="checkAll" onclick="onCheckAll( this )"/></th>
							<th>No</th>
							<th>Username</th>
							<th>Email</th>
							<th>Admin(y/n)</th>
							<th>Referred by</th>
							<th>Phone number</th>
						</tr>
					</thead>
					<tbody>
						<?php for($i = 0 ; $i < count( $dataUser); $i ++ ){?>
						<tr>
							<td><input type="checkbox" id="chkUserId" value="<?php echo $dataUser[$i]['ep_user']; ?>"/></td>
							<td><?php echo $i + 1; ?></td>
							<td><a href="userDetail.php?id=<?php echo $dataUser[$i]['ep_user']; ?>" ><?php echo $dataUser[$i]['ep_username']; ?></a></td>
							<td><a href="userDetail.php?id=<?php echo $dataUser[$i]['ep_user']; ?>" ><?php echo $dataUser[$i]['ep_email']; ?></a></td>
							<td><a href="userDetail.php?id=<?php echo $dataUser[$i]['ep_user']; ?>" ><?php echo $dataUser[$i]['ep_is_admin']; ?></a></td>
							<td><a href="userDetail.php?id=<?php echo $dataUser[$i]['ep_user']; ?>" ><?php echo $dataUser[$i]['ep_referred_by']; ?></a></td>
							<td><a href="userDetail.php?id=<?php echo $dataUser[$i]['ep_user']; ?>" ><?php echo $dataUser[$i]['ep_phone_number']; ?></a></td>														
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>        			       
        </div>
    </div>          
</div>     
<?php require_once("footer.php"); ?>
</body>
</html> 