<?php 
$image = imagecreatefromjpeg($_GET['src']);
$filename = 'images/cropped_whatever.jpg';

$thumb_width = 200;
$thumb_height = 150;

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

 echo '<img src="'.$filename.'" >';
return false;















$name = ''; 
$type = ''; 
$size = ''; 
$error = '';
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

if ($_POST) 
{ 
if ($_FILES["file"]["error"] > 0) 
{ $error = $_FILES["file"]["error"]; 
} 
else if (($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/pjpeg")) 
{ $url = 'destinationx.jpg'; 
$filename = compress_image($_FILES["file"]["tmp_name"], $url, 40); 
$buffer = file_get_contents($url); /* Force download dialog... */ 
header("Content-Type: application/force-download"); 
header("Content-Type: application/octet-stream"); 
header("Content-Type: application/download"); /* Don't allow caching... */ header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); /* Set data type, size and filename */ 
header("Content-Type: application/octet-stream"); 
header("Content-Transfer-Encoding: binary"); 
header("Content-Length: " . strlen($buffer)); 
header("Content-Disposition: attachment; filename=$url"); /* Send our file... */ 
echo $buffer; }
else { $error = "Uploaded image should be jpg or gif or png"; } }?> 
<html>  
    <head> 
        <title>Php code compress the image</title> 
    </head> 
<body> 
<div class="message"> 
    <?php if($_POST){ if ($error) { ?> 
    <label class="error"><?php echo $error; ?></label> 
    <?php } } ?> 
</div> 

    <fieldset class="well"> <legend>Upload Image:</legend> 
<form action="" name="myform" id="myform" method="post" enctype="multipart/form-data"> 
    <ul> 
    <li> 
        <label>Upload:</label> 
        <input type="file" name="file" id="file"/> 
    </li> 
        <li> 
            <input type="submit" name="submit" id="submit" class="submit btn-success"/> 
        </li> 
    </ul> 
</form> 
</fieldset> 
</body> 
</html>