<?php
include ('include/header.php');

if (!isset($_SESSION['email'])) {
  header('locate:login.php');
}


$get_customer=mysqli_query($conn, "SELECT * FROM customers WHERE customer_email='$_SESSION[email]'");
$row_customer=mysqli_fetch_array($get_customer);

?>
<!--header section end-->
<!--body content wrap start-->
<div class="main">
    <!--promo section start-->
    <section class="promo-section pb-50" style="padding-top: 120px">
        <div class="container" style="padding: 10px;">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card text-center card-form" style="box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);">
                        <div class="card-body">
                            <h5 style="" class="text-dark pt-2"><b>Edit details</b></h5>
                            <form method="post" id="update">
                                <div class="row text-left">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <!-- <label>Your name</label> -->
                                            <input class="form-control" type="text" id="" name="fname" required value="<?php echo $row_customer['customer_fname'] ?>" placeholder="First name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group" style="">
                                            <input class="form-control" type="text" id="" name="lname" required value="<?php echo $row_customer['customer_lname'] ?>" placeholder="Last name">
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->
                                <div class="row text-left">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Your email address</label><br>
                                            <small class="text-danger">Email can't be edited *</small>
                                            <input class="form-control" type="email" id="" name="email" required readonly value="<?php echo $row_customer['customer_email'] ?>" placeholder="Enter email address">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input class="form-control" type="text" id="" name="city" required value="<?php echo $row_customer['customer_city'] ?>" placeholder="Enter City or State">
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Your phone Number</label>
                                            <input class="form-control" type="phone" id="" name="phone" required value="<?php echo $row_customer['customer_contact'] ?>" placeholder="Enter phone number">
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="address">Delivery Address</label>
                                            <textarea class="form-control" id="address" name="address" required rows="2"><?php echo $row_customer['customer_address'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center pt-3">
                                <button name="submit" class="btn btn-dark btn-block">Confirm</button>
                                </div>
                            </form>

                            
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card text-center card-form" style="box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);">
                        <div class="card-body">
                            <h5 style="" class="text-dark pt-2"><b>Change Password</b></h5>
                            <form method="post" id="change_password">
                                <!-- /row -->
                                <div class="row text-left">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Current password</label>
                                            <input class="form-control" type="password" id="" name="password" required value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>New password</label>
                                            <input class="form-control" type="password" id="" name="new_password" required value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Retype New password</label>
                                            <input class="form-control" type="password" id="" name="rnew_password" required value="">
                                        </div>
                                    </div>
                             
                                    
                                   
                                </div>
                                <div class="text-center pt-3">
                                <button name="submit" class="btn btn-dark btn-block">Confirm</button>
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
$(document).on('submit', '#update', function(ev) {
    ev.preventDefault();
    let mee = $(this);
    let mee_form = $(this).serialize();
    $('.default-load').attr('hidden', true);
    $('.let-load').removeAttr('hidden');
    $('input').attr('readonly', true);
    $('#update').find('button').attr('disabled', true);
    
    $.ajax({
        url: 'config/data?action=update',
        type: 'POST',
        // dataType: 'json',
        data: mee_form,
        success: function(data) {
            
            if (data === 'updated') {
                Swal.fire({
                    type: 'success',
                    title: "Edited Successfully !",
                    
                    AllowEscapeKey: false,
                    AllowOutsideClick: false,
                    AllowConfirmButton: true
                }).then(function() {
                    Swal.fire({
                        title: 'Please Wait!',
                        text: 'Refreshing page ...',
                        timer: false,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                    window.location = 'my_account';
                });
            }
        },
        error: function(error_msg) {
            console.log(error_msg);
        }

    })

})

$(document).on('submit', '#change_password', function(ev) {
    ev.preventDefault();
    let mee = $(this);
    let mee_form = $(this).serialize();
   
    
    $.ajax({
        url: 'config/data?action=change_password',
        type: 'POST',
        // dataType: 'json',
        data: mee_form,
        success: function(data) {
            
            if (data === 'success') {
                Swal.fire({
                    type: 'success',
                    title: "Updated Successfully !",
                    
                    AllowEscapeKey: false,
                    AllowOutsideClick: false,
                    AllowConfirmButton: true
                }).then(function() {
                    Swal.fire({
                        title: 'Please Wait!',
                        text: 'Refreshing page ...',
                        timer: false,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                    window.location = 'logout';
                });
            }else if (data === 'wrong') {
                Swal.fire({
                    type: 'warning',
                    title: 'Current Password wrong'
                })
            }else if (data === 'no_match') {
                Swal.fire({
                    type: 'warning',
                    title: 'New Password does not match'              
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