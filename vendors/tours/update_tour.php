<?php  
include '../../common-sql.php';
  // print_r($_POST);

session_start();
$is_check=true;
 $responseArray=[];

if (empty($_POST['tour_name'])) {

     $is_check=false;
     array_push($responseArray,"Tour name is required");
     
}else{
   
   $tourname      =$_POST['tour_name'];
}
if (empty($_POST['tour_destinationname'])) {

     $is_check=false;
     array_push($responseArray,"Name of Destination is required");
}else{
   
   $nameofdesti      =$_POST['tour_destinationname'];
}



if (empty($_POST['tour_foodinclude'])) {

     $is_check=false;
     array_push($responseArray,"Food include field is required");
}elseif ($_POST['tour_foodinclude']=='yes') {
  $fodinclude       =$_POST['tour_foodinclude'];
  if (($_POST['tour_brkfast']=="off") || ($_POST['tour_lunch']=="off") || ($_POST['tour_dinner']=="off")) {
    $is_check=false;
    array_push($responseArray,"Check at least one from Food included");
  }else{
    if (isset($_POST['tour_brkfast'])) {
      $brkfast      =$_POST['tour_brkfast'];
    }else{
               $brkfast      ='off';
    }
    if (isset($_POST['tour_lunch'])) {
      $lunch        =$_POST['tour_lunch'];
    }else{

              $lunch        ='off';
    }
    if (isset($_POST['tour_dinner'])) {
      $dinner         =$_POST['tour_dinner'];
    }else{
            $dinner        ='off';
    }   
  }
  # code...
}else{
   
   $fodinclude       =$_POST['tour_foodinclude'];
   $brkfast      ='off';
   $lunch        ='off';
   $dinner        ='off';
}




if (empty($_POST['tour_drink'])) {

  $is_check=false;
     array_push($responseArray,"Drink include field is required");

}elseif ($_POST['tour_drink']=='yes') {
  $drnkinclude      =$_POST['tour_drink'];
     if (($_POST['tour_aloholic']=="off") || ($_POST['tour_nonaloholic']=="off")) {
       $is_check=false;
       array_push($responseArray,"Check at least one from Drink included");
     }else{

      if (isset($_POST['tour_aloholic'])) {
        $aloholic           =$_POST['tour_aloholic'];
      }else{
        $aloholic        ='off';
      }
      if (isset($_POST['tour_nonaloholic'])) {
        $nonalohlic         =$_POST['tour_nonaloholic'];
      }else{
        $nonalohlic      ='off';
      }
     }

}else{

  $drnkinclude      =$_POST['tour_drink'];
  $aloholic        ='off';
  $nonalohlic      ='off';
}


if (empty($_POST['tour_stayday'])) {

  $is_check=false;
     array_push($responseArray,"Number of days field is required");
}elseif (!is_numeric($_POST['tour_stayday'])) {
  $is_check=false;
  array_push($responseArray,"Number of days field should only contain numbers.");
}else{

  $stayday          =$_POST['tour_stayday'];
}
if (empty($_POST['tour_stayni8'])) {
  
  $is_check=false;
    array_push($responseArray,"Number of nights field is required");

 }elseif (!is_numeric($_POST['tour_stayni8'])) {

  $is_check=false;
  array_push($responseArray,"Number of nights field should only contain numbers.");
}else{

  $stayni8     =$_POST['tour_stayni8'];
 }

$hotelstr         =$_POST['tour_hotelstr'];


if ($_POST['tour_camping']=="on") {

   $camping          =$_POST['tour_camping'];
     if (empty($_POST['tour_campday'])) {

      $is_check=false;
    array_push($responseArray,"Number of camping days field is required.");

     }elseif (!empty($_POST['tour_campday']) && !is_numeric($_POST['tour_campday'])) {
      $is_check=false;
    array_push($responseArray,"Number of camping days fiel should only contain numbers.");
     }else{

        $campday=$_POST['tour_campday'];
     }

}else{
  $camping          ='off';
  $campday=   null;

}

if (empty($_POST['tour_entrytik'])) {
  
  $is_check=false;
    array_push($responseArray,"Entry tickets included in the package price field is required");
}else{

  $entrytik         =$_POST['tour_entrytik'];
}
 if (empty($_POST['tour_plan'])) {
  
  $is_check=false;
    array_push($responseArray,"Whole Plan field is required");
 }else{

  $plan             =$_POST['tour_plan'];
 }
