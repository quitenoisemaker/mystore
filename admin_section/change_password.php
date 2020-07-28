<?php
session_start();
error_reporting(0);
include ("function/function.php");
if(! $_SESSION['username']){

header('location:index.php');
}
else{
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
	
	<title>SERVICESWISE | Admin Dashboard</title>

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
</head>

<body>
<?php include('includes/header.php');?>

	<div class="ts-main-content">
<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">

						 <div class="box_general padding_bottom">
					          <div class="header_box version_2">
					            <h2><i class="fa fa-lock"></i> Change password</h2>
					          </div>
					         <form action="change_password.php" method="POST">
						          <div class="form-group">
						            <label>Old password</label>
						            <input class="form-control" type="password" name="old_password" required="">
						          </div>
						          <div class="form-group">
						            <label>New password</label>
						            <input class="form-control" type="password" name="new_password" required="">
						          </div>
						          <div class="form-group">
						            <label>Confirm new password</label>
						            <input class="form-control" type="password" name="password_again" required="">
						          </div>
						          <div class="text-center"><input type="submit" value="Update Password" name="submit" class="btn btn-primary btn-block"></div>
    						</form>
					      
					     </div>
					</div>
					<div class="col-md-2"></div>
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
	
	<script>
		
	window.onload = function(){
    
		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		}); 
		
		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>
</body>
</html>
<?php } ?>
<?php
if (isset($_POST['submit'])) {
  $username=$_SESSION['username'];
  $old_password=$_POST['old_password'];
  $new_password=$_POST['new_password'];
  // $new_password1=password_hash($new_password, PASSWORD_DEFAULT);
  $password_again=$_POST['password_again'];
  // $password_again1=password_hash($password_again, PASSWORD_DEFAULT);

  $sql = $conn->prepare("select * from admin where username =?");
  $sql->bind_param("s",$username);
  $sql->execute();
  $result = $sql->get_result();

  if($result->num_rows>0){

    while($row=$result->fetch_assoc()){
      if ($old_password != $row["password"] ) {
           echo "<script>alert('Your current password is wrong')</script>";
        exit();
      }
    }
  }

if ($new_password != $password_again) {
  echo "<script>alert('New password do not match')</script>";
  exit();
}else{
  
  	$sql = "UPDATE admin SET password='$new_password' WHERE email='$username'";

  if(mysqli_query($conn, $sql)) {
      echo "<script>alert('Your password was updated successfully')</script>";
      // echo "<script>window.open('dashboard.php','_self')</script>";
      header('location:dashboard.php');
    } 
}
}
?>