<?php  
include '../../common-sql.php';
     // print_r($_POST['foodpkg_item']);
  
$is_check=true;
$responseArray=[];

if (empty($_POST['banquet_name'])) {

  $is_check=false;
  array_push($responseArray,"Banquet name is required");

}else{

  $name         = $_POST['banquet_name'];
}

if (empty($_POST['banquet_space'])) {

  $is_check=false;
  array_push($responseArray,"Hall capacity field is required");

}elseif (!is_numeric($_POST['banquet_space'])) {

  $is_check=false;
  array_push($responseArray,"Hall capacity field should only contain numbers.");

}else{

  $space        = $_POST['banquet_space'];
}

if (empty($_POST['banquet_charges'])) {

  $is_check=false;
  array_push($responseArray,"Banquet charges field is required");

}elseif (!is_numeric($_POST['banquet_charges'])) {

  $is_check=false;
  array_push($responseArray,"Banquet charges field should only contain numbers.");

}else{
  
     $charges         = $_POST['banquet_charges'];
}
if (!isset($_POST['banquet_isaircon'])) {
  
  $is_aircon="off";
}
if (($_POST['banquet_isaircon']=="on") && empty($_POST['banquet_aricon'])) {

    $is_check=false;
    array_push($responseArray,"Aircon charges field is required");

}elseif (isset($_POST['banquet_isaircon']) && !empty($_POST['banquet_aricon'])) {

  $is_aircon= $_POST['banquet_isaircon'];
}else{

   $is_aircon="off";
}

if (($_POST['banquet_isgen']=="on") && empty($_POST['banquet_generator'])) {

  $is_check=false;
  array_push($responseArray,"Generator charges field is required");

}elseif (isset($_POST['banquet_isgen']) && !empty($_POST['banquet_generator'])) {

  $is_gen=$_POST['banquet_isgen'];

}else{

  $is_gen='off';
}


if(!empty($_POST['banquet_aricon']) && !is_numeric($_POST['banquet_aricon'])){

  $is_check= false;
  array_push($responseArray,"Banquet charges field should only contain numbers.");

}elseif(!empty($_POST['banquet_aricon']) && is_numeric($_POST['banquet_aricon'])){

  $aircon       = $_POST['banquet_aricon'];
}else{

  $aircon = null;
}

if(!empty($_POST['banquet_generator']) && !is_numeric($_POST['banquet_generator'])){

  $is_check= false;
    array_push($responseArray,"Generator charges field should only contain numbers.");

}elseif(!empty($_POST['banquet_generator']) && is_numeric($_POST['banquet_generator'])){

  $gen          = $_POST['banquet_generator'];

}else{

  $gen = null;
}


if (empty($_POST['banquet_serve'])) {

  $is_check=false;
  array_push($responseArray,"Serve food field is required");

}else if ($_POST['banquet_serve']=='yes') {

      $serve        = $_POST['banquet_serve'];

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
        
      $trimcomaitem = trim($_POST['foodpkg_item'][0],",");

           
      $Itemresult = explode(",", $trimcomaitem);
       
      foreach($Itemresult as $item) { 
          
        if (!empty($item)) {
          
          $pgkitem     = $_POST['foodpkg_item'];
          
        }else{
                
                $is_check=false;
                array_push($responseArray,"Package item field is required");  
        }
      }
      

}else{
  
  $serve   = $_POST['banquet_serve'];
  $pkgname =null;
  $pkgprice=null;
  $pgkitem =null;
}

foreach($_POST['foodpkg_discount'] as $menupkgdiscount) { 
  
  
  if (!empty($menupkgdiscount) && !is_numeric($menupkgdiscount)) {

    $is_check=false;
    array_push($responseArray,"Menu package discount field should only contain numbers.");
                    
  }elseif(is_numeric($menupkgdiscount)){

    $pkgdis     = $_POST['foodpkg_discount'];

  }else{

    $pkgdis=null;

  }
}

if (empty($_POST['banquet_gathering'])) {

  $is_check=false;
  array_push($responseArray,"Gathering type field is required");

}else{
  
  $gath         = $_POST['banquet_gathering'];
}

