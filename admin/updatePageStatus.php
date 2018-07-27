<?php 

include '../common-sql.php';
session_start();
/*======To get the page info for notifications========*/
$select='SELECT * FROM pages WHERE page_id="'.$_POST['id'].'"';
$s_Query=mysqli_query($conn,$select) or die(mysqli_error($conn));
$s_Result=mysqli_fetch_assoc($s_Query);
$btn="";
$tbl="";
$url="";
// $realtimeResult="";
if ($_POST['tbl_name']=="amenities") {
  $am_name='SELECT amenity_name FROM amenities WHERE amenity_id='.$_POST['id'];
  $am_Query=mysqli_query($conn,$am_name) or die(mysqli_error($conn));
  $am_result=mysqli_fetch_assoc($am_Query);
  $tbl="amenity";
  $url="amenities/veiwAmenity.php?a_id=".$_POST['id']."&id=".$_POST['u_id']."&a_name=".$am_result['amenity_name']."";
}elseif($_POST['tbl_name']=="pages"){
  $tbl="page";
  $url="pages/veiwPage.php?p_id=".$_POST['id']."&id=".$_POST['u_id']."";
}elseif($_POST['tbl_name']=="destinations"){
  $tbl="destination";
  $url="destinations/veiwDesti.php?d_id=".$_POST['id']."&d=".$_POST['u_id']."";
}elseif($_POST['tbl_name']=="faq"){
  $tbl="faq";
  $url="faqs/editQues.php?f_id=".$_POST['id']."&id=".$_POST['u_id']."";
}

if ($_POST['btn']=="off") {
  $btn="Activated";
}elseif($_POST['btn']=="on"){
  $btn="Deactivated";
}
$showmsgQuery='SELECT * FROM action_listing WHERE action_listing_id="'.$_POST['id'].'" AND action_taken_by="'.$_SESSION['user_id'].'" AND action_listing_type="'.$_POST['tbl_name'].'"';
$showmsgSql=mysqli_query($conn,$showmsgQuery) or die(mysqli_error($conn));
$showmsgResult=mysqli_fetch_assoc($showmsgSql);

if (count($showmsgResult)< 1) {

 $msgQuery='INSERT INTO action_listing(action_listing_id,action_taken_by,action_time,action_descprition,action_listing_type)VALUES("'.$_POST['id'].'","'.$_SESSION['user_id'].'","'.date("F j, Y, g:i a").'","This '.$tbl.' '.$btn.' by '.$_SESSION['reg_name'].' on '.date("F j, Y, g:i a").'","'.$_POST['tbl_name'].'")';
   // echo  $msgQuery;
 if ($conn->query($msgQuery)== TRUE) {
  
   $action_id =$conn->insert_id;
      // print_r($conn);
 }

}else{

  $msgQuery='UPDATE action_listing SET 
  action_taken_by="'.$_SESSION['user_id'].'",
  action_time="'.date("F j, Y, g:i a").'",
  action_descprition="This '.$tbl.' '.$btn.' by '.$_SESSION['reg_name'].' on '.date("F j, Y, g:i a").'"
  WHERE action_listing_id="'.$_POST['id'].'" AND action_listing_type="'.$_POST['tbl_name'].'"';
  $msgRes=mysqli_query($conn,$msgQuery) or die(mysqli_error($conn));

  $realtimeQuery='SELECT * FROM action_listing WHERE action_listing_id="'.$_POST['id'].'"';
  $realtimeSql=mysqli_query($conn,$realtimeQuery) or die(mysqli_error($conn));
  $realtimeResult=mysqli_fetch_assoc($realtimeSql);
}





$action="";
$title="";
$descp="";
if ($_POST['btn']=="on") {
	
	$query='UPDATE '.$_POST['tbl_name'].' SET '.$_POST['col_name'].'="'.$_POST['btn'].'" WHERE '.$_POST['id_col'].'="'.$_POST['id'].'" AND user_id="'.$_POST['u_id'].'"';
	$action="Suspended";
	$title="Page Deactivated";
	$descp="".$_SESSION['reg_name']." has been deactivated ".$s_Result['page_name']." page.";
}else{
 
 $query='UPDATE '.$_POST['tbl_name'].' SET '.$_POST['col_name'].'="'.$_POST['btn'].'" WHERE '.$_POST['id_col'].'="'.$_POST['id'].'" AND user_id="'.$_POST['u_id'].'"';

 $action="Approved";
 $title="Page Activated";
 $descp="".$_SESSION['reg_name']." has been reactivated ".$s_Result['page_name']." page.";
 
}

if ($_SESSION['user_type']=="admin") {
  include '../methods/send-notification.php';


  insert_notification($conn,$_POST['u_id'],"admin","true","false",$action,$title,$descp,date("F j, Y, g:i a"),$url,"pages","s_admin","","true");
}

$result=mysqli_query($conn,$query) or die(mysqli_error($conn));

if ($result==1) {
  
  if (isset($action_id) && $action_id > 0) {
   $res_Array=array(
    'status'=>$_POST['btn'],
    'description'=>null,
    'action_id' => $action_id

  );

 }else{
  $res_Array=array(
    'status'=>$_POST['btn'],
    'description'=>$realtimeResult['action_descprition']

  );

}

echo json_encode($res_Array);
}

?>