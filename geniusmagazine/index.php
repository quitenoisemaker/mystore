<?php

include ("function/function.php");

?>
<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <!-- title -->
        <title>Geniusgistmedia – An Online Media Platform with the aim and vision to Promote and showcase Africa to the World</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1">
        <meta name="author" content="Techlybro">
        <!-- description -->
        <meta name="description" content="An Online Media Platform with the aim and vision to Promote and showcase Africa to the World.">
        <!-- keywords -->
        <meta name="keywords" content="magazine, gist, media, genuis, platform">
        <!-- favicon -->
        <link rel="shortcut icon" href="img\logo_g3.jpg">
        <link rel="apple-touch-icon" href="img\logo_g3.jpg">
        <link rel="apple-touch-icon" sizes="72x72" href="img\logo_g3.jpg">
        <link rel="apple-touch-icon" sizes="114x114" href="img\logo_g3.jpg">
        <!-- animation -->
        <link rel="stylesheet" href="css\animate.css">
        <!-- bootstrap -->
        <link rel="stylesheet" href="css\bootstrap.min.css">
        <!-- et line icon --> 
        <link rel="stylesheet" href="css\et-line-icons.css">
        <!-- font-awesome icon -->
        <link rel="stylesheet" href="css\font-awesome.min.css">
        <!-- themify icon -->
        <link rel="stylesheet" href="css\themify-icons.css">
        <!-- swiper carousel -->
        <link rel="stylesheet" href="css\swiper.min.css">
        <!-- justified gallery  -->
        <link rel="stylesheet" href="css\justified-gallery.min.css">
        <!-- magnific popup -->
        <link rel="stylesheet" href="css\magnific-popup.css">
        <!-- revolution slider -->
        <link rel="stylesheet" type="text/css" href="revolution\css\settings.css" media="screen">
        <link rel="stylesheet" type="text/css" href="revolution\css\layers.css">
        <link rel="stylesheet" type="text/css" href="revolution\css\navigation.css">
        <!-- bootsnav -->
        <link rel="stylesheet" href="css\bootsnav.css">
        <!-- style -->
        <link rel="stylesheet" href="css\style.css">
        <!-- responsive css -->
        <link rel="stylesheet" href="css\responsive.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!--[if IE]>
            <script src="js/html5shiv.js"></script>
        <![endif]-->
    </head>
    <body>
        <!-- start navigation -->
        <nav class="navbar no-margin-bottom bootsnav alt-font bg-white sidebar-nav sidebar-nav-style-1 navbar-expand-lg">
            <!-- start logo -->
            <div class="col-12 sidenav-header">
                <div class="logo-holder">
                    <a href="/" class="display-inline-block logo"><img alt="Genius" src="img\logo_g.png" data-rjs="img\logo_g@2x.png"></a>
                </div>
                <!-- end logo -->
                <button class="navbar-toggler mobile-toggle" type="button" id="mobileToggleSidenav">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
            <div class="col-12 px-0 pt-3">
                <div id="navbar-menu" class="collapse navbar-collapse no-padding">
                    <ul class="nav navbar-nav navbar-left-sidebar font-weight-500">
                        <li><a href="#home" title="Home" class="inner-link">Home</a></li>
                            <li><a href="#about" title="About" class="inner-link">About</a></li>
                            <!-- <li><a href="#services" title="Services" class="inner-link">Services</a></li> -->
                            
                            <li><a href="#contact" title="Contact" class="inner-link">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 position-absolute top-auto bottom-0 left-0 width-100 padding-20px-bottom sm-padding-15px-bottom">
                <div class="footer-holder">
                    <form class="navbar-form no-padding search-box" role="search">
                        <div class="input-group add-on">
                            <input class="form-control" placeholder="Enter your keywords..." name="srch-term" id="srch-term" type="text">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                    <div class="icon-social-medium margin-eleven-bottom padding-eight-top sm-padding-15px-top sm-margin-15px-bottom">
                        <a href="https://www.facebook.com/emmadelion.prince" target="_blank" class="text-link-extra-dark-gray"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                        <a href="https://twitter.com/" target="_blank" class="text-link-extra-dark-gray"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                        <a href="https://instagram.com/iam_spiritus" target="_blank" class="text-link-extra-dark-gray"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                    </div>
                    <div class="text-medium-gray text-extra-small border-top border-color-extra-light-gray padding-twelve-top sm-padding-15px-top">&COPY; 2021 GENIUS TV. All rights reserved</div>
                </div>
            </div>
        </nav>
        <!-- end navigation -->
        <div class="sidebar-wrapper mobile-height">
            <!-- start hero with parallax section -->
            <section id="home" class="wow fadeIn p-0 parallax sm-background-image-center" data-stellar-background-ratio="0.5" style="background-image:url('images/<?php
            $get = mysqli_query($conn, "SELECT * FROM `photo` WHERE id='1'");
                                $row_get = mysqli_fetch_array($get);
                                 echo $row_get['photo']; ?>');">
                <div class="container full-screen position-relative">
                    <div class="slider-typography">
                        <div class="slider-text-middle-main">
                            <div class="slider-text-middle lg-padding-15px-lr">
                                <div class="col-12 col-xl-8 col-md-10 offset-xl-4 offset-md-1 text-center text-lg-left bg-white-opacity padding-seven-all lg-padding-ten-all">
                                    <div class="alt-font text-extra-dark-gray text-uppercase font-weight-700 letter-spacing-minus-2 title-large">
                                        <?php

                                $get = mysqli_query($conn, "SELECT * FROM `product`");
                                $row_get = mysqli_fetch_array($get);

                                echo $row_get['product_title'];
                                         ?>
                                   </div>
                                    <div class="separator-line-horrizontal-full w-100 margin-35px-tb md-margin-25px-tb sm-margin-20px-tb bg-extra-dark-gray"></div>
                                    <span class="text-dark-gray text-extra-large font-weight-300 margin-35px-bottom d-block md-margin-25px-bottom sm-margin-15px-bottom">We Aimed at Promoting Young and New Step up and Vibrant Entrepreneur</span>
                                    <a href="order_page" class="btn btn-dark-gray btn-medium">Purchase Now</a>
                                </div>
                            </div>
                            <div class="down-section text-center">
                                <a href="#why" class="section-link up-down-ani"><i class="ti-mouse icon-small bounce text-deep-pink"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end hero banner with parallax section -->
            <!-- start feature box section  -->
            <section id="why" class="wow fadeIn bg-extra-dark-gray wow fadeIn lg-padding-two-lr md-no-padding-lr">
                <div class="container">
                    <div class="row">
                        <!-- start feature box item -->
                        <div class="col-12 col-md-4 feature-box-1 sm-margin-30px-bottom wow fadeIn">
                            <div class="margin-15px-bottom alt-font">
                                <h3 class="char-value letter-spacing-minus-1 text-medium-gray font-weight-300">About</h3>
                                <span class="text-large line-height-22 padding-20px-left md-padding-15px w-100 d-table-cell align-middle"></span>
                            </div>
                            <p class="width-90 lg-width-100">Genius Gist Magazine published since 2017 in the Eastern part of Nigeria. It was conceptualized by the publisher, Nwebunu Emmanuel Spiritus. A blogger and media journalist cum Sociologist.
                            It was born out of the passion for young entrepreneur and love for African people and it heritage. The magazine will also serve as a forum that bring both startups and successful entrepreneurs together to share ideas and vision</p>
                            <div class="separator-line-horrizontal-medium-light3 bg-deep-pink margin-5px-top float-left"></div>
                        </div>
                        <!-- end feature box item -->
                        <!-- start feature box item -->
                        <div class="col-12 col-md-4 feature-box-1 sm-margin-30px-bottom wow fadeIn" data-wow-delay="0.2s">
                            <div class="margin-15px-bottom alt-font">
                                <h3 class="char-value letter-spacing-minus-1 text-medium-gray font-weight-300">Vision</h3>
                                <span class="text-large line-height-22 padding-20px-left w-100 d-table-cell align-middle"></span>
                            </div>
                            <p class="width-90 lg-width-100">Our vision is to create a forum that will bring together people of different class and cultures.</p>
                            <div class="separator-line-horrizontal-medium-light3 bg-deep-pink margin-5px-top float-left"></div>
                        </div>
                        <!-- end feature box item -->
                        <!-- start feature box item -->
                        <div class="col-12 col-md-4 feature-box-1 wow fadeIn" data-wow-delay="0.4s">
                            <div class="margin-15px-bottom alt-font">
                                <h3 class="char-value letter-spacing-minus-1 text-medium-gray font-weight-300">Goal</h3>
                                <span class="text-large line-height-22 padding-20px-left w-100 d-table-cell align-middle"></span>
                            </div>
                            <p class="width-90 lg-width-100">To be the voice of Africa to the western world.</p>
                            <div class="separator-line-horrizontal-medium-light3 bg-deep-pink margin-5px-top float-left"></div>
                        </div>
                        <!-- end feature box item -->
                    </div>
                </div>
            </section>
            <!-- end feature box section -->

            <!-- start section -->
            <section id="about" class="wow fadeIn md-no-padding-bottom sm-padding-50px-bottom">
                <div class="container">
   <!--                 <div class="row justify-content-center">-->
   <!--                     <div class="col-12 col-xl-5 col-md-8 margin-eight-bottom md-margin-40px-bottom sm-margin-30px-bottom text-center">-->
   <!--                         <h5 class="alt-font font-weight-700 text-extra-dark-gray margin-20px-bottom text-uppercase"><?php echo $row_get['about_head']; ?></h5>-->
   <!--                         <p class="mx-auto mb-0">Genius Gist Magazine published since 2017 in the Eastern part of Nigeria. It was conceptualized by the publisher, Nwebunu Emmanuel Spiritus. A blogger and media journalist cum Sociologist.</p>-->

   <!--<p class="mx-auto mb-0"> It was born out of the passion for young entrepreneur and love for African people and it heritage. The magazine will also serve as a forum that bring both startups and successful entrepreneurs together to share ideas and vision</p>-->
   <!--                     </div>  -->
   <!--                 </div>-->
                    <div class="row">
                        <div class="col-12 col-xl-3 col-md-6 text-center pl-0 lg-padding-15px-left md-no-padding wow fadeIn">
                            <img src="images\<?php
            $get = mysqli_query($conn, "SELECT * FROM `photo` WHERE id='2'");
                                $row_get = mysqli_fetch_array($get);
                                 echo $row_get['photo']; ?>" alt="" class="w-100">
                        </div>
                        <div class="col-12 col-xl-3 col-md-6 text-center pl-0 lg-padding-15px-left md-no-padding wow fadeIn" data-wow-delay="0.2s">
                            <img src="images\<?php
            $get = mysqli_query($conn, "SELECT * FROM `photo` WHERE id='3'");
                                $row_get = mysqli_fetch_array($get);
                                 echo $row_get['photo']; ?>" alt="" class="w-100">
                        </div>
                        <div class="col-12 col-xl-6 p-0 lg-margin-15px-top md-no-margin-top wow fadeIn" data-wow-delay="0.4s">
                            <div class="d-flex flex-column align-content-center justify-content-center bg-extra-dark-gray padding-thirteen-all md-padding-ten-all text-center text-lg-left sm-padding-five-lr sm-padding-fifteen-tb w-100 h-100">
                                <p class="text-extra-large text-medium-gray font-weight-300">An Online Media Platform with the aim and vision to Promote and showcase Africa to the World through our Involvement in Africa latest gists and current happenings</p>
                                <a href="order_page" class="btn btn-transparent-white btn-medium">Purchase Now</a>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end section -->
            
           

            <!-- start form section -->
        <section id="contact" class="wow fadeIn parallax" data-stellar-background-ratio="0.5" style="background-image:url('images/parallax-bg23-1.jpg');">
            <div class="opacity-full bg-black"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <!-- start contact-form head -->
                    <div class="col-12 col-xl-5 col-md-6 margin-eight-bottom md-margin-40px-bottom sm-margin-30px-bottom text-center">
                        <div class="text-small text-medium-gray alt-font text-uppercase margin-5px-bottom">Talk to us today</div>
                        <h5 class="alt-font text-white-2 font-weight-600 mb-0">Send us a message & we'll be in touch!</h5>
                    </div>
                    <!-- end contact-form head -->
                </div>
                <!-- start contact-form -->
                <form action="" method="post">
                    <div class="row">
                        <div class="col-12">
                            <div id="success-project-contact-form" class="mx-0"></div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <input type="text" name="name" id="name" placeholder="Name *" class="bg-transparent border-color-medium-dark-gray medium-input">
                        </div>
                        <div class="col-12 col-lg-6">
                            <input type="text" name="phone" id="phone" placeholder="Phone" class="bg-transparent border-color-medium-dark-gray medium-input">
                        </div>
                        <div class="col-12 col-lg-12">
                            <input type="text" name="email" id="email" placeholder="E-mail *" class="bg-transparent border-color-medium-dark-gray medium-input">
                        </div>
                       
                        <div class="col-12">
                            <textarea name="comment" id="comment" placeholder="Message" rows="6" class="bg-transparent border-color-medium-dark-gray medium-textarea"></textarea>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-deep-pink btn-rounded btn-large margin-20px-top sm-no-margin-top" name="submit">send message</button>
                        </div>
                    </div>
                </form>
                <!-- end contact-form -->
            </div>
        </section>
        <!-- end form section -->
            
           
   
           
            <!-- start footer --> 
            <footer class="footer-center-logo bg-extra-dark-gray padding-five-tb sm-padding-30px-tb">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- start copyright -->
                        <div class="col-lg-4 col-md-5 text-small text-center alt-font sm-margin-15px-bottom">
                            &COPY; 2021 GENIUS TV is Powered by <a href="https://techlybro.com/" target="_blank" title="Techlybro">Techlybro</a>.
                        </div>
                        <!-- end copyright -->
                        <!-- start logo -->
                        <div class="col-lg-4 col-md-2 text-center sm-margin-10px-bottom">
                            <a href="/"><img class="footer-logo" src="img\logo_g2.jpg" data-rjs="img\logo_g2.jpg" alt="Pofo"></a>
                        </div>
                        <!-- end logo -->
                        <!-- start social media -->
                        <div class="col-lg-4 col-md-5 text-center">
                            <span class="alt-font text-small margin-20px-right">On social networks</span>
                            <div class="social-icon-style-8 d-inline-block vertical-align-middle">
                                <ul class="small-icon mb-0">
                                    <li><a class="facebook" href="https://www.facebook.com/emmadelion.prince" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                                    <li><a class="twitter" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    
                                    <li><a class="instagram" href="https://instagram.com/iam_spiritus" target="_blank"><i class="fab fa-instagram mr-0" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end social media -->
                    </div>
                </div>
            </footer>
            <!-- end footer -->
        </div>
        <!-- start scroll to top -->
        <a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up"></i></a>
        <!-- end scroll to top  -->
        <!-- javascript libraries -->
        <script type="text/javascript" src="js\jquery.js"></script>
        <script type="text/javascript" src="js\modernizr.js"></script>
        <script type="text/javascript" src="js\bootstrap.bundle.js"></script>
        <script type="text/javascript" src="js\jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="js\skrollr.min.js"></script>
        <script type="text/javascript" src="js\smooth-scroll.js"></script>
        <script type="text/javascript" src="js\jquery.appear.js"></script>
        <!-- menu navigation -->
        <script type="text/javascript" src="js\bootsnav.js"></script>
        <script type="text/javascript" src="js\jquery.nav.js"></script>
        <!-- animation -->
        <script type="text/javascript" src="js\wow.min.js"></script>
        <!-- page scroll -->
        <script type="text/javascript" src="js\page-scroll.js"></script>
        <!-- swiper carousel -->
        <script type="text/javascript" src="js\swiper.min.js"></script>
        <!-- counter -->
        <script type="text/javascript" src="js\jquery.count-to.js"></script>
        <!-- parallax -->
        <script type="text/javascript" src="js\jquery.stellar.js"></script>
        <!-- magnific popup -->
        <script type="text/javascript" src="js\jquery.magnific-popup.min.js"></script>
        <!-- portfolio with shorting tab -->
        <script type="text/javascript" src="js\isotope.pkgd.min.js"></script>
        <!-- images loaded -->
        <script type="text/javascript" src="js\imagesloaded.pkgd.min.js"></script>
        <!-- pull menu -->
        <script type="text/javascript" src="js\classie.js"></script>
        <script type="text/javascript" src="js\hamburger-menu.js"></script>
        <!-- counter  -->
        <script type="text/javascript" src="js\counter.js"></script>
        <!-- fit video  -->
        <script type="text/javascript" src="js\jquery.fitvids.js"></script>
        <!-- skill bars  -->
        <script type="text/javascript" src="js\skill.bars.jquery.js"></script> 
        <!-- justified gallery  -->
        <script type="text/javascript" src="js\justified-gallery.min.js"></script>
        <!--pie chart-->
        <script type="text/javascript" src="js\jquery.easypiechart.min.js"></script>
        <!-- retina -->
        <script type="text/javascript" src="js\retina.min.js"></script>
        <!-- revolution -->
        <script type="text/javascript" src="revolution\js\jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="revolution\js\jquery.themepunch.revolution.min.js"></script>
        <!-- revolution slider extensions (load below extensions JS files only on local file systems to make the slider work! The following part can be removed on server for on demand loading) -->
        <!--<script type="text/javascript" src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.carousel.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.video.min.js"></script>-->
        <!-- setting -->
        <script type="text/javascript" src="js\main.js"></script>
    </body>
    <?php
    if(isset($_POST['submit'])){
                
                $fname= $_POST['name'];
                $mail=$_POST['email'];
                $phone=$_POST['phone'];
                $message=$_POST['comment'];
                
                $subject = 'Contact Form';
                
                //Sending email
                        $to='hello@geniusgistmagazine.com';
                        $subject = $subject;
                    
                        $headers[] = 'MIME-Version: 1.0';
                        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
                        $headers[] = 'From: '.$fname.' <'.$mail.'>' . "\r\n" .
                        'Reply-To: '.$mail.'' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();
                        
    
                        $body = '<html><body>';
                        $body .= '<h2 style="color:black;">Contact Form</h2>';
                        $body .= '<p>Full name: <b>'.$fname. '</b></p><br><br>';
                        $body .= '<p>Phone: <b>'.$phone. '</b></p><br><br>';
                        $body .= '<p>Email: <b>'.$mail. '</b></p><br><br>';
                        $body .= '<p>Message: <b>'.$message. '</b></p><br><br>';
                        $body .= '</body></html>';
            
                        $mail=mail($to, $subject, $body, implode("\r\n", $headers));
                        
                        if($mail){
                            echo "<script>swal({
                    title: 'Message sent',
                    icon: 'success',
                    button: 'Ok!',
                  })</script>";
                        }else{
                            echo "<script>swal({
                    title: 'Opps! Error sending message',
                    icon: 'warning',
                    button: 'Ok!',
                  })</script>";
                        }
            }
        ?>
</html>