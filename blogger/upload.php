<?php
/*(Creation Time) Images save into database independently(azaad) and condition goes to last else*/
/*(Edition Time) Images save images save against list id*/
include '../common-sql.php';
   // print_r($_POST);

if (!empty($_FILES)) {

$name = ''; 
$type = ''; 
$size = ''; 
$error = '';

$tmpFile = $_FILES['file']['tmp_name'];
 $file = time().'-'. $_FILES['file']['name'];

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


/*==========Crop img function======*/

function croppingImage($file,$url){
    $image = imagecreatefromjpeg($file);
$filename = '../images/uploads/'.$url;

$thumb_width = 800;
$thumb_height = 600;

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






$url = $file; 
 $compfilename = compress_image($_FILES["file"]["tmp_name"], $url, 40);//calling compress function
 // $compfilename='images/uploads/'.$compfilename;
 croppingImage($compfilename,$url);//calling crop function
$img_video_type='hotel';
 for ($i=0; $i <count($compfilename); $i++) { 
  	# code...
      if (isset($_POST['photo_type'])) {
  
        		  if ($_POST['photo_type'] == 'interior' && !isset($_POST['hotel_id'])) {
        		  	# code...
        		  	$imgQuery='INSERT INTO common_imagevideo(common_image,photo_int_ext_type)Values("'.'../images/uploads/'.$compfilename.'","'.$_POST['photo_type'].'")';

        		  }elseif ($_POST['photo_type'] == 'exterior' && !isset($_POST['hotel_id'])) {

        		  	$imgQuery='INSERT INTO common_imagevideo(common_image,photo_int_ext_type)Values("'.'../images/uploads/'.$compfilename.'","'.$_POST['photo_type'].'")';
                 
        		  }elseif ($_POST['photo_type'] == 'exterior' && isset($_POST['hotel_id'])) {
    
                $imgQuery='INSERT INTO common_imagevideo(common_image,photo_int_ext_type,img_video_type,hotel_id)Values("'.'../images/uploads/'.$compfilename.'","'.$_POST['photo_type'].'","'.$img_video_type.'","'.$_POST['hotel_id'].'")';
                 // echo $imgQuery;

                }elseif ($_POST['photo_type'] == 'interior' && isset($_POST['hotel_id'])) {
                $imgQuery='INSERT INTO common_imagevideo(common_image,photo_int_ext_type,img_video_type,hotel_id)Values("'.'../images/uploads/'.$compfilename.'","interior","'.$img_video_type.'","'.$_POST['hotel_id'].'")'; 
                        // echo $imgQuery;
                }

  	  }elseif(isset($_POST['cover_type'])){

          $imgQuery='INSERT INTO common_imagevideo(hotel_coverimg)Values("'.'../images/uploads/'.$compfilename.'")';
          // echo $imgQuery;

  	  }elseif (isset($_POST['hotel_id']) && isset($_POST['hotelCover'])) {

    	  $imgQuery='INSERT INTO common_imagevideo(hotel_coverimg,hotel_id)Values("'.'../images/uploads/'.$compfilename.'","'.$_POST['hotel_id'].'")';
            // echo $imgQuery;
  	  }elseif(isset($_POST['room_id'])){
 		  
  		  $imgQuery= 'INSERT INTO common_imagevideo(common_image,room_id,img_video_type)Values("'.'../images/uploads/'.$compfilename.'","'.$_POST['room_id'].'","room")';

	  }elseif (isset($_POST['banquet_id'])) {

  		  $imgQuery= 'INSERT INTO common_imagevideo(common_image,banquet_id,img_video_type)Values("'.'../images/uploads/'.$compfilename.'","'.$_POST['banquet_id'].'","banquet")';
		
  	  }elseif (isset($_POST['conference_id'])) {

  		$imgQuery= 'INSERT INTO common_imagevideo(common_image,conference_id,img_video_type)Values("'.'../images/uploads/'.$compfilename.'","'.$_POST['conference_id'].'","conference")';

  	  }elseif (isset($_POST['tour_id'])) {

  		$imgQuery= 'INSERT INTO common_imagevideo(common_image,tour_id,img_video_type)Values("'.'../images/uploads/'.$compfilename.'","'.$_POST['tour_id'].'","tour")';
 		
  	  }elseif (isset($_POST['event_id'])) {

  		$imgQuery= 'INSERT INTO common_imagevideo(common_image,event_id,img_video_type)Values("'.'../images/uploads/'.$compfilename.'","'.$_POST['event_id'].'","event")'; 

  	  }elseif (isset($_POST['blog_id'])) {

      $imgQuery= 'INSERT INTO common_imagevideo(common_image,blog_id,img_video_type)Values("'.'../images/uploads/'.$compfilename.'","'.$_POST['blog_id'].'","blog")'; 

      }else {

  	   $imgQuery='INSERT INTO common_imagevideo(common_image)Values("'.'../images/uploads/'.$compfilename.'")';
       

     }

 if ($conn->query($imgQuery)== TRUE) {
  	
  	$img_id=$conn->insert_id;

  }else{

  	echo "Error: " . $imgQuery . "<br>" . $conn->error;
  }

}
  $data = array("filename"=>'../images/uploads/'.$compfilename, "id"=>$img_id);
  unlink($compfilename);
  echo json_encode($data);
 }

 
 ?>