<?php
include('../function/function.php');


if (!isset($_SESSION['username'])) {
  header('location: login');
}

function format_date($date){
        return date('D, M jS Y', strtotime($date));
    }
?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from www.ansonika.com/sparker/admin_section/listings.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Dec 2018 07:14:58 GMT -->
<?php include ('include/header.php'); ?>
<div class="box_general">
    <div class="card">
        <div class="card-header alert alert-warning text-center">
            <b>Add Products</b>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row justify-content-between align-items-center p-4">
                    <div class="col-lg-12">
                        <!-- Button -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Title</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title" placeholder="Enter product title">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Price</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="price" placeholder="Enter price">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Image</label>
                            <input accept="image/*" type="file" name="myfile" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="col-lg-12 form-group">
                        <label for="exampleFormControlTextarea1">Product Description</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Keyword</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="keyword" placeholder="Enter product keyword">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <select class="form-control" name="category">
                            <option selected="" disabled="">Select Category</option>
                            <option>Default select</option>
                            <option>Default select</option>
                        </select>
                    </div>
                    <div>
                        <button class="btn btn-primary btn-sm text-white" name="submit">
                            Add
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- /container-fluid-->
</div>
<!-- /container-wrapper-->
<?php include('include/footer.php'); ?>
</body>
<?php

    if (isset($_POST['submit'])) {
          @$name = $_FILES['myfile'] ['name'];
          @$tmp_name = $_FILES['myfile'] ['tmp_name'];
          $extension = substr($name, strpos($name, '.') +1 );
          @$type = $_FILES['myfile'] ['type'];
          @$size = $_FILES['myfile'] ['size'];
          $max_size = 5000000;
              
        $location='product_images/';    

        if ($size <= $max_size) {
 
        if (move_uploaded_file($tmp_name, $location.$name )){

        $sql = mysqli_query($conn, "INSERT INTO `products`(`product_id`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES (NULL,'$_POST[title]','$_POST[price]','$_POST[description]','$name','$_POST[keyword]')");

        if($sql){
          echo "<script>alert('Subimitted successfully')</script>";
          // echo "<script>window.open('user_account.php','_self')</script>";
        }else{
          echo "<script>alert('Opp! Error')</script>";
        }
          
        }

        }else{

            echo "<script>alert('Opp! File is too')</script>";
        }

    }


  ?>
<!-- Mirrored from www.ansonika.com/sparker/admin_section/listings.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Dec 2018 07:14:58 GMT -->

</html>