<?php 
include '../common-sql.php';
$uploadDir = 'uploads';

  $id=$_POST['fileId'];
 // echo $id;
if (!empty($_POST['fileId'])) {
    $path =$_POST['fileName'];
    // echo $path;
     unlink($path);

     $dQuery='DELETE FROM common_imagevideo where common_imgvideo_id ="'.$id.'"';
    // echo $dQuery;
     if ($conn->query($dQuery) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
}

?>