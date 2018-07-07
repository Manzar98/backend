<?php  
include '../../common-sql.php';
  // print_r($_POST);
$is_check= true;
$responseArray=[];

if (empty($_POST['conference_name'])) {
 
  $is_check= false;
  array_push($responseArray,"Hall name is required");

}else{

   $name     = $_POST['conference_name']; 
}

if (empty($_POST['conference_space'])) {

  $is_check= false;
  array_push($responseArray,"Capacity of hall  is required");

}elseif (!is_numeric($_POST['conference_space'])) {

  $is_check=false;
  array_push($responseArray,"Capacity of hall field should only contain numbers.");

}else{

  $space        = $_POST['conference_space']; 
}

if (!empty($_POST['conference_charges']) && is_numeric($_POST['conference_charges']))
{
  
  $charges= $_POST['conference_charges'];

}elseif (!empty($_POST['conference_charges']) && !is_numeric($_POST['conference_charges'])) {

  $is_check=false;
  array_push($responseArray,"Hall charges field should only contain numbers.");

}else{
     
     $is_check=false;
     array_push($responseArray,"Hall charges field is required");
}



if (empty($_POST['conference_serve'])) {

   $is_check= false;
   array_push($responseArray,"Serve food field is required");
  
}else if ($_POST['conference_serve']=='yes') {

      $serve        = $_POST['conference_serve'];

    foreach($_POST['foodpkg_name'] as $foodpkgname) { 
          
      if (!empty($foodpkgname)) {

        $pkgname     = $_POST['foodpkg_name'];

      }else{

         $is_check=false;
         array_push($responseArray,"Package name field is required");
      }
    }


      foreach($_POST['foodpkg_price'] as $menupkgprice) { 
    
      if (!empty($menupkgprice) && !is_numeric($menupkgprice)) {

        $is_check=false;
        array_push($responseArray,"Menu package price field should only contain numbers.");
                        
      }elseif(is_numeric($menupkgprice)){

        $pkgprice     = $_POST['foodpkg_price'];

      }else{

        $is_check=false;
        array_push($responseArray,"Menu Package Price field is required");
      }
      }

}else{
  
  $serve   = $_POST['conference_serve'];
  $pkgname =null;
  $pkgprice=null;
  $pgkitem =null;
}

foreach($_POST['foodpkg_discount'] as $menupkgdiscount) { 
  
  
  if (!empty($menupkgdiscount) && !is_numeric($menupkgdiscount)) {

    $is_check=false;
    array_push($responseArray,"Menu package discount field should only contain numbers.");
                    # code...
  }elseif(is_numeric($menupkgdiscount)){

    $pkgdis     = $_POST['foodpkg_discount'];
  }else{
    $pkgdis=null;

                    // echo "array is empty";
  }
}



if (empty($_POST['conference_independ'])) {

  $is_check=false;
  array_push($responseArray,"Hall independent field is required");

}elseif ($_POST['conference_independ']=='yes') {

      $con_independ=$_POST['conference_independ'];
      $con_hotelName=null;

     if (empty($_POST['conference_address'])) {

      $is_check=false;
      array_push($responseArray,"Address field is required");

     }else{

      $con_addres=$_POST['conference_address'];
     }

     if (empty($_POST['conference_city'])) {

      $is_check=false;
      array_push($responseArray,"City field is required");

     }else{

      $con_city=$_POST['conference_city'];
     }

     if (empty($_POST['conference_province'])) {

      $is_check=false;
      array_push($responseArray,"Province field is required");

     }else{

       $con_province=$_POST['conference_province'];
     }

     if (empty($_POST['conference_phone'])) {

      $is_check=false;
      array_push($responseArray,"Phone number field is required");

     }elseif (!empty($_POST['conference_phone']) && !is_numeric($_POST['conference_phone'])) {

      $is_check=false;
      array_push($responseArray,"Phone number field should only contain numbers.");

     }else{

      $con_phone    = $_POST['conference_phone'];
     }

     if (empty($_POST['conference_email'])) {

      $is_check=false;
      array_push($responseArray,"Email address field is required");

     }elseif (!filter_var($_POST['conference_email'], FILTER_VALIDATE_EMAIL)) {

      $is_check=false;
      array_push($responseArray,"Email address field is invalid");

     }else{

      $con_email=$_POST['conference_email'];
     }

}
else{
        $con_independ=$_POST['conference_independ'];
        $con_addres=null;
    $con_city=null;
    $con_province=null;
    $con_phone = null;
    $con_email=null;
        if (empty($_POST['hotel_name'])) {

        $is_check=false;
        array_push($responseArray,"Name of hotel is required");
      
        }else{

        $con_hotelName=$_POST['hotel_name'];
       }
  
}

