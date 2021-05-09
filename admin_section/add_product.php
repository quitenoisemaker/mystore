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
                            <label for="exampleInputEmail1">Product Title <small class="text-danger">*</small></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="title" placeholder="Enter product title">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Original Product Price</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="oprice" placeholder="Enter original price">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Selling Product Price <small class="text-danger">*</small></label>
                            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="price" placeholder="Enter selling price">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Image1 <small class="text-danger">*</small></label>
                            <input accept="image/*" type="file" name="myfile" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp">
                        </div>
                    </div>
                    <!-- <div class="col-lg-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Delivery Amount<small class="text-danger">*</small></label>
                            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="price" placeholder="Enter selling price">
                        </div>
                    </div> -->
                    <!-- <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Image2 <span class="text-muted">(optional)</span></label>
                            <input accept="image/*" type="file" name="myfile2" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Image3 <span class="text-muted">(optional)</span></label>
                            <input accept="image/*" type="file" name="myfile3" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div> -->
                    <div class="col-lg-12 form-group">
                        <label for="exampleFormControlTextarea1">Product Description <small class="text-danger">*</small></label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" required rows="3"></textarea>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Keyword <small class="text-danger">*</small></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="keyword" placeholder="Enter product keyword">
                        </div>
                    </div>
                    <!-- <div class="col-lg-6">
                        <select class="form-control" name="category">
                            <option selected="" disabled="">Select Category</option>
                            <option>Default select</option>
                            <option>Default select</option>
                        </select>
                    </div> -->

                    <div class="col-lg-3">
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Size1 <span class="text-muted">(optional)</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="size1" placeholder="Enter size">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Size2 <span class="text-muted">(optional)</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="size2" placeholder="Enter size">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Size3 <span class="text-muted">(optional)</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="size3" placeholder="Enter size">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Size4 <span class="text-muted">(optional)</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="size4" placeholder="Enter size">
                        </div>
                    </div>

                    <div class="col-lg-3">
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Color1 <span class="text-muted">(optional)</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="color1" placeholder="Enter color">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Color2 <span class="text-muted">(optional)</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="color2" placeholder="Enter color">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Color3 <span class="text-muted">(optional)</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="color3" placeholder="Enter color">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Color4 <span class="text-muted">(optional)</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="color4" placeholder="Enter color">
                        </div>
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

        if (!empty($_POST['oprice']) && $_POST['oprice'] <= $_POST['price']) {
                # code...
                echo "<script>alert('Original Product Price must be greater than the Selling Product Price')</script>";
            }else{    

        if ($size <= $max_size) {
 
        if (move_uploaded_file($tmp_name, $location.$name )){

            $target_file = $location.$name;
            $resized_file = $location.'resized_'.$name;
            image_crop($target_file, $resized_file, $tn_w = 300, $tn_h = 300, $quality = 70);

        $sql = mysqli_query($conn, "INSERT INTO `products`(`product_id`, `product_title`, `product_price`,`aproduct_price`, `product_desc`, `product_image`, `product_size1`, `product_size2`, `product_size3`, `product_size4`, `product_color1`, `product_color2`, `product_color3`, `product_color4`, `product_keywords`) VALUES (NULL,'$_POST[title]','$_POST[price]','$_POST[oprice]','$_POST[description]','$name','$_POST[size1]','$_POST[size2]','$_POST[size3]','$_POST[size4]','$_POST[color1]','$_POST[color2]','$_POST[color3]','$_POST[color4]','$_POST[keyword]')");

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

    }


  ?>
<!-- Mirrored from www.ansonika.com/sparker/admin_section/listings.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Dec 2018 07:14:58 GMT -->

</html>