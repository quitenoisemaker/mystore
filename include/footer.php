<footer class="footer-section">
    <!--footer top start-->
    <div class="footer-top text-white" style="background-color: #0d0d0d">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row footer-top-wrap">
                        <!-- <div class="col-lg-4 col-md-4">
                                <div class="footer-nav-wrap">
                                    <h4 class="text-white">We are the online directory paper Ekiti, more than 150,000 companies are listed in our website.</h4>
                                    <ul class="get-in-touch-list">
                                        <li class="d-flex align-items-center py-2"><span class="ti-location-pin"></span> 1234 Street Name, City Name, Ekiti</li>
                                        <li class="d-flex align-items-center py-2"><span class="ti-email"></span> info@ekitiyellowpage.com</li>
                                        <li class="d-flex align-items-center py-2"><span class="ti-mobile"></span> (123) 456-7890 - (123) 456-7890</li>
                                    </ul>
                                </div>
                            </div> -->
                        <div class="col">
                            <div class="footer-nav-wrap ml-4 text-center">
                                <!-- <a class="navbar-brand p-2" href="index"><img src="image/ekiti2.png" width="150" height="150" alt="logo" class="img-fluid"></a> -->
                                <h4 class="text-white">FOLLOW US</h4>
                                <?php
                      $get_details=mysqli_query($conn, "SELECT * FROM footer");
                      $row_details=mysqli_fetch_array($get_details);
                      
                     ?>
                                <ul class="list-unstyled social-list mb-0">
                                    <li class="list-inline-item tooltip-hover">
                                        <a href="<?php echo $row_details['facebook']; ?>" class="rounded"><span class="ti-facebook" style="color: white; font-size: 25px"></span>&nbsp&nbsp</a>
                                        <div class="tooltip-item">Facebook</div>
                                    </li>
                                    <li class="list-inline-item tooltip-hover"><a href="<?php echo $row_details['twitter']; ?>" class="rounded"><span class="ti-twitter" style="color: white; font-size: 25px"></span>&nbsp&nbsp</a>
                                        <div class="tooltip-item ">Twitter</div>
                                    </li>
                                    <!-- <li class="list-inline-item tooltip-hover"><a href="#" class="rounded"><span class="ti-linkedin" style="color: white; font-size: 25px"></span>&nbsp&nbsp</a>
                                        <div class="tooltip-item">Linkedin</div>
                                    </li> -->
                                    <li class="list-inline-item tooltip-hover"><a href="<?php echo $row_details['instagram']; ?>" class="rounded"><span class="ti-instagram" style="color: white; font-size: 25px"></span></a>
                                        <div class="tooltip-item">Instagram</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- <div class="col-lg-4 col-md-4">
                                <div class="footer-nav-wrap ml-4">
                                    <h4 class="text-white">MENU</h4>
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="register">Register Your Company</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="advert">Become Advertiser</a>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--footer top end-->
    <!--footer copyright start-->
    <div class="footer-bottom gray-light-bg py-2" style="background-color: #808080; color: #0d0d0d">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-5 col-lg-5">
                    <p class="copyright-text pb-0 mb-0"><?php
                      $get_details=mysqli_query($conn, "SELECT * FROM footer");
                      $row_details=mysqli_fetch_array($get_details);
                      echo $row_details['copyright'];
                     ?></p>
                </div>
            </div>
        </div>
    </div>
    <!--footer copyright end-->
</footer>