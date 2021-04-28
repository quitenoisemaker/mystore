<?php
include('../function/function.php');

if (!isset($_SESSION['username'])) {
  header('location: login');
}

?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.ansonika.com/sparker/admin_section/user-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Dec 2018 07:15:00 GMT -->
<?php include ('include/header.php'); ?>
		
		<!-- /box_general-->
		<form action="" method="POST">
		<div class="row">
			<div class="col-md-6">
				<div class="box_general padding_bottom">
					<div class="header_box version_2">
						<h2><i class="fa fa-lock"></i>Change password</h2>
					</div>
					<div class="form-group">
            <label>Old password</label>
            <input class="form-control" type="password" name="old_password" required="">
          </div>
          <div class="form-group">
            <label>New password</label>
            <input class="form-control" type="password" name="new_password" required="">
          </div>
          <div class="form-group">
            <label>Confirm new password</label>
            <input class="form-control" type="password" name="password_again" required="">
          </div>
				</div>
			</div>
		
		</div>
		<!-- /row-->
		<div><input type="submit" value="save" name="submit" class="btn_1 medium"></div>
		
		</form>
	  </div>
	  <!-- /.container-fluid-->
   	</div>
    <!-- /.container-wrapper-->
    <?php include('include/footer.php'); ?>
	
</body>

    <?php
if (isset($_POST['submit'])) {
 
  $old_password=$_POST['old_password'];
  $new_password=$_POST['new_password'];

  $password_again=$_POST['password_again'];



  $sql = "SELECT * FROM admin";
      $result = $conn->query($sql);

  if($result->num_rows>0){

    while($row=$result->fetch_assoc()){
      if ($old_password != $row["password"] ) {

           echo "<script>alert('Your current password is wrong')</script>";
        exit();
      }
    }
  }

if ($new_password != $password_again) {
  

   echo "<script>alert('New password do not match')</script>";
  exit();
}else{
  
  $sql = "UPDATE admin SET password='$new_password'";

  if(mysqli_query($conn, $sql)) {

      echo "<script>alert('Your password was updated successfully')</script>";
      // echo "<script>window.open('user_account.php','_self')</script>";
      

    } 
}
}
?>

<!-- Mirrored from www.ansonika.com/sparker/admin_section/user-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Dec 2018 07:15:00 GMT -->
</html>
