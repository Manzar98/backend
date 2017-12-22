<?php

include 'common-sql.php';



 $amenitySelect="SELECT DISTINCT `hotel_other` FROM hotel";

              $amenityQuery =mysqli_query($conn,$amenitySelect) or die(mysqli_error($conn));

           if (mysqli_num_rows($amenityQuery) > 0) {

              	  while ($result=mysqli_fetch_assoc($amenityQuery)) {

              	  	# code... 

              	  	echo $result['hotel_other']."<br>";
              	  }
              }   






?>