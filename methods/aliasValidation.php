<?php 
 include $_POST['connection'];


 $query='SELECT * From  '.$_POST['tblName'].' WHERE '.$_POST['colName'].'="'.$_POST['colValue'].'"';
 $result =mysqli_query($conn,$query) or die(mysqli_error($conn));
 

 if (mysqli_num_rows($result)> 0) {
   
   // print_r(mysqli_fetch_assoc($result));
 	$res_array=array(
 		"status"=> "Error",
 	     "message"=> "Alias already exist");
    echo json_encode($res_array);
    return false;

}else{

   $res_array=array(
 		"status"=> "Success",
 	     "message"=> "Alias is not already exist");
   
    echo json_encode($res_array);
    
} 

  

?>