<?php

/*
 * Name:  All common methods
 * Date: 03 23 2017
 * Author: Manzar Noman
 * Methods: Generate Unique String, Send password through email
 *
 */

function generateRandomString($length = 10) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}

function sendPasswordInEmail($arrayObj){

  $to = $arrayObj['email']; // note the comma
  if(isset($arrayObj['forget'])){
    $forget = true;
  }

// Subject
  if($forget){
  $subject = 'Your New Password for login into Agent Time & Resource Management System(ATRMS).';

  }else{
  $subject = 'Congratulation! Your UN-Employee Registertion is done successfully.';

  }

// Message
  $message = '
  <html>
  <head>
    <title>New Un-Employe Credentials</title>
  </head>
  <body>
    <p>Here are your login information!</p>
    <table>
      <tr>
        <th>Username</th><th>Password</th>
      </tr>
      <tr>
        <td>'.$arrayObj['email'].'</td><td>'.$arrayObj['password'].'</td>
      </tr>
    </table>
  </body>
  </html>
  ';

// To send HTML mail, the Content-type header must be set
  $headers[] = 'MIME-Version: 1.0';
  $headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Additional headers
//$headers[] = 'To: '.$arrayObj['firstName'].' '.$arrayObj['lastName'].' '.$arrayObj['email'].'';
  $headers[] = 'From: HR Department <hr@undp.com>';
//$headers[] = 'Cc: birthdayarchive@example.com';
//$headers[] = 'Bcc: birthdaycheck@example.com';

// Mail it
  mail($to, $subject, $message, implode("\r\n", $headers));
}


?>


