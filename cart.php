<?php
include ('include/header.php'); 

// if (!(isset($_SESSION['email']))) {
//   header('location:login');
  
// }
?>
<!--header section end-->
<!--body content wrap start-->
<div class="main">
    <!--promo section start-->
    <section class="promo-section pb-50 pt-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-12 col-sm-12">
                    <table class="table table-borderless table-responsive-sm text-center">
                        <thead>
                            <tr>
                                <th scope="col">ITEM</th>
                                <th scope="col">QUANTITY</th>
                                <th scope="col">UNIT PRICE</th>
                                <th scope="col">SUB TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $ip=getIp();

                            $sql = "SELECT * FROM cart where ip_add='$ip'";
                                $result = $conn->query($sql);

                                $count_result = mysqli_num_rows($result);
                                if ($count_result >0) {
                                    # code...
                                
                                while($row=$result->fetch_assoc()){
                             
                                    $pro_price= "SELECT * FROM products where product_id=$row[p_id]";
                                $result2 = $conn->query($pro_price);

                                
                                while($row_product=$result2->fetch_assoc()){ 

                                ?>
                            <tr class="table-light" style="box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);" id="user-<?php echo $row['p_id'] ?>">
                                <div>
                                    <th>
                                        <div class="d-flex flex-wrap p-1"><img src="admin_section/product_images/<?php echo $row_product['product_image'] ?>" width="50" class="img-fluid"> <span class="p-2 text-dark"><b>
                                                    <?php echo $row_product['product_title'] ?></b></span></div>
                                        <button class="float-right remove btn btn-danger btn-sm" utype="<?php echo $row_product['product_title'] ?>" subTotal="<?php echo getUpdateItem($row_product['product_id']) ?>" id="<?php echo $row['p_id'] ?>"><i class="fas fa-trash"></i> Remove</button>
                                    </th>
                                    <td><select class="form-control form-control-sm quantity" name="<?php echo $row_product['product_id'] ?>">
                                        
                                            <option value="1" <?php if ($row['qty']==3) {
                                            echo "selected";
                                        } ?>>1</option>
                                            <option value="2" <?php if ($row['qty']==2) {
                                            echo "selected";
                                        } ?>>2</option>
                                            <option value="3" <?php if ($row['qty']==3) {
                                            echo "selected";
                                        } ?>>3</option>
                                            <option value="4" <?php if ($row['qty']==4) {
                                            echo "selected";
                                        } ?>>4</option>
                                            <option value="5" <?php if ($row['qty']==5) {
                                            echo "selected";
                                        } ?>>5</option>
                                            <option value="6" <?php if ($row['qty']==6) {
                                            echo "selected";
                                        } ?>>6</option>
                                            <option value="7" <?php if ($row['qty']==7) {
                                            echo "selected";
                                        } ?>>7</option>
                                        </select></td>
                                    <td>&#8358
                                        <?php echo number_format($row_product['product_price'])  ?>
                                    </td>
                                    <td> &#8358 <span class="subTotal"><?php echo number_format(getUpdateItem($row_product['product_id'])) ?></span></td>
                                </div>
                            </tr>
                            <?php  } ?>
                            <?php  } ?>
                            <?php }else{

                         echo "<br> 
                                    <div class='text-center'>
                                    <img src='img/opps.png' height='50' class=''>
                                    <br><br>
                                    <h4 class='text-danger'> Opps! no transaction history</h4> <br>
                                    <div>";
                    } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row justify-content-center p-3">
                <div class="col-lg-10">
                    <h5 class="float-right">Total: &#8358
                        <span class="totalPrice"><?php echo number_format(total_price2()) ?></span>
                        <p class="text-danger" style="font-size: 13px"><small>Delivery fee not included yet</small></p>
                    </h5>
                </div>
            </div>
            <div class="row justify-content-center p-1">
                <div class="col-lg-10">
                    <span class="float-right"><a href="index" class="btn btn-light" style="box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);">Continue shopping</a> <a href="pay" class="btn btn-dark">Proceed to checkout</a></span>
                </div>
            </div>
        </div>
    </section>
    <!--contact us section start-->
    <section id="contact" class="contact-us-section ptb-100">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-12 pb-3 message-box d-none">
                    <div class="alert alert-danger"></div>
                </div>
                <div class="col-md-5">
                    <div class="contact-us-content">
                        <p class="lead">DON’T JUST TAKE OUR WORD FOR IT</p>
                        <h1>Ready to give us a try?</h1>
                        <a href="order_page" class="btn primary-outline-btn align-items-center">Get it Now <span class="ti-arrow-right pl-2"></span></a>
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
$(document).on('click', '.remove', function(ev) {
    let mee = $(this);
    let mee_form = $(this).attr('id');
    let utype = $(this).attr('utype');
    let subTotal = $(this).attr('subTotal');
    let totalPrice= $(this).attr('totalPrice');
    
       

    Swal.fire({
        icon: 'warning',
        title: 'Are you sure?',
        text: "You are about to remove " + utype + " !",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        allowOutsideClick: false,
        confirmButtonText: 'Yes, I Know'
    }).then((result) => {
        if (result.value) {
            mee.find('.default-load').attr('hidden', true);
            mee.find('.let-load').removeAttr('hidden');
            mee.attr('disabled', true);

            $.ajax({
                url: 'config/data?action=delete_product',
                type: 'POST',
                dataType: 'json',
                data: { product: mee_form },
                cache: false,
                success: function(res) {
                    // alert(res)
                    if (res.success) {
                        $('#user-' + mee_form).animate({ "opacity": "0" }, 2500, function() { $('#user-' + mee_form).remove(); });

                        let old_bal = Number($(document).find('.cart_update').text().replace(",", ""));
                        $(document).find('.cart_update').text(Number(old_bal - Number(1)).toLocaleString());


                        Swal.fire({
                            title: 'Please Wait!',
                            text: 'Processing...',
                            timer: false,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            onOpen: () => {
                                swal.showLoading()
                            }
                        })
                        window.location = 'cart';

                        
                        // let old_bal2 = Number(totalPrice.replace(",", ""));
                        // $(document).find('.subTotal').text(Number(old_bal2 -Number(subTotal)).toLocaleString());
                        // alert(old_bal2)
                    }
                }
            })
        }
    })
})
</script>
<script>
$('.quantity').on('change', function() {
    let value = $(this).val();
    let product_id = $(this).attr('name');
    $.ajax({
        url: 'config/data?action=update_cart',
        type: 'POST',
        // dataType: 'json',
        data: { value: value, product_id: product_id },
        cache: false,
        success: function(data) {
            alert(data)
            if (data == true) {

                Swal.fire({
                    type: 'success',
                    title: 'Item quantity has been updated',
                }).then((result) => {

                    if (result.value) {
                        Swal.fire({
                            title: 'Please Wait!',
                            text: 'Processing...',
                            timer: false,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            onOpen: () => {
                                swal.showLoading()
                            }
                        })
                        window.location = 'cart';
                    }
                });
            }
        },
        error: function(error_msg) {
            console.log(error_msg);
        }

    })
});
</script>
<script>
$(document).on('submit', '#cart', function(ev) {
    ev.preventDefault();
    let mee = $(this);
    let add_cart = mee.find('[name=add_cart]').val();
    $.ajax({
        url: 'config/data?action=add_cart',
        type: 'POST',
        // dataType: 'json',
        data: { add_cart: add_cart },
        cache: false,

        success: function(data) {
            // alert(data)
            if (data == true) {
                // alert(res)
                Swal.fire({
                    type: 'success',
                    title: 'Product has been added to cart',
                    // text: "To activate your account, kindly click on the button to make payment",
                    // footer: "You will receive an email once your acccount is approved",
                    // allowOutsideClick: false,
                    // showCancelButton: true,
                    confirmButtonColor: '#3085D6',
                    cancelButtonColor: '#d33',
                    allowOutsideClick: false,
                    confirmButtonText: 'Continue shopping'
                }).then((result) => {

                    if (result.value) {
                        Swal.fire({
                            title: 'Please Wait!',
                            text: 'Processing...',
                            timer: false,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            onOpen: () => {
                                swal.showLoading()
                            }
                        })
                        window.location = 'index';
                    }
                });
            } else {

                Swal.fire({
                    type: 'warning',
                    title: 'Product already in cart',
                    // text: "To activate your account, kindly click on the button to make payment",
                    // footer: "You will receive an email once your acccount is approved",
                    // allowOutsideClick: false,
                    // showCancelButton: true,
                    confirmButtonColor: '#3085D6',
                    cancelButtonColor: '#d33',
                    allowOutsideClick: false,
                    confirmButtonText: 'Continue shopping'
                }).then((result) => {

                    if (result.value) {
                        Swal.fire({
                            title: 'Please Wait!',
                            text: 'Processing...',
                            timer: false,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            onOpen: () => {
                                swal.showLoading()
                            }
                        })
                        window.location = 'index';
                    }
                });

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