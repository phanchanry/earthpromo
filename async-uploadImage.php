<?php
session_start();
require_once("./common/DB_Connection.php");
require_once("./common/functions.php");
require_once("./common/simpleImage.php");
$uploadType = $_POST['uploadType'];

$path = "img/".$uploadType."/";

$imageSize = 10000;

$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['imageUpload']['name'];
	$size = $_FILES['imageUpload']['size'];
	if(strlen($name))
	{
		list($txt, $ext) = explode(".", $name);
		if(in_array($ext,$valid_formats))
		{
			if( $size<( $imageSize * $imageSize ) ) // Image size max 1 MB
			{
				$actual_image_name = EP_generateRandom(6)."_".time().".".$ext;
				$tmp = $_FILES['imageUpload']['tmp_name'];
				if(move_uploaded_file($tmp, $path.$actual_image_name))
					echo "<img class='col-lg-2' style='height:auto;margin: 10px 10px;' src='/".$path.$actual_image_name."'>";
				else
					echo "failed";
				if( $uploadType == "location"){
					$image = new SimpleImage();
					$image->load( $path.$actual_image_name );
					$image->save( $path . $actual_image_name );					
				}

			}
			else
				echo "Image file size max 1 MB"; 
		}
		else
			echo "Invalid file format.."; 
	}
	else
		echo "Please select image..!";
	exit;
}
?>