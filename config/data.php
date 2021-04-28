<?php 
require "db.php";


$date = date('Y-m-d H:i:s');

//getting the user IP address
function getIp(){
	$ip = $_SERVER['REMOTE_ADDR'];
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	return $ip;
}

if(isset($_GET['action']) && $_GET['action']=='add_cart'){

	// $pro_id=$_POST['add_cart'];
	
		$ip = getIp();
		$pro_id= $_POST['add_cart'];
		$qty=1;

		$sql = "SELECT * FROM cart where ip_add='$ip' and p_id='$pro_id'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			echo false;
		}
		else{
			$sql="insert into cart(p_id,ip_add,qty)
		values ('".$pro_id."','".$ip."','".$qty."')";
			if ($conn->query($sql) === true){
			echo true;
			}
		}

	
}

if(isset($_GET['action']) && $_GET['action']=='update_cart'){

	
		$ip = getIp();
		$value= $_POST['value'];
		$product_id= $_POST['product_id'];

		$sql = "UPDATE `cart` SET `qty`=$value where ip_add='$ip' and p_id='$product_id'";
		$result = $conn->query($sql);
		if ($result) {
			echo true;
		}
		else{
			echo false;
		}

	
}

if(isset($_GET['action']) && $_GET['action']=='delete_product'){
	$product=$_POST['product'];
	$ck=mysqli_query($conn, "DELETE FROM `cart` WHERE p_id='$product' ");
	echo json_encode(['success' => ['txt' => 'product removed']]);		
}

if(isset($_GET['action']) && $_GET['action']=='register'){

	// $pro_id=$_POST['add_cart'];


	
		$ip = getIp();
		$fname= $_POST['fname'];
		$lname= $_POST['lname'];
		$phone= $_POST['phone'];
		$email= $_POST['email'];
		$password= $_POST['password'];
		
		  $_SESSION['email'] = $email;  

		  $sql="insert into customers( `customer_ip`, `customer_fname`,`customer_lname`, `customer_email`, `customer_pass`, `customer_contact`)
		values ('".$ip."','".$fname."','".$lname."','".$email."','".$password."','".$phone."')";
			if ($conn->query($sql) === true){
			echo true;
			}

		 //  $sql=mysqli_query($conn, "INSERT INTO `customers`(`customer_id`, `customer_ip`, `customer_fname`,`customer_lname`, `customer_email`, `customer_pass`, `customer_contact`) VALUES (NULL,'$ip','$fname','$lname','$email',$password,$'$phone')");
			
			// echo true;
			
		
	
}


if(isset($_GET['action']) && $_GET['action']=='login'){

	
		$ip = getIp();
		$email= $_POST['email'];
		$password= $_POST['password'];
		

		  $sql = "SELECT * FROM customers where customer_email='$email' and customer_pass='$password'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {

			$_SESSION['email'] = $email; 

			echo true;

		}else{
			echo false;
		}		
	
}

if(isset($_GET['action']) && $_GET['action']=='pay_online'){

	
		$ip = getIp();
		if(!empty($_POST['pay_email'])){

			$get_customer=mysqli_query($conn, "SELECT * FROM customers WHERE customer_email='$_SESSION[email]'");
			$row_sustomer=mysqli_fetch_array($get_customer);
            
            mysqli_query($conn,"INSERT INTO `online_payment`(`id`, `firstname`, `lastname`, `email`, `phone`, `amount`, `reference_no`, `date_created`) VALUES (NULL,'$row_sustomer[customer_fname]','$row_sustomer[customer_lname]','$_POST[pay_email]','$row_sustomer[customer_contact]','$_POST[pay_money]','$_POST[ref]','$date')");

            $delete_cart=mysqli_query($conn, "DELETE FROM `cart` WHERE ip_add='$ip'");

            if ($delete_cart) {
            	# code...
            	echo 'deleted';
            }
            


                   // $ewallet_update=mysqli_query($con, "UPDATE `ewallet` SET `current_balance`='$final' WHERE user_id='$row_user[id]'");
                   
                   //Sending email
                   // $subject = 'Ekitiyellowpage Ebook';
                   //      $to=$_POST['pay_email'];
                   //            $subject = $subject;
                        
                   //            $headers[] = 'MIME-Version: 1.0';
                   //      $headers[] = 'Content-type: text/html; charset=iso-8859-1';
                   //            $headers[] = 'From: Ekitiyellowpage <info@ekitiyellowpage.com>' . "\r\n" .
                   //      'Reply-To: info@ekitiyellowpage.com' . "\r\n" .
                   //      'X-Mailer: PHP/' . phpversion();
                        
    
                   //      $body = '<html><body>';
                   //      $body .= '<h3 style="color:green;">Ebook download link</h3>';
                   //      $body .= '<p>You can click on the link below to get Ebook</p><br>';
                   //      $body .= '<a href="https://ekitiyellowpage.com/ebook?link='.$_POST['ref'].'">https://ekitiyellowpage.com/ebook?link='.$_POST['ref'].'</a><br>';
                        
                   //      $body .= '<p>Thanks <br><br></p>';
                   //      $body .= '</body></html>';
            
                   //            mail($to, $subject, $body, implode("\r\n", $headers));
                        //Sendging mails ends


      }
		
	
}

if(isset($_GET['action']) && $_GET['action']=='delivery_wallet'){

	
		$ip = getIp();
		if(!empty($_POST['pay_email'])){

			$get_customer=mysqli_query($conn, "SELECT * FROM customers WHERE customer_email='$_SESSION[email]'");
			$row_sustomer=mysqli_fetch_array($get_customer);
            
            mysqli_query($conn,"INSERT INTO `pay_on_delivery`(`id`, `firstname`, `lastname`, `email`, `phone`, `amount`, `date`) VALUES (NULL,'$row_sustomer[customer_fname]','$row_sustomer[customer_lname]','$_POST[pay_email]','$row_sustomer[customer_contact]','$_POST[pay_amount]','$date')");

            $delete_cart=mysqli_query($conn, "DELETE FROM `cart` WHERE ip_add='$ip'");

            if ($delete_cart) {
            	# code...
            	echo 'deleted';
            }
            


                   // $ewallet_update=mysqli_query($con, "UPDATE `ewallet` SET `current_balance`='$final' WHERE user_id='$row_user[id]'");
                   
                   //Sending email
                   // $subject = 'Ekitiyellowpage Ebook';
                   //      $to=$_POST['pay_email'];
                   //            $subject = $subject;
                        
                   //            $headers[] = 'MIME-Version: 1.0';
                   //      $headers[] = 'Content-type: text/html; charset=iso-8859-1';
                   //            $headers[] = 'From: Ekitiyellowpage <info@ekitiyellowpage.com>' . "\r\n" .
                   //      'Reply-To: info@ekitiyellowpage.com' . "\r\n" .
                   //      'X-Mailer: PHP/' . phpversion();
                        
    
                   //      $body = '<html><body>';
                   //      $body .= '<h3 style="color:green;">Ebook download link</h3>';
                   //      $body .= '<p>You can click on the link below to get Ebook</p><br>';
                   //      $body .= '<a href="https://ekitiyellowpage.com/ebook?link='.$_POST['ref'].'">https://ekitiyellowpage.com/ebook?link='.$_POST['ref'].'</a><br>';
                        
                   //      $body .= '<p>Thanks <br><br></p>';
                   //      $body .= '</body></html>';
            
                   //            mail($to, $subject, $body, implode("\r\n", $headers));
                        //Sendging mails ends


      }
		
	
}
?>