<?php  
include '../common-sql.php';
  // print_r($_POST);
$is_check=true;
$responseArray=[];

if (empty($_POST['event_name'])) {

  $is_check=false;
  array_push($responseArray,"Event name is required");

}else{

  $name         = $_POST['event_name'];
}

if (empty($_POST['event_venue'])) {

  $is_check=false;
  array_push($responseArray,"Venue field is required");

}else{
  
  $venue        = $_POST['event_venue'];
}

if (empty($_POST['event_recurrence'])) {

  $is_check=false;
  array_push($responseArray,"Recurrence field is required");

}else{
  
  $recurrence   = $_POST['event_recurrence'];
}

 if (empty($_POST['event_descrip'])) {

  $is_check=false;
  array_push($responseArray,"Event description field is required");

 }else{
  
  $descrip      = $_POST['event_descrip'];

 }
if (empty($_POST['event_entry'])) {

  $is_check=false;
  array_push($responseArray,"Entry fee field is required");

}elseif ($_POST['event_entry']=='yes') {

         $evententry   = $_POST['event_entry'];
         
         if(empty($_POST['event_entryfee'])){

        $is_check= false;
        array_push($responseArray,"Event price field is required");

        }elseif(!empty($_POST['event_entryfee']) && !is_numeric($_POST['event_entryfee'])){

                     $is_check=false;
                     array_push($responseArray,"Event price field should only contain numbers.");       

        }else{

                    $entryfee      = $_POST['event_entryfee'];
        } 
}else{
  
  $evententry   = $_POST['event_entry'];
  $entryfee = null;

}

if (empty($_POST['event_childallow'])) {
  
  $is_check=false;
  array_push($responseArray,"Children allow field is required");
     
}elseif ($_POST['event_childallow']=='yes') {

        $childallow       =$_POST['event_childallow'];
        if (empty($_POST['event_undr5allow'])) {

          $is_check=false;
          array_push($responseArray,"Under 5 allowed field is required");

        }elseif ($_POST['event_undr5allow']=="yes") {
          $undr5allow       =$_POST['event_undr5allow'];

          if (empty($_POST['event_undr5free']) && empty($_POST['event_undr5price'])) {

          $is_check=false;
          array_push($responseArray,"Filled atleast one field in Under 5 allowed");

        }else{

          if(!empty($_POST['event_undr5price']) && !is_numeric($_POST['event_undr5price'])){

            $is_check= false;
              array_push($responseArray,"Half price field should only contain numbers.");

          }elseif(!empty($_POST['event_undr5price']) && is_numeric($_POST['event_undr5price'])){

            $undr5price      = $_POST['event_undr5price'];

          }else{

            $undr5price = null;
          }

          if (isset($_POST['event_undr5free'])) {

            $undr5free          =$_POST['event_undr5free'];

          }else{

            $undr5free          ='off';
          }

        }

        }else{

          $undr5allow       =$_POST['event_undr5allow'];
          $undr5price  = null;
          $undr5free   ='off';
        }

        

        if (empty($_POST['event_halftikchild'])) {

             $is_check= false;
             array_push($responseArray,"Children price field is required");
  
        }elseif (!empty($_POST['event_halftikchild'] && !is_numeric($_POST['event_halftikchild']))) {

           $is_check= false;
           array_push($responseArray,"Children price field should only contain numbers.");

        }else{

           $halftikchild     =$_POST['event_halftikchild'];
        }
  
}

else{

  $childallow  =$_POST['event_childallow'];
  $undr5price  = null;
    $undr5allow  = null;
  $undr5free   ='off';
  $halftikchild= null;

}


foreach($_POST['common_nopeople'] as $noofpeop) { 
  
  
  if (!empty($noofpeop) && !is_numeric($noofpeop)) {

    $is_check=false;
    array_push($responseArray,"Number of people field should only contain numbers.");
                    
  }elseif(is_numeric($noofpeop)){

    $nospeople     = $noofpeop;

  }else{

    $nospeople =null;

  }
}


