<?php
include ("function/function.php");


if (!(isset($_SESSION['email']))) {
  header('location:login');
  
}

$get_customer=mysqli_query($conn, "SELECT * FROM customers WHERE customer_email='$_SESSION[email]'");
$row_customer=mysqli_fetch_array($get_customer);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Payment</title>
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
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.13.0-web/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/simple-lightbox.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="assets/sweetalert/sweetalert2.min.css">
</head>

<body id="">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark sticky-top">
        <a class="navbar-brand text-white" href="index">My Store</a>
        <!--  -->
        <div class="collapse navbar-collapse" id="navbarText">
        </div>
        <small class="navbar-text text-white">
            <i class="fa fa-phone-square" aria-hidden="true"></i> Need Help?<br>
            Please fill the Contact Us form
        </small>
    </nav>
    <div class="container" style="padding: 20px;">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="card" style="box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);">
                    <div class="card-body">
                        <div class="container p-1">
                            <h6 class="text-dark">ORDER SUMMARY</h6>
                            <?php
                            $ip=getIp();

                            $sql = "SELECT * FROM cart where ip_add='$ip'";
                                $result = $conn->query($sql);

                                $count_result = mysqli_num_rows($result);
                                
                                
                                while($row=$result->fetch_assoc()){
                             
                                    $pro_price= "SELECT * FROM products where product_id=$row[p_id]";
                                $result2 = $conn->query($pro_price);

                                
                                while($row_product=$result2->fetch_assoc()){ 

                                ?>
                            <hr style="margin: 3px">
                            <div class="d-flex flex-wrap"><img src="admin_section/product_images/<?php echo $row_product['product_image'] ?>" width="35" class="img-fluid"></div><span class=" text-dark"><b>
                                    <?php echo $row_product['product_title'] ?></b><br>
                                <small style="color: red">&#8358
                                    <?php echo number_format($row_product['product_price'])  ?> </small>
                                <br>
                                <small>
                                    <?php echo "Quantity:" . $row['qty']  ?> </small>
                            </span>
                            <?php } ?>
                            <?php } ?>
                            <hr style="margin: 3px">
                            <div class="d-flex">
                                <p>Total:</p> &nbsp; &nbsp; &nbsp;
                                <b> &#8358
                                    <?php echo number_format(total_price2())  ?></b>
                            </div>
                            <div class="text-center">
                                <a href="cart">Edit Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-9">
                <div class="card" style="box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);">
                    <div class="card-body">
                        <div class="container p-4">
                            <form method="POST" id="billing">
                                <h6 class="text-dark">Pay Online and Get a Copy Instantly. Stay Safe, go cashless</h6>
                                <div class="p-4">
                                    <img src="img/20.jpg" width="70"><img src="img/18.jpg" width="70"><img src="img/19.jpg" width="80">
                                </div>
                                <p class="text-dark">Your payment is safe. if anything goes wrong, we've got your back</p>
                                <!-- <script src="https://js.paystack.co/v1/inline.js"></script> -->
                                <button class="btn btn-primary" name="submit"> Pay Now</button>
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="">
                    <div class="card " style="box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);">
                        <div class="card-body">
                            <h6 class="text-dark">Pay on delivery</h5>
                                <p class="text-dark">Please note: We will never ask you fro your password PIN,CVV or full card details over the phone or via email</p>
                                <ul class="text-dark">
                                    <li>Kindly note that you would have to make payment before opening your package.</li>
                                    <li>Once the seal is broken, the item can only be returned if it is damaged, defective or has missing parts.</li>
                                </ul>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Proceed </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="exampleModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form id="delivery" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="text-center">Customer Details</h6>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="container p-4">
                            <p style="font-size: 17px"> <b>Name:</b>
                                <?php echo $row_customer['customer_fname']. " " .$row_customer['customer_lname'] ; ?>
                            </p>
                            <p style="font-size: 17px"><b>Email:</b>
                                <?php echo $row_customer['customer_email']; ?>
                            </p>
                            <p style="font-size: 17px"><b>Phone number:</b>
                                <?php echo $row_customer['customer_contact']; ?>
                            </p>
                            <p style="font-size: 17px"><b>Total:</b>&#x20A6
                                <?php echo  number_format(total_price2()); ?>
                            </p>
                            <p style="font-size: 17px"><b>Delivery fee:</b> &#x20A6 500</p>
                            <div class="text-center">
                                <h5 class="p-3"><b>Your total amount is
                                        <?php echo "<span style='color: red'>&#x20A6 ".number_format(total_price2()+ 500)."</span>"; ?></b></h5>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                        <button class="btn btn-success" name="send">Confirm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script src="assets/sweetalert/sweetalert2.all.min.js"></script>
