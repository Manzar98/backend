<?php 
include '../common-sql.php';
  // print_r($_POST);
$is_check=true;
$responseArray=[];

if (empty($_POST['room_name'])) {

  $is_check=false;
  array_push($responseArray,"Room name is required");

}else{

  $name= $_POST['room_name'];
}

if (empty($_POST['room_nosroom'])) {

  $is_check=false;
  array_push($responseArray,"Number of rooms field is required");

}elseif (!is_numeric($_POST['room_nosroom'])) {

  $is_check=false;
  array_push($responseArray,"Number of rooms field should only contain numbers.");

}
else{

  $nos= $_POST['room_nosroom'];
}

if (empty($_POST['room_service'])) {

  $is_check=false;
  array_push($responseArray,"Room service field is required");

}else{

  $service=$_POST['room_service'];
}

if (empty($_POST['room_maxadult'])) {

  $is_check=false;
  array_push($responseArray,"Maximum adults field is required");

}elseif (!is_numeric($_POST['room_maxadult'])) {

  $is_check=false;
  array_push($responseArray,"Maximum adults field should only contain numbers.");

}else{

  $maxadult=$_POST['room_maxadult'];
}

if (empty($_POST['room_matadult'])) {

  $is_check=false;
  array_push($responseArray,"Extra mattress charges for adults field is required");

}elseif (!is_numeric($_POST['room_matadult'])) {

  $is_check=false;
  array_push($responseArray,"Extra mattress charges field should only contain numbers.");

}else{

  $matadult=$_POST['room_matadult'];
}

if (empty($_POST['room_maxchild'])) {

  $is_check=false;
  array_push($responseArray,"Maximum children field is required");

}elseif (!is_numeric($_POST['room_maxchild'])) {

  $is_check=false;
  array_push($responseArray,"Maximum children field should only contain numbers.");

}else{

  $maxchild=$_POST['room_maxchild'];
}

if (empty($_POST['room_matchild'])) {

  $is_check=false;
  array_push($responseArray,"Extra mattress charges for children field is required");

}elseif (!is_numeric($_POST['room_matchild'])) {

  $is_check=false;
  array_push($responseArray,"Extra mattress charges for children field should only contain numbers.");

}else{

  $matchild=$_POST['room_matchild'];
}

if (empty($_POST['room_perni8'])) {

  $is_check=false;
  array_push($responseArray,"Room charges field is required");

}elseif (!is_numeric($_POST['room_perni8'])) {

  $is_check=false;
  array_push($responseArray,"Room charges field should only contain numbers.");

}else{

  $ni8=$_POST['room_perni8'];
}

if (empty($_POST['room_descrip'])) {

  $is_check=false;
  array_push($responseArray,"Room description field is required");

}else{

  $descrip=$_POST['room_descrip'];
 }

if (empty($_POST['room_other'])) {

  $is_check=false;
  array_push($responseArray,"Amenities field is required");

}else{

  $other=$_POST['room_other'];
}

if (empty($_POST['hotel_name'])) {

  $is_check=false;
  array_push($responseArray,"Select hotel is required");

}else{

  $hotelName=$_POST['hotel_name'];  
}


 foreach($_POST['book_fromdate'] as $bokFROM) { 
                   
     if (!empty($bokFROM)) {
          
           
        // $resultfrom = DateTime::createFromFormat("m/d/Y", $_POST['book_fromdate']);
       if (preg_match('%\A(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d\z%', $bokFROM)) {

           $from= $bokFROM;

       }else{

          $is_check=false;
          array_push($responseArray,"From date field is invalid");
       }
  
     }else{

     $from=null;
     }
 }


   foreach($_POST['book_todate'] as $bokTO) { 
               
     if (!empty($bokTO)) {
                       
         // $resultto = $_POST['book_todate']->format("m/d/Y");
       if (preg_match('%\A(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d\z%', $bokTO)) {

           $to= $bokTO;

         }else{

           $is_check=false;
            array_push($responseArray,"To date field is invalid");

         }
    
      }else{

       $to=null;
      }
   }

if (!empty($_POST['room_offerdiscount']) && !is_numeric($_POST['room_offerdiscount'])) {

  $is_check= false;
  array_push($responseArray,"Offer discount field should only contain numbers.");

}elseif (!empty($_POST['room_offerdiscount']) && empty($_POST['room_expireoffer'])) {

  $is_check= false;
  array_push($responseArray,"Expire offer date field is required");

}
elseif (!empty($_POST['room_offerdiscount']) && is_numeric($_POST['room_offerdiscount'])) {

  $discuntofer=$_POST['room_offerdiscount'];

}else{

  $discuntofer=null;
}

if (!empty($_POST['room_expireoffer'])) {
  # code...

  if (!empty($_POST['room_expireoffer']) && empty($_POST['room_offerdiscount'])) {

    $is_check=false;
    array_push($responseArray,"Offer discount field is required");

  }else{
        // $result = DateTime::createFromFormat("m/d/Y", $_POST['room_expireoffer']);
    
    //   $date = date_create($_POST['room_expireoffer']);
    // $result = date_format($date,"m/d/Y");
    if (preg_match('%\A(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d\z%', $_POST['room_expireoffer'])) {

      $discountexpire=$_POST['room_expireoffer'];

      }else{

         $is_check=false;
       array_push($responseArray,"Expire offer field is invalid");
    }
  
  }
}else{
  $discountexpire=null;
}




if (isset($_POST['room_inactive'])) {

  $inactive=$_POST['room_inactive'];

}else{

  $inactive="off";
}

$errorMsgs=implode(",",$responseArray);

$newErrorMsgArr=array(
    "status"=> "error",
    "message"=> $errorMsgs
);

$newSuccessMsgArr=array(
    "status"=> "success"
    
);




if ($is_check==true) {

getUpdatequery('room',$_POST,array('hotel_id'=>$_POST['hotel_id'],'room_id'=>$_POST['room_id']));
  echo json_encode($newSuccessMsgArr);

}else{

  echo json_encode($newErrorMsgArr);
    return false;
}






/*----------------------------
    Function for dynamic Update Query for Hotels
 ------------------------------*/
    function   getUpdatequery($tableName,$updateObject,$where){



global $conn;
     $whereClauseArray = array();
     $updtevalues      = array();

     if (!empty($_POST['hotel_id']) && !empty($_POST['room_id'])) {
       # code...
    

      foreach ($updateObject as $key => $value) {

     // echo 	gettype($value);
        if($key!='common_image' && $key!='common_video' && gettype($value)=="string"){

        	$updtevalues[] = "$key = '$value'";
        }elseif (gettype($value)=="array") {
                
                 // print_r($value) ;
        	foreach ($value as $k => $v) {
				 
      if (isset($updateObject['common_bokdate_id'][$k])) {
        # code...
     
				  $updatequerydates= "UPDATE common_bookdates SET "."book_fromdate='".$updateObject['book_fromdate'][$k]."',book_todate='".$updateObject['book_todate'][$k]."' WHERE common_bokdate_id=".$updateObject['common_bokdate_id'][$k];
				  mysqli_query($conn,$updatequerydates) or die(mysqli_error($conn));
				  //echo $updatequery;
        		 // echo 'Book value : '.$updateObject['book_fromdate'][$k];
        		 // echo 'Book Key : '.$k;

        	}
        }
        
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
      
 }

}

 
?>