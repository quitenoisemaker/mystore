<?php
include('../function/function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Techlybro">
    <title>Geniusgist - Admin dashboard</title>
    <!-- Favicons-->
    <link rel="shortcut icon" href="..\img\logo_g3.jpg">
        <link rel="apple-touch-icon" href="..\img\logo_g3.jpg">
        <link rel="apple-touch-icon" sizes="72x72" href="..\img\logo_g3.jpg">
        <link rel="apple-touch-icon" sizes="114x114" href="..\img\logo_g3.jpg">
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Main styles -->
    <link href="css/admin.css" rel="stylesheet">
    <!-- Icon fonts-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Plugin styles -->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Your custom styles -->
    <link rel="stylesheet" href="assets/sweetalert/sweetalert2.min.css">
    <link href="css/custom.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer" id="page-top">
    <div class="">
        <div class="container col-lg-4">
            <br><br><br><br><br>
            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <h4>Login</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="row">
                            <div class="col-lg-12 form-group">
                                <label>
                                    Username
                                </label>
                                <input required type="text" class="form-control" placeholder="" name="username">
                            </div>
                            <div class="col-lg-12 form-group">
                                <label>
                                    Password
                                </label>
                                <label class="float-right">
                                    <a href="">Forget assword</a>
                                </label>
                                <input required type="password" class="form-control" placeholder="" name="password">
                            </div>
                            <div class="col-lg-12 form-group">
                                <button class="btn btn-primary btn-lg btn-block mb-3" name="submit">
                                    <span>Submit</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /container-fluid-->
    </div>
    <!-- /container-wrapper-->
    <?php include('include/footer.php');

    if (isset($_POST['submit'])) {
  $username=$_POST['username'];
  $user_pass=$_POST['password'];


  $sql = "SELECT * FROM admin where username ='$username'";
      $result = $conn->query($sql);
  if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
      $password=$row["password"];
       }

      if ($user_pass == $password){
        $_SESSION['username']= $username;
                echo "<script>Swal.fire({
            text: 'You login Successfully!',
            title: 'Success!',
            AllowEscapeKey: false,
            button: 'Aww yiss!',
            type: 'success'
        }).then(function() {
            Swal.fire({
                            title: 'Please Wait!',
                            text: 'Processing ...',
                            timer: false,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            onOpen: () => {
                                swal.showLoading()
                            }
                        })
                            window.location = 'index';
                        })</script>";

        // header('location:index');
         // echo "<script>window.open('index','_self')</script>";
      }elseif($user_pass !=$password){

          echo "<script>Swal.fire({
            text: 'Email/Password combination is incorrect, pls try again',
            title: 'Opps',
            AllowEscapeKey: false,
            type: 'warning'
        })</script>";

      }

}else{

  echo "<script>swal.fire({
            text: 'Your username is wrong',
            title: 'Opps',
            AllowEscapeKey: false,
            type: 'warning'
        })</script>";


}


 } ?>
</body>

<!-- Mirrored from www.ansonika.com/sparker/admin_section/charts.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Dec 2018 07:15:01 GMT -->

</html>