<script>
$(document).on('submit', '#delivery', function(e) {
    e.preventDefault();
    let mee = $(this);
    let pay_fname = '<?php echo $row_customer['customer_fname'] ?>';
    let pay_lname = '<?php echo $row_customer['customer_lname'] ?>';
    let pay_email = '<?php echo $_SESSION['email'] ?>';
    let pay_phone = <?php echo $row_customer['customer_contact'] ?>;
    let pay_amount = <?php echo total_price2() + 500; ?>;
    


    $.ajax({
        url: './config/data?action=delivery_wallet',
        type: 'POST',
        data: { pay_email: pay_email, pay_fname: pay_fname, pay_lname: pay_lname, pay_phone: pay_phone, pay_amount: pay_amount },
        cache: false,
        success: function(data) {
            // alert(data)
            if (data === 'deleted') {
                Swal.fire({
                    type: 'success',
                    title: "Submitted Successfully !",
                    text: "Our Representative will get back to you soon",
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
                    window.location = 'index';
                });
                // let old_bal= Number($(document).find('.fund-balance').text().replace(",",""));
                // $(document).find('.fund-balance').text(Number(old_bal+Number(pay_amount)).toLocaleString());
                // mee.find('[name=amount]').val('');
            }
        },
        error: function(er) {
            console.log(er)
        }
    })

})
</script>
<script>
$(document).on('submit', '#billing', function(e) {
    e.preventDefault();
    let mee = $(this);
    let pay_email = '<?php echo $row_customer['customer_email'] ?>';
    let pay_money = '<?php echo total_price2() ?>';

    var handler = PaystackPop.setup({
        key: 'pk_test_8da0196b3c9020e43f5e7435212b68beeb0a5858', // Replace with your public key
        email: '<?php echo $row_customer['customer_email'] ?>',
        amount: <?php echo (total_price2() * 100) ?>,
        currency: "NGN",
        // firstname: 'jack',
        // lastname: 'peter',
        ref: '' + Math.floor((Math.random() * 1000000000) + 1), // generates a 
        metadata: {
            custom_fields: [{
                // display_name: "jack",
                // variable_name: "jack",
                // value: "07051194940"

            }]
        },
        callback: function(response) {

            Swal.fire({
                title: "Please Wait",
                text: "Processing your payments",
                AllowEscapeKey: false,
                onOpen: () => {
                    swal.showLoading();
                }
            })
            $.ajax({
                url: './config/data?action=pay_online',
                type: 'POST',
                data: { ref: response.reference, pay_email: pay_email, pay_money: pay_money },
                cache: false,
                success: function(data) {
                    // alert(data)
                    if (data === 'deleted') {
                        Swal.fire({
                            type: 'success',
                            title: "Payment successful !",
                            text: "Our Representative will get back to you shortly",
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
                            window.location = 'index';
                        });
                        // let old_bal= Number($(document).find('.fund-balance').text().replace(",",""));
                        // $(document).find('.fund-balance').text(Number(old_bal+Number(pay_amount)).toLocaleString());
                        // mee.find('[name=amount]').val('');
                    }
                },
                error: function(er) {
                    console.log(er)
                }
            })
        },
        // On the redirected page, you can call Paystack's verify endpoint.,
        onClose: function() {
            alert('Window closed.');
        }
    });
    handler.openIframe();
})
</script>
<!-- Paystack Function Ends-->

</html>