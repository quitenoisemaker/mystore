<?php 
include ("function/function.php");
if (isset($_GET['link'])) {
	$link=$_GET['link'];



	$sql = "SELECT * FROM online_payment where reference_no= '$link' LIMIT 1";

	$result = $conn->query($sql);

	if($result->num_rows>0){

                $sql = "SELECT * FROM ebook LIMIT 1";
                                    $result = $conn->query($sql);
                                if($result->num_rows>0){
                                  while($row=$result->fetch_assoc()){
                                    $upload=$row["upload"];
                                     }
                                    }
                
		  	$message='
		  	<div class="card p-3">
		  	<div class="pt-4 text-center text-dark"><h6>Click on the button below to download Ebook</h6>
		  	<a href="uploads/'.$upload.'" download="Geniusgistmagazine_Vol4"><button type="submit" id="searchbutton" name="searchbutton" class="btn btn-danger mt-3"> Download Now</button></a>
		  	</div>
		  	</div>';

		 

	}else
		    {
		    	
		    	$message2="
		    	<div class='card p-3 text-center'>
          <h6 class='pt-4' style='color: green'>Opps! The link is invalid</h6>
          <a href='https://geniusgistmagazine.com/'><button type='submit' class='btn btn-danger mt-3'> Go to Homepage</button></a>
          </div>";
		    }
}else{
	header('location:/');
}



 ?>
<!doctype html>
<html lang="en">
<!-- Mirrored from agencyco.themetags.com/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Sep 2020 09:21:16 GMT -->

<head>
  <title>Ebook</title>

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
  
  <style>
      body {
  background-color: #f9fafb;

  /* to place item center  both vertically and horizonatlly */
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  margin: 0px;
  /* End here */
}
.card {
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
  width: 600px;
}
  </style>
</head>

<body>
    
    <!--header section end-->
    <!--promo section start-->
    <section class="promo-section p-4 gray-light-bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-10 col-12">
                    <div class="">
                        <div class="">
                            <div class="" style="width: 100%; height: auto; overflow: hidden;">
                                
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <!--enter text-->
                        <?php
            	if (!empty($message)) {
            		echo "$message";
            	}elseif (!empty($message2)) {
            		echo "$message2";
            	}
             ?>
                    </div>
                </div>
               
            </div>
        </div>
    </section>

  
</body>
<!-- Mirrored from agencyco.themetags.com/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Sep 2020 09:21:17 GMT -->

</html>