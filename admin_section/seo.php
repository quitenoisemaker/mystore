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
                <h6>Website SEO</h6>
                <div class="form-group">
                  <label>Website Name</label>
                    <input type="text" class="form-control" id="brandname" aria-describedby="emailHelp" name="site_name" value="<?php
                      $get_details=mysqli_query($conn, "SELECT * FROM site_seo");
                      $row_details=mysqli_fetch_array($get_details);
                      echo $row_details['site_name'];
                     ?>" placeholder="Enter sitename">
                </div>

                <div class="form-group">
                  <label>Website URL</label>
                    <input type="text" class="form-control" id="brandname" aria-describedby="emailHelp" name="site_url" value="<?php
                      $get_details=mysqli_query($conn, "SELECT * FROM site_seo");
                      $row_details=mysqli_fetch_array($get_details);
                      echo $row_details['site_link'];
                     ?>" placeholder="Enter website link">
                </div>

                <div class="form-group">
                  <label>Website tagline</label>
                    <input type="email" class="form-control" id="brandname" aria-describedby="emailHelp" name="site_tagline" value="<?php
                      $get_details=mysqli_query($conn, "SELECT * FROM site_seo");
                      $row_details=mysqli_fetch_array($get_details);
                      echo $row_details['site_tagline'];
                     ?>" placeholder="Enter website tagline">
                </div>
                <div class="form-group">
                  <label>Website Description</label>
                    <input type="email" class="form-control" id="brandname" aria-describedby="emailHelp" name="site_desc" value="<?php
                      $get_details=mysqli_query($conn, "SELECT * FROM site_seo");
                      $row_details=mysqli_fetch_array($get_details);
                      echo $row_details['site_description'];
                     ?>" placeholder="Enter website description">
                </div>

                <div class="form-group">
                  <label>Website Keyword</label>
                    <input type="email" class="form-control" id="brandname" aria-describedby="emailHelp" name="site_keyword" value="<?php
                      $get_details=mysqli_query($conn, "SELECT * FROM site_seo");
                      $row_details=mysqli_fetch_array($get_details);
                      echo $row_details['site_keyword'];
                     ?>" placeholder="Enter website Keyword">
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
                     
        $sql = "UPDATE site_seo SET site_name='$_POST[site_name]',site_tagline='$_POST[site_tagline]', site_description='$_POST[site_desc]', site_keyword='$_POST[site_keyword]', site_link='$_POST[site_url]'";

        if(mysqli_query($conn, $sql)){
          echo "<script>alert('Updated successfully')</script>";
          echo "<script>window.open('seo','_self')</script>";
        }else{
         echo "<script>alert('Opp! Error')</script>";
        }
    }
    
  ?>
<!-- Mirrored from www.ansonika.com/sparker/admin_section/messages.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Dec 2018 07:14:56 GMT -->

</html>