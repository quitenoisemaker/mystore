<?php
	session_start();
	error_reporting(0);
	include ("function/function.php");
	if(! $_SESSION['username']){
	session_destroy();
	header('location:index.php');
	}
	if (isset($_POST['submit'])) {

		$fullname= $_POST['fullname'];
		$password=$_POST['password'];
		
		$dob=$_POST['dob'];
		$actno=$_POST['actno'];
		$address=$_POST['address'];
		$phone=$_POST['phone'];
		$email= $_POST['email'];
		$accountstatus = $_POST['accountstatus'];

		$location=$_POST['loc'];

	  if(isset($_POST['optradio'])){
	  	$Gender=$_POST['optradio'];
	  }

	  if(isset($_POST['actype'])){
	  	$actype=$_POST['actype'];
	  }

	  $id=$_GET['id'];

		$sql = "UPDATE customer SET accountstatus='$accountstatus', name='$fullname', branch='$location', dob='$dob'  WHERE id=$id";
		
		if(mysqli_query($conn, $sql)) {

			echo "<script>alert('Customer as been updated')</script>";
			
		} else {
		
			echo "<script>alert('Problem in Editing Record')</script>";
		}

	
	}
?>
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
		</style>


</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container">
<h2 class="page-title">Edit Customer</h2>
				<div class="row">
					<div class="col-md-3"></div>

					<div class="col-md-6" style="background-color: steelblue; padding: 20px">


		<?php	
		$id=$_GET['id'];
		$sql="select * from customer where id=$id";

		$result=$conn->query($sql);
		
		if($result->num_rows >0){
										        
		while ( $row = $result->fetch_assoc()) {	

		?>
					
						

							<div class="panel panel-default">
							<div class="panel-heading">Edit Customer</div>
							<div class="panel-body">
							<form action="" method="POST" enctype="">

								 <div class="form-group">
								    <label for="accountstatus">fullname:</label>
								    <input type="text" class="form-control" id="pwd" name="fullname" value="<?php echo htmlentities($row['name']);?>">
								  </div><br>
								   <div class="form-group">
								    <label for="accountstatus">Country:</label>
								    <input type="text" class="form-control" id="pwd" name="loc" value="<?php echo htmlentities($row['branch']);?>">
								  </div><br>
								   <div class="form-group">
								    <label for="accountstatus">Dob:</label>
								    <input type="date" class="form-control" id="pwd" name="dob" value="<?php echo htmlentities($row['dob']);?>">
								  </div><br>
								
								  <div class="form-group">
								    <label for="accountstatus">Account status:</label>
								    <input type="text" class="form-control" id="pwd" name="accountstatus" value="<?php echo htmlentities($row['accountstatus']);?>">
								  </div><br>

							
							<!--  -->

								 
         <?php }} ?>

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