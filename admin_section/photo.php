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
<!-- Mirrored from www.ansonika.com/sparker/admin_section/messages.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Dec 2018 07:14:53 GMT -->
<?php include ('include/header.php'); ?>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="box_general p-3">
        <div class="list_general">
            <ul>
                <h6>Site Favicon</h6>
                <small class="text-danger">
                    Image should be 16x16 pixels and not more than 10kb</small>
                <div class="form-group">
                    <input type="file" name="myfile" class="" required>
                </div>
                <!-- Button -->
                <button class="btn btn-primary btn-sm text-white" name="submit">
                    Update
                </button>
                </li>
            </ul>
        </div>
    </div>
</form>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="box_general p-3">
        <div class="list_general">
            <ul>
                <h6>Site brand Name</h6>
                <small class="text-danger">Use this if you don't have a brand logo</small>
                <div class="form-group">
                    <input type="text" class="form-control" id="brandname" aria-describedby="emailHelp" name="brand_name" value="<?php
                      $get_details=mysqli_query($conn, "SELECT * FROM site_images WHERE id='2'");
                      $row_details=mysqli_fetch_array($get_details);
                      echo $row_details['site_title'];
                     ?>" placeholder="Enter brand name">
                </div>
                <!-- Button -->
                <button class="btn btn-primary btn-sm text-white" name="submit3">
                    Update
                </button>
                </li>
            </ul>
        </div>
    </div>
</form>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="box_general p-3">
        <div class="list_general">
            <ul>
                <h6>Site brand Logo</h6>
                <div>
                  <?php
                      $get_details=mysqli_query($conn, "SELECT * FROM site_images WHERE id='2'");
                      $row_details=mysqli_fetch_array($get_details);

                      if ($row_details['image']==NULL) {
                        echo "No logo";
                      }else{
                    ?>

                  <img src="../site_images/<?php echo $row_details['image']; ?>" width="50">
                <?php } ?>
                </div>
                <small class="text-danger">Image should not be more than 20kb for better load time</small>
                <div class="form-group">
                    <input type="file" name="myfile" class="">
                </div>
                <!-- Button -->
                <button class="btn btn-primary btn-sm text-white" name="submit2">
                    Update
                </button>
                </li>
            </ul>
        </div>
    </div>
</form>


<!-- /box_general-->
<!-- /pagination-->
</div>
<!-- /container-fluid-->
</div>
<!-- /container-wrapper-->
<?php include('include/footer.php'); ?>
<script>
//      function triggerClick() {
//   document.querySelector('#myfile').click();
// }
// function displayImage(e) {
//   if (e.files[0]) {
//     var reader = new FileReader();
//     reader.onload = function(e){
//       document.querySelector('#image_display').setAttribute('src', e.target.result);
//     }
//     reader.readAsDataURL(e.files[0]);
//   }
// }
//
</script>
</body>
<?php

    if (isset($_POST['submit'])) {
         
          @$name = $_FILES['myfile'] ['name'];
          @$tmp_name = $_FILES['myfile'] ['tmp_name'];
          $extension = substr($name, strpos($name, '.') +1 );
          @$type = $_FILES['myfile'] ['type'];
          @$size = $_FILES['myfile'] ['size'];
          $max_size = 10000;
              
        $location='../site_images/'; 

        if ($size <= $max_size) {   

        if (move_uploaded_file($tmp_name, $location.$name )){

                 
        $sql = "UPDATE site_images SET image='$name' WHERE id='1'";

        if(mysqli_query($conn, $sql)){
          echo "<script>alert('Favicon Submitted successfully')</script>";
          echo "<script>window.open('photo','_self')</script>";
        }else{
          echo "<script>alert('Opp! Error')</script>";
        }
          
        } 

      }else{
        echo "<script>alert('Opp! image too large. Images should be less than 10kb')</script>";
      }

    }
    
    if (isset($_POST['submit2'])) {
         
          @$name = $_FILES['myfile'] ['name'];
          @$tmp_name = $_FILES['myfile'] ['tmp_name'];
          $extension = substr($name, strpos($name, '.') +1 );
          @$type = $_FILES['myfile'] ['type'];
          @$size = $_FILES['myfile'] ['size'];
          $max_size = 30000;
              
        $location='../site_images/';

        if ($size <= $max_size) {    

        move_uploaded_file($tmp_name, $location.$name );

                 
        $sql = "UPDATE site_images SET image='$name' WHERE id='2'";

        if(mysqli_query($conn, $sql)){
          echo "<script>alert('Site Logo Submitted successfully')</script>";
          echo "<script>window.open('photo','_self')</script>";
        }else{
         echo "<script>alert('Opp! Error')</script>";
        }
        

      }else{
        echo "<script>alert('Opp! image too large. Images should be less than 30kb')</script>";
      }

    }


        if (isset($_POST['submit3'])) {
                     
        $sql = "UPDATE site_images SET site_title='$_POST[brand_name]' WHERE id='2'";

        if(mysqli_query($conn, $sql)){
          echo "<script>alert('Brand name Submitted successfully')</script>";
          echo "<script>window.open('photo','_self')</script>";
        }else{
         echo "<script>alert('Opp! Error')</script>";
        }
    }
    
  ?>
<!-- Mirrored from www.ansonika.com/sparker/admin_section/messages.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Dec 2018 07:14:56 GMT -->

</html>