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
                            <h5 style="" class="text-dark pt-2"><b>Forget Password</b></h5>
                            <form method="post" action="">
                                <!-- /row -->
                                <div class="row text-left">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <p>Enter the e-mail address associated with your account. We will send you a link to this e-mail address to reset your password.</p>

                                            <input class="form-control" type="email" id="email" name="email" required value="" placeholder="Enter your email">
                                        </div>
                                    </div>
                                </div>
                        
                                <button type="submit" class="btn btn-dark btn-block mr-2 mb-2 mb-md-0 text-white" name="submit">
                                    <span class="default-load">Reset Password<i data-feather="arrow-right"></i></span>
                                    <!-- <span hidden class="let-load">
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        Processing ...
                                    </span> -->
                                </button>
                                <div class="row">
                                    <div class="col pt-4">
                                        <div class="form-group form-check">
                                            <label class="form-check-label"><a href="login" style="font-size: 20px"> Return to Login </a></label>
                                        </div>
                                    </div>
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
    
    if(isset($_POST['submit'])){
        
    $email=$_POST['email'];
        
        $sql = "SELECT * FROM customers where customer_email ='$email'";
      $result = $conn->query($sql);
        
        
        if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
      $email=$row["customer_email"];
       }
            $str="123456789qwertyuiopkjhgafdsmncxc";
            $str=str_shuffle($str);
            $str=substr($str, 0, 10);
            $url="http://localhost/landing_page/passwordreset?token=$str&email=$email";
            //Sending email
            $subject = 'Reset Password';
            
            
            // $to=$email;
            // $subject = $subject;
            
            // $headers[] = 'MIME-Version: 1.0';
            //             $headers[] = 'Content-type: text/html; charset=iso-8859-1';
            //             $headers[] = 'From: Today\'s Leadership <info@tli.mentscrm.com.ng>' . "\r\n" .
            //             'Reply-To: info@tli.mentscrm.com.ng' . "\r\n" .
            //             'X-Mailer: PHP/' . phpversion();
                        
            //             $body = '<html><body>';
            //             $body .= '<h4 style="color:#f40;">Reset password</h4>';
            //             $body .= '<p>Click on the button below to reset password</p><br><br>';
            //             $body .= '<span style="background-color:#f40; padding: 10px"><a href="'.$url.'" style="color:white;">Reset password</a></span><br><br>';
            //             $body .= '<p>Thanks <br><br> The TLI team</p>';
            //             $body .= '</body></html>';
                        
            //             mail($to, $subject, $body, implode("\r\n", $headers));
                        
                        
                      
                        $token_update=mysqli_query($conn, "UPDATE `customers` SET `password_token`='$str' WHERE customer_email='$email'");
                        
                        
                        if($token_update) {

                              echo "<script>
                                    Swal.fire({
                                        title: 'Please check your Mail',
                                        type: 'success',
                                    });
                            </script>";
                            }else{
                                echo "<script>
                                    Swal.fire({
                                        title: 'Please check your input',
                                        type: 'warning',
                                    });
                            </script>";
                            }
        }else{
                                echo "<script>
                                    Swal.fire({
                                        title: 'Email address not found',
                                        type: 'warning',
                                    });
                            </script>";
                            }
    }
    
    ?>
<!-- Mirrored from agencyco.themetags.com/index-8.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Sep 2020 09:23:05 GMT -->

</html>