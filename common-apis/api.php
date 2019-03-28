<?php
   include '../common-sql.php';
 /*----------------------------
    Function for dynamic select Query
 ------------------------------*/

  function select($tableName,$where){
     
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
}
// elseif(!empty($email)){
//       $query='SELECT * From '.$tableName.' WHERE email="'.$email.'"';
//      }
//      elseif(!empty($id)){
//       $query='SELECT * From '.$tableName.' WHERE user_id="'.$id.'"';
//     }
    else{
    $query='SELECT * From '.$tableName;
   }
  
   global $conn;
   $result =mysqli_query($conn,$query);
   
   return $result;

  };









  ?>