foreach($_POST['common_discount'] as $discountpercent) { 
  
  
  if (!empty($discountpercent) && !is_numeric($discountpercent)) {

    $is_check=false;
    array_push($responseArray,"Discount field should only contain numbers.");
                    
  }elseif(is_numeric($discountpercent)){

    $discountx     = $discountpercent;

  }else{

    $discountx =null;

  }
}

if (empty($_POST['event_pikoffer'])) {
  
  $is_check=false;
  array_push($responseArray,"Pickup offered field is required");

}elseif ($_POST['event_pikoffer']=='yes') {

  $pikoffer         =$_POST['event_pikoffer'];

  if (empty($_POST['event_pikair']) && empty($_POST['event_pikbus']) && empty($_POST['event_pikspecific'])) {

    $is_check=false;
    array_push($responseArray,"Filled atleast one field from pickup offered");

  }else{
         
         if(!empty($_POST['event_pikair']) && !is_numeric($_POST['event_pikair'])){

      $is_check= false;
      array_push($responseArray,"From airport pickup field should only contain numbers.");
        
    }elseif(!empty($_POST['event_pikair']) && is_numeric($_POST['event_pikair'])){

      $pikair      = $_POST['event_pikair'];

    }else{

      $pikair = null;
        }

        if(!empty($_POST['event_pikbus']) && !is_numeric($_POST['event_pikbus'])){

      $is_check= false;
      array_push($responseArray,"From bus pickup field should only contain numbers.");

    }elseif(!empty($_POST['event_pikbus']) && is_numeric($_POST['event_pikbus'])){

      $pikbus      = $_POST['event_pikbus'];

    }else{

      $pikbus = null;

    }

    if(!empty($_POST['event_pikspecific']) && !is_numeric($_POST['event_pikspecific'])){

      $is_check= false;
      array_push($responseArray,"From specific location pickup field field should only contain numbers.");

    }elseif(!empty($_POST['event_pikspecific']) && is_numeric($_POST['event_pikspecific'])){

      $pikspecific      = $_POST['event_pikspecific'];

    }else{

      $pikspecific = null;

    }



  }
}


else{

  $pikoffer         =$_POST['event_pikoffer'];
  $pikair = null;
  $pikbus = null;
  $pikspecific = null;

}


if (empty($_POST['event_drpoffer'])) {
  
  $is_check=false;
  array_push($responseArray,"Dropoff offered field is required");

}elseif ($_POST['event_drpoffer']=='yes') {
     $drpoffer         =$_POST['event_drpoffer'];
  if (empty($_POST['event_drpair']) && empty($_POST['event_drpbus']) && empty($_POST['event_drpspecific'])) {
         
     $is_check=false;
     array_push($responseArray,"Filled atleast one field from dropoff offered");

   }else{

        if(!empty($_POST['event_drpair']) && !is_numeric($_POST['event_drpair'])){

          $is_check= false;
          array_push($responseArray,"From air dropoff field should only contain numbers.");

        }elseif(!empty($_POST['event_drpair']) && is_numeric($_POST['event_drpair'])){

          $drpair      = $_POST['event_drpair'];

        }else{

          $drpair = null;
        }

        if(!empty($_POST['event_drpbus']) && !is_numeric($_POST['event_drpbus'])){

          $is_check= false;
          array_push($responseArray,"From bus dropoff field should only contain numbers.");

        }elseif(!empty($_POST['event_drpbus']) && is_numeric($_POST['event_drpbus'])){

          $drpbus      = $_POST['event_drpbus'];

        }else{

          $drpbus = null;
        }

        if(!empty($_POST['event_drpspecific']) && !is_numeric($_POST['event_drpspecific'])){

          $is_check= false;
          array_push($responseArray,"From specific location dropoff field should only contain numbers.");

        }elseif(!empty($_POST['event_drpspecific']) && is_numeric($_POST['event_drpspecific'])){

          $drpspecific      = $_POST['event_drpspecific'];

        }else{

          $drpspecific = null;
        }


   }
  
}else{

  $drpoffer         =$_POST['event_drpoffer'];
  $drpair = null;
  $drpbus = null;
  $drpspecific = null;

}




