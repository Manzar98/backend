<?php

include 'common-sql.php';

$uploadDir = 'images/uploads';




if (!empty($_FILES)) {
$tmpFile = $_FILES['file']['tmp_name'];
 $file = time().'-'. $_FILES['file']['name'];
 $filename = $uploadDir.'/'.$file;
 move_uploaded_file($tmpFile,$filename);
 // echo $filename;

  for ($i=0; $i <count($filename); $i++) { 
 	# code...
 	if (isset($_POST['photo_type'])) {
 		# code...
 

 if ($_POST['photo_type'] == 'interior') {
 	# code...
 	$imgQuery='INSERT INTO common_imagevideo(common_image,photo_int_ext_type)Values("'.$filename.'","'.$_POST['photo_type'].'")';

 }elseif ($_POST['photo_type'] == 'exterior') {
 	# code...


 	$imgQuery='INSERT INTO common_imagevideo(common_image,photo_int_ext_type)Values("'.$filename.'","'.$_POST['photo_type'].'")';
 }

 	}elseif(isset($_POST['cover_type'])){

       $imgQuery='INSERT INTO common_imagevideo(hotel_coverimg)Values("'.$filename.'")';
 	}


 	else {
 	
 	$imgQuery='INSERT INTO common_imagevideo(common_image)Values("'.$filename.'")';
 }

 

// print_r($imgQuery);
 if ($conn->query($imgQuery)== TRUE) {
 	# code...
 	$img_id=$conn->insert_id;

 
 }else{
 	echo "Error: " . $imgQuery . "<br>" . $conn->error;
 }
  // echo $img_id;
   }
 $data = array("filename"=>$filename, "id"=>$img_id);

 echo json_encode($data);
}

?>