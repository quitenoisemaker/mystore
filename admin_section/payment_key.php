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
                <h6>Payment Key</h6>
                <div class="form-group">
                  <label>Paystack Key</label>
                    <input type="text" class="form-control" id="brandname" aria-describedby="emailHelp" name="pkey" value="<?php
                      $get_payment_key=mysqli_query($conn, "SELECT * FROM payment_key WHERE name='paystack'");
                      $row_payment_key=mysqli_fetch_array($get_payment_key);
                      echo $row_payment_key['pkey'];
                     ?>" placeholder="Enter heading">
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
                     
        $sql = "UPDATE payment_key SET pkey='$_POST[pkey]' WHERE name='paystack'";

        if(mysqli_query($conn, $sql)){
          echo "<script>alert('Updated successfully')</script>";
          echo "<script>window.open('payment_key','_self')</script>";
        }else{
         echo "<script>alert('Opp! Error')</script>";
        }
    }
    
  ?>
<!-- Mirrored from www.ansonika.com/sparker/admin_section/messages.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Dec 2018 07:14:56 GMT -->

</html>