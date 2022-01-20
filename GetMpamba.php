<?php

$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = ''; //your email here
$password = ''; // your password here

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

             require './includes/config.php'; 
          
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
   
           echo "Enter reference number";
           
           $sql= "INSERT INTO `ndalama`(`Amount`, `Reference`, `status`) VALUES ('$amount','$reference', 'new')";
         
                
                 mysqli_query($con, $sql);
   

            
        
            }
        
        }
       
        imap_close($inbox);


        ?>


    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title></title>

        <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
         <link rel="stylesheet" type="text/css" href="./css/main.css">
    </head>
    <body>

         <form>
              <div class="form-group row">
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="reference number" id="inputRef">
                </div>
              </div>
               <button type="button" class="btn btn-primary">Confirm payment</button>
        </form>

    </body>


<script href="./js/jquery.min.css" ></script>

    </html>
