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
                            <h5 style="" class="text-dark pt-2"><b>Login</b></h5>
                            <form method="post" id="login">
                                <!-- /row -->
                                <div class="row text-left">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="email" id="email" name="email" required value="<?php if (isset($_POST['email'])) echo($email); ?>" placeholder="Enter email address">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" type="password" id="password" name="password" required value="<?php if (isset($_POST['phone'])) echo($phone); ?>" placeholder="Enter phone number">
                                        </div>
                                    </div>
                                </div>
                                <?php
                    if (!empty($error)) {
                      echo "<div class='text-danger'>$error</div>";
                    }
                   ?>
                                <br>
                                <div class="row">
                                    <div class="col ">
                                        <div class="form-group form-check">
                                            <a href="forget_password"><label class="form-check-label">Forget your password?</label></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->
                                <hr>
                                <!-- <div class="">
                                <button class="btn btn-dark btn-block" name="submit">Proceed</button>
                            </div> -->
                                <button type="submit" class="btn btn-dark btn-block mr-2 mb-2 mb-md-0 text-white">
                                    <span class="default-load">Login<i data-feather="arrow-right"></i></span>
                                    <span hidden class="let-load">
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        Processing ...
                                    </span>
                                </button>
                                <div class="row">
                                    <div class="col ">
                                        <div class="form-group form-check">
                                            <label class="form-check-label">Not registered?<a href="register" style="font-size: 20px"> Create Account here </a></label>
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
<script>
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
</script>
</body>
<!-- Mirrored from agencyco.themetags.com/index-8.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Sep 2020 09:23:05 GMT -->

</html>