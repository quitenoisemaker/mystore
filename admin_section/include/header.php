<?php


?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mystore">
    <title>Admin</title>
    <!-- Favicons-->
    <link rel="shortcut icon" href="../img/logo_g3.jpg" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="../img/logo_g3.jpg">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="../img/logo_g3.jpg">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="../img/logo_g3.jpg">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="../img/logo_g3.jpg">
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Main styles -->
    <link href="css/admin.css" rel="stylesheet">
    <!-- Icon fonts-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Plugin styles -->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <link rel="stylesheet" href="../assets/sweetalert/sweetalert2.min.css">
    <!-- Your custom styles -->
    <link href="css/custom.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
        <a class="navbar-brand" href="index"><img src="../img/logo_g2.jpg" data-retina="true" alt="" width="55" height="36"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="index">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>
                <!--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="General">-->
                <!--        <a class="nav-link" href="general">-->
                <!--          <i class="fa fa-fw fa-envelope-open"></i>-->
                <!--          <span class="nav-link-text">General</span>-->
                <!--        </a>-->
                <!--      </li>-->
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Bookings">
                    <a class="nav-link" href="photo">
                        <i class="fa fa-fw fa-calendar-check-o"></i>
                        <span class="nav-link-text">Logo/Favicon</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My listings">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMylistings" data-parent="#mylistings">
                        <i class="fa fa-fw fa-money"></i>
                        <span class="nav-link-text">Payment</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseMylistings">
                        <li>
                            <a href="online">Online Payment</a>
                        </li>
                        <li>
                            <a href="delivery">Pay on Delivery</a>
                        </li>
                        <li>
                            <a href="payment_key">PayStack key</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My listings">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMylistings3" data-parent="#mylistings">
                        <i class="fa fa-fw fa-list"></i>
                        <span class="nav-link-text">Pages</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseMylistings3">
                        <li>
                            <a href="homepage">Homepage</a>
                        </li>
                        <li>
                            <a href="footerpage">Footer</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My listings">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMylistings2" data-parent="#mylistings">
                        <i class="fa fa-fw fa-list"></i>
                        <span class="nav-link-text">Product</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseMylistings2">
                        <li>
                            <a href="all_product">All Products</a>
                        </li>
                        <li>
                            <a href="add_product">Add Product</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My profile">
                    <a class="nav-link" href="seo">
                        <i class="fa fa-fw fa-user"></i>
                        <span class="nav-link-text">Site SEO</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My profile">
                    <a class="nav-link" href="contact">
                        <i class="fa fa-fw fa-inbox"></i>
                        <span class="nav-link-text">Contact</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My profile">
                    <a class="nav-link" href="user-profile">
                        <i class="fa fa-fw fa-user"></i>
                        <span class="nav-link-text">Change Password</span>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav sidenav-toggler">
                <li class="nav-item">
                    <a class="nav-link text-center" id="sidenavToggler">
                        <i class="fa fa-fw fa-angle-left"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <!-- <a class="nav-link">welcome user</a> -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index">
                        <i class="fa fa-home"></i>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-fw fa-sign-out"></i>Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- /Navigation-->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">My Dashboard</li>
            </ol>