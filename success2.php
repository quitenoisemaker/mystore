
<?php

include ('db/db2.php');

session_start();


$firstname = $_SESSION['fname'];
$lastname = $_SESSION['lname'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];
$finalamount = $_SESSION['finalamount'];

//inserting into databae
$sql ="INSERT INTO pay_on_delivery(firstname, lastname, email, phone, amount) VALUES(:firstname, :lastname, :email, :phone, :amount)";
if ($stmt =$pdo->prepare($sql)) {
  # Bind parameters
  $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
  $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
  $stmt->bindParam(':email', $email, PDO::PARAM_STR);
  $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
  $stmt->bindParam(':amount', $finalamount, PDO::PARAM_STR);
 
  //Attemp to execute

  if ($stmt->execute()) {
    echo "<script>alert('your payment went through!')</script>";
    session_unset();
    session_destroy();
  }else{
    die("Sorry, something went wrong!");

  }
  unset($stmt);
  //close connection
  unset($pdo);
}
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
   <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
              <div class="card card-form" style="" >

            <div class="card-header">
          <h4>Customer Details</h4></div>
            <div class="card-body">         
        <div class="container p-4">
      <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>first name:</th>
                  <th>Last name:</th>
                  <th>Email</th>
                  <th>Phone:</th>
                  <th>Amount:</th>
                 
                  
                </tr>
              </thead>
              <tfoot>
                <tr>
                 <th>first name:</th>
                  <th>Last name:</th>
                  <th>Email</th>
                  <th>Phone:</th>
                  <th>Amount:</th>
            
                  
                </tr>
              </tfoot>
              <tbody>
                <tr>
                  <td><?php echo $firstname ?></td>
                  <td><?php echo $lastname ?></td>
                  <td><?php echo $email ?></td>
                  <td><?php echo $phone ?></td>
                  <td><?php echo $finalamount ?></td>
                  
                  
                </tr>
                
              </tbody>
            </table>
          </div>
        </div>

        </div>

        </div>
        
      </div>

  
    
  </div>

</body>
</html>