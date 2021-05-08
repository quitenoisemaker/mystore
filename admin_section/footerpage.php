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
                <h6>Footer</h6>
                <div class="form-group">
                  <label>Facebook</label>
                    <input type="text" class="form-control" id="brandname" aria-describedby="emailHelp" name="facebook" value="<?php
                      $get_details=mysqli_query($conn, "SELECT * FROM footer");
                      $row_details=mysqli_fetch_array($get_details);
                      echo $row_details['facebook'];
                     ?>" placeholder="Enter your facebook address">
                </div>

                <div class="form-group">
                  <label>Twitter</label>
                    <input type="text" class="form-control" id="brandname" aria-describedby="emailHelp" name="twitter" value="<?php
                      $get_details=mysqli_query($conn, "SELECT * FROM footer");
                      $row_details=mysqli_fetch_array($get_details);
                      echo $row_details['twitter'];
                     ?>" placeholder="Enter your twitter address">
                </div>

                <div class="form-group">
                  <label>Instagram</label>
                    <input type="text" class="form-control" id="brandname" aria-describedby="emailHelp" name="instagram" value="<?php
                      $get_details=mysqli_query($conn, "SELECT * FROM footer");
                      $row_details=mysqli_fetch_array($get_details);
                      echo $row_details['instagram'];
                     ?>" placeholder="Enter your instagram address">
                </div>
                <div class="form-group">
                  <label>Copyright</label>
                    <input type="text" class="form-control" id="brandname" aria-describedby="emailHelp" name="copyright" value="<?php
                      $get_details=mysqli_query($conn, "SELECT * FROM footer");
                      $row_details=mysqli_fetch_array($get_details);
                      echo $row_details['copyright'];
                     ?>" placeholder="">
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

        if (isset($_POST['submit3'])) {
                     
        $sql = "UPDATE footer SET facebook='$_POST[facebook]', twitter='$_POST[twitter]', instagram='$_POST[instagram]', copyright='$_POST[copyright]' ";

        if(mysqli_query($conn, $sql)){
          echo "<script>alert('Updated successfully')</script>";
          echo "<script>window.open('footerpage','_self')</script>";
        }else{
         echo "<script>alert('Opp! Error')</script>";
        }
    }
    
  ?>
<!-- Mirrored from www.ansonika.com/sparker/admin_section/messages.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Dec 2018 07:14:56 GMT -->

</html>