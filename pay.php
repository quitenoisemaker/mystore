<?php
session_start();

if(!$_SESSION['email']){
session_destroy();
header('location:order_page.php');
}else{

$amount = 3000;

$pamount = 300000;

$fname = $_SESSION['fname'];
  $lname=$_SESSION['lname'];
  $email= $_SESSION['email'];
  $phone = $_SESSION['phone'];
  $quantity = $_SESSION['quantity'];
  $finalamount=$_SESSION['finalamount'];


  $finalamount= $quantity * $amount;
  $pfinalamount= $quantity * $pamount;


  $_SESSION['finalamount'] = $finalamount;

  }

?>

<!DOCTYPE html>
<html>
<head>
  <title>Payment</title>

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

    <div class="row">
      
      <div class="col-sm-12">
          <div class="card card-form" style="" >

            <div class="card-header">
          <h4>Customer Details</h4></div>
            <div class="card-body">         
        <div class="container p-4">
      <p> Name: <?php echo "$fname". " " ."$lname" ; ?></p>
      <p>Email: <?php echo "$email"; ?></p>
      <p>Phone number: <?php echo "$phone"; ?></p>
      <p>Quantity: <?php echo "$quantity"; ?></p>
      <h4 class="text-center p-3">Your total amount is  <?php echo "<span style='color: red'>NGN $finalamount</span>"; ?></h4>
        </div>

        </div>

        </div>
      <hr>

      <div class="card card-form" style="" >

            <div class="card-body">
                  
        <div class="container p-4">
  <form>
    <h5>Stay Safe, go cashless</h5>
    <div class="p-4">
    <img src="img/20.jpg" height="50"><img src="img/18.jpg" height="50"><img src="img/19.jpg" height="50">
    </div>
    <p>Your payment is safe. if anything goes wrong, we've got your back</p>
    <script src="https://js.paystack.co/v1/inline.js"></script>

    <button type="button" class="btn btn-primary" onclick="payWithPaystack()"> Pay Now</button>
  </form>
</div>
</div>
</div>

 <hr>

      <div class="card card-form" style="" >

            <div class="card-body">
                  
        <div class="container p-4">
  <form action="pay.php" method="POST">
    <h5>Pay on delivery</h5>
    <p>Please note: We will never ask you fro your password PIN,CVV or full card details over the phone or via email</p>
    <ul>
      <li>Kindly note that you would have to make payment before opening your package.</li>
      <li>Once the seal is broken, the item can only be returned if it is damaged, defective or has missing parts.</li>
    </ul>
    

    <button type="button" class="btn btn-primary" name="submit"> Submit </button>
  </form>
</div>
</div>
</div>


  <script>
    
function payWithPaystack() {
  
  var handler = PaystackPop.setup({
    key: 'pk_test_8da0196b3c9020e43f5e7435212b68beeb0a5858', // Replace with your public key
    email: '<?php echo $email; ?>',
    amount: <?php echo $pfinalamount; ?>,
    currency: "NGN",
    firstname: '<?php echo $fname; ?>',
    lastname: '<?php echo $lname; ?>',
    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"

    metadata: {
      custom_fields: [
      {
          display_name: "<?php echo $fname; ?>",
          variable_name: "<?php echo $lname; ?>",
          value: "<?php echo $phone; ?>"

      }


      ]
    },
    // redirect page after it has succesfully completed payment
    callback: function(response) {
  window.location = "success.php?reference=" + response.reference;
},
// On the redirected page, you can call Paystack's verify endpoint.,
    onClose: function(){
      alert('Window closed.');
    }
  });
  handler.openIframe();
}
  </script>
                
              
            </div>

           
      </div>
    </div>
    
  </div>

</body>
</html>