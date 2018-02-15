<?php

    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {


    	              $storedCover= 'images/uploads/' .time()."-".$_FILES['file']['name'];
           move_uploaded_file($_FILES['file']['tmp_name'], $storedCover);

          echo $storedCover;
    }

?>