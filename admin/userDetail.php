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
		EP_isAdmin();
    	if( isset($_GET['id']) && $_GET['id'] != "" ){
			$userId = $_GET['id'];
			$sql = "select * from ep_user where ep_user = $userId";
			$dataUser = $db->queryArray( $sql );
			$dataUser = $dataUser[0];
			$type = "Edit";
		}else{
			$type = "Add";
		}    	
    	$pageNo = 1; 
	?>
	<link rel="stylesheet" type="text/css" href="http://www.datatables.net/media/blog/bootstrap_2/DT_bootstrap.css">
	
	<script type="text/javascript" src="js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="js/DT_bootstrap.js"></script>
	<script type="text/javascript" src="js/userDetail.js"></script>		
</head>
<body>
<?php require_once("top.php"); ?>
<div class="container" style="min-height: 530px;">     
    <div class="row">
	    <?php require_once("leftMenu.php"); ?>
	   	 <div class="col-md-9">
			<div class="panel panel-green margin-bottom-40">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="icon-user"></i> User <?php echo $type;?></h3>
                </div>
                <div class="panel-body">
                	<div class="form-horizontal">
                		<input type="hidden" id="type" value="<?php echo $type;?>"/>
                		<input type="hidden" id="userId" value="<?php echo $userId?>"/>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Username</label>
                            <div class="col-lg-10">
                                <input type="text" value="<?php echo $dataUser['ep_username']?>" class="form-control" id="username" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Password</label>
                            <div class="col-lg-10">
                                <input type="password" class="form-control" id="password" placeholder="Password">
                                <?php if( $type == "Edit" ){?>
                                <span style="color:#777;font-size:12px;font-style:italic;">If you would like to change the password type a new one.Otherwise leave this blank.</span>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Email Address</label>
                            <div class="col-lg-10">
                                <input type="text" value="<?php echo $dataUser['ep_email']?>" class="form-control" id="email" placeholder="Email Address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Admin Y/N</label>
                            <div class="col-lg-10">
                            	<select class="form-control" id="adminYn">
                            		<option value="Y" <?php if( $dataUser['ep_is_admin'] == "Y" ) echo "selected"; ?>>Yes</option>
                            		<option value="N" <?php if( $dataUser['ep_is_admin'] == "N" ) echo "selected"; ?>>No</option>
                            	</select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Referred by</label>
                            <div class="col-lg-10">
                                <input type="text" value="<?php echo $dataUser['ep_referred_by']?>" class="form-control" id="referredBy" placeholder="Referred by" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Phone number</label>
                            <div class="col-lg-10">
                                <input type="text" value="<?php echo $dataUser['ep_phone_number']?>" class="form-control" id="phoneNumber" placeholder="Phone number" >
                            </div>
                        </div>
                                                
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10" style="text-align:center;">
                                <button class="btn-u btn-u-green" style="margin-right: 20px;width:90px;" onclick="onUserSave()"><i class="icon-edit"></i> Save</button>
                                <button class="btn-u btn-u-red" style="width:90px;" onclick="window.location.href='userList.php'"><i class="icon-list"></i> List</button>
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