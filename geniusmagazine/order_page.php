
<?php

include ("function/function.php");
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

  header('location:pay');
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
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1">
   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <link rel="shortcut icon" href="img\logo_g3.jpg">
        <link rel="apple-touch-icon" href="img\logo_g3.jpg">
        <link rel="apple-touch-icon" sizes="72x72" href="img\logo_g3.jpg">
        <link rel="apple-touch-icon" sizes="114x114" href="img\logo_g3.jpg">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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

    <div class="row justify-content-center">
      
      <div class="col-md-6">
          <div class="card text-center card-form" style="" >
                <div class="card-body">

                 <div class="">
                    <a href="/" class="display-inline-block logo"><img alt="Genius" src="images\002.jpg" width="60"></a>
                </div>
                  <h5 style="" class="text-dark pt-2"><b>Fill your correct details</b></h5>
                  <form method="post" action="order_page" id="">

                  <div class="row text-left">
                    <div class="col-md-12">
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
              <!--<div class="row ">-->
              <!--  <div class="col text-dark" style="padding: 10px">-->
              <!--    <h5><b>NGN <?php echo getPrice(); ?></b></h5>-->
              <!--  </div>-->
              <!--</div>-->

    
              
              
                  <div class="float-left">
                    <a href="index"><span type="button" class="btn btn-danger" name="submit" style="background-color: indianred">Back</span></a>
                  </div>

                  <div class="float-right">
                    <button type="submit" class="btn btn-primary" name="submit" style="background-color: forestgreen">Proceed</button>
                  </div>
                
              
              
            </form>
                </div>
              </div>
            </div>

      </div>
    </div>
    
</body>
</html>