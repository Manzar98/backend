<?php  
include '../common-sql.php';
   // print_r($_POST);

/*----------------------------
    Function for dynamic Update Query for Hotels
 ------------------------------*/
    function   getUpdatequery($tableName,$updateObject,$where){



global $conn;
     $whereClauseArray = array();
     $updtevalues      = array();

      if (!empty($_POST['hotel_id']) && !empty($_POST['banquet_id'])) {
       # code...
    

      foreach ($updateObject as $key => $value) {

      // echo 	gettype($value);
        if($key!='common_image' && $key!='common_video' && gettype($value)=="string"){

        	$updtevalues[] = "$key = '$value'";
        }elseif (gettype($value)=="array") {
                
                 // print_r($value) ;
        	foreach ($value as $k => $v) {
				   // echo $v;

				    $updatequerydates= "UPDATE common_bookdates SET "."book_fromdate='".$updateObject['book_fromdate'][$k]."',book_todate='".$updateObject['book_todate'][$k]."' WHERE common_bokdate_id=".$updateObject['common_bokdate_id'][$k];


				    mysqli_query($conn,$updatequerydates) or die(mysqli_error($conn));

				    $updatequerymenu= "UPDATE common_menupackages SET "."foodpkg_name='".$updateObject['foodpkg_name'][$k]."',foodpkg_price='".$updateObject['foodpkg_price'][$k]."',foodpkg_discount='".$updateObject['foodpkg_discount'][$k]."',foodpkg_item='".$updateObject['foodpkg_item'][$k]."' WHERE common_menupkg_id=".$updateObject['common_menupkg_id'][$k];

				    mysqli_query($conn,$updatequerymenu) or die(mysqli_error($conn));
				  //echo $updatequery;
        		 // echo 'Book value : '.$updateObject['book_fromdate'][$k];

        		  // echo 'Menu Value : '.$updateObject['common_menupkg_id'][$k];

        	}
        	# code...
        }
        
      }
        //array_push($updtevalues,"user_type='".$updateObject['inforole']."'");    
          // print_r($updtevalues);

       /*Where clause generation*/
       foreach ($where as $key => $value) {	
       			
				$whereClauseArray[]="$key='$value'";
     	}
     	
     	if (count($whereClauseArray)==1) {
       			//$query='SELECT * From '.$tableName.' WHERE '.$slct[0] ;
       			$updatequery= "UPDATE ".$tableName." SET ". implode(',', $updtevalues). " WHERE ".$whereClauseArray[0];
       			 echo $updatequery;
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
        // echo $updatequery;
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

 getUpdatequery('banquet',$_POST,array('hotel_id'=>$_POST['hotel_id'],'banquet_id'=>$_POST['banquet_id']));







?>