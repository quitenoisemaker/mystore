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
                            <b>Ebook Details</b>
                        </div>
                        <div class="card-body">
                            <!-- Form -->
                            
                                <!-- Text -->
                                
                                <!-- Image1 -->
                                <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row justify-content-between align-items-center p-4">
                                    <div class="col-12 p-3">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <!-- Avatar -->
                                                <big class="text-dark">
                                                    Ebook file
                                                </big><br>

                                                <div class="avatar">
                                                    <input type="file" name="myfile" class="" required >
                                                </div>
                                            </div>
                                           
                                        </div> <!-- / .row -->
                                    </div>
                                    <br>
                                    <div class="col-6">
                                        <div class="row align-items-center">
                                            <div class="col">
                                               <!-- Avatar -->
                                                <big class="text-dark">
                                                    Price
                                                </big><br>
                                                <div class="form-group">
                                                    <input class="form-control" type="number" placeholder="Enter Price" name="price" value="<?php
                                                    $sql = "SELECT * FROM ebook LIMIT 1";
                                    $result = $conn->query($sql);
                                if($result->num_rows>0){
                                  while($row=$result->fetch_assoc()){
                                    $price=$row["price"];
                                    
                                    echo "$price";
                                     }
                                    }
                                                    
                                                    ?>">
                                                </div>
                                            </div>
                                           
                                        </div> <!-- / .row -->
                                    </div>
                                    <div class="col-12">
                                        <!-- Button -->
                                        <button class="btn btn-primary btn-sm text-white" name="submit">
                                            Update
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
          @$price=$_POST['price'];
          @$name = $_FILES['myfile'] ['name'];
          @$tmp_name = $_FILES['myfile'] ['tmp_name'];
          $extension = substr($name, strpos($name, '.') +1 );
          @$type = $_FILES['myfile'] ['type'];
          @$size = $_FILES['myfile'] ['size'];
        //   $max_size = 5000000;
              
        $location='../uploads/';    

        if (move_uploaded_file($tmp_name, $location.$name )){

                 
        $sql = "UPDATE ebook SET upload='$name', price='$price'";

        if(mysqli_query($conn, $sql)){
          echo "<script>alert('Subimitted successfully')</script>";
          // echo "<script>window.open('user_account.php','_self')</script>";
        }else{
          echo "<script>alert('Opp! Error')</script>";
        }
          
        } 

    }


  ?>

<!-- Mirrored from www.ansonika.com/sparker/admin_section/listings.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Dec 2018 07:14:58 GMT -->
</html>
