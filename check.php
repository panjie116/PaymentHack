<?php

$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = 'lawsadmission@gmail.com'; //your email here
$password = 'laws2021'; // your password here

//try to connect 
$inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

// grab emails 
$emails = imap_search($inbox,'ALL');

//if emails are returned, cycle through each... 
if($emails) {

rsort($emails);

foreach($emails as $email_number) {
    
    // get information specific to this email
$headers =imap_fetch_overview($inbox, $email_number,0);

$message=imap_fetchbody($inbox,$email_number,'1');
$submessage=substr($message,0,700);
$finalMessage=trim(quoted_printable_decode($submessage));

             require 'conn.php'; 
          
             //grab amount and reference number from email 
           preg_match_all('#Amount:([ 0-9,.]*)#is', $finalMessage, $matches);// change "#Amount" to "AMT" if you want to capture agent payments
           preg_match_all('#Ref:(.*)Bal#is', $finalMessage, $matchRef);
   
           foreach ($matchRef[1] as $output) {
                   $reference1 = strip_tags("$output"); //remove white spaces
                   $reference = trim($reference1);
                   
                
                }
   
   
           foreach ($matches[1] as $output2) {
                   $amount = ("$output2");
                  
   
                   

                    
           }
   
           echo "Payment page";
           
           $sql= "INSERT INTO `payments`(`Amount`, `Reference`, `status`) VALUES ('$amount','$reference', 'new')";
         
                
                 mysqli_query($con, $sql);
   

            //} End foreach 
          
        
            }
        
        }
       
        imap_close($inbox);