if (empty($_POST['tour_pkgprice'])) {
  
  $is_check=false;
     array_push($responseArray,"Package price field is required");
}elseif (!is_numeric($_POST['tour_pkgprice'])) {
  $is_check=false;
  array_push($responseArray,"Package price field should only contain numbers.");
}else{

  $pkgprice         =$_POST['tour_pkgprice'];

}
if (empty($_POST['tour_capacitypeople'])) {
  
  $is_check=false;
   array_push($responseArray,"Number of people field is required");
}elseif (!is_numeric($_POST['tour_capacitypeople'])) {
  $is_check=false;
  array_push($responseArray,"Number of people field should only contain numbers.");
}else{

  $capcipeople      =$_POST['tour_capacitypeople'];

}
if (empty($_POST['tour_nosofbag'])) {
  
  $is_check=false;
  array_push($responseArray,"Number of bags allowed field is required");

}elseif (!is_numeric($_POST['tour_nosofbag'])) {
  $is_check=false;
  array_push($responseArray,"Number of bags allowed field should only contain numbers.");
  
}else{

  $nosbag           =$_POST['tour_nosofbag'];

}
if (empty($_POST['tour_childallow'])) {
  
  $is_check=false;
  array_push($responseArray,"Children allow field is required");
     
}elseif ($_POST['tour_childallow']=='yes') {
        $childallow       =$_POST['tour_childallow'];
        if (empty($_POST['tour_undr5allow'])) {
          $is_check=false;
                  array_push($responseArray,"Under 5 allowed field is required"); 
        }elseif ($_POST['tour_undr5allow']=="yes") {
          $undr5allow       =$_POST['tour_undr5allow'];

              if (($_POST['tour_undr5free']=="off") && empty($_POST['tour_undr5price'])) {
          $is_check=false;
                  array_push($responseArray,"Filled atleast one field in Under 5 allowed"); 
        }else{

          if(!empty($_POST['tour_undr5price']) && !is_numeric($_POST['tour_undr5price'])){
            $is_check= false;
             
              array_push($responseArray,"Half price field should only contain numbers.");
          }elseif(!empty($_POST['tour_undr5price']) && is_numeric($_POST['tour_undr5price'])){
            $undr5price      = $_POST['tour_undr5price'];
          }else{
            $undr5price = null;

          }

          if (isset($_POST['tour_undr5free'])) {

            $undr5free          =$_POST['tour_undr5free'];

          }else{
            $undr5free          ='off';

          }

        }
          
        }else{
          $undr5allow       =$_POST['tour_undr5allow'];
          $undr5free   ='off';
          $undr5price  = null;
        }
    

        if (empty($_POST['tour_halftikchild'])) {
             $is_check= false;
             array_push($responseArray,"Children price field is required");
        }elseif (!empty($_POST['tour_halftikchild'] && !is_numeric($_POST['tour_halftikchild']))) {
           $is_check= false;
           array_push($responseArray,"Children price field should only contain numbers.");
        }else{
           $halftikchild     =$_POST['tour_halftikchild'];
        }
  
}

else{

  $childallow  =$_POST['tour_childallow'];
  $undr5price  = null;
    $undr5allow  = null;
  $undr5free   ='off';
  $halftikchild= null;

}

$extrachrbag      =$_POST['tour_extrachrbag'];







if (empty($_POST['tour_strtloc'])) {
  
  $is_check=false;
     array_push($responseArray,"Trip start location field is required");
}else{

  $strtloc          =$_POST['tour_strtloc'];

}

if (empty($_POST['tour_pikoffer'])) {
  
  $is_check=false;
      array_push($responseArray,"Pickup offered field is required");
}elseif ($_POST['tour_pikoffer']=='yes') {
  $pikoffer         =$_POST['tour_pikoffer'];
  if (empty($_POST['tour_pikair']) && empty($_POST['tour_pikbus']) && empty($_POST['tour_pikspecific'])) {
    $is_check=false;
    array_push($responseArray,"Filled atleast one field from pickup offered ");
  }else{
         
         if(!empty($_POST['tour_pikair']) && !is_numeric($_POST['tour_pikair'])){

      $is_check= false;
         array_push($responseArray,"From airport pickup field should only contain numbers.");
    }elseif(!empty($_POST['tour_pikair']) && is_numeric($_POST['tour_pikair'])){

      $pikair      = $_POST['tour_pikair'];

    }else{

      $pikair = null;

        }

        if(!empty($_POST['tour_pikbus']) && !is_numeric($_POST['tour_pikbus'])){

      $is_check= false;
        array_push($responseArray,"From bus pickup field should only contain numbers.");
    }elseif(!empty($_POST['tour_pikbus']) && is_numeric($_POST['tour_pikbus'])){

      $pikbus      = $_POST['tour_pikbus'];

    }else{

      $pikbus = null;

    }

    if(!empty($_POST['tour_pikspecific']) && !is_numeric($_POST['tour_pikspecific'])){

      $is_check= false;
        array_push($responseArray,"From specific location pickup field should only contain numbers.");
    }elseif(!empty($_POST['tour_pikspecific']) && is_numeric($_POST['tour_pikspecific'])){

      $pikspecific      = $_POST['tour_pikspecific'];

    }else{

      $pikspecific = null;

    }



  }
}


