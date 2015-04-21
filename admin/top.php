<div class="breadcrumbs margin-bottom-40">
	<?php
		$sql = "select * from ep_user where ep_user = ".$_SESSION['EP_ADMIN_ID'];
		$dataInfo = $db->queryArray( $sql );
		$name = $dataInfo[0]['ep_username'];
	?>
    <div class="container">
        <h1 class="pull-left">EarthPromo Backend</h1>
        <ul class="pull-right breadcrumb">
            <a><?php echo $name;?></a>
            <span>&nbsp;|&nbsp;</span>
            <a onclick="onSignOut();">Sign Out</a>
        </ul>
    </div>
</div>