
<?php
session_start();
if (!$_GET['reference']) {
  header('Location: order_page.php');
  exit();
}else{
  $reference = $_GET['reference'];
}

$firstname = $_SESSION['fname'];
$lastname = $_SESSION['lname'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];
$finalamount = $_SESSION['finalamount'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Success Page</title>

  <html lang="eng">
  <meta charset="utf-8">
  <meta name="viewpoint" content="width=device-width" initial-scale="1">
  <link rel="stylesheet" type="text/css" href="bootstrap-4.5.0-dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="bootstrap-4.5.0-dist/css/bootstrap.css" >
   <link rel="stylesheet" type="text/css" href="bootstrap-4.5.0-dist/css/bootstrap.grid.css">
   <link rel="stylesheet" type="text/css" href="bootstrap-4.5.0-dist/css/bootstrap.grid.min.css" >
  <script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
  <script src="bootstrap-4.5.0-dist/js/bootstrap.js"></script>
  <script src="bootstrap-4.5.0-dist/js/bootstrap.bundle.js"></script>
  <script src="bootstrap-4.5.0-dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="fontawesome-free-5.13.0-web/css/all.css">
  <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/simple-lightbox.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body id="">


  <div class="container" style="padding: 20px;">


    <h2 style="padding: 20px"><b>Your Payment went through, you can download using the Link</b></h2>

     <div class="card mb-3">
        <div class="card-header text-center">
          <h5>
        Summary</h5></div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>first name:</th>
                  <th>Last name:</th>
                  <th>Email</th>
                  <th>Phone:</th>
                  <th>Amount:</th>
                  <th>Reference No:</th>
                  
                </tr>
              </thead>
              <tfoot>
                <tr>
                 <th>first name:</th>
                  <th>Last name:</th>
                  <th>Email</th>
                  <th>Phone:</th>
                  <th>Amount:</th>
                  <th>Reference No:</th>
                  
                </tr>
              </tfoot>
              <tbody>
                <tr>
                  <td><?php echo $firstname ?></td>
                  <td><?php echo $lastname ?></td>
                  <td><?php echo $email ?></td>
                  <td><?php echo $phone ?></td>
                  <td><?php echo $finalamount ?></td>
                  <td><?php echo $reference ?></td>
                  
                </tr>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>

  
    
  </div>

</body>
</html>