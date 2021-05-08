<?php
include ('include/header.php');


$_SESSION['finalamount']= total_price2();

$finalamount=$_SESSION['finalamount'];
?>
<!--header section end-->
<!--body content wrap start-->
<div class="main">
    <!--promo section start-->
    <section class="promo-section pb-50" style="padding-top: 120px">
        <div class="container" style="padding: 20px;">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card text-center card-form" style="box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);">
                        <div class="card-body">
                            <!-- Form -->
          <form action="" method="POST">

            <!-- Email address -->
            <div class="form-group">

              <!-- Label -->
              <label>New password</label>

              <!-- Input -->
              <input type="password" class="form-control" placeholder="Enter password" name="password" required>

            </div>

            <!-- Submit -->
            <button class="btn btn-lg btn-block btn-dark mb-3" name="submit">
              Update Password
            </button>

            <!-- Link -->
            <div class="text-center">
              <small class="text-muted text-center">
                Remember your password? <a href="login">Sign in</a>.
              </small>
            </div>
            
          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!--body content wrap end-->
<!--footer section start-->
<?php include('include/footer.php') ?>
<!--footer section end-->
<!--jQuery-->
<script src="js/jquery-3.4.1.min.js"></script>
<!--Popper js-->
<script src="js/popper.min.js"></script>
<!--Bootstrap js-->
<script src="js/bootstrap.min.js"></script>
<!--Magnific popup js-->
<script src="js/jquery.magnific-popup.min.js"></script>
<!--jquery easing js-->
<script src="js/jquery.easing.min.js"></script>
<!--owl carousel js-->
<script src="js/owl.carousel.min.js"></script>
<!--validator js-->
<script src="js/validator.min.js"></script>
<!--custom js-->
<script src="js/scripts.js"></script>
<script src="js/simple-lightbox.min.js"></script>
<script src="assets/sweetalert/sweetalert2.all.min.js"></script>
<!-- <script src="assets/js/custom.js"></script> -->
<script>
var lightbox = new SimpleLightbox('.gallery a', { /* options */ });
</script>
<!-- <script src="assets/script.js"></script> -->
<!-- <script>
$(document).on('submit', '#login', function(ev) {
    ev.preventDefault();
    let mee = $(this);
    let mee_form = $(this).serialize();
    // $('.default-load').attr('hidden', true);
    // $('.let-load').removeAttr('hidden');
    // $('input').attr('readonly', true);
    // $('#checkout').find('button').attr('disabled', true);

    $.ajax({
        url: 'config/data?action=login',
        type: 'POST',
        // dataType: 'json',
        data: mee_form,
        success: function(data) {
            // alert(data)
            if (data == true) {

                $('.default-load').attr('hidden', true);
                $('.let-load').removeAttr('hidden');
                $('input').attr('readonly', true);
                $('#login').find('button').attr('disabled', true);
                window.location = 'cart';
            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Email or password incorrect',
                })
            }
        },
        error: function(error_msg) {
            console.log(error_msg);
        }

    })

})
</script> -->
</body>

<?php
   if (isset($_GET['email']) && isset($_GET['token'])) { 
    if(isset($_POST['submit'])){
        

    $email=$_GET['email'];
    $token=$_GET['token'];
    // $password=$_POST['password'];
    $password= md5($_POST['password']);
    


      $us = mysqli_query($conn, "SELECT * FROM `customers` WHERE customer_email ='$email' AND password_token='$token'");
    $count_users = mysqli_num_rows($us);

        if($count_users > 0){

        $password_update=mysqli_query($conn, "UPDATE `customers` SET `customer_pass`='$password' WHERE customer_email='$email'");
        
      echo "<script>
                Swal.fire({
                title: 'Your new password has been set',
                type: 'success',
                    }).then(function() {
                     window.location = 'login';
                    });
            </script>";
    }else{
        echo "<script>
                    Swal.fire({
                    title: 'Opps!',
                    text: 'Please check your link',
                    type: 'warning',
                        });
            </script>";
    }

}
    }else{
  echo "<script>window.open('login','_self')</script>";
}
    
    ?>
<!-- Mirrored from agencyco.themetags.com/index-8.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Sep 2020 09:23:05 GMT -->

</html>