if (empty($_POST['event_serve'])) {

  $is_check=false;
  array_push($responseArray,"Serve Food Field is required.");

}elseif ($_POST['event_serve']=="yes") {

       $serveFood=$_POST['event_serve'];
     if(empty($_POST['event_eatFree']) && empty($_POST['event_eatAll']) && empty('$event_eatNeed')){

           $is_check=false;
           array_push($responseArray,"checked the one field from serve food");

     }else{
             
             if (isset($_POST['event_eatFree'])) {
        $eatFree    = $_POST['event_eatFree'];
      }else{
        $eatFree    = 'off';
      }
      if (isset($_POST['event_eatAll'])) {
         $eatAll    = $_POST['event_eatAll'];
         if (empty($_POST['event_eatAllChrges'])) {

          $is_check=false;
          array_push($responseArray,"All you can eat charges  field is required");
          
         }elseif (!empty($_POST['event_eatAllChrges']) && !is_numeric($_POST['event_eatAllChrges'])) {

          $is_check= false;
          array_push($responseArray,"All you can eat charges field should only contain numbers.");

         }else{

          $eatAllChrges      = $_POST['event_eatAllChrges'];
         }

      }else{
        $eatAll="off";
        $eatAllChrges=null;
      }
      if (isset($_POST['event_eatNeed'])) {

          $eatNeed    = $_POST['event_eatNeed'];
        }else{
          $eatNeed    = 'off';
        }

     }
  
}
else{
  $serveFood=$_POST['event_serve'];
  $eatFree    = 'off';
  $eatAll="off";
  $eatNeed    = 'off';
  $eatAllChrges = null;
}

if (empty($_POST['event_independ'])) {

  $is_check=false;
  array_push($responseArray,"Independent field is required");

}elseif ($_POST['event_independ']=='no') {
    $independ=$_POST['event_independ'];
  if (empty($_POST['hotel_name'])) {

    $is_check=false;
      array_push($responseArray,"Name of hotel is required");
  }else{
    $hotelname=$_POST['hotel_name'];
  }
}else{

  $independ=$_POST['event_independ'];
  $hotelname=null;
}


if (isset($_POST['event_inactive'])) {
  $inactive=$_POST['event_inactive'];
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

   if (!empty($_POST['hotel_id']) && $_POST['event_independ']!='no') {

    getUpdatequery('event',$_POST,array('hotel_id'=>$_POST['hotel_id'],'event_id'=>$_POST['event_id']));

  }else{
    
    getUpdatequery('event',$_POST,array('user_id'=>$_POST['user_id'],'event_id'=>$_POST['event_id']));
  }

 
  echo json_encode($newSuccessMsgArr);
}
else{
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

      if (!empty($_POST['hotel_id']) && !empty($_POST['event_id'])) {
       # code...
    

      foreach ($updateObject as $key => $value) {

      // echo 	gettype($value);
        if($key!='common_image' && $key!='common_video' && gettype($value)=="string"){

        	if ($key=='hotel_id' && empty($value)) {
             
             $updtevalues[] = "$key =  null";

           }else{

            $updtevalues[] = "$key = '$value'";
           }
        }elseif (gettype($value)=="array") {
                
                 // print_r($value) ;
        	foreach ($value as $k => $v) {
				   // echo $v;
         if (isset($updateObject['common_people_id'][$k])) {
           # code...
         
				    $updatequerydates= "UPDATE common_nosofpeople SET "."common_nopeople='".$updateObject['common_nopeople'][$k]."',common_discount='".$updateObject['common_discount'][$k]."' WHERE common_people_id=".$updateObject['common_people_id'][$k];


				    mysqli_query($conn,$updatequerydates) or die(mysqli_error($conn));
         }
				    
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
      
     }


      
}

 






?>