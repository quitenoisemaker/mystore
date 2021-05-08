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
            <b>Edit Product</b>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row justify-content-between align-items-center p-4">
                    <div class="col-lg-12">
                        <!-- Button -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Title</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required value="<?php 
                                $id=$_GET['id'];
                                $get_p=mysqli_query($conn, "SELECT * FROM products WHERE product_id='$id'");
                                $row_p=mysqli_fetch_array($get_p);
                                echo $row_p['product_title'];
                            ?>" name="title" placeholder="Enter product title">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Original Product Price</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php 
                                $id=$_GET['id'];
                                $get_p=mysqli_query($conn, "SELECT * FROM products WHERE product_id='$id'");
                                $row_p=mysqli_fetch_array($get_p);
                                echo $row_p['aproduct_price'];
                            ?>" name="oprice" placeholder="Enter original price">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Selling Product Price</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required value="<?php 
                                $id=$_GET['id'];
                                $get_p=mysqli_query($conn, "SELECT * FROM products WHERE product_id='$id'");
                                $row_p=mysqli_fetch_array($get_p);
                                echo $row_p['product_price'];
                            ?>" name="price" placeholder="Enter selling price">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Image1</label>
                            <input accept="image/*" type="file" name="myfile" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
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
                        <label for="exampleFormControlTextarea1">Product Description</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" required rows="3"><?php 
                                $id=$_GET['id'];
                                $get_p=mysqli_query($conn, "SELECT * FROM products WHERE product_id='$id'");
                                $row_p=mysqli_fetch_array($get_p);
                                echo $row_p['product_desc'];
                            ?></textarea>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Keyword</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required value="<?php 
                                $id=$_GET['id'];
                                $get_p=mysqli_query($conn, "SELECT * FROM products WHERE product_id='$id'");
                                $row_p=mysqli_fetch_array($get_p);
                                echo $row_p['product_keywords'];
                            ?>" name="keyword" placeholder="Enter product keyword">
                        </div>
                    </div>
                   <!--  <div class="col-lg-6">
                        <select class="form-control" name="category">
                            <option selected="" disabled="">Select Category</option>
                            <option>Default select</option>
                            <option>Default select</option>
                        </select>
                    </div> -->

                    <div class="col-lg-3">
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Size1 <span class="text-muted">(optional)</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php 
                                $id=$_GET['id'];
                                $get_p=mysqli_query($conn, "SELECT * FROM products WHERE product_id='$id'");
                                $row_p=mysqli_fetch_array($get_p);
                                echo $row_p['product_size1'];
                            ?>" name="size1" placeholder="Enter size">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Size2 <span class="text-muted">(optional)</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php 
                                $id=$_GET['id'];
                                $get_p=mysqli_query($conn, "SELECT * FROM products WHERE product_id='$id'");
                                $row_p=mysqli_fetch_array($get_p);
                                echo $row_p['product_size2'];
                            ?>" name="size2" placeholder="Enter size">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Size3 <span class="text-muted">(optional)</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php 
                                $id=$_GET['id'];
                                $get_p=mysqli_query($conn, "SELECT * FROM products WHERE product_id='$id'");
                                $row_p=mysqli_fetch_array($get_p);
                                echo $row_p['product_size3'];
                            ?>" name="size3" placeholder="Enter size">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Size4 <span class="text-muted">(optional)</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php 
                                $id=$_GET['id'];
                                $get_p=mysqli_query($conn, "SELECT * FROM products WHERE product_id='$id'");
                                $row_p=mysqli_fetch_array($get_p);
                                echo $row_p['product_size4'];
                            ?>" name="size4" placeholder="Enter size">
                        </div>
                    </div>

                    <div class="col-lg-3">
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Color1 <span class="text-muted">(optional)</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php 
                                $id=$_GET['id'];
                                $get_p=mysqli_query($conn, "SELECT * FROM products WHERE product_id='$id'");
                                $row_p=mysqli_fetch_array($get_p);
                                echo $row_p['product_color1'];
                            ?>" name="color1" placeholder="Enter color">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Color2 <span class="text-muted">(optional)</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php 
                                $id=$_GET['id'];
                                $get_p=mysqli_query($conn, "SELECT * FROM products WHERE product_id='$id'");
                                $row_p=mysqli_fetch_array($get_p);
                                echo $row_p['product_color2'];
                            ?>" name="color2" placeholder="Enter color">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Color3 <span class="text-muted">(optional)</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php 
                                $id=$_GET['id'];
                                $get_p=mysqli_query($conn, "SELECT * FROM products WHERE product_id='$id'");
                                $row_p=mysqli_fetch_array($get_p);
                                echo $row_p['product_color3'];
                            ?>" name="color3" placeholder="Enter color">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Color4 <span class="text-muted">(optional)</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php 
                                $id=$_GET['id'];
                                $get_p=mysqli_query($conn, "SELECT * FROM products WHERE product_id='$id'");
                                $row_p=mysqli_fetch_array($get_p);
                                echo $row_p['product_color4'];
                            ?>" name="color4" placeholder="Enter color">
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary btn-sm text-white" name="submit">
                            Edit
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
    $id=$_GET['id'];
    
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
 
       move_uploaded_file($tmp_name, $location.$name );

       $target_file = $location.$name;
            $resized_file = $location.'resized_'.$name;
            image_crop($target_file, $resized_file, $tn_w = 300, $tn_h = 300, $quality = 70);

                //updating file upload
                $id=$_GET['id'];
                $get_p=mysqli_query($conn, "SELECT * FROM products WHERE product_id='$id'");
                $row_p=mysqli_fetch_array($get_p);
                $name2= $row_p['product_image'];

                if (empty($name)) {
                    $name=$name2;
                }
                //end
            
            

            $update_product="UPDATE products SET product_title='$_POST[title]',product_price='$_POST[price]',aproduct_price='$_POST[oprice]',product_desc='$_POST[description]',product_image='$name',product_size1='$_POST[size1]',product_size2='$_POST[size2]',product_size3='$_POST[size3]',product_size4='$_POST[size4]',product_color1='$_POST[color1]',product_color2='$_POST[color2]',product_color3='$_POST[color3]',product_color4='$_POST[color4]',product_keywords='$_POST[keyword]' WHERE product_id='$_GET[id]'";

              $sql= mysqli_query($conn, $update_product);

        
        

        if($sql){
          echo "<script>alert('Edit successfully')</script>";
          echo "<script>window.open('all_product','_self')</script>";
        }else{
          echo "<script>alert('Opp! Error')</script>";
        }
          
      

        }else{

            echo "<script>alert('Opp! File is too')</script>";
        }
        }

    }


  ?>
<!-- Mirrored from www.ansonika.com/sparker/admin_section/listings.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Dec 2018 07:14:58 GMT -->

</html>