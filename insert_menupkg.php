<?php
  include 'common-sql.php';
// print_r($_POST);
  

   function getInsertQuery($tableName,$postObject){
  $formtype=$_GET['type'];

global $conn;
  for ($i=0; $i<count($_POST['foodpkg_price']); $i++) {


	$pkgQuery='INSERT INTO '.$tableName.'('.$_GET['column_idName'].',foodpkg_name,foodpkg_price,foodpkg_discount,foodpkg_item,conference_banquet_type)VALUES("'.$_GET['id'].'","'.$_POST['foodpkg_name'][$i].'","'.$_POST['foodpkg_price'][$i].'","'.$_POST['foodpkg_discount'][$i].'","'.$_POST['foodpkg_item'][$i].'","'.$formtype.'")';
    // echo $pkgQuery;
  $result=mysqli_query($conn,$pkgQuery) or die(mysqli_error($conn));



}
if ($result==1) {
  # code...
  $resArray=array(
   "status"=> "success",
   "message" => "insertion completed"
  );

 echo json_encode($resArray);
 }else{
 	  $resArray=array(
   "status"=> "failed",
   "message" => $conn->error
  );

 echo json_encode($resArray);
  // echo "Error: " . $query . "<br>" . $conn->error;
 }
    
}
getInsertQuery('common_menupackages',$_POST);
?>