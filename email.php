<?php
$to = 'kharelsishir1000@gmail.com';
$subject = 'Huddersfax Verification';
$message = "Dear Customer, Thanks you for considering us. We will keep you updated.";
$headers = "From: huddersfaxmart@gmail.com\r\nReply-To: kharelsishir1000@gmail.com";
$mail_sent = mail( $to, $subject, $message, $headers );
        if($mail_sent==true){
            echo "Mail Sent";
        }
        else{
            echo "Mail failed";
        }
?>