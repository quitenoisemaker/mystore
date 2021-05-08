<?php
include ('include/header.php'); 
?>
<!--header section end-->
<!--body content wrap start-->
<div class="main">
    <!--promo section start-->
    <section class="promo-section pb-50" style="padding-top: 140px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-9">
                    <div class="section-heading text-center mb-5">
                        <h2><?php
                      $get_details=mysqli_query($conn, "SELECT * FROM homepage");
                      $row_details=mysqli_fetch_array($get_details);
                      echo $row_details['heading'];
                     ?></h2>
                        <p class="lead">
                            <?php
                      $get_details=mysqli_query($conn, "SELECT * FROM homepage");
                      $row_details=mysqli_fetch_array($get_details);
                      echo $row_details['sub_heading'];
                     ?>
                            
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="promo-section ptb-50">
        <div class="container">
            <?php cart(); ?>
            <div class="row">
                <?php
                if(isset($_GET["page"])){
                                    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
                                    if(!is_numeric($page_number)){die('Invalid page number!');}
                                }else{
                                    $page_number = 1;
                                }
                                $item_per_page  = 12;
                                $page_url       = 'http://localhost/landing_page/index?';
                                $count_pages = $conn->query("SELECT COUNT(*) FROM products");
                                $total_records=$count_pages->fetch_array()[0];
                                $total_pages = ceil($total_records/$item_per_page);
                                $page_position = (($page_number-1) * $item_per_page);
                                    
                                ?>
                <?php $get_product=mysqli_query($conn, "SELECT * FROM `products` ORDER BY product_id DESC LIMIT $page_position, $item_per_page");
                    while ($row=mysqli_fetch_array($get_product))  { 
                       ?>
                <div class="col-md-6 col-sm-6 col-lg-3 text-center">
                    <div class="card single-promo-hover h-100 rounded" style="box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);">
                        <div class="">
                            <div class="row justify-content-center">
                                <img src="admin_section/product_images/<?php echo "resized_". $row['product_image']; ?>" width="200" alt="product image" class="img-fluid p-4 te">
                            </div>
                            <div class="promo-info">
                                <h5 class="container">
                                    <?php echo ucfirst($row['product_title']); ?><br><strong style="color: red; font-size: 16px"> &#8358
                                        <?php echo number_format($row['product_price']) ; ?></strong>
                                    <br><strike class="text-muted" style="font-size: 14px">
                                        <?php if ($row['aproduct_price']==0) {
                                            echo "";
                                        }else{ ?>
                                        &#8358
                                        <?php echo number_format($row['aproduct_price']); } ?></strike></h5>
                                <!-- <p>
                                    <?php echo substr($row['product_desc'], 0, 200). '...' ; ?>
                                </p> -->
                                <a href="index?add_cart=<?php echo $row['product_id']; ?>" class="btn primary-outline-btn align-items-center" data-toggle="modal" data-target="#exampleModalCenter<?php echo $row['product_id']; ?>">View product<span class=""></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter<?php echo $row['product_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    <?php echo ucfirst($row['product_title']); ?>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="pb-1 text-center gallery">
                                    <img src="admin_section/product_images/<?php echo "resized_". $row['product_image']; ?>" width="225" alt="..." class="img-fluid">
                                </div>
                                <div class="row justify-content-center p-1">
                                    <h4>Product Details</h4>
                                    <div class="col-lg-9">
                                        <p>
                                            <?php echo $row['product_desc']; ?>
                                        </p>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-lg-3">
                                        <form id="cart" method="POST">
                                            <div class="form-group">
                                                <input type="hidden" name="add_cart" value="<?php echo $row['product_id']; ?>">

                                                <?php if (!empty($row['product_size1']) || !empty($row['product_size2']) || !empty($row['product_size3']) || !empty($row['product_size4'])) { ?>
                                                    <label>Size:</label>
                                                    <select class="form-control form-control-sm" name="size">
                                                    <option disabled selected>Select size</option>
                                                    <?php
                                                        if (!empty($row['product_size1'])) {
                                                            # code...
                                                            echo "<option value='".$row['product_size1']."'>". $row['product_size1'] ."</option>";
                                                        }
                                                      ?>
                                                    <<?php
                                                        if (!empty($row['product_size2'])) {
                                                            # code...
                                                            echo "<option value='".$row['product_size2']."'>". $row['product_size2'] ."</option>";
                                                        }
                                                      ?>
                                                    <?php
                                                        if (!empty($row['product_size3'])) {
                                                            # code...
                                                            echo "<option value='".$row['product_size3']."'>". $row['product_size3'] ."</option>";
                                                        }
                                                      ?>
                                                    <?php
                                                        if (!empty($row['product_size4'])) {
                                                            # code...
                                                            echo "<option value='".$row['product_size4']."'>". $row['product_size4'] ."</option>";
                                                        }
                                                      ?>
                                                </select>
                                               <?php } ?>
                                                <br>
                                                <?php if (!empty($row['product_color1']) || !empty($row['product_color2']) || !empty($row['product_color3']) || !empty($row['product_color4'])) { ?>
                                                    <label>Color:</label>
                                                    <select class="form-control form-control-sm" name="color">
                                                    <option disabled selected>Select Color</option>
                                                    <?php
                                                        if (!empty($row['product_color1'])) {
                                                            # code...
                                                           echo "<option value='".$row['product_color1']."'>". $row['product_color1'] ."</option>";
                                                        }
                                                      ?>
                                                    <<?php
                                                        if (!empty($row['product_color2'])) {
                                                            # code...
                                                            echo "<option value='".$row['product_color2']."'>". $row['product_color2'] ."</option>";
                                                        }
                                                      ?>
                                                    <?php
                                                        if (!empty($row['product_color3'])) {
                                                            # code...
                                                            echo "<option value='".$row['product_color3']."'>". $row['product_color3'] ."</option>";
                                                        }
                                                      ?>
                                                    <?php
                                                        if (!empty($row['product_color4'])) {
                                                            # code...
                                                            echo "<option value='".$row['product_color4']."'>". $row['product_color4'] ."</option>";
                                                        }
                                                      ?>
                                                </select>
                                               <?php } ?>
                                                <br>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <span class="text-left"><button class="btn btn-light" data-dismiss="modal" style="box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);">Continue shopping</button></span>
                                <button name="submit" class="btn btn-dark">Add to cart</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <section class="promo-section" style="padding: 50px">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php echo bootstrap_paginate($item_per_page, $page_number, $total_records, $total_pages, $page_url); ?>
            </ul>
        </nav>
    </section>
    <!--promo section end-->
    <!--contact us section start-->
    <section id="contact" class="contact-us-section ptb-100">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-12 pb-3 message-box d-none">
                    <div class="alert alert-danger"></div>
                </div>
                <div class="col-md-5">
                    <div class="contact-us-content">
                        <p class="lead"><?php
                      $get_details=mysqli_query($conn, "SELECT * FROM contact");
                      $row_details=mysqli_fetch_array($get_details);
                      echo $row_details['heading'];
                     ?></p>
                        <h1><?php
                      $get_details=mysqli_query($conn, "SELECT * FROM contact");
                      $row_details=mysqli_fetch_array($get_details);
                      echo $row_details['sub_heading'];
                     ?></h1>
                        <!-- <a href="order_page" class="btn primary-outline-btn align-items-center">Get it Now <span class="ti-arrow-right pl-2"></span></a> -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-us-form gray-light-bg rounded p-5">
                        <h4>Questions? Talk to us</h4>
                        <form action="#" method="POST" id="contactForm1" class="contact-us-form" novalidate="novalidate">
                            <div class="form-row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="Enter name" required="required">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Enter email" required="required">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="message" id="message" class="form-control" rows="7" cols="25" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check d-inline-flex align-items-center mb-2">
                                        <input type="checkbox" class="form-check-input" id="checkInfo">
                                        <label class="form-check-label" for="checkInfo">Save my information for later use</label>
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-3">
                                    <button type="submit" class="btn primary-solid-btn" id="btnContactUs">
                                        Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--contact us section end-->
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
<script>
$(document).on('submit', '#cart', function(ev) {
    ev.preventDefault();
    let mee = $(this);
    let add_cart = mee.find('[name=add_cart]').val();
    let size = mee.find('[name=size]').val();
    let color = mee.find('[name=color]').val();
    $.ajax({
        url: 'config/data?action=add_cart',
        type: 'POST',
        // dataType: 'json',
        data: { add_cart: add_cart, size: size, color: color },
        cache: false,

        success: function(data) {
            // alert(data)
            if (data == true) {
                // alert(res)


                let old_bal = Number($(document).find('.cart_update').text().replace(",", ""));
                $(document).find('.cart_update').text(Number(old_bal + Number(1)).toLocaleString());
                Swal.fire({
                    type: 'success',
                    title: 'Product has been added to cart',

                    // allowOutsideClick: false,
                    // showCancelButton: true,
                    // confirmButtonColor: '#3085D6',
                    // cancelButtonColor: '#d33',
                    // allowOutsideClick: false,
                    // confirmButtonText: 'Continue shopping'
                })
            } else {

                Swal.fire({
                    type: 'warning',
                    title: 'Product already in cart',

                    // allowOutsideClick: false,
                    // showCancelButton: true,
                    // confirmButtonColor: '#3085D6',
                    // cancelButtonColor: '#d33',
                    // allowOutsideClick: false,
                    // confirmButtonText: 'Continue shopping'
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