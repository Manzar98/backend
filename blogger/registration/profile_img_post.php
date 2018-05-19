<?php
// print_r($_POST) ;
  $data = $_POST['image'];


list($type, $data) = explode(';', $data);
list(, $data)      = explode(',', $data);


$data = base64_decode($data);
$imageName = time().'.png';
 file_put_contents('../../images/uploads/'.$imageName, $data);

 $storedimg='../../images/uploads/'.$imageName;
echo $storedimg;
 // $res_Array=array(
 //    "status"=>"Success",
 //     "imgpath"=> $storedimg);

 //      json_encode($res_Array);
   
?>