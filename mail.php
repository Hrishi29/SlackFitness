<?php

include 'class.phpmailer.php';
require_once 'class.smtp.php';

//sendMailForNewUser('hgadk001@odu.edu', 'hrishi');

//function sendMailForNewUser($email,$userName){
   $return_arrfinal = array();
     $status_array['status'] = '1';
     $mail = new PHPMailer();
     $toarraymail="hgadk001@odu.edu";
     $mail->SMTPDebug = 1;                              // Enable verbose debug output
     $mail->Port = '587';
     $mail->isSMTP();                                      // Set mailer to use SMTP // Specify main and backup SMTP servers                                    // Set mailer to use SMTP
     $mail->Host = gethostbyname('smtp.gmail.com');  // Specify main and backup SMTP servers
     $mail->SMTPAuth = true; // Authentication must be disabled

     $mail->Username = 'ghrishi29@gmail.com';
     $mail->Password = 'userhrishi30';
     $mail->SMTPSecure= 'tls';


     $mail->setFrom("ghrishi29@gmail.com","idYeah!");
     $mail->AddAddress($toarraymail);     // Add a recipient
     // Optional name
     $mail->isHTML(true);                                  // Set email format to HTML

     $mail->Subject = 'New User Registration For idYeah!';
     $mail->Body    =" Hi, <br> New User,";
     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

     if(!$mail->Send()){
       echo "false";
       echo 'Mailer Error: ' . $mail->ErrorInfo;
       return false;
     }else{
       echo "Sending email";
       return true;
     }
     echo "Sending email";

//}

?>