<?php
include ('include/header.php');

if (!isset($_SESSION['email'])) {
  // header('locate:login.php');
  echo "<script>window.open('login','_self')</script>";
}

$get_customer=mysqli_query($conn, "SELECT * FROM customers WHERE customer_email='$_SESSION[email]'");
$row_customer=mysqli_fetch_array($get_customer);

function format_date($date){
        return date('D, M jS Y', strtotime($date));
    }

?>
<!--header section end-->
<!--body content wrap start-->
<div class="main">
    <!--promo section start-->
    <section class="promo-section pb-50 pt-100">
        <div class="container" style="padding: 20px;">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card text-center card-form p-2" style="box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);">
                        <h4>Orders</h4>
                        <?php
                            $ip=getIp();

                            $sql = "SELECT * FROM orders where customer_email='$_SESSION[email]' ORDER BY date_created desc";
                                $result = $conn->query($sql);                                
                                
                                while($row=$result->fetch_assoc()){
                             
                                    $pro_price= "SELECT * FROM products where product_id=$row[product_id]";
                                $result2 = $conn->query($pro_price);

                                
                                while($row_product=$result2->fetch_assoc()){ 

                                ?>
                        <div class="card p-3">
                            <div class="d-flex p-2"><img src="admin_section/product_images/<?php echo "resized_". $row_product['product_image'] ?>" width="70" class="img-fluid">
                                <span class=" text-dark"><b style="font-size: 20px">
                                        <?php echo $row['items'] ?></b><br>
                                    <small style="color: red">&#8358
                                        <?php echo number_format($row_product['product_price'])  ?> 
                                    </small>
                                    <br>
                                    <small>
                                        <?php echo "Quantity:" . $row['qty']  ?> 
                                    </small>
                                    <br>
                                    <small>
                                        On <?php echo format_date($row['date_created'])  ?> 
                                    </small>
                                </span>
                            </div>
                        </div>
                        <br>
                        <?php } ?>
                        <?php } ?>
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
</body>
<!-- Mirrored from agencyco.themetags.com/index-8.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Sep 2020 09:23:05 GMT -->

</html>