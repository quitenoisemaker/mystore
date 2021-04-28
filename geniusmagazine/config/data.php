<?php
include ("../function/function.php");

$date = date('Y-m-d H:i:s');
if(isset($_GET['action']) && $_GET['action']=='fund_wallet'){

      if(!empty($_POST['pay_email'])){
            
            mysqli_query($conn,"INSERT INTO `online_payment`(`id`, `firstname`, `lastname`, `email`, `phone`, `amount`, `reference_no`, `date_created`) VALUES (NULL,'','','$_POST[pay_email]','','$_POST[pay_money]','$_POST[ref]','$date')");

            echo true;


                   // $ewallet_update=mysqli_query($con, "UPDATE `ewallet` SET `current_balance`='$final' WHERE user_id='$row_user[id]'");
                   
                   //Sending email
                    $subject = 'Geniusgistmagazine Ebook';
                         $to=$_POST['pay_email'];
                               $subject = $subject;
                        
                               $headers[] = 'MIME-Version: 1.0';
                         $headers[] = 'Content-type: text/html; charset=iso-8859-1';
                               $headers[] = 'From: Geniusgistmagazine <hello@geniusgistmagazine.com>' . "\r\n" .
                         'Reply-To: hello@geniusgistmagazine.com' . "\r\n" .
                         'X-Mailer: PHP/' . phpversion();
                        
    
                         $body = '<html><body>';
                         $body .= '<h3 style="color:red;">Ebook download link</h3>';
                         $body .= '<p>You can click on the link below to get Ebook</p><br>';
                         $body .= '<a href="https://geniusgistmagazine.com/ebook?link='.$_POST['ref'].'">https://geniusgistmagazine.com/ebook?link='.$_POST['ref'].'</a><br>';
                        
                         $body .= '<p>Thanks <br><br></p>';
                         $body .= '</body></html>';
            
                               mail($to, $subject, $body, implode("\r\n", $headers));
                        // Sendging mails ends


      }

}


if(isset($_GET['action']) && $_GET['action']=='delivery_wallet'){
                
                
                
                mysqli_query($conn,"INSERT INTO `pay_on_delivery`(`id`, `firstname`, `lastname`, `email`, `phone`,`quantity`, `amount`, `date_created`) VALUES (NULL,'$_POST[pay_fname]','$_POST[pay_lname]','$_POST[pay_email]','$_POST[pay_phone]','$_POST[pay_quantity]','$_POST[pay_amount]','$date')");
           

            echo true;
            
             //Sending email
                    $subject = 'Pay on Delivery Order';
                         $to="nwebunuemmanuel@gmail.com";
                               $subject = $subject;
                        
                               $headers[] = 'MIME-Version: 1.0';
                         $headers[] = 'Content-type: text/html; charset=iso-8859-1';
                               $headers[] = 'From: Geniusgistmagazine <hello@geniusgistmagazine.com>' . "\r\n" .
                         'Reply-To: hello@geniusgistmagazine.com' . "\r\n" .
                         'X-Mailer: PHP/' . phpversion();
                        
    
                         $body = '<html><body>';
                         $body .= '<h3 style="color:red;">Ebook Pay on Deliver Order:</h3>';
                         $body .= '<p style="font-size: 18px;">Name: '. $_POST["pay_fname"] .'</p>
                         <p style="font-size: 18px;">Phone: '. $_POST["pay_phone"] .'</p>
                         <p style="font-size: 18px;">Email: '. $_POST["pay_email"] .'</p>
                         <p style="font-size: 18px;">Quantity: '. $_POST["pay_quantity"] .'</p>
                         <p style="font-size: 18px;">Date: '. $date .'</p><br>';
        
                         $body .= '<p style="font-size: 18px;">Thanks <br><br></p>';
                         $body .= '</body></html>';
            
                               mail($to, $subject, $body, implode("\r\n", $headers));
                        // Sendging mails ends

}

?>