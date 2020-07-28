<?php
include ("function/function.php");


if (isset($_POST['submit'])) {
	$username=$_POST['username'];
	$password=$_POST['password'];
	$password=password_hash($password, PASSWORD_DEFAULT);
//check if username already exist
 		$sql = $conn->prepare("select username from admin where username = ?");
  		$sql->bind_param("s",$username);
  		$sql->execute();
  		$result = $sql->get_result();
  		if ($result->num_rows==1) {
  		echo "<script>alert('username already exist, Thanks')</script>";
  		echo "<script>window.open('../index.php','_self')</script>";
  		exit();
  		}

      if(!empty($username) && !empty($password)) {

        $sql = $conn->prepare("INSERT INTO admin (username,password) VALUES (?,?)");
        $sql->bind_param("ss", $username,$password); 
          if($sql->execute()) {
            $_SESSION['username']=$username;
      echo "<script>alert('Account Registered Successfully, Thanks')</script>";
      
    }else{
      echo "<script>alert('Account not Successful, Thanks')</script>";

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

  <title>THEARTIZANZS | Admin Login</title>
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../css/bootstrap-social.css">
  <link rel="stylesheet" href="../css/bootstrap-select.css">
  <link rel="stylesheet" href="../css/fileinput.min.css">
  <link rel="stylesheet" href="../css/awesome-bootstrap-checkbox.css">
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  
  <div class="login-page bk-img" style="background-image: url(../img/login-bg.jpg);">
    <div class="form-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <h1 class="text-center text-bold text-light mt-4x">Register new Admin</h1>
            <div class="well row pt-2x pb-3x bk-light">
              <div class="col-md-8 col-md-offset-2">
                <form method="post">

                  <label for="" class="text-uppercase text-sm">Your Username </label>
                  <input type="text" placeholder="Username" name="username" class="form-control mb">

                  <label for="" class="text-uppercase text-sm">Password</label>
                  <input type="password" placeholder="Password" name="password" class="form-control mb">

                

                  <button class="btn btn-primary btn-block" name="submit" type="submit">Register New Admin</button>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Loading Scripts -->
  <script src="jquery.min.js"></script>
  <script src="bootstrap-select.min.js"></script>
  <script src="bootstrap.min.js"></script>
  <script src="jquery.dataTables.min.js"></script>
  <script src="dataTables.bootstrap.min.js"></script>
  <script src="Chart.min.js"></script>
  <script src="fileinput.js"></script>
  <script src="chartData.js"></script>
  <script src="main.js"></script>

</body>

</html>