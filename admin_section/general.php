<?php
include('../function/function.php');
if (!isset($_SESSION['username'])) {
  header('location: login');
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include ('include/header.php'); ?>
<form action="" method="POST">
		<div class="box_general">
			<h4>General</h4>
			
			<div class="list_general">
				<ul>
					<li>	
					<h6>Product Title </h6>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Product title" name="product_title" value="<?php $get = mysqli_query($conn, "SELECT * FROM `product`");
                                $row_get = mysqli_fetch_array($get);

                                echo $row_get['product_title']; ?>">
					</div>
					</li>
					<li>	
					<h6>Product Title Sub Text </h6>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Sub Text" name="title_sub" value="<?php echo $row_get['product_title_sub']; ?>">
					</div>
					</li>
					<li>	
					<h6>Product Price</h6>
					<div class="form-group">
						<input type="number" class="form-control" placeholder="price" name="price" value="<?php echo $row_get['product_price']; ?>">
					</div>
					</li>
					<li>
					<h6>Reason head</h6>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="" name="reason_head" value="<?php echo $row_get['reason1_head']; ?>">
					</div>
					</li>
					<li>
					<h6>Reason</h6>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="" name="reason" value="<?php echo $row_get['reason1']; ?>">
					</div>
					</li>
					<li>
					<h6>Reason head2</h6>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="" name="reason_head2" value="<?php echo $row_get['reason2_head']; ?>">
					</div>
					</li>
					<li>
					<h6>Reason2</h6>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="" name="reason2" value="<?php echo $row_get['reason2']; ?>">
					</div>
					</li>
					<li>
					<h6>Reason head3</h6>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="" name="reason_head3" value="<?php echo $row_get['reason3_head']; ?>">
					</div>
					</li>
					<li>
					<h6>Reason3</h6>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="" name="reason3" value="<?php echo $row_get['reason3']; ?>">
					</div>
					</li>
					<li>
					<h6>About head</h6>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="" name="about_head" value="<?php echo $row_get['about_head']; ?>">
					</div>
					</li>
					<li>
					<h6>About</h6>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="" name="about" value="<?php echo $row_get['about']; ?>">
					</div>
					</li>
					<li>
					<h6>About head2</h6>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="" name="about_head2" value="<?php echo $row_get['about_head2']; ?>">
					</div>
					</li>
					<li>
					<h6>About2</h6>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="" name="about2" value="<?php echo $row_get['about2']; ?>">
					</div>
					</li>
				
				</ul>
			</div>
		</div>
		<div class="float-right">
		<button class="btn_1 medium" name="submit">Save</button>
		</div>
		</form>
		<!-- /box_general-->
		
		<!-- /pagination-->
	  </div>
	  <!-- /container-fluid-->
   	</div>
    <!-- /container-wrapper-->
    <?php include('include/footer.php');

    	if (isset($_POST['submit'])) {

            $insert=mysqli_query($conn,"UPDATE `product` SET `product_title`='$_POST[product_title]',`product_title_sub`='$_POST[title_sub]',`product_price`='$_POST[price]',`reason1_head`='$_POST[reason_head]',`reason1`='$_POST[reason]',`reason2_head`='$_POST[reason_head2]',`reason2`='$_POST[reason2]',`reason3_head`='$_POST[reason_head3]',`reason3`='$_POST[reason3]',`about_head`='$_POST[about_head]',`about`='$_POST[about]',`about_head2`='$_POST[about_head2]',`about2`='$_POST[about2]'");

         if ($insert) {
             echo "<script>alert('sucess')</script>";
         }else{
            echo "<script>alert('error')</script>";
            echo mysqli_error($conn);
         }
        }

     ?>

	
</body>

<!-- Mirrored from www.ansonika.com/sparker/admin_section/messages.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Dec 2018 07:14:56 GMT -->
</html>
