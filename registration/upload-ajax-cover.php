<?php

/*==========Compress img function======*/
 $file = time().'-'. $_FILES['file']['name'];
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

/*==========Crop img function======*/

function croppingImage($file,$url){
    $image = imagecreatefromjpeg($file);
$filename = 'images/uploads/'.$url;

$thumb_width = 1012;
$thumb_height = 191;

$width = imagesx($image);
$height = imagesy($image);

$original_aspect = $width / $height;
$thumb_aspect = $thumb_width / $thumb_height;

if ( $original_aspect >= $thumb_aspect )
{
   // If image is wider than thumbnail (in aspect ratio sense)
   $new_height = $thumb_height;
   $new_width = $width / ($height / $thumb_height);
}
else
{
   // If the thumbnail is wider than the image
   $new_width = $thumb_width;
   $new_height = $height / ($width / $thumb_width);
}

$thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

// Resize and crop
imagecopyresampled($thumb,
                   $image,
                   0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                   0 - ($new_height - $thumb_height) / 2, // Center the image vertically
                   0, 0,
                   $new_width, $new_height,
                   $width, $height);
imagejpeg($thumb, $filename, 80);
 //
 // echo '<img src="'.$filename.'" >';
} 



    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {

                      $url=$file;
    	               $storedCover= 'images/uploads/' .time()."-".$_FILES['file']['name'];
                      $compfilename = compress_image($_FILES["file"]["tmp_name"], $url, 40);
                    croppingImage($compfilename,$file);

          echo $storedCover;
    }

?>