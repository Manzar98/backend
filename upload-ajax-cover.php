<?php

/*==========Compress img function======*/

function compress_image($source_url, $destination_url, $quality) 
{ 
    $info = getimagesize($source_url); 
if ($info['mime'] == 'image/jpeg') 
    $image = imagecreatefromjpeg($source_url); 
elseif ($info['mime'] == 'image/gif') 
    $image = imagecreatefromgif($source_url); 
elseif ($info['mime'] == 'image/png') 
    $image = imagecreatefrompng($source_url); 
    imagejpeg($image, $destination_url, $quality); 
    return $destination_url; 
} 



    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {


    	              $storedCover= 'images/uploads/' .time()."-".$_FILES['file']['name'];
                      $compfilename = compress_image($_FILES["file"]["tmp_name"], $storedCover, 40);
           

          echo $storedCover;
    }

?>