if (!empty($_POST['conference_fcbok'])) {
  
  $con_fcbok=$_POST['conference_fcbok'];
}else{

  $con_fcbok=null;
}

if (!empty($_POST['conference_twiter'])) {
  
  $con_twter=$_POST['conference_twiter'];
}else{

  $con_twter=null;
}

if (!empty($_POST['conference_utube'])) {
  
  $con_utube=$_POST['conference_utube'];
}else{

  $con_utube=null;
}

if (empty($_POST['conference_other'])) {

  $is_check=false;
  array_push($responseArray,"Amenities field is required");

}else{

  $other        = $_POST['conference_other'];
}


if (isset($_POST['book_fromdate'])) {
  foreach($_POST['book_fromdate'] as $bokFROM) { 

    if (!empty($bokFROM)) {
 
      if (preg_match('%\A(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d\z%',$bokFROM)) {

          $frmdate=$bokFROM;

      }else{

         $is_check=false;
         array_push($responseArray,"From Date field is invalid");
      }
    }

 }

}else{

      $frmdate=null;
}

if(isset($_POST['book_todate'])){

     foreach($_POST['book_todate'] as $bokTO) { 
     
     if (!empty($bokTO)) {

      if (preg_match('%\A(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d\z%',$bokTO)) {

           $todate=$bokTO;

      }else{
         $is_check=false;
         array_push($responseArray,"To Date field is invalid");

      }
     }

 }

}else{

       $todate=null;
}


if (!empty($_POST['conference_offerdiscount']) && !is_numeric($_POST['conference_offerdiscount'])) {

  $is_check= false;
  array_push($responseArray,"Offer discount field should only contain numbers.");

}elseif (!empty($_POST['conference_offerdiscount']) && empty($_POST['conference_expireoffer'])) {

  $is_check= false;
  array_push($responseArray,"Expire offer date field is required");
}
elseif (!empty($_POST['conference_offerdiscount']) && is_numeric($_POST['conference_offerdiscount'])) {

  $discuntofer=$_POST['conference_offerdiscount'];

}else{

  $discuntofer=null;
}

if (!empty($_POST['conference_expireoffer'])) {
  # code...

if (!empty($_POST['conference_expireoffer']) && empty($_POST['conference_offerdiscount'])) {

  $is_check=false;
  array_push($responseArray,"Offer discount field is required");

}else{
  
      // $date = date_create($_POST['conference_expireoffer']);
      // $result = date_format($date,"m/d/Y");

    if (preg_match('%\A(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d\z%', $_POST['conference_expireoffer'])) {

      $discountexpire= $_POST['conference_expireoffer'];

    }else{

       $is_check=false;
      array_push($responseArray,"Expire offer field is invalid");
    }
}

}else{

  $discountexpire=null;
}



if (isset($_POST['conference_inactive'])) {
  $inactive=$_POST['conference_inactive'];
}else{
  $inactive="off";
}
$errorMsgs=implode(",",$responseArray);

$newErrorMsgArr=array(
    "status"=> "error",
    "message"=> $errorMsgs
);

$newSuccessMsgArr=array(
    "status"=> "success",
    "id"=>$_POST['user_id']
    
);


