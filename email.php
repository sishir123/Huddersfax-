<?php
$to = 'kharelsishir1000@gmail.com';
$subject = 'Test email';
$message = "Hello World!\n\nThis is my first  mail.";
$headers = "From: ksishir21@tbc.edu.np\r\nReply-To: ksishir21@tbc.edu.np";
$mail_sent = mail( $to, $subject, $message, $headers );
        if($mail_sent==true){
            echo "Mail Sent";
        }
        else{
            echo "Mail failed";
        }
?>