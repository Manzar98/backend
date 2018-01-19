<?php 
include '../common-sql.php';
   print_r($_POST);
$h_id = $_POST['hotel_id'];

  // echo gettype($_POST['hotel_other'][0]);
/*----------------------------
    Function for dynamic Update Query for Hotels
 ------------------------------*/
    function   getUpdatequery($tableName,$updateObject,$where){

     $whereClauseArray = array();
     $updtevalues      = array();

     if (!empty($_POST['hotel_id'])) {
       # code...
   

      foreach ($updateObject as $key => $value) {
        if($key!='common_image' && $key!='hotel_coverimage' && $key!='common_video'){
        	$updtevalues[] = "$key = '$value'";
        }
        
      }
        //array_push($updtevalues,"user_type='".$updateObject['inforole']."'");    
          //print_r($updtevalues);

       /*Where clause generation*/
       foreach ($where as $key => $value) {	
       			
				$whereClauseArray[]="$key='$value'";
     	}
     	
     	if (count($whereClauseArray)==1) {
       			//$query='SELECT * From '.$tableName.' WHERE '.$slct[0] ;
       			$updatequery= "UPDATE ".$tableName." SET ". implode(',', $updtevalues). " WHERE ".$whereClauseArray[0];
       			// echo $updatequery;
        }else if(count($whereClauseArray) > 1) {
        		$condString='';
				for ($i=0; $i < count($whereClauseArray); $i++) { 
					if ($condString=="") {
					    $condString = $whereClauseArray[$i]." AND ";    
					}else{
					    $condString .= $whereClauseArray[$i]." AND ";
					}
				}
				$condString = substr($condString,0,-4);
				$updatequery= "UPDATE ".$tableName." SET ". implode(',', $updtevalues). " WHERE ".$condString;
        }
       
       
        global $conn;
        $resultup=mysqli_query($conn,$updatequery) or die(mysqli_error($conn));
          // echo"manzar";
       if ($resultup==1) {

        	// return $resultup;
         	echo "sucess";
         }
  }else{

    echo 'you have an error';
  }



 }
getUpdatequery('hotel',$_POST,array('hotel_id'=>$h_id));


// DUmMY CODe

/*select('hotel',array('hotel_id'=>47));

$slct=array();
  foreach ($where as $key => $value) {
      
      $slct[]="$key='$value'";

     }
    //print_r($slct);
     if (count($slct)==1) {

       $query='SELECT * From '.$tableName.' WHERE '.$slct[0] ;
        
}else if (count($slct) > 1) {
  $condString='';
  for ($i=0; $i < count($slct); $i++) { 
    if ($condString=="") {
        $condString = $slct[$i]." AND ";    
      }else{
      $condString .= $slct[$i]." AND ";
    }
  }

   $condString = substr($condString,0,-4);
  $query='SELECT * From '.$tableName.' WHERE '.$condString;
}*/
?>