if (!is_numeric($_POST['banquet_adcost'])) {

  $is_check=false;
  array_push($responseArray,"Additional cost field should only contain numbers.");

}elseif (empty($_POST['banquet_adcost'])) {

    $is_check=false;
    array_push($responseArray,"Additional cost cannot be left empty");

}else{

  $adcost       = $_POST['banquet_adcost'];
}

if (empty($_POST['banquet_descrip'])) {

  $is_check=false;
  array_push($responseArray,"Banquet description cannot be left empty");

}else{
  
  $descrip      = $_POST['banquet_descrip'];
}

if (empty($_POST['banquet_other'])) {

  $is_check=false;
  array_push($responseArray,"Amenities cannot be left empty");
  
}else{
  $other = $_POST['banquet_other'];
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




if (!empty($_POST['banquet_offerdiscount']) && !is_numeric($_POST['banquet_offerdiscount'])) {

  $is_check= false;
  array_push($responseArray,"Offer discount field should only contain numbers.");

}elseif (!empty($_POST['banquet_offerdiscount']) && empty($_POST['banquet_expireoffer'])) {

  $is_check= false;
  array_push($responseArray,"Expire offer date field is required");

}
elseif (!empty($_POST['banquet_offerdiscount']) && is_numeric($_POST['banquet_offerdiscount'])) {

  $discuntofer=$_POST['banquet_offerdiscount'];

}else{

  $discuntofer=null;
}

if (!empty($_POST['banquet_expireoffer'])) {
 
 if (!empty($_POST['banquet_expireoffer']) && empty($_POST['banquet_offerdiscount'])) {

    $is_check=false;
    array_push($responseArray,"Offer discount field is required");

 }else{
    
      # code...
          //   $dateExpire = date_create($_POST['banquet_expireoffer']);
          //       $dateExpire = new DateTime($_POST['banquet_expireoffer']);
          // $resultExpire  =DateTime::createFromFormat("m/d/Y", $_POST['banquet_expireoffer']);
          //  $resultExpire  = date_format($dateExpire, 'm/d/Y');
      if (preg_match('%\A(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d\z%', $_POST['banquet_expireoffer'])) {

      $discountexpire=$_POST['banquet_expireoffer'];

       }else{

          $is_check=false;
        array_push($responseArray,"Expire offer field is invalid");
      }
  
   }

}else{

  $discountexpire=null;
}


if (empty($_POST['banquet_independ'])) {

  $is_check=false;
  array_push($responseArray,"Hall independent field is required");

}elseif ($_POST['banquet_independ']=='yes') {

     $banquet_hotelName=null;
     $banquet_independ=$_POST['banquet_independ'];

     if (empty($_POST['banquet_address'])) {

      $is_check=false;
      array_push($responseArray,"Address field is required");

     }else{

      $banquet_addres=$_POST['banquet_address'];
     }

     if (empty($_POST['banquet_city'])) {

      $is_check=false;
      array_push($responseArray,"City field is required");

     }else{

      $banquet_city=$_POST['banquet_city'];
     }

     if (empty($_POST['banquet_province'])) {

      $is_check=false;
      array_push($responseArray,"Province field is required");

     }else{

       $banquet_province=$_POST['banquet_province'];
     }

     if (empty($_POST['banquet_phone'])) {

      $is_check=false;
      array_push($responseArray,"Phone number field is required");

     }elseif (!empty($_POST['banquet_phone']) && !is_numeric($_POST['banquet_phone'])) {

      $is_check=false;
      array_push($responseArray,"Phone number field should only contain numbers.");

     }else{

      $banquet_phone     = $_POST['banquet_phone'];
     }

     if (empty($_POST['banquet_email'])) {

      $is_check=false;
      array_push($responseArray,"Email address field is required");

     }elseif (!filter_var($_POST['banquet_email'], FILTER_VALIDATE_EMAIL)) {

      $is_check=false;
      array_push($responseArray,"Email address field is invalid");

     }else{

      $banquet_email=$_POST['banquet_email'];
     }

}
else{
       $banquet_independ=$_POST['banquet_independ'];
       $banquet_addres=null;
       $banquet_city=null;
       $banquet_province=null;
       $banquet_phone = null;
       $banquet_email=null;
       if (empty($_POST['hotel_name'])) {

         $is_check=false;
         array_push($responseArray,"Name of hotel is required");
      
       }else{

         $banquet_hotelName=$_POST['hotel_name'];
       }
  
}



if (!empty($_POST['banquet_fcbok'])) {
  
  $bnq_fcbok=$_POST['banquet_fcbok'];
}else{

  $bnq_fcbok=null;
}

if (!empty($_POST['banquet_twiter'])) {
  
  $bnq_twter=$_POST['banquet_twiter'];
}else{

  $bnq_twter=null;
}

if (!empty($_POST['banquet_utube'])) {
  
  $bnq_utube=$_POST['banquet_utube'];
}else{

  $bnq_utube=null;
}

if (empty($_POST['hotel_id'])) {
  
}

if (isset($_POST['banquet_inactive'])) {
  $inactive=$_POST['banquet_inactive'];
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

  if (!empty($_POST['hotel_id']) && $_POST['banquet_independ']!='no') {

         $banupdate='SELECT `banquet`.`banquet_inactive` FROM `banquet` WHERE banquet_id="'.$_POST['banquet_id'].'" AND hotel_id="'.$_POST['hotel_id'].'"';

  $banupdate_result=mysqli_query($conn,$banupdate) or die(mysqli_error($conn));

  $banupdate_assoc=mysqli_fetch_assoc($banupdate_result);

  $notify_title="";
  $notify_descrip = "";

  if ($banupdate_assoc['banquet_inactive']== $inactive) {
  
  $notify_title="Your Listing has updated.";
  $notify_descrip="".$name." in ".$_POST['hotel_name']." has been updated";

    
  }else{


      if ($inactive=="off") {

         $notify_title="Your Listing has activated";
         $notify_descrip="".$name." has been reactivated";

       }else{
          
         $notify_title="Your Listing has inactivated ";
         $notify_descrip="".$name." has been inactivated ";

       } 
   


  }

   getUpdatequery('banquet',$_POST,array('hotel_id'=>$_POST['hotel_id'],'banquet_id'=>$_POST['banquet_id']));

    include '../../methods/send-notification.php';

     insert_notification($conn,$_POST['user_id'],"admin","true","false","Updated",$notify_title,$notify_descrip,date("F j, Y, g:i a"),"banquets/showsingle_banquetrecord.php?id=".$_POST['banquet_id']."&h_id=".$_POST['hotel_id'],"banquet","vendor" );

  }else{

    $banupdate='SELECT `banquet`.`banquet_inactive` FROM `banquet` WHERE banquet_id="'.$_POST['banquet_id'].'" AND user_id="'.$_POST['user_id'].'"';

  $banupdate_result=mysqli_query($conn,$banupdate) or die(mysqli_error($conn));

  $banupdate_assoc=mysqli_fetch_assoc($banupdate_result);

  $notify_title="";
  $notify_descrip = "";

  if ($banupdate_assoc['banquet_inactive']== $inactive) {
  
  $notify_title="Your Listing has updated.";
  $notify_descrip="".$name." has been updated";

    
  }else{


      if ($inactive=="off") {

         $notify_title="Your Listing has activated";
         $notify_descrip="".$name." has been reactivated";

       }else{
          
         $notify_title="Your Listing has inactivated ";
         $notify_descrip="".$name." has been inactivated ";

       } 
   


  }
    
   getUpdatequery('banquet',$_POST,array('user_id'=>$_POST['user_id'],'banquet_id'=>$_POST['banquet_id']));

   include '../../methods/send-notification.php';

     insert_notification($conn,$_POST['user_id'],"admin","true","false","Updated",$notify_title,$notify_descrip,date("F j, Y, g:i a"),"banquets/showsingle_banquetrecord.php?id=".$_POST['banquet_id']."&u_id=".$_POST['user_id'],"banquet","vendor" );
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

      if (!empty($_POST['banquet_id'])) {
       # code...
       if (!empty($_POST['hotel_id']) || !empty($_POST['user_id'])) {
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
      if ((isset($updateObject['common_bokdate_id'][$k]) && !empty($updateObject['common_bokdate_id'][$k])) || (isset($updateObject['common_menupkg_id'][$k]) && !empty($updateObject['common_menupkg_id'][$k]))) {
        # code...
      
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
}


?>