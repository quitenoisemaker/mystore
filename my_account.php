<?php
include ('include/header.php');

if (!isset($_SESSION['email'])) {
  echo "<script>window.open('login','_self')</script>";
}

$get_customer=mysqli_query($conn, "SELECT * FROM customers WHERE customer_email='$_SESSION[email]'");
$row_customer=mysqli_fetch_array($get_customer);

?>
<!--header section end-->
<!--body content wrap start-->
<div class="main">
    <!--promo section start-->
    <section class="promo-section pb-50" style="padding-top: 120px">
        <div class="container" style="padding: 20px;">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card text-center card-form" style="box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);">
                        <div class="card-body">
                            <h4>Account Overview</h4>
                            <div class="row ">
                                <div class="card col-lg-6 p-2">
                                    <h5><strong>Account Details</strong></h5>
                                    <hr style="margin: 3px">
                                    <p><strong><?php echo ucfirst($row_customer['customer_fname']) ." ". ucfirst($row_customer['customer_lname']); ?></strong></p>
                                    <p><?php echo $row_customer['customer_email']; ?></p>
                                    <p><?php echo $row_customer['customer_contact']; ?></p>
                                </div>
                                <div class="card col-lg-6 p-2">
                                    <h5><strong>Delivery Address</strong></h5>
                                    <hr style="margin: 3px">
                                    <p> <?php echo $row_customer['customer_address']; ?>.</p>
                                </div>
                                
                            </div>
                            <div class="text-center pt-3">
                                <a href="edit" class="btn btn-dark btn-block">Edit details</a>
                                </div>
 
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
$(document).on('submit', '#checkout', function(ev) {
    ev.preventDefault();
    let mee = $(this);
    let mee_form = $(this).serialize();
    $('.default-load').attr('hidden', true);
    $('.let-load').removeAttr('hidden');
    $('input').attr('readonly', true);
    $('#checkout').find('button').attr('disabled', true);
    
    $.ajax({
        url: 'config/data?action=checkout',
        type: 'POST',
        // dataType: 'json',
        data: mee_form,
        success: function(data) {
            alert(data)
            if (data == true) {
                window.location = 'pay';
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