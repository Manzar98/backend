<?php 
include '../../common-sql.php';

if (isset($_POST['id'])) {

$query='DELETE FROM amenities WHERE amenity_id="'.$_POST['id'].'"';
mysqli_query($conn,$query) or die(mysqli_error($conn));
}else{

$query='INSERT INTO amenities(user_id,amenity_name,amenity_description,amenity_page,amenity_inactive)VALUES("'.$_POST['user_id'].'","'.$_POST['name'].'","'.$_POST['descrp'].'","'.$_POST['page'].'","off")';  

if ($conn->query($query)== TRUE) {
  	# code...
  	$amenity_id =$conn->insert_id;

// echo $banquet_id;
  }else{
  	echo "Error: " . $query . "<br>" . $conn->error;
  }

$newSuccessMsgArr=array(
    "status"=> "success",
    "id"=>$amenity_id
    
);

echo json_encode($newSuccessMsgArr);
}




?>