else{

  $pikoffer         =$_POST['tour_pikoffer'];
  $pikair = null;
  $pikbus = null;
  $pikspecific = null;

}


if (empty($_POST['tour_drpoffer'])) {
  
  $is_check=false;
    array_push($responseArray,"Dropoff offered field is required");
    
}elseif ($_POST['tour_drpoffer']=='yes') {
     $drpoffer         =$_POST['tour_drpoffer'];
  if (empty($_POST['tour_drpair']) && empty($_POST['tour_drpbus']) && empty($_POST['tour_drpspecific'])) {
         
     $is_check=false;
     array_push($responseArray,"Filled atleast one field from dropoff offered ");
   }else{

        if(!empty($_POST['tour_drpair']) && !is_numeric($_POST['tour_drpair'])){

          $is_check= false;
            array_push($responseArray,"From  air dropoff field should only contain numbers.");
        }elseif(!empty($_POST['tour_drpair']) && is_numeric($_POST['tour_drpair'])){

          $drpair      = $_POST['tour_drpair'];

        }else{

          $drpair = null;

        }

        if(!empty($_POST['tour_drpbus']) && !is_numeric($_POST['tour_drpbus'])){

          $is_check= false;
             array_push($responseArray,"From bus dropoff field should only contain numbers.");
        }elseif(!empty($_POST['tour_drpbus']) && is_numeric($_POST['tour_drpbus'])){

          $drpbus      = $_POST['tour_drpbus'];

        }else{

          $drpbus = null;

        }

        if(!empty($_POST['tour_drpspecific']) && !is_numeric($_POST['tour_drpspecific'])){

          $is_check= false;
            array_push($responseArray,"From specific location dropoff field should only contain numbers.");
        }elseif(!empty($_POST['tour_drpspecific']) && is_numeric($_POST['tour_drpspecific'])){

          $drpspecific      = $_POST['tour_drpspecific'];

        }else{

          $drpspecific = null;

        }


   }
  
}else{

  $drpoffer         =$_POST['tour_drpoffer'];
  $drpair = null;
  $drpbus = null;
  $drpspecific = null;

}

foreach($_POST['common_nopeople'] as $noofpeop) { 
  
  
  if (!empty($noofpeop) && !is_numeric($noofpeop)) {

    $is_check=false;
    array_push($responseArray,"Number of people field should only contain numbers.");
                    
  }elseif(is_numeric($noofpeop)){

    $noofpeople     = $noofpeop;

  }else{

    $noofpeople =null;

  }
}


foreach($_POST['common_discount'] as $discountpercent) { 
  
  
  if (!empty($discountpercent) && !is_numeric($discountpercent)) {

    $is_check=false;
    array_push($responseArray,"Discount field should only contain numbers.");
                    
  }elseif(is_numeric($discountpercent)){

    $discountpeople     = $discountpercent;

  }else{

    $discountpeople =null;

  }
}

$denation_name    =$_POST['destination_name'];
$denation_desp    =$_POST['destination_descrp'];
$attraction_name  =$_POST['attraction_name'];
$attraction_desp  =$_POST['attraction_descrp'];

if (empty($_POST['tour_depdate'])) {
  $is_check=false;
  array_push($responseArray,"Departure date field is required");
}else{

    // $datedepr = date_create($_POST['tour_depdate']);
        // $resultdepr = date_format($datedepr,"m/d/Y");
      if (preg_match('%\A(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d\z%', $_POST['tour_depdate'])) {

           $depDate= $_POST['tour_depdate'];

      }else{
         $is_check=false;
         array_push($responseArray,"Departure date field is invalid");
         
      }


  
}

if (empty($_POST['tour_deptime'])) {
  $is_check=false;
  array_push($responseArray,"Departure Time filed is requird");
}elseif (!preg_match("/^(?:0[1-9]|1[0-2]):[0-5][0-9](am|pm|AM|PM)$/", $_POST['tour_deptime'])) {
  $is_check=false;
  array_push($responseArray,"Departure time format is invalid");
}
else{
  $depTime=$_POST['tour_deptime'];
}

if (empty($_POST['tour_arrdate'])) {
  $is_check=false;
  array_push($responseArray,"Arrival Date field is required");
  
}else{

     // $datearr = date_create($_POST['tour_arrdate']);
        // $resultarr = date_format($datearr,"m/d/Y");
      if (preg_match('%\A(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d\z%', $_POST['tour_arrdate'])) {

           $arrDate=$_POST['tour_arrdate'];

      }else{
         $is_check=false;
         array_push($responseArray,"Arrival date field is invalid");
         
      }
  
}

