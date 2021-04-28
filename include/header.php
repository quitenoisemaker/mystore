<?php

include('function/function.php');

 ?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from agencyco.themetags.com/index-8.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Sep 2020 09:22:56 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- SEO Meta description -->
    <meta name="description" content="Sales page">
    <meta name="author" content="ThemeTags">
    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article" />
    <!--title-->
    <title>AgencyCo Digital Agency and Marketing Template</title>
    <!--favicon icon-->
    <link rel="icon" href="img/favicon.png" type="image/png" sizes="16x16">
    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:500,600,700%7COpen+Sans&amp;display=swap" rel="stylesheet">
    <!--Bootstrap css-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--Magnific popup css-->
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.13.0-web/css/all.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!--Themify icon css-->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!--Owl carousel css-->
    <link rel="stylesheet" href="assets/sweetalert/sweetalert2.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!--custom css-->
    <link rel="stylesheet" href="css/style2.css">
    <!--responsive css-->
    <link rel="stylesheet" href="css/simple-lightbox.min.css">
    <link rel="stylesheet" href="css/responsive.css">
    
</head>

<body>
    <!--header section start-->
    <header class="header">
        <!--start navbar-->
        <nav class="navbar navbar-expand-lg fixed-top bg-transparent">
            <div class="container">
                <a class="navbar-brand" href="index"><img src="img/logo-white-1x.png" width="180" alt="logo" class="img-fluid"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="ti-menu"></span>
                </button>
                <div class="collapse navbar-collapse main-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="index">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="#contact">All Product</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link page-scroll" href="#contact">Contact</a>
                        </li> -->
                        <?php if (isset($_SESSION['email'])) {?>
                            
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php 
                            $get_details=mysqli_query($conn, "SELECT * FROM customers WHERE customer_email='$_SESSION[email]'");
                            $row_details=mysqli_fetch_array($get_details);
                            echo "Hi, ".  ucfirst($row_details['customer_fname']) ;
                            ?>
                        </a>
                        <div class="dropdown-menu submenu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="my_account">Account</a>
                            <a class="dropdown-item" href="">My orders</a>
                            <a class="dropdown-item" href="">Change password</a>
                            <a class="dropdown-item" href="logout">Logout</a>
                        </div>
                    </li>
                       <?php }else{ ?>
                         <li class="nav-item">
                            <a class="nav-link page-scroll" href="login">Login</a>
                        </li>
                      <?php  } ?>
                        
                    </ul>
                </div>
                <div class="nav-item">
                    <p class="text-white"><a class="nav-link page-scroll " href="cart" style="color: #ffff; font-size: 12px"><i class="fas fa-shopping-cart"> <span class="badge badge-light cart_update"><?php total_items()?></span></i> Cart</a></p>
                </div>
            </div>
        </nav>
        <!--    <br><br>
        <div class="container-fluid p-1" style="background-color: rgb(128,128,128); position: fixed; z-index:777; top:50px;">
            <div class="mb-1 d-flex justify-content-center p-1 ">
                <ul class="d-inline-flex">
                    <li class="nav-item p-2 ">
                        <h4 class="text-white">Welcome To Techlybro Shop</h4>
                    </li>
                    <li class="nav-item p-2 text-right">
                        <a class="" href="" style="color: #ffff">+234 803 311 8000, +234 803 330 5933</a>
                    </li>
                </ul>
            </div>

            <div class="mb-1 p-1 ">

                        <h5 class="text-white text-center">Welcome To Techlybro Shop <span><a class="float-right" href="" style="color: #ffff; font-size: 12px">+234 803 311 8000, +234 803 330 5933</a></span></h5>
                </ul>
            </div>
        </div> -->
        <!--end navbar-->
    </header>