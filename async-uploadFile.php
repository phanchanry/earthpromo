<?php 
require_once("./common/functions.php");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
    $file_name = $_FILES['fileUpload']['name'];
    $file_type = $_FILES['fileUpload']['type'];
    $file_size = $_FILES['fileUpload']['size'];
	
    $tempExt = explode(".", $file_name);
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $cntTempExt = count($tempExt); 
    $real_file_name = EP_generateRandom(6)."_".time().".$ext";
    $allowed_extensions = array("webm", "mp4", "mp3");
    $file_size_max = 10485760;
    $pattern = implode ($allowed_extensions, "|");

    if (!empty($real_file_name))
    {    //here is what I changed - as you can see above, I used implode for the array
        // and I am using it in the preg_match. You pro can do the same with file_type,
        // but I will leave that up to you
        if (preg_match("/({$pattern})$/i", $real_file_name) && $file_size < $file_size_max)
        {
            if (($file_type == "video/webm") || ($file_type == "video/mp4") || ($file_type == "video/ogv"))
            {
                if ($_FILES['fileUpload']['error'] > 0)
                {
                    echo "Unexpected error occured, please try again later.";
                } else {
                    if (file_exists("video/".$real_file_name))
                    {
                        echo $real_file_name." already exists.";
                    } else {
                        move_uploaded_file($_FILES["fileUpload"]["tmp_name"], "video/".$real_file_name);
                        echo "success::" . "video/".$real_file_name;
                    }
                }
            } else {
                echo "invalid";
            }
        }else{
            echo "exceed";
        }
    } else {
        echo "Please select a video to upload.";
    }
    exit;
}
?>