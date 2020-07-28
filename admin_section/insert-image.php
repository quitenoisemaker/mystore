<?php
session_start();
error_reporting(0);
include ("function/function.php");
if(! $_SESSION['username']){
session_destroy();
header('location:index.php');
}
else{
// Code for create location
if(isset($_POST['submit'])){

	$actno="0123456789";
	$actno=str_shuffle($actno);
	$actno=substr($actno, 0, 10);

	$fullname= $_POST['fullname'];
	$password=$_POST['password'];
	// $password=password_hash($password, PASSWORD_DEFAULT);
	$dob=$_POST['dob'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$email= $_POST['email'];
	$location=$_POST['loc'];

	if(isset($_POST['loc'])){
  	
  }

  if(isset($_POST['optradio'])){
  	$Gender=$_POST['optradio'];
  }

  if(isset($_POST['actype'])){
  	$actype=$_POST['actype'];
  }


   //check if email already exist
 		// $sql = $conn->prepare("select email from customer where email = ?");
  	// 	$sql->bind_param("s",$email);
  	// 	$sql->execute();
  	// 	$result = $sql->get_result();

  		$sql = "SELECT email FROM customer where email ='".$email."'";
			$result = $conn->query($sql);
  		if ($result->num_rows==1) {
  		echo "<script>alert('Email already exist, Thanks')</script>";
  			
  		// 	header('location:create-customer.php');
  		// // $error_message = "Email already exist, Thanks";
  		echo "<script>window.open('create-customer.php','_self')</script>";
  		
  		exit();
  		}


    if(!empty($fullname) && !empty($password) && isset($_POST['optradio']) && !empty($_POST['dob']) && !empty($location) && isset($_POST['actype']) && !empty($_POST['phone']) && !empty($address) && !empty($address) && !empty($email)) {


  $sql="insert into customer(name,gender,dob,account,account_no,address,phone,email,password,branch)
		values ('".$fullname."','".$Gender."','".$dob."','".$actype."','".$actno."','".$address."','".$phone."','".$email."','".$password."','".$location."')";
			if ($conn->query($sql) === true){

				$_SESSION['email']=$email;
			echo "<script>alert('Customer as been created')</script>";

			$to=$email;
			$subject = 'Account Created';
			$body= 'Dear "$fullname"'. "\n\n".'We wish to inform you that an account as been created with us' . "\n\n". 'The details of the account are shown below'. "\n\n". 'Name : "$fullname"'. "\n\n". 'Account No.: "$actno"'."\n\n". 'Email: "$email"' . "\n\n". 'Password: "$password"' . "\n\n". 'Thanks for Banking with us.' ;
			$headers= 'From: Lloyds Bank <contact@Lloydsbank.com>';

			mail($to, $subject, $body, $headers);

			}
   	


		  }
}

?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Howdy! <?php echo $_SESSION['username']; ?> | Admin Create location</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}

label{
	text-align: left;
}

    	
    	#error
		{
			margin-top: 20px;
			color:maroon;
			font-family: verdana,sans-serif;
			font-size: 8pt;
		}

		</style>


</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container">
<h2 class="page-title">Create Customer</h2>
				<div class="row">
					<div class="col-md-3"></div>

					<div class="col-md-6" style="background-color: lavender; padding: 20px">
					
						

							
							<div class="panel panel-default">
							<div class="panel-heading">Create New Customer</div>
							<div class="panel-body">
							<form action="create-customer.php" method="POST" enctype="">
								  <div class="form-group">
								    <label for="text">Full name:</label>
								    <input type="text" class="form-control" name="fullname">
								    <span id="error"><?php if (isset($_POST['submit'])) if(empty($_POST['fullname'])) echo "Empty! Field required"; ?></span>
								  </div><br>

								  <div class="form-group">
								    <label for="text">Email:</label>
								    <input type="email" class="form-control"  name="email">
								    <span id="error"><?php if (isset($_POST['submit'])) if(empty($_POST['email'])) echo "Empty! Field required"; ?></span>
								 
								    <br>
								  </div><br>
								  <div class="form-group">
								    <label for="pwd">Password:</label>
								    <input type="password" class="form-control" id="pwd" name="password">
								    <span id="error"><?php if (isset($_POST['submit'])) if(empty($_POST['password'])) echo "Empty! Field required"; ?></span><br>
								  </div><br>
								  <div>
								  	<label>Gender:</label>
								  <label class="radio-inline"><input type="radio" name="optradio" value="M">M</label>
								  <label class="radio-inline"><input type="radio" name="optradio" value="F">F</label><br>
								  <span id="error"><?php if (isset($_POST['submit'])) if(!isset($_POST['optradio'])) echo "You forgot to choose Gender"; ?></span>
								</div><br>
								<div class="form-group">
								    <label for="">DOB:</label>
								    <input type="date" class="form-control" name="dob">
								    <span id="error"><?php if (isset($_POST['submit'])) if(empty($_POST['dob'])) echo "Empty! Field required"; ?></span><br>
								  </div><br>
								  <div class="form-group">
								    <label for="text">location:</label>
								    <input type="text" class="form-control" name="loc">
								    <span id="error"><?php if (isset($_POST['submit'])) if(empty($_POST['loc'])) echo "Empty! Field required"; ?></span>
								  </div><br>

								 <div class="form-group">
								  <label for="sel1">Account Type:</label>
								  <select class="form-control" id="sel1" name="actype">
								  	<option value="" selected disabled="">Select Account type*</option>
								    <option value="Savings">Savings</option>
								    <option value="Current">Current</option>
								
								  </select>
								  <span id="error"><?php if (isset($_POST['submit'])) if(!isset($_POST['actype'])) echo "You forgot to select Account type"; ?></span>
								</div><br>
								<!-- <div class="form-group">
								    <label for="text">Account No:</label>
								    <input type="text" class="form-control" name="actno">
								  </div><br> -->
								  <div class="form-group">
								  <label for="comment">Address:</label>
								  <textarea class="form-control" rows="5" name="address"></textarea>
								  <span id="error"><?php if (isset($_POST['submit'])) if(empty($_POST['address'])) echo "Empty! Field required"; ?></span><br>
								</div><br>
								  <div class="form-group">
								    <label for="text">Phone:</label>
								    <input type="text" class="form-control" name="phone">
								    <span id="error"><?php if (isset($_POST['submit'])) if(empty($_POST['phone'])) echo "Empty! Field required"; ?></span><br>
								  </div><br>
								  


								  <button type="submit" class="btn btn-default btn-block" name="submit">Submit</button>
							</form>
							</div>
						</div>
								</div>
							</div>
					
						</div>
						
					<div class="col-md-3"></div>

					</div>
				</div>
				
			
			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
<?php } ?>