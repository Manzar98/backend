<?php 
include 'common-sql.php';
$uploadDir = 'uploads';

  $id=$_POST['fileId'];

if (!empty($_POST['fileName'])) {
    $path = $_SERVER['DOCUMENT_ROOT'].'/Backend/'.$_POST['fileName'];
    // echo $path;
     unlink($path);

     $dQuery='DELETE FROM common_imagevideo where common_imgvideo_id ="'.$id.'"';

     if ($conn->query($dQuery) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
}

?>