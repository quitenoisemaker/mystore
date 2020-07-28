
<?php


if (isset($_POST['submit'])) {
#sanitize the input from users

$sanitizer = filter_var_array($_POST, FILTER_SANITIZE_STRING);
   $email = $sanitizer['email'];
$fname = $sanitizer['fname'];
$lname = $sanitizer['lname'];
$phone = $sanitizer['phone'];
$quantity = $sanitizer['quantity'];



if (!empty($email) && !empty($fname) && !empty($lname) && !empty($phone)) {

  session_start();
  $_SESSION['fname'] = $fname;
  $_SESSION['lname'] = $lname;
  $_SESSION['email'] = $email;
  $_SESSION['phone'] = $phone;
  $_SESSION['quantity'] = $quantity;
  $_SESSION['finalamount'] = $finalamount;

  header('location:pay.php');
}else{
  
  $error= "One or more fields are Empty";
}

}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Landing Page</title>

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



  <style type="text/css">
      
      #error
    {
      margin-top: 20px;
      color:maroon;
      font-family: verdana,sans-serif;
      font-size: 10pt;
      text-align: center;
    }
    </style>
</head>

<body id="">


  <div class="container" style="padding: 20px;">

    <div class="row">
      <div class="col-md-3">
        
      </div>
      <div class="col-md-6">
          <div class="card text-center card-form" style="" >
                <div class="card-body">

                 
                  <h2 style="padding: 20px"><b>Fill your correct datails</b></h2>
                  <form method="post" action="order_page.php" id="" autocomplete="off">

                  <div class="row text-left">
                    <div class="col-md-6">
                  <div class="form-group">
                    <label>How many</label>
                    <input class="form-control" type="number" id="" name="quantity" value="1" >
                  </div>
                </div>
                </div>
              <div class="row text-left">

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Your name</label>
                    <input class="form-control" type="text" id="" name="fname" value="<?php if (isset($_POST['fname'])) echo($fname); ?>" placeholder="First name" >
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group" style="margin-top: 35px">
                    
                    <input class="form-control" type="text" id="" name="lname" value="<?php if (isset($_POST['lname'])) echo($lname); ?>" placeholder="Last name" >
                  </div>
                </div>
              </div>
              <!-- /row -->
              <div class="row text-left">

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Your phone Number</label>
                    <input class="form-control" type="text" id="" name="phone" value="<?php if (isset($_POST['phone'])) echo($phone); ?>" placeholder="Enter phone number">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Your email address</label>
                    <input class="form-control" type="email" id="" name="email" value="<?php if (isset($_POST['email'])) echo($email); ?>" placeholder="Enter email address">
                  </div>
                </div>
                
              </div>

               <?php
                    if (!empty($error)) {
                      echo "<div id='error'>$error</div>";
                    }
                   ?>
              <!-- /row -->
           <hr>
              <div class="row ">
                <div class="col " style="padding: 10px">
                  <h3><b>NGN 3,000.00</b></h3>
                </div>
              </div>

              <div class="row">
                <div class="col ">
                  <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="">
                    <label class="form-check-label">Click to agree to our terms and conditions</label>
                  </div>
                </div>
              </div>
              
                <div class="row">
                  <div class="col">
                    <a href="index.php"><span type="button" class="btn btn-danger" name="submit" style="background-color: indianred">Back</span></a>
                  </div>

                  <div class="col">
                    <button type="submit" class="btn btn-primary" name="submit" style="background-color: forestgreen">Complete your order</button>
                  </div>
                </div>
              
              
            </form>
                </div>
              </div>
            </div>

            <div class="col-md-3">
              
            </div>
      </div>
    </div>
    
  </div>

</body>
</html>