if (empty($_POST['tour_arrtime'])) {
  $is_check=false;
  array_push($responseArray,"Arrival Time field is required");

}elseif (!preg_match("/^(?:0[1-9]|1[0-2]):[0-5][0-9](am|pm|AM|PM)$/", $_POST['tour_arrtime'])) {
  $is_check=false;
  array_push($responseArray,"Arrival time format is invalid");
}else{
  $arrTime=$_POST['tour_arrtime'];
}


if (empty($_POST['tour_independ'])) {

  $is_check=false;
  array_push($responseArray,"Independent field is required");

}elseif ($_POST['tour_independ']=='no') {
    $independ=$_POST['tour_independ'];
  if (empty($_POST['hotel_name'])) {

    $is_check=false;
      array_push($responseArray,"Name of hotel is required");
  }else{
    $hotelname=$_POST['hotel_name'];
  }
}else{

  $independ=$_POST['tour_independ'];
  $hotelname=null;
}


if (isset($_POST['tour_inactive'])) {
  $inactive=$_POST['tour_inactive'];
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

    if (!empty($_POST['hotel_id']) && $_POST['tour_independ']!='no') {


       $evupdate='SELECT `tour`.`tour_inactive` FROM `tour` WHERE tour_id="'.$_POST['tour_id'].'" AND hotel_id="'.$_POST['hotel_id'].'"';

  $evupdate_result=mysqli_query($conn,$evupdate) or die(mysqli_error($conn));

  $evupdate_assoc=mysqli_fetch_assoc($evupdate_result);

  $notify_title="";
  $notify_descrip = "";

  if ($evupdate_assoc['tour_inactive']== $inactive) {
  
  $notify_title="Listing has been updated for review.";
  $notify_descrip="". $tourname." in ".$_POST['hotel_name']." has been updated for review by ".$_SESSION['reg_name'];

    
  }else{


      if ($inactive=="off") {

         $notify_title="".$_SESSION['reg_name']. " has activated ". $tourname;
         $notify_descrip="". $tourname." has been reactivated and ready for review";

       }else{
          
         $notify_title="".$_SESSION['reg_name']." has inactivated ". $tourname;
         $notify_descrip="". $tourname." has been inactivated ";

       } 
   


  }

   getUpdatequery('tour',$_POST,array('hotel_id'=>$_POST['hotel_id'],'tour_id'=>$_POST['tour_id']));

   include '../../methods/send-notification.php';

     insert_notification($conn,$_POST['user_id'],"vendor","true","false","Updated",$notify_title,$notify_descrip,date("F j, Y, g:i a"),"tours/showsigle_tourrecord.php?id=".$_POST['tour_id']."&h_id=".$_POST['hotel_id']."&status=Approved&name=".$_SESSION['reg_name']."&user_id=".$_POST['user_id'],"tour","admin" );


  }else{

      $evupdate='SELECT `tour`.`tour_inactive` FROM `tour` WHERE tour_id="'.$_POST['tour_id'].'" AND user_id="'.$_POST['user_id'].'"';

  $evupdate_result=mysqli_query($conn,$evupdate) or die(mysqli_error($conn));

  $evupdate_assoc=mysqli_fetch_assoc($evupdate_result);

  $notify_title="";
  $notify_descrip = "";

  if ($evupdate_assoc['tour_inactive']== $inactive) {
  
  $notify_title="Listing has been updated for review.";
  $notify_descrip="". $tourname." has been updated for review by ".$_SESSION['reg_name'];

    
  }else{


      if ($inactive=="off") {

         $notify_title="".$_SESSION['reg_name']. " has activated ". $tourname;
         $notify_descrip="". $tourname." has been reactivated and ready for review";

       }else{
          
         $notify_title="".$_SESSION['reg_name']." has inactivated ". $tourname;
         $notify_descrip="". $tourname." has been inactivated ";

       } 
   


  }
    
   getUpdatequery('tour',$_POST,array('user_id'=>$_POST['user_id'],'tour_id'=>$_POST['tour_id']));

    include '../../methods/send-notification.php';

     insert_notification($conn,$_POST['user_id'],"vendor","true","false","Updated",$notify_title,$notify_descrip,date("F j, Y, g:i a"),"tours/showsigle_tourrecord.php?id=".$_POST['tour_id']."&u_id=".$_POST['user_id']."&status=Approved&name=".$_SESSION['reg_name']."&user_id=".$_POST['user_id'],"tour","admin" );
  }
  
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

      if ((!empty($_POST['hotel_id']) || !empty($_POST['user_id'])) && !empty($_POST['tour_id'])) {
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
         // echo $updatequery;
        }
       
       
        global $conn;
        $resultup=mysqli_query($conn,$updatequery) or die(mysqli_error($conn));
          // echo"manzar";
       
     }

      
}


?>