if ($is_check==true) {
  if (!empty($_POST['hotel_id']) && $_POST['conference_independ']!='no') {


    $cnupdate='SELECT `conference`.`conference_inactive` FROM `conference` WHERE conference_id="'.$_POST['conference_id'].'" AND hotel_id="'.$_POST['hotel_id'].'"';

  $cnupdate_result=mysqli_query($conn,$cnupdate) or die(mysqli_error($conn));

  $cnupdate_assoc=mysqli_fetch_assoc($cnupdate_result);

  $notify_title="";
  $notify_descrip = "";

  if ($cnupdate_assoc['conference_inactive']== $inactive) {
  
  $notify_title="Listing Updated.";
  $notify_descrip="".$name." in ".$_POST['hotel_name']." has been updated";

    
  }else{


      if ($inactive=="off") {

         $notify_title="Listing Activated";
         $notify_descrip="".$name." has been activated";

       }else{
          
         $notify_title="Listing Deactivated";
         $notify_descrip="".$name." has been deactivated ";

       } 
   


  }

    
    getUpdatequery('conference',$_POST,array('hotel_id'=>$_POST['hotel_id'],'conference_id'=>$_POST['conference_id']));
   
   insert_notification($conn,$_POST['user_id'],"admin","true","false","Updated",$notify_title,$notify_descrip,date("F j, Y, g:i a"),"conferences/showsingle_conferencerecord.php?id=".$_POST['conference_id']."&h_id=".$_POST['hotel_id'],"conference","vendor","" );


  }else{


  $cnupdate='SELECT `conference`.`conference_inactive` FROM `conference` WHERE conference_id="'.$_POST['conference_id'].'" AND user_id="'.$_POST['user_id'].'"';

  $cnupdate_result=mysqli_query($conn,$cnupdate) or die(mysqli_error($conn));

  $cnupdate_assoc=mysqli_fetch_assoc($cnupdate_result);

  $notify_title="";
  $notify_descrip = "";

  if ($cnupdate_assoc['conference_inactive']== $inactive) {
  
  $notify_title="Listing Updated";
  $notify_descrip="".$name." has been updated";

    
  }else{


      if ($inactive=="off") {

         $notify_title="Listing Activated";
         $notify_descrip="".$name." has been activated";

       }else{
          
         $notify_title="Listing Deactivated";
         $notify_descrip="".$name." has been deactivated ";

       } 
   


  }


    getUpdatequery('conference',$_POST,array('user_id'=>$_POST['user_id'],'conference_id'=>$_POST['conference_id']));


    include '../../methods/send-notification.php';

     insert_notification($conn,$_POST['user_id'],"admin","true","false","Updated",$notify_title,$notify_descrip,date("F j, Y, g:i a"),"conferences/showsingle_conferencerecord.php?id=".$_POST['conference_id']."&u_id=".$_POST['user_id'],"conference","vendor","" );

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

      if (!empty($_POST['conference_id'])) {
       # code...
         if (!empty($_POST['hotel_id']) || !empty($_POST['user_id']) ) {
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
           

              if ((isset($updateObject['common_bokdate_id'][$k]) && !empty($updateObject['common_bokdate_id'][$k])) || (isset($updateObject['common_menupkg_id'][$k]) && !empty($updateObject['common_menupkg_id'][$k]))) {

                  $updatequerydates= "UPDATE common_bookdates SET "."book_fromdate='".$updateObject['book_fromdate'][$k]."',book_todate='".$updateObject['book_todate'][$k]."' WHERE common_bokdate_id=".$updateObject['common_bokdate_id'][$k];

          // echo $updatequerydates;
                    mysqli_query($conn,$updatequerydates);
                    error_reporting(E_ALL ^ E_NOTICE);

                  $updatequerymenu= "UPDATE common_menupackages SET "."foodpkg_name='".$updateObject['foodpkg_name'][$k]."',foodpkg_price='".$updateObject['foodpkg_price'][$k]."',foodpkg_discount='".$updateObject['foodpkg_discount'][$k]."',foodpkg_item='".$updateObject['foodpkg_item'][$k]."' WHERE common_menupkg_id=".$updateObject['common_menupkg_id'][$k];
         
                    mysqli_query($conn,$updatequerymenu);
                    error_reporting(E_ALL ^ E_NOTICE);
          // echo $updatequerymenu;
             // echo 'Book value : '.$updateObject['book_fromdate'][$k];

              // echo 'Menu Value : '.$updateObject['common_menupkg_id'][$k];
            }
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
      
     }
}
      
}

?>