<?php

/* Getting file name */
$filename = $_FILES['file']['name'];;
/* Getting File size */
$filesize = $_FILES['file']['size'];

/* Location */
$location = "/var/www/html/Parthiban/Dragdrop/upload/" . $filename;
//
$show_location = "upload/" .$filename;

$return_arr = array();

/* Upload file */
if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
    $src = "default.png";   
    // checking file is image or not
    if(is_array(getimagesize($location))){
        $src = $show_location;
    }
    $return_arr = array("name" => $filename,"size" => $filesize, "src"=> $src);
}

echo json_encode($return_arr);