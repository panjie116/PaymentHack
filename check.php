<?php

$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = '';//enter your email here
$password = ''; //enter your email password here

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

             include 'includes/config.php'; 
              $real = substr($submessage, 0, 8);
               if ($real == 'Incoming') {
                    $sql= "INSERT INTO ndlama(content) VALUES('$finalMessage')";
                    mysqli_query($con, $sql);
                }

            //} End foreach 
          
        
            }
        
        }
       
        imap_close($inbox);



       // preg_match('#Amount:([ 0-9,.]*)#is', $msg, $matches);
       // preg_match('#Ref:(.*)Bal#is', $msg, $matchRef);