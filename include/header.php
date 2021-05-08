<?php

include('function/function.php');

$get_seo=mysqli_query($conn, "SELECT * FROM site_seo");
$row_seo=mysqli_fetch_array($get_seo);

 ?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from agencyco.themetags.com/index-8.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Sep 2020 09:22:56 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- SEO Meta description -->
    <meta name="description" content="<?php echo $row_seo['site_description'] ?>">
    <meta name="author" content="techlybro">
    <!-- keywords -->
    <meta name="keywords" content="<?php echo $row_seo['site_keyword'] ?>">
    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="<?php echo $row_seo['site_name'] ?>" /> <!-- website name -->
    <meta property="og:site" content="<?php echo $row_seo['site_link'] ?>" /> <!-- website link -->
    <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article" />
    <!--title-->
    <title><?php echo $row_seo['site_tagline'] ?></title>
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
    <link rel="stylesheet" href="css/style.css">
    <!--responsive css-->
    <link rel="stylesheet" href="css/simple-lightbox.min.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>
    <!--header section start-->
    <header class="header ">
        <!--start navbar-->
        <nav class="navbar navbar-expand-lg fixed-top bg-transparent">
            <div class="container">
                <a class="navbar-brand text-white" href="index">
                    <?php
                      $get_details=mysqli_query($conn, "SELECT * FROM site_images WHERE id='2'");
                      $row_details=mysqli_fetch_array($get_details);
                    ?>
                    <?php if (!empty($row_details['image'])) {?>
                        <img src="site_images/<?php echo $row_details['image']; ?>" width="180" alt="logo" class="img-fluid">
                   <?php }else{ 
                        echo $row_details['site_title'];
                    }
                    ?>
                    </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="ti-menu"></span>
                </button>
                <div class="collapse navbar-collapse main-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item  mt-2">
                            <a class="nav-link page-scroll" href="index">Home</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link page-scroll" href="#contact">All Product</a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a class="nav-link page-scroll" href="#contact">Contact</a>
                        </li> -->
                        <?php if (isset($_SESSION['email'])) {?>
                        <li class="nav-item dropdown  mt-2">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php 
                            $get_details=mysqli_query($conn, "SELECT * FROM customers WHERE customer_email='$_SESSION[email]'");
                            $row_details=mysqli_fetch_array($get_details);
                            echo "Hi, ".  ucfirst($row_details['customer_fname']) ;
                            ?>
                            </a>
                            <div class="dropdown-menu submenu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="my_account">Account</a>
                                <a class="dropdown-item" href="order">My orders</a>
                                <a class="dropdown-item" href="logout">Logout</a>
                            </div>
                        </li>
                        <?php }else{ ?>
                        <li class="nav-item mt-2">
                            <a class="nav-link page-scroll" href="login">Login</a>
                        </li>
                        <?php  } ?>
                        
                    </ul>
                </div>
                <div class="nav-item mt-2">
                    <p class="text-white"><a class="nav-link page-scroll " href="cart" style="color: #ffff; font-size: 12px"><i class="fas fa-shopping-cart"> <span class="badge badge-light cart_update">
                                    <?php total_items()?></span></i> Cart</a></p>
                </div>

                <div class="nav-item">
                        <form class="form-inline" method="get" action="result" enctype="multipart/form-data">
                            <input class="form-inline form-control-lg mr-sm-2 " type="search" placeholder="Search products" aria-label="Search" name="search" required>
                            <button class="btn btn-outline-light btn-sm my-2 my-sm-4" type="submit" name="submit" value="search">Search</button>
                        </form>
                        </div>
            </div>
        </nav>
    </header>